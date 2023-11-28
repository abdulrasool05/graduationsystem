<?php
    
    $charLim=getCharLimit();
    echo "<div class='container'>";
    
        echo "<div class='row justify-content-center'>";
        echo "<div id='inputDiv' class='col-10'>";

            echo "<div class='alert alert-warning' role='alert'> 
            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-info-circle-fill' viewBox='0 0 16 16'>
                <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
            </svg>
            
            
            Awards will be added by Guidance after</div>";
        
            echo "<img id='inputImg' src='studentStylingImages/inputBackground.jpg'>";

            echo "<div id='inputContents'>";
        
            echo "<form action='studentFormProcess.php' method='POST' id='studentInputform'>";
            echo "<div class='row'><div class='col'>";
            echo "<label for='memorableMoment' class='form-label headings'>Memorable Moment</label>";
            echo "<textarea name='moments' placeholder='You have ".$charLim." characters to write your most memorable moment of high school here...' id='memorableMoment' class='form-control'>".$memMoment."</textarea>";
            echo "</div></div>";


            if (empty($scholarship)){
                $scholarship=array("");
            }
            
            echo "<div id='scholDiv'>";
            
                $first = true;
                foreach($scholarship as $schol) {
                    
                    echo "<div class='mb-3 scholDiv'> \n";
                    if($first) {
                        echo "<label for='addSchol' class='form-label headings'>Scholarship</label>";
                        echo "<div class='row'><div class='col-2 input-group'><input type='text' class='inputForm form-control' placeholder='Enter your scholarship...' name='scholarship[]' aria-describedby='addButton' value='".$schol."' id='addSchol'>\n";
                        echo "<button class='btn btn-success' type='button' id='addButton'>+</button>";
                        
                        $first = false;
                    }
                    else {
                        echo "<div class='row'><div class='col-3 input-group'><input type='text' class='inputForm form-control' placeholder='Enter your scholarship...' name='scholarship[]' aria-describedby='removeButton' value='".$schol."' id='addSchol'>";
                        echo "<button class='btn btn-danger' type='button' id='removeButton'>-</button>";
                    }
                    
                    echo "</div></div></div>";

                }   
            echo "</div>"; 
            
            if (empty($futPlans)){
                $futPlans=array("", "");
            }
            
            echo "<div class='row scholDiv'><div class='col'>";
            echo "<label for='destination' class='form-label headings'>Where are you going?</label>";
            echo "<input type='text' name='futPlans[]' placeholder='Where are you going...' class='inputForm form-control' id='destination' value='".$futPlans[0]."'>";
            echo "</div></div>";

        
            echo "<div class='row programName'><div class='col'>";
            echo "<label for='program' class='form-label headings'>For what program?</label>";
            echo "<input type='text' name='futPlans[]' placeholder='Write any future plans here...' class='inputForm form-control' id='program' value='".$futPlans[1]."'>";
            echo "</div></div>";
            
            echo "<div class='row'><div class='col scholDiv'>";
            echo "<input type='submit' value='Save' name='send' id='studSave' class='btn btn-success' onclick='successAlert()'>";
            echo "</div></div>";

            echo "<div class='row'>";
            echo "<div class='alert alert-success col' role='alert' id='successPopup'>";
            echo "Successfully Saved!";
            echo "</div>";

            echo "</form>";                                                                                                          
        
            echo "</div>\n";
        echo "</div>";
    echo "</div>";

?>
   
