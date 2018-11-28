<?php
    include_once("header.php");
    use \App\Http\Controllers\mailController;
    use \App\Http\Controllers\planningController;
    $meetings = planningController::getMeetings();
    // var_dump($meetings);
    if((!isset($_SESSION['user'])))
    {
        $_SESSION['feedback'] = "Je moet ingelogt zijn voor de studentenPanel pagina.";
        header("Location: /home");
        die();
    }
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
                    $dateTime = $meeting['time'];
                    $temp = explode(" ", $meeting['time']);
                    $time = $temp[1];
                    for($i = 8; $i<=12;$i++)
                    {
                        $endLimit = $i+1;
                        //stel het beginuur in.
                        if($i>=10)
                            $meetingTime = $i . ":00:00";
                        else
                            $meetingTime = "0 " . $i . ":00:00";
                        //stel het einduur in.
                        if($i>=9)
                            $meetingTime1 = $endLimit . ":00:00";
                        else
                            $meetingTime1 = "0" . $endLimit . ":00:00";
                        //Check bij welke tijdzone de meeting hoort.
                        if($time >= $meetingTime && $time <= $meetingTime1)
                        {
                                //als de meeting tussen 8 en 9 uur valt.
                                if($i == 8)
                                {
                                    echo "<button class='eightHrButton' onClick=showMeeting('$department')> $department</button>";
                                    $salesTime8Hr = $time;
                                    break;
                                }
                                //als de meeting tussen 9 en 10 uur valt.
                                else if($i == 9)
                                {
                                    echo "<button class='nineHrButton' onClick=showMeeting('$department')> $department</button>";
                                    $salesTime9Hr = $time;
                                    break;
                                }
                                //als de meeting tussen 10 en 11 uur valt.
                                else if($i == 10)
                                {
                                    echo "<button class='tenHrButton' onClick=showMeeting('$department')> $department</button>";
                                    $salesTime10Hr = $time;
                                    break;
                                }
                                //als de meeting tussen 11 en 12 uur valt.
                                else if($i == 11)
                                {
                                    echo "<button class='elevenHrButton' onClick=showMeeting('$department')> $department</button>";
                                    $salesTime11Hr = $time;
                                    break;
                                }
                                //als de meeting tussen 12 en 13 uur valt.
                                else if($i == 12)
                                {
                                    echo "<button class='twelveHrButton' onClick=showMeeting('$department')> $department</button>";
                                    $salesTime12Hr = $time;
                                    break;
                                }
                            }
                    }
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
                            if(isset($salesTime8Hr)) echo "<p>" . $salesTime8Hr . "</p>";
                            else if(isset($salesTime9Hr)) echo "<p>" . $salesTime9Hr . "</p>";
                            else if(isset($salesTime10Hr)) echo "<p>" . $salesTime10Hr . "</p>";
                            else if(isset($salesTime11Hr)) echo "<p>" . $salesTime11Hr . "</p>";
                            else if(isset($salesTime12Hr)) echo "<p>" . $salesTime12Hr . "</p>";
                            echo "<button>Schedule meeting</button>";
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
                            echo "<button>Schedule meeting</button>";
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
                            echo "<button>Schedule meeting</button>";
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
                            echo "<button>Schedule meeting</button>";
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