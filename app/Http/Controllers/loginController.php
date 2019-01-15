<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login()
    {
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
        if($result == null)
        {
            $_SESSION['feedback'] = "Groep nog niet geregistreerd";
            return redirect('loginStudent');
        }
        else if($_POST['password'] == $result[0]['password'])
        {
            $_SESSION['feedback'] = "";
            $_SESSION['user'] = $groupnumber;
            return redirect('/student');
        }
        else
        {
            $_SESSION['feedback'] = "incorrect wachtwoord";
            return redirect('/loginStudent');
        }
    }
}
