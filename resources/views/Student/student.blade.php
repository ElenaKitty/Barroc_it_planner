<?php
    include_once("header.php");
    use \App\Http\Controllers\mailController;
    use \App\Http\Controllers\planningController;
    session_start();
    $meetings = planningController::getMeetings();
    var_dump($meetings);
?>
<script src="{{ URL::asset('js/planner.js') }}"></script>
<title>Studenten panel</title>
<div class="studentContent">
    <div class="navigation">
        <?php
            if(count(mailController::getMails()) == 1)
            {
                echo "<p>U heeft <span class='cursive'>" . count(mailController::getMails()) . " mail</span></p>";
            }
            else
            {
                echo "<p>U heeft <span class='cursive'>" . count(mailController::getMails()) . " mails</span></p>";
            }
        ?>
        <button id="openMail" onClick="window.location='/studentMail'">Open Mail</button>
        <button id="logout" onClick="window.location='/logout'">Logout</button>
    </div>
    <div class="studentPlanning">
        <div class="welcome">
            <h1>Hallo <?php echo "Groep: " . $_SESSION['user'];?></h1>
        </div>
        <div class="planning">
            <p class="eightHr">8hr</p>
            <p class="nineHr">9hr</p>
            <p class="tenHr">10hr</p>
            <p class="elevenHr">11hr</p>
            <p class="twelveHr">12hr</p>
            <?php             
             if(isset($meetings[0]))
             {
                $department = $meetings[0]['department'];
                echo "<button class='" . $department . "Button' onClick=showMeeting('$department')> $department</button>";
                $temp = explode(" ", $meetings[0]['time']);
                $time = $temp[1];
             }
             if(isset($meetings[1]))
             {
                $department = $meetings[1]['department'];
                echo "<button class='" . $department . "Button' onClick=showMeeting('$department')> $department</button>";
             }
             if(isset($meetings[2]))
             {
                $department = $meetings[2]['department'];
                echo "<button class='" . $department . "Button' onClick=showMeeting('$department')> $department</button>";
             }
             if(isset($meetings[3]))
             {
                $department = $meetings[3]['department'];
                echo "<button class='" . $department . "Button' onClick=showMeeting('$department')> $department</button>";
             }
            ?>
        </div>
    </div>
    <div class="modals">
        <div class="SalesModal" id="SalesModal">
            <div class="modalContent">
                <span class="close">&times;</span>
                <p>Sales</p>
                <p><?php echo $time?></p>
            </div>
        </div> 
        <div class="ManagerModal" id="ManagerModal">
            <div class="modalContent">
                <span class="close">&times;</span>
                <p>Manager</p>
            </div>
        </div>
        <div class="DevelopmentModal" id="DevelopmentModal">
            <div class="modalContent">
                <span class="close">&times;</span>
                <p>Development</p>
            </div>
        </div> 
        <div class="FinancesModal" id="FinancesModal">
            <div class="modalContent">
                <span class="close">&times;</span>
                <p>Financess</p>
            </div>
        </div>
    </div>

</div>
<?php
    include_once("footer.php");
?>