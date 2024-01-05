<?php
    $students = getStudList();
    $messages = getMessages();
?>

<title>Dashboard</title>

<div class="page p-3">
    <h1>Dashboard</h1>

    <?php
        $studentsSavedCounter = 0;
        $studentsCounter = 0;
        $progressBarValue = 0;

        // Foreaching through students and checking if the student has saved, if the student has saved then add 1 to $studentsCounter and $studentsSavedCounter, if not, then add 1 to $studentsCounter
        foreach($students as $s) {
            if($s['stud_has_saved'] == 1) {
                $studentsCounter++;
                $studentsSavedCounter++;
            }

            else {
                $studentsCounter++;
            }
        }

        // Calculating the progress bar value
        $progressBarValue = ($studentsSavedCounter / $studentsCounter) * 100;
        $progressBarValue = round($progressBarValue);

        ########## STUDENTS SAVED SECTION ##########
        echo "<div class='rounded-3 studentsSaved'>\n";

        echo "<h5><strong>Student Saves</strong></h5>\n";
        echo "Students that have saved data: ".$studentsSavedCounter." Students\n";
        echo "<div class='progress' role='progressbar' aria-label='Success' aria-valuenow='".$progressBarValue."' aria-valuemin='0' aria-valuemax='100'>\n";
        echo "<div class='progress-bar bg-success' style='width: ".$progressBarValue."%'>".$progressBarValue."%</div>\n";
        echo "</div>\n";

        echo "</div>\n";

        echo "<br>\n";
    ?>

    <!-- STUDENT MESSAGES SECTION -->
    <div class="rounded-3 msgsDiv">
        <table class="table table-borderless msgsTable">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Foreaching through messages and displaying them on screen
                    foreach($messages as $msgs) {
                        echo "<tr>";
                        echo "<td><a href='adminTemplate0.php?page=student&id=".$msgs['msg_stud_id']."'>".$msgs['msg_email']."</a></td>";
                        echo "<td>".$msgs['msg_text']."</td>";
                        echo "</tr>\n";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>