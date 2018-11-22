<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class planningController extends Controller
{
    public static function getMeetings()
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");
        $date = date("d-m-y H:i:s");

        $sth = $dbh->prepare("SELECT * from `meetings`");
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}
