<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barroc_IT Planner</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <span>Barroc_IT</span> planner
    </header>
    <?php 
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    if(strpos($url, "Mail") !== false)
        echo "<div class='mailContainer'>";
    else
        echo "<div class='container'>";
