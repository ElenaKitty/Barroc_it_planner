<?php 
    include_once('header.php');
    if((!isset($_SESSION['user'])))
    {
        $_SESSION['feedback'] = "Je moet ingelogt zijn voor deze pagina.";
        header("Location: /home");
        die();
    }
    $group = $_SESSION['user'];
    $department = $_POST['department'];
    $meetingTime = $_POST['meetingTime'];
    $meetingDate = $_POST['meetingDate'];
    $time = date("Y:m:d H:i:s");
    if(isset($_POST['groupSend']))
        $groupSend = $_POST['groupSend'];
?>
<div class="mailFeedback">
    <p><?php echo $_SESSION['feedback'];?></p>
</div>
<div class=mailSend>
    <form action='/scheduling' method='post'>
            {{ csrf_field() }}
        <div class='currentMailSend'>
            <div class='mailInfoSend'>
                <p>afzender: <?php echo $group?> </p>
                <p>datum: <?php echo $time?></p>
                <p>aan: <?php echo $_POST['department']?></p>
            </div>
            <input type="submit" value="Send Mail">
        </div>
        <div class='mailContentSend'>
            <textarea name='mailSend'></textarea>
            <?php
                if($_SESSION['user'] >= 0)
                    echo "<input type='text' value='De meeting waar wij voor willen afspreken is: " . $meetingTime . " op " . $meetingDate . "' readonly>";
            ?>
            <textarea name='mailSend2' readonly><?php
                if(isset($_POST['mailSend']))
                    echo $_POST['mailSend'];
            ?>
            </textarea>
            <input type="hidden" name='meetingTime' value='<?php echo $meetingDate . " " . $meetingTime;?>'>
            <input type="hidden" name='department' value='<?php echo $department;?>'>
            <?php
            if(isset($_POST['groupSend']))
                echo "<input type='hidden' name='groupSend' value='$groupSend'>";
            ?>
        </div>
    </form>
</div>

<?php   
    include_once('footer.php');
?>