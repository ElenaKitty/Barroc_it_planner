<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dataController extends Controller
{
    public static function truncate()
    {
        if($_POST['truncate'] == null)
        {
            $_SESSION['feedback'] = "acceptatiezin is niet ingevult";
            return redirect("/docent");
        }
        else if(ucfirst($_POST['truncate']) == "Ik wil alle data verwijderen")
        {
            $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
            $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    
            $sth = $dbh->prepare("TRUNCATE TABLE departments;");
            $sth->execute();
            $sth = $dbh->prepare("TRUNCATE TABLE grouplogin;");
            $sth->execute();
            $sth = $dbh->prepare("TRUNCATE TABLE groups;");
            $sth->execute();
            $sth = $dbh->prepare("TRUNCATE TABLE mails;");
            $sth->execute();
            $sth = $dbh->prepare("TRUNCATE TABLE meetings;");
            $sth->execute();
            $sth = $dbh->prepare("TRUNCATE TABLE members;");
            $sth->execute();
            $sth = $dbh->prepare("TRUNCATE TABLE teachers;");
            $sth->execute();
            $_SESSION['feedback']= "Alle data succesvol verwijderd";
            return redirect("/docent"); 
        }
        else
        {
            $_SESSION['feedback'] = "acceptatiezin is foutief ingevult";
            return redirect("/docent");
        }
    }
}
