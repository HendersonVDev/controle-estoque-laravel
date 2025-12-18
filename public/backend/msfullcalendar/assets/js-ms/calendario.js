import { converterData } from './util/conversores.js';
import { cadastrarModal, verModal } from './ui/modais.js';

export function initCalendar() {
    const calendarEl = document.getElementById('calendar');

    return new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap5',
        locale: 'pt-br',
        // ... (toda a config de tradução)
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        navLinks: true,
        selectable: true,
        selectMirror: true,
        editable: true,
        dayMaxEvents: true,
        events: 'listar.php',
        eventClick(info) {
            // preenche campos da modal
            // usa converterData
            // mostra verModal
        },
        select(info) {
            document.getElementById("cad_start").value = converterData(info.start);
            document.getElementById("cad_end").value = converterData(info.start);
            cadastrarModal.show();
        }
    });
}
