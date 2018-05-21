

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
        var MaximoSegundosVer = vid.duration * (PorcentajeVer / 100);console.log("Pausa 1");
        vid.ontimeupdate = function() {
            console.log("Pausa 2");
            if(vid.currentTime > MaximoSegundosVer){
                vid.pause();
                console.log("Pausa 3");
                $("img#PagaPro").show();
                $("div#cntPelicula").empty();
            }
        }
    }
}

function ValidarCorreo(email)
{
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}