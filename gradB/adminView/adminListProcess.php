<?php
    require ("../functions.php");
        $stud_id = $_GET['id'];
        $stud_enabled = $_GET['enabled'];
        $stud_which_show = $_GET['show'];

        if (isset($stud_enabled)) { // when a student's show is disabled/enabled via the student list
            updateStudEnableDataAdmin($stud_id, $stud_enabled);
        }
        else { // when a student's show is changed via the student list
            updateStudShowDataAdmin($stud_id, $stud_which_show);
        }          
?>