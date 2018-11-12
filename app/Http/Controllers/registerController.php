<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function register()
    {
        session_start();
        $exists;

        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");

        $groupnumber = $_POST['groupnumber'];
        $password = bcrypt($_POST['password']);

        $sth= $dbh->prepare("SELECT groupnumber FROM `groupLogin`");
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        foreach($result as $group)
        {
            if($group['groupnumber'] == $_POST['groupnumber'])
            {
                $exists = true;
                var_dump("exists: " . $exists);
            }
        }

        if($exists)
        {
            $_SESSION['feedback'] = "Groepnummer is al geregistreed";
            return redirect("/register");
        }
        else
        {
            $sth = $dbh->prepare("INSERT INTO `groupLogin` (groupNumber, password)
            VALUES (:groupnumber, :password)");
            $sth->bindParam(':groupnumber', $groupnumber);
            $sth->bindParam(':password', $password);
            $sth->execute();
            return redirect("/home");
        }
    }
    
}
