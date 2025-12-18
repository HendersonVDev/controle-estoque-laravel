export function configurarVisualizacaoEvento() {
    const btnViewEditEvento = document.getElementById("btnViewEditEvento");
    const btnViewEvento = document.getElementById("btnViewEvento");

    if (btnViewEditEvento) {
        btnViewEditEvento.addEventListener("click", () => {
            document.getElementById("visualizarEvento").style.display = "none";
            document.getElementById("verModalCampo").style.display = "none";
            document.getElementById("editarEvento").style.display = "block";
            document.getElementById("verEditarCampo").style.display = "block";
        });
    }

    if (btnViewEvento) {
        btnViewEvento.addEventListener("click", () => {
            document.getElementById("visualizarEvento").style.display = "block";
            document.getElementById("verModalCampo").style.display = "block";
            document.getElementById("editarEvento").style.display = "none";
            document.getElementById("verEditarCampo").style.display = "none";
        });
    }
}
