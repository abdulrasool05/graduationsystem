<?php
    require ("../functions.php");

    $studEmail=getEmail();
    $studInfo=getStud($studEmail);  
    $studNum=$studInfo[0]['stud_num'];
    $studId=$studInfo[0]['stud_id'];

    if (isset($_POST['moments']) || isset($_POST['scholarship']) || isset($_POST['futPlans']) ){
        $memMoment=$_POST['moments'];
        $futPlansTemp=$_POST['futPlans'];
        
        for ($x=0; $x<2; $x++){
           $futPlansTemp[$x]=strip_tags($futPlansTemp[$x], ""); 
        }
        $futPlans=json_encode($futPlansTemp);

        $scholarshipTemp =$_POST['scholarship'];
        $scholarship= array();
        $scholLength=count($scholarshipTemp);
    
        for ($y=0; $y<$scholLength; $y++){
            if ($scholarshipTemp[$y]!=""){
            
                $scholarship[$y]=$scholarshipTemp[$y];
                $scholarship[$y]=strip_tags($scholarship[$y], "");
                
            }
            
        }
        
        updateStudData($studNum, $memMoment, $scholarship, $futPlans, 1);
        adminLogs(1, 1, $studId, $studEmail);
    }

    else if (isset($_POST['error'])){
        $errorMessage=$_POST['error'];
        $errorMessage=strip_tags($errorMessage);
        insertMessage($studEmail, $errorMessage, $studId);
        adminLogs(1, 2, $studId, $studEmail);
    }

?>