<?php
    include_once("header.php");
    var_dump($_SESSION['user']);
    if((!isset($_SESSION['user'])))
    {
        $_SESSION['feedback'] = "Je moet ingelogt zijn voor de docentenPanel pagina.";
        header("Location: /home");
        die();
    }
?>
<title>Docent Panel</title>
<p>Docenten panel</p>
    
<button id="logout" onClick="window.location='/amoclient/logout'">Logout</button>
<?php
    include_once("footer.php");
?>