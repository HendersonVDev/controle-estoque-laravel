import { initCalendar } from './calendario.js';
import { initCadastro } from './eventos/cadastro.js';
import { configurarVisualizacaoEvento } from './eventos/visualizacao.js';
// import outras funções

document.addEventListener('DOMContentLoaded', function () {
    const calendar = initCalendar();
    calendar.render();

    initCadastro(calendar);
    configurarVisualizacaoEvento();
    // outras inicializações
});
