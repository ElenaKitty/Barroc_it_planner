<?php
    include_once("header.php");
    use \App\Http\Controllers\mailController;
    session_start();
    $_SESSION['user'] = "student";
?>
<title>Studenten panel</title>
<div class="studentContent">
    <div class="navigation">
        <?php
            if(count(mailController::getMails()) == 1)
            {
                echo "<p>U heeft <span class='cursive'>" . count(mailController::getMails()) . " mail</span></p>";
            }
            else
            {
                echo "<p>U heeft <span class='cursive'>" . count(mailController::getMails()) . " mails</span></p>";
            }
        ?>
        <button id="openMail" onClick="window.location='/studentMail'">Open Mail</button>
        <button id="logout" onClick="window.location='/logout'">Logout</button>
    </div>
    <div class="welcome">
        <h1>Hallo Student</h1>
    </div>
    <div class="planning">
    </div>
</div>
<?php
    include_once("footer.php");
?>