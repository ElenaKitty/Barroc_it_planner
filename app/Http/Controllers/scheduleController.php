<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public static function scheduleMeeting()
    {
        $timeSend = date("Y-m-d");
        include_once('header.php');
        var_dump($_POST);
        $group = $_SESSION['user'];
        $department = $_POST['department'];
        $meetingTime = $_POST['meetingTime'];
        $mailSend = $_POST['mailSend'] . $_POST['mailSend2'];
        //zorgt ervoor dat de meeting wordt ingevult en dat hij verdwijnt uit de lijst met beschikbare meetings
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        
        if($mailSend == null)
        {
            $_SESSION['feedback'] = "Je moet wel de mail schrijven";
            return redirect('/mailing');
        }
        else if($department != null && $meetingTime != null && $mailSend != null)
        {
            $sth = $dbh->prepare("INSERT INTO mails (groupNumber, department, mailSend, mailResponse, meetingTime, timeSend, timeResponse) VALUES (:groupNumber, :department, :mailSend, null,  :meetingTime, :timeSend, null)");
            $sth->bindParam(":groupNumber", $group);
            $sth->bindParam(":department", $department);
            $sth->bindParam(":mailSend", $mailSend);
            $sth->bindParam(":meetingTime", $meetingTime);
            $sth->bindParam(":timeSend", $timeSend);
            var_dump($sth->execute());

            $_SESSION['feedback'] = "Afspraak gepland";
            // return redirect('/student');
        }
        else
        {
            $_SESSION['feedback'] = "Sorry er ging iets fout" ;
            // return redirect('/student');
        }
        echo $_SESSION['feedback'];
        echo $department;
        echo $meetingTime;
        echo $mailSend;
        include_once('footer.php'); 
    }
}
