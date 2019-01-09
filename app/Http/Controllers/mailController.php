<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mailController extends Controller
{
    function sendMail()
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("INSERT INTO `mails` (groupNumber, department, mailSend, mailResponse, timeSend, timeResponse)
                            VALUES(:groupNumber, :department, :mailSend, null, :timeSend, null)");
        $sth->bindParam(":groupNumber", $groupnumber);
        $sth->bindParam(":department", $department);
        $sth->bindParam(":mailSend", $mailSend);
        $sth->bindParam("timeSend", date("d-m-y H:i:s"));
        $sth->execute();
    }

    function respondMail()
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("UPDATE `mails` SET `mailResponse` = :mailResponse, `timeResponse` = :timeResponse");
        $sth->bindParam(":mailresponse", $mailResponse);
        $sth->bindParam(":timeResposne", date("d-m-y H:i:s"));
        $sth->execute();
    }
    public static function getMail($groupNumber, $department)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        if($_SESSION['user'] == "student")
        {
            $sth = $dbh->prepare("SELECT * from `mails` where groupNumber == :groupNumber && department == :department");
            $sth->bindParam(":groupNumber", $groupNumber);
            $sth->bindParam(":department", $department);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        if($_SESSION['user'] == "docent")
        {
            $sth = $dbh->prepare("SELECT * from `mails` where mailResponse == null && department == :department");
            $sth->bindParam(":department", $department);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public static function getMails()
    {
        if(isset($_SESSION['user']))
        {
            $groupNumber = $_SESSION['user'];
            $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
            $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

            if($_SESSION['user'] >= 1)
            {
                $sth = $dbh->prepare("SELECT * from `mails` where mailResponse IS NOT null && groupNumber = :groupNumber");
                $sth->bindParam(":groupNumber", $groupNumber);
                $sth->execute();
                $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            }
            if($_SESSION['user'] == "docent")
            {
                $sth = $dbh->prepare("SELECT * from `mails` where mailResponse IS null && department = :department");
                $sth->bindParam(":department", $department);
                $sth->execute();
                $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            }
        }
    }
}
