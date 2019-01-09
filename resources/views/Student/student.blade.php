<?php
    include_once("header.php");
    use \App\Http\Controllers\mailController;
    use \App\Http\Controllers\planningController;
    $mails = mailController::getMails();
    //kijk of er in de session een datum zit zo niet zet de date op null
    if(isset($_SESSION['date']) && $_SESSION['date'] != "")
    {
        $date = $_SESSION['date'];
    }
    else
    {
        $date = null;
    }
    $meetings = planningController::getAllMeetings($date);
    //kijk of de user is ingelogt
    if((!isset($_SESSION['user'])))
    {
        $_SESSION['feedback'] = "Je moet ingelogt zijn voor de studentenPanel pagina.";
        header("Location: /home");
        die();
    }
?>
<script src="{{ URL::asset('js/planner.js') }}"></script>
<script src="{{ URL::asset('js/mail.js') }}"></script>
<title>Studenten panel</title>
<div class="welcome">
    <?php 
    //zet de feedback op het scherm en verwijder deze dan.
    if(isset($_SESSION['feedback']))
    {
        echo $_SESSION['feedback'];
        $_SESSION['feedback'] = null;
    }
    ?>
    <h1>Hallo <?php echo "Groep: " . $_SESSION['user'];?></h1>
</div>

