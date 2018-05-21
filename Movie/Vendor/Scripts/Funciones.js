

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
        var PorcentajeVer = 20;
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
