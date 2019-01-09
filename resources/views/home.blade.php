<?php 
    include_once("header.php");
    if(isset($_SESSION['feedback']))
        echo "<p class='feedback'>" .  $_SESSION['feedback'] . "</p>";
    $_SESSION['feedback'] = "";
    $_SESSIOn['date'] = null;
?>
    <div class="content">
        <div class="student">
            <h1>Student</h1>
            <ul>
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