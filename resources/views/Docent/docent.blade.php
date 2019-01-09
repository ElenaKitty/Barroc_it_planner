<?php
    include_once("header.php");
    use \App\Http\Controllers\mailController;
    use \App\Http\Controllers\planningController;
    $mails = mailController::getMails();
    if((!isset($_SESSION['user'])))
    {
        $_SESSION['feedback'] = "Je moet ingelogt zijn voor de docentenPanel pagina.";
        header("Location: /home");
        die();
    }
     //kijk of er in de session een datum zit zo niet zet de date op null
     if(isset($_SESSION['date']))
     {
         $date = $_SESSION['date'];
     }
     else{
         $date = null;
     }
?>
<script src="{{ URL::asset('js/planner.js') }}"></script>
<script src="{{ URL::asset('js/mail.js') }}"></script>
<title>Docent Panel</title>
<div class="welcome">
    <?php 
    //zet de feedback op het scherm en verwijder deze dan.
    if(isset($_SESSION['feedback']))
    {
        echo $_SESSION['feedback'];
        $_SESSION['feedback'] = null;
    }
    ?>
    <h1>Hallo <?php echo $_SESSION['user'];?></h1>
</div>
<div class="panelContent" id="panelContent">
    <div class="docentNavigation" id ="docentNavigation">
        <button id="mail" onClick="showMails()">Open Mail</button>
        <button id="agenda" onClick="showAgenda()">Open Agenda</button>
        <button id="interview" onClick="">Interview toevoegen</button>
        <button id="drop" onClick="">Verwijder alle data</button>
        <button id="assemble" onClick="">Studenten groeperen</button>
        <button id="logout" onClick="window.location='/amoclient/logout'">Logout</button>
    </div>
    <div class="mailPanel" id="mailPanel">
        <!-- haal alle mails van de gebruiker op en geef ze weer. -->
        <div class="mails">
            <?php 
               
            ?>
        </div>
        <div class="currentMail">
            <!-- laat de informatie van de mail zien -->
            <div class="mailInfo">
                <?php 

                ?>
            </div>
            <!-- laat de content van de mail zien -->
            <div class="mailContent">
                <?php

                ?>
            </div>
        </div>
    </div>       
    <div class="panelAgenda" id="panelAgenda">
        <form action="/changeDate" method='post' class='dateSelector'>
            {{ csrf_field() }}
            <input type="date" name='date' class="date" value=<?php echo $date;?>>  
            <input type="submit" class='dateButton' value='Go'>
        </form> 
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
    include_once("footer.php");
?>