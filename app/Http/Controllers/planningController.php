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

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && time >= '08:00:00' && time < '09:00:00' ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && time >= '09:00:00' && time < '10:00:00' ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && time >= '10:00:00' && time < '11:00:00' ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && time >= '11:00:00' && time < '12:00:00' ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * from `meetings` WHERE meetingDate = :meetingDate && time >= '12:00:00' && time < '13:00:00' ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * FROM `meetings` WHERE department = 'Sales' && meetingDate = :meetingDate ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * FROM `meetings` WHERE department = 'Manager' && meetingDate = :meetingDate ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * FROM `meetings` WHERE department = 'Development' && meetingDate = :meetingDate ORDER BY time ASC");
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

        $sth = $dbh->prepare("SELECT * FROM `meetings` WHERE department = 'Finances' && meetingDate = :meetingDate ORDER BY time ASC");
        $sth->bindParam(":meetingDate", $date);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

}
