<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public static function scheduleMeeting()
    {
        $timeSend = date("Y-m-d");
        $group = $_SESSION['user'];
        $department = $_POST['department'];
        $meetingTime = $_POST['meetingTime'];
        $temp = explode(" ", $meetingTime);
        $date = $temp[0];
        $time = $temp[1];
        $mailSend = $_POST['mailSend'] . " " . $_POST['mailSend2'];

        //zorgt ervoor dat de meeting wordt ingevult en dat hij verdwijnt uit de lijst met beschikbare meetings
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        
        //als er niets is ingevult stuur de gebruiker terug naar de planning
        if($mailSend == null || $mailSend == " ")
        {
            $_SESSION['feedback'] = "Je moet wel de mail schrijven";
            return redirect('/student');
        }
        else if($department != null && $meetingTime != null && $mailSend != null)
        {
            $sth = $dbh->prepare("INSERT INTO mails (groupNumber, department, mailSend, mailResponse, meetingTime, timeSend, timeResponse) VALUES (:groupNumber, :department, :mailSend, null,  :meetingTime, :timeSend, null)");
            $sth->bindParam(":groupNumber", $group);
            $sth->bindParam(":department", $department);
            $sth->bindParam(":mailSend", $mailSend);
            $sth->bindParam(":meetingTime", $meetingTime);
            $sth->bindParam(":timeSend", $timeSend);
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
