<title>BarrocMail Studenten</title>
<?php
    include_once('header.php');
    use \App\Http\Controllers\mailController;
    session_start();
    $_SESSION['user'] = "student";
?>
<script>
function toggleDisplay($department, $department1)
{
    var x = document.getElementById($department);
    var y = document.getElementById($department1);
    console.log(y);
    console.log(x);
    if (x.style.display == "none" && y.style.display == "none")
    {
        x.style.display = "block";
        y.style.display = "block";
    }
    else 
    {
        x.style.display = "none";
        y.style.display = "none";
    }
}
</script>

<div class="mailPanel">
    <div class="mails">
        <?php 
            $mails = mailController::getMails();
            foreach($mails as $mail)
            {
                $department = $mail['department'];
                $department1 = $mail['department'] . "1";
                echo "<button onClick='toggleDisplay(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
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