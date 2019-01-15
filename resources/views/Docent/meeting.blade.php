<?php
    include_once('header.php');
    if((!isset($_SESSION['user'])))
    {
        $_SESSION['feedback'] = "Je moet ingelogt zijn voor deze pagina.";
        header("Location: /home");
        die();
    }
    else if($_SESSION['user'] != "docent")
    {
        $_SESSION['feedback'] = "Studenten mogen niet op deze pagina";
        header("Location: /student");
        die();
    }
?>
<div class="addMeeting">
    <form action='/addMeeting' class='form' method='post'>
    {{ csrf_field() }}
        <div class="information">
            <div class="labels">
                <label for="date">Datum</label>
                <label for="time">Tijd</label>
                <label for="departmetn">Afdeling</label>
            </div>
            <div class="fields">
                <input type="date" name='meetingDate'>
                <input type="time" name='meetingTime'>
                <input type="text" name='department'>
            </div>
        </div>
        <input type="submit" id='addMeeting' value='Plan Meeting'>
    </form>
</div>

<?php
    include_once('footer.php');
?>