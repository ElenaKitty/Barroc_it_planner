<?php
    include_once("header.php");
    use \App\Http\Controllers\mailController;
    use \App\Http\Controllers\planningController;
    $meetings = planningController::getAllMeetings();
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
        <div class="modals">
        <?php
        $salesMeetings = planningController::getSalesMeetings();
        $managerMeetings = planningController::getManagerMeetings();
        $developmentMeetings = planningController::getDevelopmentMeetings();
        $financesMeetings = planningController::getFinancesMeetings();

        $sales = 0;
        $manager = 0;
        $development = 0;
        $finances = 0;
        foreach($salesMeetings as $meeting)
        {
            $time = explode(" ", $meeting['time']);
            $salesModalName = "SalesModal" . $sales;
            echo "<div class='SalesModal" . $sales . "' id='SalesModal" . $sales. "'>";
                echo "<div class='modalContent'>";
                    echo "<span id='salesClose" . $sales . "'>&times;</span>";
                    echo "<p>Sales</p>";
                    echo "<p>" . $time[1] . "</p>";
                    echo "<button>Schedule meeting</button>";
                echo "</div>";
            echo "</div>";
            array_push($meeting, $sales);
            $salesMeetings[$sales] = $meeting;
            $sales++;
        }
        foreach($managerMeetings as $meeting)
        {  
            $time = explode(" ", $meeting['time']);
            echo "<div class='ManagerModal" . $manager . "' id='ManagerModal" . $manager . "'>";
                echo "<div class='modalContent'>";
                    echo "<span id='managerClose" . $manager . "'>&times;</span>";
                    echo "<p>Manager</p>";
                    echo "<p>" . $time[1] . "</p>";
                    echo "<button>Schedule meeting</button>";
                echo "</div>";
            echo "</div>";
            array_push($meeting, $manager);
            $managerMeetings[$manager] = $meeting;
            $manager++;
        }
        foreach($developmentMeetings as $meeting)
        {  
            $time = explode(" ", $meeting['time']);
            echo "<div class='DevelopmentModal" . $development . "' id='DevelopmentModal" .$development . "'>";
                echo "<div class='modalContent'>";
                    echo "<span id='developmentClose" . $development . "'>&times;</span>";
                    echo "<p>Development</p>";
                    echo "<p>" . $time[1] . "</p>";
                    echo "<button>Schedule meeting</button>";
                echo "</div>";
            echo "</div>";
            array_push($meeting, $development);
            $developmentMeetings[$development] = $meeting;
            $development++;
        }
        foreach($financesMeetings as $meeting)
        {  
            $time = explode(" ", $meeting['time']);
            echo "<div class='FinancesModal" . $finances . "' id='FinancesModal" . $finances . "'>";
                echo "<div class='modalContent'>";
                    echo "<span id='financesClose" . $finances . "'>&times;</span>";
                    echo "<p>Finances</p>";
                    echo "<p>" . $time[1] . "</p>";
                    echo "<button>Schedule meeting</button>";
                echo "</div>";
            echo "</div>";
            array_push($meeting, $finances);
            $financesMeetings[$finances] = $meeting;
            $finances++;
        }
        ?>
    </div>
        <div class="planning">
            <p class="eightHr">8hr</p>
            <p class="nineHr">9hr</p>
            <p class="tenHr">10hr</p>
            <p class="elevenHr">11hr</p>
            <p class="twelveHr">12hr</p>
            <?php
            // var_dump($meetings);
            foreach($meetings as $meeting)
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
                        $endMeetingTime = $endLimit . ":00:00";
                    else
                        $endMeetingTime = "0" . $endLimit . ":00:00";
                    //Check bij welke tijdzone de meeting hoort.
                    if($time >= $meetingTime && $time <= $endMeetingTime)
                    {
                        //als de meeting tussen 8 en 9 uur valt.
                        if($i == 8)
                        {
                            if($department == "Sales")
                            {
                                if(isset($salesMeetings[0]))
                                {
                                    echo "<button class='eightHrButton' onClick=showMeeting('" . $department . "','" . $salesMeetings[0]['0'] . "')> $department</button>";
                                    break;
                                }
                            }
                            else if($department == "Manager")
                            {
                                if(isset($managerMeetings[0]))
                                {
                                    echo "<button class='eightHrButton' onClick=showMeeting('" . $department . "','" . $managerMeetings[0]['0'] . "')> $department</button>";
                                    break;
                                }
                            }
                            else if($department == "Development")
                            {
                                if(isset($developmentMeetings[0]))
                                {
                                    echo "<button class='eightHrButton' onClick=showMeeting('" . $department . "','" . $developmentMeetings[0]['0'] . "')> $department</button>";
                                    break;
                                }
                            }
                            else if($department == "Finances")
                            {
                                if(isset($financesMeetings[0]))
                                {
                                    echo "<button class='eightHrButton' onClick=showMeeting('" . $department . "','" . $financesMeetings[0]['0'] . "')> $department</button>";
                                    break;
                                }
                            }

                        }
                        //als de meeting tussen 9 en 10 uur valt.
                        else if($i == 9)
                        {
                            if($department == "Sales")
                            {
                                for($j = 1; $j>= 0;$j--)
                                {
                                    if(isset($salesMeetings[$j]))
                                    {
                                        echo "<button class='nineHrButton' onClick=showMeeting('" . $department . "','" . $salesMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Manager")
                            {
                                for($j = 1; $j>= 0;$j--)
                                {
                                    if(isset($managerMeetings[$j]))
                                    {
                                        echo "<button class='nineHrButton' onClick=showMeeting('" . $department . "','" . $managerMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Development")
                            {
                                for($j = 1; $j>= 0;$j--)
                                {
                                    if(isset($developmentMeetings[$j]))
                                    {
                                        echo "<button class='nineHrButton' onClick=showMeeting('" . $department . "','" . $developmentMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Finances")
                            {
                                for($j = 1; $j>= 0;$j--)
                                {
                                    if(isset($financesMeetings[$j]))
                                    {
                                        echo "<button class='nineHrButton' onClick=showMeeting('" . $department . "','" . $financesMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                        }
                        //als de meeting tussen 10 en 11 uur valt.
                        else if($i == 10)
                        {
                            if($department == "Sales")
                            {
                                for($j = 2; $j>= 0;$j--)
                                {
                                    if(isset($salesMeetings[$j]))
                                    {
                                        echo "<button class='tenHrButton' onClick=showMeeting('" . $department . "','" . $salesMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Manager")
                            {
                                for($j = 2; $j>= 0;$j--)
                                {
                                    if(isset($managerMeetings[$j]))
                                    {
                                        echo "<button class='tenHrButton' onClick=showMeeting('" . $department . "','" . $managerMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Development")
                            {
                                for($j = 2; $j>= 0;$j--)
                                {
                                    if(isset($developmentMeetings[$j]))
                                    {
                                        echo "<button class='tenHrButton' onClick=showMeeting('" . $department . "','" . $developmentMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Finances")
                            {
                                for($j = 2; $j>= 0;$j--)
                                {
                                    if(isset($financesMeetings[$j]))
                                    {
                                        echo "<button class='tenHrButton' onClick=showMeeting('" . $department . "','" . $financesMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                        }
                        //als de meeting tussen 11 en 12 uur valt.
                        else if($i == 11)
                        {
                            if($department == "Sales")
                            {
                                for($j = 3; $j>= 0;$j--)
                                {
                                    if(isset($salesMeetings[$j]))
                                    {
                                        echo "<button class='elevenHrButton' onClick=showMeeting('" . $department . "','" . $salesMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Manager")
                            {
                                for($j = 3; $j>= 0;$j--)
                                {
                                    if(isset($managerMeetings[$j]))
                                    {
                                        echo "<button class='elevenHrButton' onClick=showMeeting('" . $department . "','" . $managerMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Development")
                            {
                                for($j = 3; $j>= 0;$j--)
                                {
                                    if(isset($developmentMeetings[$j]))
                                    {
                                        echo "<button class='elevenHrButton' onClick=showMeeting('" . $department . "','" . $developmentMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Finances")
                            {
                                for($j = 3; $j>= 0;$j--)
                                {
                                    if(isset($financesMeetings[$j]))
                                    {
                                        echo "<button class='elevenHrButton' onClick=showMeeting('" . $department . "','" . $financesMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                        }
                        //als de meeting tussen 12 en 13 uur valt.
                        else if($i == 12)
                        {
                            if($department == "Sales")
                            {
                                for($j = 4; $j>= 0;$j--)
                                {
                                    if(isset($salesMeetings[$j]))
                                    {
                                        echo "<button class='twelveHrButton' onClick=showMeeting('" . $department . "','" . $salesMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Manager")
                            {
                                for($j = 4; $j>= 0;$j--)
                                {
                                    if(isset($managerMeetings[$j]))
                                    {
                                        echo "<button class='twelveHrButton' onClick=showMeeting('" . $department . "','" . $managerMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Development")
                            {
                                for($j = 4; $j>= 0;$j--)
                                {
                                    if(isset($developmentMeetings[$j]))
                                    {
                                        echo "<button class='twelvenHrButton' onClick=showMeeting('" . $department . "','" . $developmentMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                            else if($department == "Finances")
                            {
                                for($j = 4; $j>= 0;$j--)
                                {
                                    if(isset($financesMeetings[$j]))
                                    {
                                        echo "<button class='twelveHrButton' onClick=showMeeting('" . $department . "','" . $financesMeetings[$j]['0'] . "')> $department</button>";
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }        
            ?>
        </div>
    </div>
</div>
<?php
    include_once("footer.php");
?>