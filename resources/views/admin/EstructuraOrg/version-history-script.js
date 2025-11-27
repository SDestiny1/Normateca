/* ================ MANEJO DEL HISTORIAL DE VERSIONES ================ */

// Abrir modal de historial
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".version-history-btn");
  if (!btn) return;

  const codigo = btn.dataset.codigo || "";
  const titulo = btn.dataset.titulo || "";

  if (!codigo) return;

  // Llenar el título del modal
  document.querySelector("#modalVersionHistoryLabel").textContent =
    "Historial de Versiones - " + titulo;

  // Abrir modal
  const modalEl = document.getElementById("modalVersionHistory");
  const bsModal = new bootstrap.Modal(modalEl);
  // Guardar el título del documento en el modal para usarlo al abrir el viewer
  modalEl.dataset.currentTitulo = titulo;
  bsModal.show();

  // Cargar historial con AJAX
  fetch(`/documentos/${encodeURIComponent(codigo)}/version-history`)
    .then((res) => res.json())
    .then((data) => {
      if (!data || !data.success) {
        document.getElementById("versionsList").innerHTML =
          '<div class="alert alert-warning">No hay versiones disponibles</div>';
        return;
      }

      const versiones = data.versiones || [];
      if (versiones.length === 0) {
        document.getElementById("versionsList").innerHTML =
          '<div class="alert alert-info">Sin versiones anteriores</div>';
        return;
      }

      let html = `<div class="alert alert-info">Total de versiones: <strong>${data.total_versiones}</strong></div>`;
      html += '<div class="list-group">';

      versiones.forEach((v) => {
        html += `
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">Versión ${v.version_number}</h6>
                                <p class="mb-1 small text-muted">${v.created_at}</p>
                                <p class="mb-1 small"><strong>Usuario:</strong> ${v.usuario}</p>
                                <p class="mb-0 small"><strong>Cambios:</strong> ${v.cambios_descripcion}</p>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-outline-primary view-version-btn" data-version-id="${v.id}" data-version-number="${v.version_number}" title="Ver archivo">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <a href="/documento-versions/${v.id}/download" class="btn btn-sm btn-outline-success" title="Descargar">
                                    <i class="bi bi-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                `;
      });

      html += "</div>";
      document.getElementById("versionsList").innerHTML = html;

      // Agregar event listeners a los botones de vista
      document.querySelectorAll(".view-version-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
          const versionId = this.dataset.versionId;
          const versionNumber = this.dataset.versionNumber;
          viewVersionInModal(versionId, versionNumber);
        });
      });
    })
    .catch((err) => {
      console.error("Error:", err);
      document.getElementById("versionsList").innerHTML =
        '<div class="alert alert-danger">Error al cargar el historial</div>';
    });
});

// Ver versión en modal
function viewVersionInModal(versionId, versionNumber) {
  // Obtener el título guardado en el modal de historial
  const historyModalEl = document.getElementById("modalVersionHistory");
  const titulo = historyModalEl
    ? historyModalEl.dataset.currentTitulo || ""
    : "";

  // Cerrar modal de historial
  const historyModal = bootstrap.Modal.getInstance(historyModalEl);
  if (historyModal) historyModal.hide();

  // Obtener el PDF como base64 desde el endpoint JSON
  const viewer = document.getElementById("versionViewer");
  const downloadUrl = `/documento-versions/${versionId}/download`;

  // Configurar la barra de herramientas
  const toolbar = document.getElementById("versionViewerToolbar");
  toolbar.innerHTML = "";

  const aDownload = document.createElement("a");
  aDownload.className = "btn btn-sm btn-outline-secondary";
  aDownload.href = downloadUrl;
  aDownload.download = `doc_v${versionNumber}.pdf`;
  aDownload.textContent = "Descargar";
  toolbar.appendChild(aDownload);

  // Fetch base64 desde la ruta JSON (sin problemas de streaming/memoria)
  fetch(`/documento-versions/${versionId}`)
    .then((res) => res.json())
    .then((data) => {
      if (data.success && data.data) {
        // Asignar data URI base64 directamente al embed
        viewer.src = data.data;

        const aOpen = document.createElement("a");
        aOpen.className = "btn btn-sm btn-outline-primary";
        aOpen.href = data.data;
        aOpen.download = `doc_v${versionNumber}.pdf`;
        aOpen.textContent = "Descargar (Data URI)";
        toolbar.appendChild(aOpen);
      } else {
        alert("No fue posible obtener el documento");
      }
    })
    .catch((err) => {
      console.error("Error fetching version:", err);
      alert("Error al cargar el documento: " + err.message);
    });

  // Actualizar título del modal
  document.querySelector(
    "#modalViewVersionLabel"
  ).textContent = `${titulo} - Versión ${versionNumber}`;

  // Abrir modal
  const modalEl = document.getElementById("modalViewVersion");
  const bsModal = new bootstrap.Modal(modalEl);
  bsModal.show();

  // Limpiar al cerrar
  modalEl.addEventListener(
    "hidden.bs.modal",
    function () {
      try {
        viewer.src = "";
        toolbar.innerHTML = "";
      } catch (e) {}
    },
    { once: true }
  );
}
