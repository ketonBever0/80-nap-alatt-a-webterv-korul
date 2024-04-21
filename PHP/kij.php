<?php
    
    setcookie('fhn', $_COOKIE['fhn'], time() - 3600,'/');
    setcookie('neptun', $_COOKIE['neptun'], time() - 3600,'/');
    setcookie('profilkep', $_COOKIE['profilkep'], time() - 3600,'/');
    setcookie('admin', $_COOKIE['admin'], time() - 3600,'/');

    echo "<script>console.log(".$_COOKIE['fhn'].")</script>";

    header("Location: ../oldalak/reg.html");
?>