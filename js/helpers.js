function verificaData(elemento) {
    var valor = elemento.val();
    if (valor != '' || null) {
        arrData = valor.split('/');
        if (arrData.length == 1) {
            M.toast({html: "Data Invalida!", classes: 'rounded'});
            elemento.focus();
            return false;
        }
        switch (arrData[1]) {
            case '01':
                if (parseInt(arrData[0]) > 31) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            case '02':
                if (parseInt(arrData[0]) > 29 && parseInt(arrData[2]) % 4 == 0) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;

                } else if (parseInt(arrData[0]) > 28 && parseInt(arrData[2]) % 4 != 0) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            case '03' || '05' || '07' || '08' || '01':
                if (parseInt(arrData[0]) > 31) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            case '10':
                if (parseInt(arrData[0]) > 31) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            case '12':
                if (parseInt(arrData[0]) > 31) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
                break;
            default :
                if (parseInt(arrData[0]) > 30) {
                    M.toast({html: "Data Invalida!", classes: 'rounded'});
                    elemento.focus();
                    return false;
                }
        }
    }
    return true;
}

var classeAntiga = " ";
var timeout
var init = 0;

function pulse(elemento, timeMS) {
    if (init == 1) {
        elemento.attr("class", classeAntiga);
        clearTimeout(timeout);
    }
    classeAntiga = elemento.attr("class");
    elemento.attr("class", elemento.attr("class") + " pulse-button");
    init = 1;
    timeout = setTimeout(function () {
        init = 0;
        elemento.attr("class", classeAntiga);
    }, timeMS);
}
