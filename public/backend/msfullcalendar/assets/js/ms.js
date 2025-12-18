///import { lerElemento } from './traduzir.js';

document.addEventListener('DOMContentLoaded', function() {
    
    var calendarEl = document.getElementById('calendar');

     //receber o seletor o id da janela modal cadastrar
     const cadastrarModal = new bootstrap.Modal(document.getElementById("cadastrarModal"));

      //receber o seletor  o id da janela modal visualizar
      const verModal = new bootstrap.Modal(document.getElementById("verModal"));

      //receber o seletor  msgViewEvento
      const msgViewEvento = new bootstrap.Modal(document.getElementById("msgViewEvento"));
    
    // instanciar o fullcalendar.calendar e atribuir a variavel calendar
    var calendar = new FullCalendar.Calendar(calendarEl, {

      //tema 
       themeSystem: 'bootstrap5',

    //INICIO DA TRADUÇÃO COMPLETA PARA PT-BR
    locale: 'pt-br',
    buttonText: {
      //prev: 'Anterior',
      //next: 'Próximo',
      prevYear: 'Ano anterior',
      nextYear: 'Próximo ano',
      year: 'Ano',
      today: 'Hoje',
      month: 'Mês',
      week: 'Semana',
      day: 'Dia',
      list: 'Lista',
    },
    buttonHints: {
      prev: '$0 Anterior',
      next: 'Próximo $0',
      today(buttonText) {
          return (buttonText === 'Dia') ? 'Hoje' :
              ((buttonText === 'Semana') ? 'Esta' : 'Este') + ' ' + buttonText.toLocaleLowerCase();
      },
    },
    viewHint(buttonText) {
      return 'Visualizar ' + (buttonText === 'Semana' ? 'a' : 'o') + ' ' + buttonText.toLocaleLowerCase();
    },
    weekText: 'Sm',
    weekTextLong: 'Semana',
    allDayText: 'dia inteiro',
    moreLinkText(n) {
      return 'mais +' + n;
    },
    moreLinkHint(eventCnt) {
      return `Mostrar mais ${eventCnt} eventos`;
    },
    noEventsText: 'Não há eventos para mostrar',
    navLinkHint: 'Ir para $0',
    closeHint: 'Fechar',
    timeHint: 'A hora',
    eventHint: 'Evento',
    //FIM DA TRADUÇÃO COMPLETA PARA PT-BR



     // cria o cabeçalho do calendário 
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },

      //definir a data inicial
      //initialDate: '2023-01-12',

      // permitir clicar nos nomes dos dias da semana 
      navLinks: true, 

      //permitir arrastar e soltar sobre vários dias
      selectable: true,

      // indicar visualmente a área que será selecionada 
      // antes de que o usuario solte o botão do mouse para confirmar a seleção
      selectMirror: true,

      //permite arrastar e redimensionar os eventos diretamente no calendario
      editable: true,

      //numero máximo de eventos em um determinado dia, se for true, 
      // o numero de eventos será limitado á altura da celula dodia
      dayMaxEvents: true, 

      events: 'listar.php',

      eventClick: function (info){

        //apresentar os detalhes do evento
        document.getElementById("visualizarEvento").style.display = "block";
        document.getElementById("verModalCampo").style.display = "block";
 
        //ocultar o formulario editar 
       document.getElementById("editarEvento").style.display = "none";
       document.getElementById("verEditarCampo").style.display = "none";
       

        // Enviar para a janela modal os dados do envento 
        document.getElementById("ver_id").innerText = info.event.id;
        document.getElementById("ver_title").innerText = info.event.title;
        document.getElementById("ver_obs").innerText = info.event.extendedProps.obs;
        document.getElementById("ver_start").innerText = info.event.start.toLocaleString();
        document.getElementById("ver_end").innerText = 
        info.event.end !== null 
        ? info.event.end.toLocaleString() 
        : info.event.start.toLocaleString();

          // ENVIAR OS DADOS DO EVENTO PARA O FORMULARIO LER EDITAR
          document.getElementById("edit_id").value = info.event.id;
          document.getElementById("edit_title").value = info.event.title;
          document.getElementById("edit_obs").value = info.event.extendedProps.obs;
          document.getElementById("edit_color").value = info.event.backgroundColor;
          document.getElementById("edit_start").value = converterData(info.event.start);
          document.getElementById("edit_end").value = 
          info.event.end !== null 
          ? converterData(info.event.end) 
          : converterData(info.event.end);

        //abrir modal
        verModal.show();
      },

      //abre a janela modal para cadastrar um evento
      select: function(info){
       
        
        //data inicio 
        document.getElementById("cad_start").value = converterData(info.start);
        //document.getElementById("cad_end").value = converterData(info.end); colocar um dia a mais
        //fim no mesmo dia
        document.getElementById("cad_end").value = converterData(info.start);

        //abrir janela modal do bootstrap 
        cadastrarModal.show();
        
      }

    });
  
    // renderizar calendário 
    calendar.render();

//----------- INICIO FUNÇÃO PARA CONVERTER DATA ---------------------------- //
    function converterData(data){

        //Converter a string em um objeto data 
        const dataObj = new Date(data);

        // extrair o ano da data 
        const ano = dataObj.getFullYear(); 

        // obter o mês, que inicia no 0
        const mes = String(dataObj.getMonth() + 1).padStart(2, '0');

        // obter o dia
        const dia = String(dataObj.getDate()).padStart(2, '0');

        // obter a hora 
        const hora = String(dataObj.getHours()).padStart(2, '0');

        // obter a hora 
        const minuto = String(dataObj.getMinutes()).padStart(2, '0');

        //retornar a data 
        return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
    }
//----------- FIM FUNÇÃO PARA CONVERTER DATA ---------------------------- //


    //Receber o seletor do formulario cadastrar evento 
    const formCadEvento = document.getElementById("formCadEvento");

    //recebe o seletor de mensagem 
    const msg = document.getElementById("msg");

    // recebe o seletor da mensagem cadastrar evento 
    const msgCadEvento = document.getElementById("msgCadEvento");
    
    //receber o seletor da janela modal cadstrar enento do botão
    const btnCadEvento = document.getElementById("btnCadEvento");

//----------- INICIO DA FUNÇÃO PARA CADASTRAR EVENTO ---------------------------- //

if(formCadEvento){

      //aguaradando o cliente clicar em cadastrar 
      formCadEvento.addEventListener("submit", async (e) => {

        // não permitir atualizar a página 
        e.preventDefault(); 

        /// apresentar um texto salvando 
        btnCadEvento.value = "Salvando...";
 
        //Receber os dados do formulario 
        const dadosForm = new FormData(formCadEvento);

        //Chamar o arquivo php responsavel em salvar o evento 
        const dados = await fetch("cadastrar_evento.php", {
            method: "POST", 
            body: dadosForm, // dados recebidos do formulario 
        });

        // realizar a leitura dos dados retornados pelo php 
        const resposta = await dados.json();
        //console.log(resposta);

//acessa o if quando não cadastrar com sucesso 
if(!resposta['status']){
//envia mesnagem  de erro
msgCadEvento.innerHTML = `
<div class="alert alert-danger" role="alert">
${resposta['msg']}
</div>`;

}else{
//envia mensagem de cadstrado com uscesso
msg.innerHTML = `
<div class="alert alert-success" role="alert">
${resposta['msg']}
</div>`;

//msgCadEvento.innerHTML = "";

//limpar o formulario 
formCadEvento.reset();

// criar o objecto com os dados do evento 
const novoEvento = {
    id: resposta['id'],
    title: resposta['title'],
    color: resposta['color'],
    start: resposta['start'],
    end: resposta['end'],
    obs: resposta['obs'],
}
//adicionar evento ao calendario 
calendar.addEvent(novoEvento);

//chamar a função remover a mensagem após 3 segundos 
removerMsg();

// fechar a janela modal cadastrar
cadastrarModal.hide();

}

//apresentar no botão texto cadastrar
btnCadEvento.value = "Cadastrar";

      });
        
}
//----------- FIM DA FUNÇÃO PARA CADASTRAR EVENTO ---------------------------- //


// INICIO função para remover a mensagem após 3 segundos ----------//
function removerMsg(){
    setTimeout(() => {
        document.getElementById('msg').innerHTML = "";
    }, 3000)
}
// FIM função para remover a mensagem após 3 segundos ----------//

// --------- INICIO OCULTAR BOTÃO VISUALIZAR DETALHES E EDITAR -------------------- //
// somonte seletor para editar 
const btnViewEditEvento = document.getElementById("btnViewEditEvento");

if(btnViewEditEvento){

// aguardar o clique do usuario ao clicar no botão editar 
btnViewEditEvento.addEventListener("click", () =>{

 //ocultar os detalhes do evento
 document.getElementById("visualizarEvento").style.display = "none";
 document.getElementById("verModalCampo").style.display = "none";
 
 //apresentar o formulario editar 
 document.getElementById("editarEvento").style.display = "block";
 document.getElementById("verEditarCampo").style.display = "block";
});
    
}
// --------- FIM OCULTAR BOTÃO VISUALIZAR DETALHES E EDITAR -------------------- //

// --------- INICIO OCULTAR BOTÃO EDITAR E MOSTRAR OS DETALHES  -------------------- //
// somonte seletor ver detalhes 
const btnViewEvento = document.getElementById("btnViewEvento");

if(btnViewEvento){

// aguardar o clique do usuario ao clicar no botão editar 
btnViewEvento.addEventListener("click", () =>{

 //apresentar os detalhes do evento
 document.getElementById("visualizarEvento").style.display = "block";
 document.getElementById("verModalCampo").style.display = "block";
 
 //ocultar o formulario editar 
 document.getElementById("editarEvento").style.display = "none";
 document.getElementById("verEditarCampo").style.display = "none";
});
    
}
// --------- FIM OCULTAR BOTÃO EDITAR E MOSTRAR OS DETALHES  -------------------- //


//----------- INICIO INICIO SELETOR DO FORMULARIO EDITAR ---------------------------- //


// RECEBER SELETOR DA MENSAGEM EDITAR EVENTO
const formEditEvento = document.getElementById("formEditEvento");

// RECEBER SELETOR DO BOTÃO EDITAR EVENTO 
const msgEditEvento = document.getElementById("msgEditEvento");

// SE ACESSAR O IF QUANDO EXISTIR O SELETOR "formEditEvento" 
const btnEditEvento = document.getElementById("btnEditEvento");

//SO ACESSAR O IF QUANDO EXISTIR O SELETOR formEditEventO
if(formEditEvento){

    //aguardar o usuario clinca no editar
    formEditEvento.addEventListener("submit", async (e) => {

        //NÃO PERMITIR A ATUALIZAÇÃO DA PÁGINA 
         e.preventDefault();

        // APRESENTAR O BOTÃO O TEXTO SALVANDO 
        btnEditEvento.value = "Salvando...";

        // RECEBER OS DADOS DO FORMULARIO 
        const dadosFrom = new FormData(formEditEvento);

        //CHAMAR O ARQUIVO PHP RESPONSAVEL POR EDITAR 
        const dados = await fetch("editar_evento.php", {
            method: "POST",
            body: dadosFrom
        })

        // REALIZA A LEITURA DOS DADOS RETORNADOS DO PHP 
        const resposta = await dados.json();

        //VERIFICAR SE NÃO CONSEGUIU EDITAR 
        if(!resposta['status']){
            //erro ao editar
            msgEditEvento.innerHTML = `
            <div class="alert alert-danger" role="alert">
            ${resposta['msg']}
            </div>`;
        }else{
            //editado com sucesso
            msg.innerHTML = `
            <div class="alert alert-success" role="alert">
            ${resposta['msg']}
            </div>`;
            //limpar mensagem de erro
            msgEditEvento.innerHTML = "";

            //limpar o fromulario
            formEditEvento.reset();

            // recuperar o id do evento
            const eventoExiste = calendar.getEventById(resposta['id']);
            if(eventoExiste){
             
                eventoExiste.setProp('title', resposta['title']);
                eventoExiste.setStart(resposta['start']);
                eventoExiste.setEnd(resposta['end']);
                eventoExiste.setProp('color', resposta['color']);
                eventoExiste.setExtendedProp('obs', resposta['obs']);
            }

            //chamar a função para remover a mensagem após 3 segundos 
            removerMsg();
        }
        //APRESENTAR O BOTÃO O TEXTO PARA SALVAR 
        btnEditEvento.value = "Salvar";

        //fechar a janela modal
        verModal.hide();
      
    });

}

//----------- FIM SELETOR DO FORMULARIO EDITAR ---------------------------- //

//----------- INICIO DO SELETOR DO FORMULARIO APAGAR EVENTO  ---------------------------- //
const btnApagarEvento = document.getElementById("btnApagarEvento");

// SE EXISTIR O SELETOR "formEditEvento" 
if(btnApagarEvento){

  // aguardar o usuario clicar no botão apagar
   btnApagarEvento.addEventListener("click", async () =>{
    const confirmacao = window.confirm("Tem certeza que deseja apagar esse evento?");
    
    //se o usuario confirmar abre o if
    if(confirmacao){

      //receber o id do evento 
      var idEvento = document.getElementById("ver_id").textContent;
      
      //chamar o qrquivo php ou a rota 
      const dados = await fetch("apagar_evento.php?id=" + idEvento);

      // realizar a leitura dos dados retornados pelo php 
      const resposta = await dados.json();

      //verificar se apagou
      if(!resposta['status']){
  
        //enviar uma mensagem no html 
        msgViewEvento.innerHTML = `
        <div class="alert alert-danger" role="alert">
        ${resposta['msg']}
        </div>`;
      }else{

        //enviar uma mensagem apagado com sucesso
        msg.innerHTML = `
            <div class="alert alert-success" role="alert">
            ${resposta['msg']}
            </div>`;

        // limpar a mensagem do erro
        msgViewEvento.innerHTML = "";

        // recuperar o evento no fullcalendar 
        const eventoExisteRemover = calendar.getEventById(idEvento);

        //verificar se encontrou o envento no fullcalendar
        if(eventoExisteRemover){

            //remover evento 
            eventoExisteRemover.remove(); 
        }

        //chamar a função para remover a mensagem após 3 segundos 
        removerMsg(); 

        //fechar a janela modal 
        verModal.hide();


      }

    }

   });
}
//----------- FIM DO SELETOR DO FORMULARIO APAGAR EVENTO  ---------------------------- //

});