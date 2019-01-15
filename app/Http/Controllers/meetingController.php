<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class meetingController extends Controller
{
    public static function addMeeting()
    {
        $department = $_POST['department'];
        $meetingTime = $_POST['meetingTime'];
        $meetingDate = $_POST['meetingDate'];
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        $sth = $dbh->prepare("INSERT INTO `meetings`(`department`, `groupNumber`, `meetingTime`, `meetingDate`) VALUES (:department, null ,:meetingTime,:meetingDate)");
        $sth->bindParam(":department", $department);
        $sth->bindParam(":meetingTime", $meetingTime);
        $sth->bindParam(":meetingDate", $meetingDate);
        $sth->execute();
        return redirect("/docent");
    }
}