<div class="panelContent" id="panelContent">
    <div class="navigation" id ="navigation">
        <button id="mail" onClick="showMails()">Open Mail</button>
        <button id="agenda" onClick="showAgenda()">Plan Meeting</button>
        <button id="logout" onClick="window.location='/logout'">Logout</button>
    </div>
 
    <div class="mailPanel" id="mailPanel">
        <!-- haal alle mails van de gebruiker op en geef ze weer. -->
        <div class="mails">
            <?php 
                if($mails != null)
                {
                    foreach($mails as $mail)
                    {
                        $department = $mail['department'];
                        $department1 = $mail['department'] . "1";
                        if($department == "Finances")
                            echo "<button onClick='toggleFinances(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
                        if($department == "Sales")
                            echo "<button onClick='toggleSales(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
                        if($department == "Development")
                            echo "<button onClick='toggleDevelopment(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
                        if($department == "Manager")
                            echo "<button onClick='toggleManager(`$department`, `$department1`)'>" . $mail['department'] . "</button> \r\n";
                    }
                }
            ?>
        </div>
        <div class="currentMail">
            <!-- laat de informatie van de mail zien -->
            <div class="mailInfo">
                <?php 
                    if($mails != null)
                    {
                        foreach($mails as $mail)
                        {
                            echo "<div id='" . $mail['department'] . "'>\r\n";
                                echo "<p>afzender: " .  $mail['department'] . "</p>";
                                echo "<p>datum: " . $mail['timeResponse'] . "</p>";
                                echo "<p>aan: Groep " . $mail['groupNumber'] . "</p>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
            <!-- laat de content van de mail zien -->
            <div class="mailContent">
                <?php
                    if($mails != null)
                    {
                        foreach($mails as $mail)
                        {
                            echo "<div id='" . $mail['department'] . "1'>\r\n";
                                echo "<p>" . $mail['mailResponse'] . "</p>";
                            echo "</div>";
                        }
                    } 
                ?>
            </div>
        </div>
    </div>       
    <div class="panelAgenda" id="panelAgenda">
        <form action="/changeDate" method='post' class='dateSelector'>
            {{ csrf_field() }}
            <input type="date" name='date' class="date" value=<?php echo $date;?>>  
            <input type="submit" class='dateButton' id='dateButton' value='Go'>
        </form> 
        <div class="modals">
            <?php
            // de meetings aan de hand van de afdeling
            $salesMeetings = planningController::getSalesMeetings($date);
            $managerMeetings = planningController::getManagerMeetings($date);
            $developmentMeetings = planningController::getDevelopmentMeetings($date);
            $financesMeetings = planningController::getFinancesMeetings($date);
            
            //increment zodat de website weet welke modal hij moet pakken
            $sales = 0;
            $manager = 0;
            $development = 0;
            $finances = 0;
            //maak voor iedere sales meeting een salesModal
            foreach($salesMeetings as $meeting)
            {
                $meetingTime = $meeting['meetingTime'];
                $department = $meeting['department'];
                $meetingDate = $meeting['meetingDate'];
                echo "<form action='/mailing' method='post'>";
                    ?>
                    {{ csrf_field() }}
                    <?php
                    echo "<div class='SalesModal" . $sales . "' id='SalesModal" . $sales. "'>";
                        echo "<div class='modalContent'>";
                            echo "<span id='salesClose" . $sales . "'>&times;</span>";
                            echo "<p>Sales</p>";
                            echo "<p>" . $meetingTime . "</p>";
                            echo "<input type='submit' value='Schedule meeting'>";
                            echo "<input type='hidden' name='meetingTime' value=$meetingTime>";
                            echo "<input type='hidden' name='department' value=$department>";
                            echo "<input type='hidden' name='meetingDate' value=$meetingDate>";
                        echo "</div>";
                    echo "</div>";
                echo "</form>";
                //voeg deze meeting toe aan de array met sales meetings
                array_push($meeting, $sales);
                $salesMeetings[$sales] = $meeting;
                $sales++;
            }
            //maak voor iedere manager meeting een managerModal
            foreach($managerMeetings as $meeting)
            {  
                $meetingTime = $meeting['meetingTime'];
                $department = $meeting['department'];
                $meetingDate = $meeting['meetingDate'];
                echo "<form action='/mailing' method='post'>";
                    ?>
                    {{ csrf_field() }}
                    <?php
                    echo "<div class='ManagerModal" . $manager . "' id='ManagerModal" . $manager . "'>";
                        echo "<div class='modalContent'>";
                            echo "<span id='managerClose" . $manager . "'>&times;</span>";
                            echo "<p>Manager</p>";
                            echo "<p>" . $meetingTime . "</p>";
                            echo "<input type='submit' value='Schedule meeting'>";
                            echo "<input type='hidden' name='meetingTime' value=$meetingTime>";
                            echo "<input type='hidden' name='department' value=$department>";
                            echo "<input type='hidden' name='meetingDate' value=$meetingDate>";
                        echo "</div>";
                    echo "</div>";
                echo "</form>";
                //voeg deze meeting tooe aan de array met manager meetings
                array_push($meeting, $manager);
                $managerMeetings[$manager] = $meeting;
                $manager++;
            }
            //maak voor iedere development meeting een developmentModal
            foreach($developmentMeetings as $meeting)
            {  
                $meetingTime = $meeting['meetingTime'];
                $department = $meeting['department'];
                $meetingDate = $meeting['meetingDate'];
                echo "<form action='/mailing' method='post'>";
                    ?>
                    {{ csrf_field() }}
                    <?php
                    echo "<div class='DevelopmentModal" . $development . "' id='DevelopmentModal" .$development . "'>";
                        echo "<div class='modalContent'>";
                            echo "<span id='developmentClose" . $development . "'>&times;</span>";
                            echo "<p>Development</p>";
                            echo "<p>" . $meetingTime . "</p>";
                            echo "<input type='submit' value='Schedule meeting'>";
                            echo "<input type='hidden' name='meetingTime' value=$meetingTime>";
                            echo "<input type='hidden' name='department' value=$department>";
                            echo "<input type='hidden' name='meetingDate' value=$meetingDate>";
                        echo "</div>";
                    echo "</div>";
                echo "</form>";
                //voeg deze meeting tooe aan de array met development meetings
                array_push($meeting, $development);
                $developmentMeetings[$development] = $meeting;
                $development++;
            }
            //maak voor iedere finances meeting een financesModal
            foreach($financesMeetings as $meeting)
            {  
                $meetingTime = $meeting['meetingTime'];
                $department = $meeting['department'];
                $meetingDate = $meeting['meetingDate'];
                echo "<form action='/mailing' method='post'>";
                ?>
                {{ csrf_field() }}
                <?php
                echo "<div class='FinancesModal" . $finances . "' id='FinancesModal" . $finances . "'>";
                    echo "<div class='modalContent'>";
                            echo "<span id='financesClose" . $finances . "'>&times;</span>";
                            echo "<p>Finances</p>";
                            echo "<p>" . $meetingTime . "</p>";
                            echo "<input type='submit' value='Schedule meeting'>";
                            echo "<input type='hidden' name='meetingTime' value=$meetingTime>";
                            echo "<input type='hidden' name='department' value=$department>";
                            echo "<input type='hidden' name='meetingDate' value=$meetingDate>";
                        echo "</div>";
                    echo "</div>";
                echo "</form>";
                //voeg deze meeting tooe aan de array met finances meetings
                array_push($meeting, $finances);
                $financesMeetings[$finances] = $meeting;
                $finances++;
            }
            ?>
        </div>
        <div class="planning">
            <?php 
            // de meetings aan de hand van de tijd
            $eightHrMeetings = planningController::getEightHrMeetings($date);
            $nineHrMeetings = planningController::getNineHrMeetings($date);
            $tenHrMeetings = planningController::getTenHrMeetings($date);
            $elevenHrMeetings = planningController::getElevenHrMeetings($date);
            $twelveHrMeetings = planningController::getTwelveHrMeetings($date);

            // unieke button waarde aan de hand van de tijd
            $eightHr = 0;
            $nineHr = 0;
            $tenHr = 0;
            $elevenHr = 0;
            $twelveHr = 0;

            // waarde van welke meeting je zit
            $ammountFinancesMeetings = 0;
            $ammountSalesMeetings = 0;
            $ammountDevelopmentMeetings = 0;
            $ammountManagerMeetings =0;
            ?>
            <div class="eightHrArea">
                <p class="eightHr">8hr</p>
                <?php
                foreach($eightHrMeetings as $eightHrMeeting)
                {
                    if($eightHrMeeting['department'] == "Finances")
                    {
                        echo "<button class='eightHrButton" . $eightHr . "' onClick=showMeeting('" . $eightHrMeeting['department'] . "','" . $ammountFinancesMeetings . "')>" . $eightHrMeeting['department'] . "</button>";
                        $ammountFinancesMeetings++;
                    }
                    else if($eightHrMeeting['department'] == "Sales")
                    {
                        echo "<button class='eightHrButton" . $eightHr . "' onClick=showMeeting('" . $eightHrMeeting['department'] . "','" . $ammountSalesMeetings . "')>" . $eightHrMeeting['department'] . "</button>";
                        $ammountSalesMeetings++;
                    }
                    else if($eightHrMeeting['department'] == "Development")
                    {
                        echo "<button class='eightHrButton" . $eightHr . "' onClick=showMeeting('" . $eightHrMeeting['department'] . "','" . $ammountDevelopmentMeetings . "')>" . $eightHrMeeting['department'] . "</button>";
                        $ammountDevelopmentMeetings++;
                    }
                    else if($eightHrMeeting['department'] == "Manager")
                    {
                        echo "<button class='eightHrButton" . $eightHr . "' onClick=showMeeting('" . $eightHrMeeting['department'] . "','" . $ammountManagerMeetings . "')>" . $eightHrMeeting['department'] . "</button>";
                        $ammountManagerMeetings++;
                    }
                    $eightHr++;
                } 
                ?>
            </div>
            <div class="nineHrArea">
                <p class="nineHr">9hr</p>
                <?php
                foreach($nineHrMeetings as $nineHrMeeting)
                {
                    if($nineHrMeeting['department'] == "Finances")
                    {
                        echo "<button class='nineHrButton" . $nineHr . "' onClick=showMeeting('" . $nineHrMeeting['department'] . "','" . $ammountFinancesMeetings . "')>" . $nineHrMeeting['department'] . "</button>";
                        $ammountFinancesMeetings++;
                    }
                    else if($nineHrMeeting['department'] == "Sales")
                    {
                        echo "<button class='nineHrButton" . $nineHr . "' onClick=showMeeting('" . $nineHrMeeting['department'] . "','" . $ammountSalesMeetings . "')>" . $nineHrMeeting['department'] . "</button>";
                        $ammountSalesMeetings++;
                    }
                    else if($nineHrMeeting['department'] == "Development")
                    {
                        echo "<button class='nineHrButton" . $nineHr . "' onClick=showMeeting('" . $nineHrMeeting['department'] . "','" . $ammountDevelopmentMeetings . "')>" . $nineHrMeeting['department'] . "</button>";
                        $ammountDevelopmentMeetings++;
                    }
                    else if($nineHrMeeting['department'] == "Manager")
                    {
                        echo "<button class='nineHrButton" . $nineHr . "' onClick=showMeeting('" . $nineHrMeeting['department'] . "','" . $ammountManagerMeetings . "')>" . $nineHrMeeting['department'] . "</button>";
                        $ammountManagerMeetings++;
                    }
                    $nineHr++;
                }
                ?>
            </div>
            <div class="tenHrArea">
                <p class="tenHr">10hr</p>
                <?php 
                foreach($tenHrMeetings as $tenHrMeeting)
                {
                    if($tenHrMeeting['department']  == "Finances")
                    {
                        echo "<button class='tenHrButton" . $tenHr . "' onClick=showMeeting('" . $tenHrMeeting['department'] . "','" . $ammountFinancesMeetings . "')>" . $tenHrMeeting['department'] . "</button>";
                        $ammountFinancesMeetings++;
                    }
                    else if($tenHrMeeting['department'] == "Sales")
                    {
                        echo "<button class='tenHrButton" . $tenHr . "' onClick=showMeeting('" . $tenHrMeeting['department'] . "','" . $ammountSalesMeetings . "')>" . $tenHrMeeting['department'] . "</button>";
                        $ammountSalesMeetings++;
                    }
                    else if($tenHrMeeting['department'] == "Development")
                    {
                        echo "<button class='tenHrButton" . $tenHr . "' onClick=showMeeting('" . $tenHrMeeting['department'] . "','" . $ammountDevelopmentMeetings . "')>" . $tenHrMeeting['department'] . "</button>";
                        $ammountDevelopmentMeetings++;
                    }
                    else if($tenHrMeeting['department'] == "Manager")
                    {
                        echo "<button class='tenHrButton" . $tenHr . "' onClick=showMeeting('" . $tenHrMeeting['department'] . "','" . $ammountManagerMeetings . "')>" . $tenHrMeeting['department'] . "</button>";
                        $ammountManagerMeetings++;
                    }
                    $tenHr++;
                }
                ?>
            </div>
            <div class="elevenHrArea">
                <p class="elevenHr">11hr</p>
                <?php
                foreach($elevenHrMeetings as $elevenHrMeeting)
                {
                    if($elevenHrMeeting['department'] == "Finances")
                    {
                        echo "<button class='elevenHrButton" . $elevenHr . "' onClick=showMeeting('" . $elevenHrMeeting['department'] . "','" . $ammountFinancesMeetings . "')>" . $elevenHrMeeting['department'] . "</button>";
                        $ammountFinancesMeetings++;
                    }
                    else if($elevenHrMeeting['department'] == "Sales")
                    {
                        echo "<button class='elevenHrButton" . $elevenHr . "' onClick=showMeeting('" . $elevenHrMeeting['department'] . "','" . $ammountSalesMeetings . "')>" . $elevenHrMeeting['department'] . "</button>";
                        $ammountSalesMeetings++;
                    }
                    else if($elevenHrMeeting['department'] == "Development")
                    {
                        echo "<button class='elevenHrButton" . $elevenHr . "' onClick=showMeeting('" . $elevenHrMeeting['department'] . "','" . $ammountDevelopmentMeetings . "')>" . $elevenHrMeeting['department'] . "</button>";
                        $ammountDevelopmentMeetings++;
                    }
                    else if($elevenHrMeeting['department'] == "Manager")
                    {
                        echo "<button class='elevenHrButton" . $elevenHr . "' onClick=showMeeting('" . $elevenHrMeeting['department'] . "','" . $ammountManagerMeetings . "')>" . $elevenHrMeeting['department'] . "</button>";
                        $ammountManagerMeetings++;
                    }
                    $elevenHr++;
                }
                ?>
            </div>
            <div class="twelveHrArea">
                <p class="twelveHr">12hr</p>
                <?php 
                foreach($twelveHrMeetings as $twelveHrMeeting)
                {
                    if($twelveHrMeeting['department'] == "Finances")
                    {
                        echo "<button class='twelveHrButton" . $twelveHr . "' onClick=showMeeting('" . $twelveHrMeeting['department'] . "','" . $ammountFinancesMeetings . "')>" . $twelveHrMeeting['department'] . "</button>";
                        $ammountFinancesMeetings++;
                    }
                    else if($twelveHrMeeting['department'] == "Sales")
                    {
                        echo "<button class='twelveHrButton" . $twelveHr . "' onClick=showMeeting('" . $twelveHrMeeting['department'] . "','" . $ammountSalesMeetings . "')>" . $twelveHrMeeting['department'] . "</button>";
                        $ammountSalesMeetings++;
                    }
                    else if($twelveHrMeeting['department'] == "Development")
                    {
                        echo "<button class='twelveHrButton" . $twelveHr . "' onClick=showMeeting('" . $twelveHrMeeting['department'] . "','" . $ammountDevelopmentMeetings . "')>" . $twelveHrMeeting['department'] . "</button>";
                        $ammountDevelopmentMeetings++;
                    }
                    else if($twelveHrMeeting['department'] == "Manager")
                    {
                        echo "<button class='twelveHrButton" . $twelveHr . "' onClick=showMeeting('" . $twelveHrMeeting['department'] . "','" . $ammountManagerMeetings . "')>" . $twelveHrMeeting['department'] . "</button>";
                        $ammountManagerMeetings++;
                    }
                    $twelveHr++;
                }
            ?>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_SESSION['date']) && $_SESSION['date'] != "")
    {
        echo "<script> document.getElementById('agenda').click();</script>";
    }
    include_once("footer.php");
?>