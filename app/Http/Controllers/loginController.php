<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login()
    {
        session_start();
        $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        date_default_timezone_set("Europe/Amsterdam");
       
        $groupnumber = $_POST['groupnumber'];
        $password = ($_POST['password']);

        $sth = $dbh->prepare("SELECT * FROM `groupLogin` WHERE groupNumber = :groupnumber");
        $sth->bindParam(':groupnumber', $groupnumber);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        if(password_verify($_POST['password'], $result[0]['password']))
        {
            $_SESSION['feedback'] = "";
            return redirect('/student');
        }
        else{
            echo"test";
            $_SESSION['feedback'] = "incorrect password";
            return redirect('/loginStudent');
        }
        //var_dump($sth->fetchAll(\PDO::FETCH_ASSOC));
    }
}
