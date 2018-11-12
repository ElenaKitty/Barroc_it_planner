<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barroc_IT Planner</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
<?php 
    session_start();
    $_SESSION['feedback'] = "";
?>
    <div class="content">
        <div class="student">
            <h1>Student</h1>
            <ul>
                <a href="/register"><li>Register</li></a>
                <a href="/loginStudent"><li>Login</li></a>
            </ul>
        </div>
        <div class="docent">
            <h1>Docent</h1>
            <ul>
                <a href="/login"><li>Login</li></a>
            </ul>
        </div>
    </div>


</body>
</html>