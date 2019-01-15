<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public static function scheduleMeeting()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $timeSend = date("Y-m-d H:i:s");
        $group = $_SESSION['user'];
        $department = $_POST['department'];
        $time = $_POST['meetingTime'];
        $meetingTime = explode(" ", $time)[1];
        $meetingDate = explode(" ", $time)[0];
        $mailSend = $_POST['mailSend'];
        $mailResponse = $_POST['mailSend2'];
        if(isset($_POST['groupSend']))
            $groupSend = $_POST['groupSend'];
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
        //zorgt ervoor dat de meeting wordt ingevult en dat hij verdwijnt uit de lijst met beschikbare meetings
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        
        //als er niets is ingevult stuur de gebruiker terug naar de planning
        if($mailSend == null || $mailSend == " ")
        {
            echo "<form action='/mailing' name='mailingForm' method='post'>";
            echo csrf_field();
            $_SESSION['feedback'] = "Je moet wel de mail schrijven";
            echo "<input type='hidden' name='meetingTime' value='$meetingTime'>";
            echo "<input type='hidden' name='meetingDate' value='$meetingDate'>";
            echo "<input type='hidden' name='department' value='$department'>";
            echo "<input type='hidden' name='mailSend' value='$mailResponse'>";
            if($mailResponse != null && isset($_POST['groupSend']))
                echo "<input type='hidden' name='groupNumber' value='$groupSend'>";
            else
                echo "<input type='hidden' name='groupNumber' value='$group'";
            echo "</form>";
            echo "<script type=\"text/javascript\"> 
                window.onload=function(){
                    document.forms['mailingForm'].submit();
                }
            </script>";
            
        }
        else if($mailSend != null && $mailResponse != null)
        {
            $sth = $dbh->prepare("UPDATE mails SET `mailResponse`= :mailSend,`timeResponse`= :timeResponse WHERE groupNumber = :groupNumber && department = :department && meetingTime = :meetingTime");
            $sth->bindParam(":mailSend", $mailSend);
            $sth->bindParam(":timeResponse", $timeSend);
            $sth->bindParam(":groupNumber", $groupSend);
            $sth->bindParam(":department", $department);
            $sth->bindParam(":meetingTime", $meetingTime);      
            $sth->execute();
            
            var_dump($mailSend);
            var_dump($timeSend);
            var_dump($groupSend);
            var_dump($department);
            var_dump($meetingTime);

            $_SESSION['feedback'] = "Reactie verstuurd";
            return redirect('/docent');
        }
        else if($department != null && $meetingTime != null && $mailSend != null)
        {
            $sth = $dbh->prepare("INSERT INTO mails (groupNumber, department, mailSend, mailResponse, meetingTime) VALUES (:groupNumber, :department, :mailSend, null, :meetingTime,)");
            $sth->bindParam(":groupNumber", $group);
            $sth->bindParam(":department", $department);
            $sth->bindParam(":mailSend", $mailSend);
            $sth->bindParam(":meetingTime", $meetingTime);
            $sth->execute();

            $sth = $dbh->prepare("UPDATE meetings SET `groupNumber` = :groupNumber WHERE department = :department && meetingTime = :meetingTime && meetingDate = :meetingDate");
            $sth->bindParam(":groupNumber", $group);
            $sth->bindParam(":department", $department);
            $sth->bindParam(":meetingTime", $time);
            $sth->bindParam(":meetingDate", $date);

            $sth->execute();

            $_SESSION['feedback'] = "Afspraak gepland";
            return redirect('/student');
        }
        else
        {
            $_SESSION['feedback'] = "Sorry er ging iets fout" ;
            return redirect('/student');
        }
    }
}
