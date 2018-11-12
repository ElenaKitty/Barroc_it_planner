<?php 
    include_once("header.php");
?>
<title>Registreer groep</title>
<div class="register">
    <form action="/registering" method="post">
        {{ csrf_field() }}
        <?php 
            session_start();
            if(isset($_SESSION['feedback']))
                echo "<h1 class='feedback'>" . $_SESSION['feedback'] . "</h1>";
        ?>
        <div class="fields">
            <div class="labels">
                <label for="groupnumber">Groepsnummer</label>    
                <label for="password">Wachtwoord</label>  
            </div>
            <div class="inputs">
                <input type="text" name="groupnumber" id="groupnumber" placeholder="Vul je groepsnummer in">
                <input type="password" name="password" id="password" placeholder="Vul je wachtwoord in">
            </div>
        </div>
        <input type="submit" id="register" value="bevestigen">  
    </form>
    <button id="back" onClick="window.location='/home'">Back</button>
</div>
<?php
    include_once("footer.php");
?>