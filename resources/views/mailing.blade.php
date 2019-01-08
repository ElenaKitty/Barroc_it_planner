<?php 
    include_once('header.php');
    $group = $_SESSION['user'];
    $department = $_POST['department'];
    $meetingTime = $_POST['meetingTime'];
    $meetingDate = $_POST['meetingDate'];
?>
        <div class=mailSend>
            <form action='/scheduling' method='post'>
                 {{ csrf_field() }}
                <div class='currentMailSend'>
                    <div class='mailInfoSend'>
                        <p>afzender: Groep <?php echo $group?> </p>
                        <p>datum: <?php echo $_POST['meetingDate']?></p>
                        <p>aan: <?php echo $_POST['department']?></p>
                    </div>
                    <input type="submit" value="Send Mail">
                </div>
                <div class='mailContentSend'>
                    <textarea name='mailSend'></textarea>
                    <input type='text' value='<?php echo "De meeting waar wij voor willen afspreken is: " . $meetingTime;?> op <?php echo $meetingDate;?>' readonly>
                    <textarea name='mailSend2'></textarea>
                    <input type="hidden" name='meetingTime' value='<?php echo $meetingDate . " " . $meetingTime;?>'>
                     <input type="hidden" name='department' value='<?php echo $department;?>'>
                </div>
            </form>
        </div>

<?php
    include_once('footer.php');
?>