<?php
    require ("../functions.php");

    if (isset($_POST['stud_id']) || isset($_POST['stud_num']) || isset($_POST['stud_email']) || isset($_POST['stud_lname']) || isset($_POST['stud_fname']) || isset($_POST['stud_mem_moment']) || isset($_POST['stud_scholarships']) || isset($_POST['stud_awards']) || isset($_POST['stud_future_plans']) || isset($_POST['stud_which_show']) || isset($_POST['stud_enabled'])) {
        $stud_id = $_POST['stud_id'];
        $stud_num = $_POST['stud_num'];
        $stud_email = $_POST['stud_email'];
        $stud_lname = $_POST['stud_lname'];
        $stud_fname = $_POST['stud_fname'];
        $stud_mem_moment = $_POST['stud_mem_moment'];
        $temp_scholarships = $_POST['scholarship'];
        $stud_awards = $_POST['stud_awards'];
        $temp_future_plans = $_POST['stud_future_plans'];
        $stud_which_show = $_POST['stud_which_show'];
        $stud_enabled = $_POST['stud_enabled'];

        $stud_scholarships= array();
        $scholLength=count($temp_scholarships);
    
        print_r($temp_scholarships);

        
        for ($x=0; $x<2; $x++){
           $temp_future_plans[$x]=strip_tags($temp_future_plans[$x], ""); 
        }
        $stud_future_plans=json_encode($temp_future_plans);


        for ($y=0; $y<$scholLength; $y++){
            if ($temp_scholarships[$y]!=""){
                
               
                $stud_scholarships[$y]=$temp_scholarships[$y];
                $stud_scholarships[$y]=strip_tags($stud_scholarships[$y], "");
                
            }
            
        }

        $stud_scholarships = json_encode($stud_scholarships);

        if (!isset($stud_enabled)) {
            $stud_enabled = 0;
        }
        else {
            $stud_enabled = 1;
        }

        $stud_css = $_POST['stud_css'];
        $stud_has_saved = $_POST['stud_has_saved'];

        if (!isset($stud_has_saved)) {
            $stud_has_saved = 0;
        }
        else {
            $stud_has_saved = 1;
        }

        updateStudDataAdmin($stud_id, $stud_num, $stud_email, $stud_lname, $stud_fname, $stud_mem_moment, $stud_scholarships, $stud_awards, $stud_future_plans, $stud_which_show, $stud_enabled, $stud_css, $stud_has_saved);
    }
?>