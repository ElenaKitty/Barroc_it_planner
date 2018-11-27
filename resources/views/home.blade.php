<?php 
    include_once("header.php");
    echo "<p class='feedback'>" .  $_SESSION['feedback'] . "</p>";
    $_SESSION['feedback'] = "";
    // var_dump($_SESSION['user']);
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
<?php
    include_once("footer.php");
?>