export function mostrarMensagem(id, tipo, texto) {
    document.getElementById(id).innerHTML = `
    <div class="alert alert-${tipo}" role="alert">${texto}</div>`;
}

export function removerMsg(id) {
    setTimeout(() => {
        document.getElementById(id).innerHTML = "";
    }, 3000);
}
