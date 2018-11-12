<title>BarrocMail Studenten</title>
<?php
    include_once('header.php');
    use \App\Http\Controllers\mailController;
    session_start();
    $_SESSION['user'] = "student";
?>
<div class="mailPanel">
    <div class="mails">
        <?php 
            $mails = mailController::getMails();
            foreach($mails as $mail)
            {
                echo "<button> " . $mail['department'] . "</button>";
            }
        ?>
    </div>
    <div class="currentMail">
        <div class="mailInfo">
            <p>afzender: <?php $mail['department'];?></p>
            <p>datum: <?php $mail['timeResponse'];?></p>
            <p>aan: <?php $mail['groupNumber']; ?></p>
        </div>
        <div class="mailContent">
            <p></p>
        </div>
    </div>
</div>          
<button id="back" onClick="window.location='/student'">Back</button>
<?php
    include_once('footer.php');
?>