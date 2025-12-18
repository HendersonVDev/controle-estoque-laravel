document.addEventListener("DOMContentLoaded", () => {

    console.log("PDV script carregado e DOM pronto!");

    let itens = [];
    const campoID = document.querySelector("#campo-id");
    const tabela = document.querySelector("#tabela-itens tbody");
    const descontoInput = document.querySelector("#desconto");
    const totalTxt = document.querySelector("#total_txt");
    const subtotalTxt = document.querySelector("#subtotal_txt");

    // ---- EVENTOS ----
    document.querySelector("#btn-adicionar").addEventListener("click", () => {
        buscarProduto(campoID.value.trim());
    });

    campoID.addEventListener("keypress", e => {
        if (e.key === "Enter") {
            console.log("ENTER detectado!");
            buscarProduto(campoID.value.trim());
        }
    });

    descontoInput.addEventListener("input", calcularTotal);


    // ---- FUNÇÕES ----

    function buscarProduto(id) {
        if (!id) return alert("Informe um ID!");

        console.log("Buscando produto ID:", id);

        fetch(`/pdv/produto/${id}`)
            .then(res => res.json())
            .then(data => {
                console.log("Resposta servidor:", data);

                if (!data.status) {
                    alert("Produto não encontrado!");
                    return;
                }

                const produto = data.produto;
                const existente = itens.find(i => i.id == produto.id);

                if (existente) {
                    existente.quantidade++;
                    existente.subtotal = existente.quantidade * parseFloat(produto.preco_venda);
                } else {
                    itens.push({
                        id: produto.id,
                        nome: produto.nome,
                        quantidade: 1,
                        preco: parseFloat(produto.preco_venda),
                        subtotal: parseFloat(produto.preco_venda)
                    });
                }

                campoID.value = "";
                render();
            })
            .catch(err => console.error("Erro ao buscar produto:", err));
    }

    function render() {
        tabela.innerHTML = "";

        itens.forEach((item, index) => {
            tabela.innerHTML += `
            <tr>
                <td>${item.id}</td>
                <td>${item.nome}</td>
                <td><input type="number" onchange="alterarQuantidade(${index}, this.value)" value="${item.quantidade}" class="form-control form-control-sm" min="1"></td>
                <td>R$ ${item.preco.toFixed(2)}</td>
                <td>R$ ${(item.subtotal).toFixed(2)}</td>
                <td><button class="btn btn-danger btn-sm" onclick="remover(${index})">X</button></td>
            </tr>
            `;
        });

        calcularTotal();
    }

    window.alterarQuantidade = function (i, val) {
        itens[i].quantidade = parseInt(val);
        itens[i].subtotal = itens[i].quantidade * itens[i].preco;
        render();
    }

    window.remover = function (i) {
        itens.splice(i, 1);
        render();
    }

    function calcularTotal() {
        let subtotal = itens.reduce((s, i) => s + i.subtotal, 0);
        let desconto = parseFloat(descontoInput.value || 0);
        let total = subtotal - desconto;

        subtotalTxt.innerHTML = `R$ ${subtotal.toFixed(2)}`;
        totalTxt.innerHTML = `R$ ${total.toFixed(2)}`;
    }


    // ---- FINALIZAR VENDA ----

    document.querySelector("#btn_finalizar").addEventListener("click", () => {
        if (itens.length === 0) return alert("Nenhum produto adicionado!");

        fetch("/pdv/finalizar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                itens,
                subtotal: itens.reduce((s, i) => s + i.subtotal, 0),
                desconto: parseFloat(descontoInput.value) || 0,
                total: parseFloat(totalTxt.innerText.replace("R$ ", "")),
                forma_pagamento: document.querySelector("#forma_pagamento").value,
                observacoes: document.querySelector("#observacoes").value
            })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.mensagem);
            itens = [];
            render();
        })
        .catch(err => console.error("Erro ao finalizar venda:", err));
    });

});
