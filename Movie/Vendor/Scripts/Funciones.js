

// Redirecciona a la página de la pelicula desde el tile del carrusel
$('div.tile').on('click', function(){
    var href = $(this).attr("data-href");
    if(href){
    window.location.href = href;
    }
});

// Evalua el tiempo a mostrar
function EvaluarTiempoVideo(){
    var vid = document.getElementById("idPelicula");
    if(vid){
        var PorcentajeVer = 1;
        var MaximoSegundosVer = vid.duration * (PorcentajeVer / 100);
        vid.ontimeupdate = function() {
            if(vid.currentTime > MaximoSegundosVer){
                vid.pause();
                $("img#PagaPro").show();
                $("div#cntPelicula").empty();
            }
        }
    }
}

// Evalua el tiempo a reproducir
function EvaluarTiempoCancion(idCancion){
    var aud = document.getElementById(idCancion);
    if(aud){
        var PorcentajeRepro = 10;
        var MaximoSegundosRepro = aud.duration * (PorcentajeRepro / 100);
        aud.ontimeupdate = function() {
            if(aud.currentTime > MaximoSegundosRepro){
                aud.pause();
                $("#PagaPro-" + idCancion).show();
                $("div#cnt-" + idCancion).empty();
            }
        }
    }
}

function ValidarCorreo(email)
{
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}