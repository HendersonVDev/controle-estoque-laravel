import { converterData } from '../util/conversores.js';
import { mostrarMensagem, removerMsg } from '../ui/mensagens.js';
import { cadastrarModal } from '../ui/modais.js';

export function initCadastro(calendar) {
    const form = document.getElementById("formCadEvento");
    const msg = document.getElementById("msg");
    const msgCadEvento = document.getElementById("msgCadEvento");
    const btn = document.getElementById("btnCadEvento");

    if (form) {
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            btn.value = "Salvando...";
            const dadosForm = new FormData(form);

            const dados = await fetch("cadastrar_evento.php", {
                method: "POST",
                body: dadosForm,
            });

            const resposta = await dados.json();

            if (!resposta['status']) {
                mostrarMensagem("msgCadEvento", "danger", resposta['msg']);
            } else {
                mostrarMensagem("msg", "success", resposta['msg']);
                form.reset();
                calendar.addEvent({
                    id: resposta['id'],
                    title: resposta['title'],
                    color: resposta['color'],
                    start: resposta['start'],
                    end: resposta['end'],
                });
                removerMsg("msg");
                cadastrarModal.hide();
            }

            btn.value = "Cadastrar";
        });
    }
}
