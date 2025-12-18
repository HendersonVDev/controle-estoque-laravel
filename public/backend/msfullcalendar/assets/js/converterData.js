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