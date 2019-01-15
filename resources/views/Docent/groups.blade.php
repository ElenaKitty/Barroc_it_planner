<?php
    use \App\Http\Controllers\studentController;
    include_once('header.php');
    if((!isset($_SESSION['user'])))
    {
        $_SESSION['feedback'] = "Je moet ingelogt zijn voor deze pagina.";
        header("Location: /home");
        die();
    }
    else if($_SESSION['user'] != "docent")
    {
        $_SESSION['feedback'] = "Studenten mogen niet op deze pagina";
        header("Location: /student");
        die();
    }
    $students = studentController::getStudents();
    $ammountStudents = count($students);
    //bereken het maximaal aantal groepen
    $maxGroups = $ammountStudents / 4;
    echo "aantal studenten: " . $ammountStudents;
    echo "<div class='studentsList'>";
        echo "<form action='/saveGroups' method='post'>";
            foreach($students as $student)
            {
                $groupNumber = rand(1, $maxGroups);
                echo "<div class='student'>";
                    echo "<p>" . $student['memberName'] . "</p>";
                    echo "<input type='number' name='groupNumber' value=$groupNumber max=$maxGroups>";
                    //hidden field met de studentnaam als name en value is hun id hier later op checken met invoeren in database
                    echo "<input type='hidden' name='" . $student['memberName'] . "' value='" . $student['memberId'] . "'>";
                echo "</div>";
            }
            echo "<input type='submit' value='Save'>";
        echo "</form>";
    echo "</div>";    
    include_once('footer.php');
?>