<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class planningController extends Controller
{
    public static function getAllMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && groupNumber IS NULL ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getEightHrMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && groupNumber IS NULL  && meetingTime >= '08:00:00' && meetingTime < '09:00:00' ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getNineHrMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && groupNumber IS NULL  && meetingTime >= '09:00:00' && meetingTime < '10:00:00' ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getTenHrMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && groupNumber IS NULL  && meetingTime >= '10:00:00' && meetingTime < '11:00:00' ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getElevenHrMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && groupNumber IS NULL && meetingTime >= '11:00:00' && meetingTime < '12:00:00' ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getTwelveHrMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && groupNumber IS NULL  && meetingTime >= '12:00:00' && meetingTime < '13:00:00' ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getSalesMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * FROM `meetings` WHERE department = 'Sales' && groupNumber IS NULL  && meetingDate = :meetingDate ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getManagerMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * FROM `meetings` WHERE department = 'Manager' && groupNumber IS NULL  && meetingDate = :meetingDate ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getDevelopmentMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * FROM `meetings` WHERE department = 'Development' && groupNumber IS NULL  && meetingDate = :meetingDate ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function getFinancesMeetings($date)
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $sth = $dbh->prepare("SELECT * FROM `meetings` WHERE department = 'Finances' && groupNumber IS NULL  && meetingDate = :meetingDate ORDER BY meetingTime ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public static function setDate()
    {
        // var_dump($_POST);
        $_SESSION['date'] = $_POST['date'];
        return redirect('/student');
    }

}
