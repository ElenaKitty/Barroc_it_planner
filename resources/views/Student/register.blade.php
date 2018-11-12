<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Registreer groep</title>
</head>
<body>
    <?php
        // $groupnumber;

        // $dbh = new \PDO('mysql:host=localhost;dbname=planner_barroc', 'root', '');
        // $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // $dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        // $sth = $dbh->prepare("SELECT groupnumber FROM groups GROUP BY groupnumber DESC HAVING MAX(created_at)");
        // if($sth->execute())
        // {
        //     $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        //     if($result == null)
        //     {
        //         $groupnumber = 1;
        //     }
        //     else
        //     {
        //         $groupnumber = $result[0]["groupnumber"] + 1;
        //     }
        // }
        // else
        // {
        //     $groupnumber = "NULL";
        // }

    ?>
    <div class="register">
        <form action="/registering" method="post">
            {{ csrf_field() }}
            <?php 
                session_start();
                if(isset($_SESSION['feedback']))
                    echo "<h1 class='feedback'>" . $_SESSION['feedback'] . "</h1>";
            ?>
            <div class="fields">
                <div class="labels">
                    <label for="groupnumber">Groepsnummer</label>    
                    <label for="password">Wachtwoord</label>  
                </div>
                <div class="inputs">
                    <input type="text" name="groupnumber" id="groupnumber" placeholder="Vul je groepsnummer in">
                    <input type="password" name="password" id="password" placeholder="Vul je wachtwoord in">
                </div>
            </div>
            <input type="submit" id="register" value="bevestigen">  
        </form>
        <button id="back" onClick="window.location='/home'">Back</button>
    </div>
</body>
</html>