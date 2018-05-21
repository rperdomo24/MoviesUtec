$(function(){

    // Redirecciona a la página de la pelicula desde el tile del carrusel
    $('div.tile').on('click', function(){
        var href = $(this).attr("data-href");
        if(href){
        window.location.href = href;
        }
    });
    
});