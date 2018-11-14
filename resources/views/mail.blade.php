<title>BarrocMail Studenten</title>
<?php
    include_once('header.php');
    use \App\Http\Controllers\mailController;
    session_start();
    $_SESSION['user'] = "student";
?>
<script src="{{ URL::asset('js/mail.js') }}"></script>
<div class="mailPanel">
    <div class="mails">
        <?php 
            $mails = mailController::getMails();
            foreach($mails as $mail)
            {
                $department = $mail['department'];
                $department1 = $mail['department'] . "1";
                if($department == "Finances")
                    echo "<button onClick='toggleFinances(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
                if($department == "Sales")
                    echo "<button onClick='toggleSales(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
                if($department == "Development")
                    echo "<button onClick='toggleDevelopment(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
                if($department == "Manager")
                    echo "<button onClick='toggleManager(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
            }
        ?>
    </div>
    <div class="currentMail">
        <div class="mailInfo">
            <?php 
                foreach($mails as $mail)
                {
                    echo "<div id='" . $mail['department'] . "'>\r\n";
                        echo "<p>afzender: " .  $mail['department'] . "</p>";
                        echo "<p>datum: " . $mail['timeResponse'] . "</p>";
                        echo "<p>aan: " . $mail['groupNumber'] . "</p>";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="mailContent">
            <?php
                foreach($mails as $mail)
                {
                    echo "<div id='" . $mail['department'] . "1'>\r\n";
                        echo "<p>" . $mail['mailResponse'] . "</p>";
                    echo "</div>";
                } 
            ?>
        </div>
    </div>
</div>          
<button id="back" onClick="window.location='/student'">Back</button>
<?php
    include_once('footer.php');
?>