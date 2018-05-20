<?php
  SESSION_START();
    $_SESSION['IdUsuario'] = $_POST['IdUsuario'];
    $_SESSION['Usuario'] = $_POST['Usuario'];
    $_SESSION['CorreoElectronico'] = $_POST['CorreoElectronico'];
    $_SESSION['Nombres'] = $_POST['Nombres'];
    $_SESSION['Apellidos'] = $_POST['Apellidos'];
    $_SESSION['Cuenta'] = $_POST['Cuenta'];
?>
