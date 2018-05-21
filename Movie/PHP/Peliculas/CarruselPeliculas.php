<?php
    
    $QueryGeneroPelicula = "SELECT IdGeneroPelicula, ".
                            "Nombre, " .
                            "Descripcion " .
                            "FROM GeneroPelicula " .
                            "WHERE EXISTS (SELECT * FROM Peliculas WHERE FKGenero = IdGeneroPelicula) " .
                            "ORDER BY Nombre ASC;";

    $TodosGeneros = getSQLResultSet($connect, $QueryGeneroPelicula);

    $html = "";

    while($Genero = mysqli_fetch_row($TodosGeneros)) {
    $html .= '<div class="row">';
    $html .= '<h1>' . $Genero[1] . '</h1>';
    $html .= '<div class="row__inner">';

    $QueryPeliculasPorGenero = 
        "SELECT IdPelicula, " .
        "Titulo, " .
        "Sinopsis, " .
        "UrlPaginaOficial, " .
        "gp.Nombre AS Genero, " .
        "gp.Descripcion AS GeneroDescripcion, " .
        "na.Nombre AS Nacionalidad, " .
        "DuracionMinutos, " .
        "Anio, " .
        "Directores, " .
        "Actores, " .
        "cl.Nombre AS Clasificacion, " .
        "cl.Descripcion AS ClasificacionDescripcion, " .
        "UrlImgPortada, " .
        "UrlPelicula " .
        "FROM peliculas AS pe " .
        "INNER JOIN generopelicula AS gp on gp.IdGeneroPelicula = pe.FKGenero " .
        "INNER JOIN nacionalidades AS na on na.IdNacionalidad = pe.FKNacionalidad " .
        "INNER JOIN clasificacionpelicula AS cl on cl.IdClasificacionPelicula = pe.FKClasificacion " .
        "WHERE gp.IdGeneroPelicula = " . $Genero[0] .
        " ORDER BY pe.Anio DESC LIMIT 20;";
    
    $PeliculasPorGenero = getSQLResultSet($connect, $QueryPeliculasPorGenero);

    while($Pelicula = mysqli_fetch_row($PeliculasPorGenero)) {
        $html .= '<div class="tile" data-href="../Peliculas/VerPelicula.php?Pelicula=' . $Pelicula[0]  . '">';
        $html .= '<div class="tile__media">';
            $html .= '<a href="../Peliculas/VerPelicula.php?Pelicula=' . $Pelicula[0]  . '" title="Ver película">';
            $html .= '<img class="tile__img" src="' . $Pelicula[13] . '" title="Ver ' . $Pelicula[13] . '" alt="Pelicula-' . $Pelicula[13] . '"/></a>';
        $html .= '</div>';
        $html .= '<div class="tile__details">';
            $html .= '<div class="tile__title">' . $Pelicula[1] . '</div>' ;
        $html .= '</div>';
        $html .= '</div>';
    }

    $html .= '</div>';
    $html .= '</div>';
    }

    print $html;
?>