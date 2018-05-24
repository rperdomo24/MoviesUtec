<?php

    $_EsPaga = $_SESSION['Cuenta'];
    $html = "";

    $QueryGeneroCanciones = "";
    if($_EsPaga > 0){
    $QueryGeneroCanciones = "SELECT IdGeneroCancion, ".
                            "Nombre, " .
                            "Descripcion " .
                            "FROM GeneroCanciones " .
                            "WHERE EXISTS (SELECT * FROM Canciones WHERE FKGenero = IdGeneroCancion) " .
                            "ORDER BY Nombre ASC;";
    }else{
    $QueryGeneroCanciones = "SELECT IdGeneroCancion, ".
                            "Nombre, " .
                            "Descripcion " .
                            "FROM GeneroCanciones " .
                            "WHERE EXISTS (SELECT * FROM Canciones WHERE FKGenero = IdGeneroCancion AND UrlCancionPrueba IS NOT NULL) " .
                            "ORDER BY Nombre ASC;";
    }

    $TodosGeneros = getRawSQLResultSet($connect, $QueryGeneroCanciones);

    while($Genero = mysqli_fetch_row($TodosGeneros)) {
    $html .= '<div class="row">';
    $html .= '<h1>' . $Genero[1] . '</h1>';
    $html .= '<div class="row__inner">';
    $QueryCancionesPorGenero = "";

    if($_EsPaga > 0){
            $QueryCancionesPorGenero = 
            "SELECT " .
            "FKGenero, " .
            "gc.Nombre, " .
            "Cantautores, " .
            "UrlImgPortada " .
            "FROM Canciones AS ca " .
            "INNER JOIN GeneroCanciones AS gc ON gc.IdGeneroCancion = ca.FKGenero " .
            "WHERE FKGenero = " . $Genero[0] .
            " GROUP BY FKGenero, gc.Nombre, Cantautores, UrlImgPortada " .
            "ORDER BY Cantautores DESC LIMIT 20;";
    } else {
        $QueryCancionesPorGenero = 
            "SELECT " .
            "FKGenero, " .
            "gc.Nombre, " .
            "Cantautores, " .
            "UrlImgPortada " .
            "FROM Canciones AS ca " .
            "INNER JOIN GeneroCanciones AS gc ON gc.IdGeneroCancion = ca.FKGenero AND ca.UrlCancionPrueba IS NOT NULL " .
            "WHERE FKGenero = " . $Genero[0] .
            " GROUP BY FKGenero, gc.Nombre, Cantautores, UrlImgPortada " .
            "ORDER BY Cantautores DESC LIMIT 20;";
    }
    
    $CancionesPorGenero = getRawSQLResultSet($connect, $QueryCancionesPorGenero);

    while($Musica = mysqli_fetch_row($CancionesPorGenero)) {
        $html .= '<div class="tile" data-href="../Musica/ReproducirMusica.php?Cantante=' . $Musica[2]  . '">';
        $html .= '<div class="tile__media">';
            $html .= '<a href="../Musica/ReproducirMusica.php?Cantante=' . $Musica[2]  . '" title="Reproducir canción">';
            $html .= '<img class="tile__img" src="' . $Musica[3] . '" title="Reproducir ' . $Musica[2] . '" alt="Cancion-' . $Musica[2] . '"/></a>';
        $html .= '</div>';
        $html .= '<div class="tile__details">';
            $html .= '<div class="tile__title">' . $Musica[2] . '</div>' ;
        $html .= '</div>';
        $html .= '</div>';
    }

    $html .= '</div>';
    $html .= '</div>';
    }

    print $html;
?>
<script src="..\..\Vendor\bootstrap-3.3.7\js\bootstrap.min.js"></script>