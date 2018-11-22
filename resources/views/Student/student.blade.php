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
            foreach($meetings as $meeting)
            {
                if(isset($meeting))
                {
                   $department = $meeting['department'];
                   echo "<button class='" . $department . "Button' onClick=showMeeting('$department')> $department</button>";
                   $temp = explode(" ", $meeting['time']);
                   if($meeting['department'] == "Sales" || $meeting['department'] == "sales")
                       $salesTime = $temp[1];
                   else if($meeting['department'] == "Manager" || $meeting['department'] == "manager")
                       $managerTime = $temp[1];
                   else if($meeting['department'] == "Development" || $meeting['department'] == "development")
                       $developmentTime = $temp[1];
                   else if($meeting['department'] == "Finances" || $meeting['department'] == "finances")
                       $financesTime = $temp[1];
                }
            }        
            ?>
        </div>
    </div>
    <div class="modals">
        <?php
        foreach($meetings as $meeting)
        {
            if(isset($meeting))
            {
                $department = $meeting['department'];
                $temp = explode(" ", $meeting['time']);
                if($meeting['department'] == "Sales" || $meeting['department'] == "sales")
                {
                    echo "<div class='SalesModal' id='SalesModal'>";
                        echo "<div class='modalContent'>";
                            echo "<span id='salesClose'>&times;</span>";
                            echo "<p>Sales</p>";
                            if(isset($salesTime)) echo "<p>" . $salesTime . "</p>";
                        echo "</div>";
                    echo "</div>";
                }
                else if($meeting['department'] == "Manager" || $meeting['department'] == "manager")
                {
                    echo "<div class='ManagerModal' id='ManagerModal'>";
                        echo "<div class='modalContent'>";
                            echo "<span id='managerClose'>&times;</span>";
                            echo "<p>Manager</p>";
                            if(isset($managerTime)) echo "<p>" . $managerTime . "</p>";
                        echo "</div>";
                    echo "</div>";
                }
                else if($meeting['department'] == "Development" || $meeting['department'] == "development")
                {
                    echo "<div class='DevelopmentModal' id='DevelopmentModal'>";
                        echo "<div class='modalContent'>";
                            echo "<span id='developmentClose'>&times;</span>";
                            echo "<p>Development</p>";
                            if(isset($developmentTime)) echo "<p>" . $developmentTime . "</p>";
                        echo "</div>";
                    echo "</div>";
                }
                else if($meeting['department'] == "Finances" || $meeting['department'] == "finances")
                {
                    echo "<div class='FinancesModal' id='FinancesModal'>";
                        echo "<div class='modalContent'>";
                            echo "<span id='financesClose'>&times;</span>";
                            echo "<p>Finances</p>";
                            if(isset($financesTime)) echo "<p>" . $financesTime . "</p>";
                        echo "</div>";
                    echo "</div>";
                }
            }
        }
        ?>
    </div>

</div>
<?php
    include_once("footer.php");
?>