<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Studenten Panel</title>
</head>
<body>
    <div class="studentContent">
        <div class="navigation">
            <p>U heeft <br><span class="cursive"><?php echo"insert_ammount_mails"?> mails</span></p>
            <button id="openMail" onClick="window.location='/'">Open Mail</button>
            <button id="logout" onClick="window.location='/logout'">Logout</button>
        </div>
        <div class="welcome">
            <h1>Hallo Student</h1>
        </div>
        <div class="planning">
        </div>
    </div>
</body>
</html>