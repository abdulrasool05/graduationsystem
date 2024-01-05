<div class = "page p-3">
    <div class="container">
        <header class="d-flex justify-content-center py-3">
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="?page=studList" class="nav-link active" aria-current="page">Back</a><br>      
            
      <?php
        $studentId=$_GET['id'];

        $currentStudent = getCurrentStudent($studentId);
        $studNum = $currentStudent[0]['stud_num'];

        $nextStudentId = getSideStudents($studentId, 1);
        $previousStudentId = getSideStudents($studentId, -1);
                
              echo "<li class='nav-item'><a href='adminTemplate0.php?page=student&id=".$previousStudentId."' class='nav-link'><< Previous Student</a><br>";
              echo "<li class='nav-item'><a href='#' class='nav-link' onclick='openModal()'>Messages</a><br>";
              echo "<li class='nav-item'><a href='#' class='nav-link' onclick='openModal2()'>Logs</a><br>";
              echo "<li class='nav-item'><a href='#' onclick=\"window.open('../show.php?mode=preview&id=" . $studentId . "', 'preview', 'width=500,height=500');\" class='nav-link'>Launch Slideshow</a><br>";
              echo "<li class='nav-item'><a href='adminTemplate0.php?page=student&id=".$nextStudentId."' class='nav-link'>Next Student >></a><br>";
              echo "</ul></header></div>";

        $year1=getPhotoDir($studNum, "A");
        $year2=getPhotoDir($studNum, "B");
        $year3=getPhotoDir($studNum, "C");
        $year4=getPhotoDir($studNum, "D");
        $grad=getPhotoDir($studNum, "E");

        echo "<p class = 'd-flex justify-content-center text-dark fw-bold fs-3 w-100'>".$currentStudent[0]['stud_fname']." ".$currentStudent[0]['stud_lname']."</p>";
        echo "<title>Student Editor - ".$currentStudent[0]['stud_fname']." ".$currentStudent[0]['stud_lname'][0].".</title>";
      ?>

      <form id='studentPhotoForm' action='adminSinglePhotoUpload.php' method="post" enctype="multipart/form-data">
      <input type='hidden' name='num' value='<?php echo $studNum; ?>'>
      <input type='hidden' name='id' value='<?php echo $studentId; ?>'>
      
      <!-- student photo cards below -->
      <div class="row row-cols-1 row-cols-md-5 g-4">
        <div class="col">
          <div class="card">
            <img src="<?php echo $year1 ?>" class="card-img-top" alt="Image Placeholder">
            <div class="card-body">
              <h5 class="card-title fw-bold">Grade 9</h5>
              <input type="file" name="yearA">
              <input class = "rounded btn btn-dark" type="submit" value="Upload" name="submit">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="<?php echo $year2 ?>" class="card-img-top" alt="Image Placeholder">
            <div class="card-body">
              <h5 class="card-title fw-bold">Grade 10</h5>
              <input type="file" name="yearB">
              <input class = "rounded btn btn-dark" type="submit" value="Upload" name="submit">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="<?php echo $year3 ?>" class="card-img-top" alt="Image Placeholder">
            <div class="card-body">
              <h5 class="card-title fw-bold">Grade 11</h5>
              <input type="file" name="yearC">
              <input class = "rounded btn btn-dark" type="submit" value="Upload" name="submit">
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card">
            <img src="<?php echo $year4 ?>" class="card-img-top" alt="Image Placeholder">
            <div class="card-body">
              <h5 class="card-title fw-bold">Grade 12</h5>
              <input type="file" name="yearD">
              <input class = "rounded btn btn-dark" type="submit" value="Upload" name="submit">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="<?php echo $grad ?>" class="card-img-top" alt="Image Placeholder">
            <div class="card-body">
              <h5 class="card-title fw-bold">Graduation Photo</h5>
              <input type="file" name="yearE">
              <input class = "rounded btn btn-dark" type="submit" value="Upload" name="submit">
            </div>
          </div>
        </div>
      </div>

      </form>

      <?php
        $studentId=$_GET['id'];

        $currentStudent = getCurrentStudent($studentId);

        $scholarshipsCoded=$currentStudent[0]['stud_scholarships'];
        $scholarships=json_decode($scholarshipsCoded);

        echo "<br><br>";
        echo "Slide Preview";
        echo "<br><br>";
        echo "<div id='wrap' class='col-3'>";
        echo "<iframe src='../show.php?mode=spefStud&id=".$studentId."' title='preview' id='iFrameID'></iframe>"; // iframe slide box preview
        echo "</div>";
        
        $messages = getUserMessages($studentId);

        echo "<br>";

        echo "<form id='studentDataForm' action='' method='POST' id='studentData'>"; // form for every student field (email, name, etc.)
          echo "<div class = 'mb-3'>";
            echo "<label class='form-label'>First Name</label>";
            echo "<input type='text' id='stud_fname' name='stud_fname' placeholder='Enter first name...' class='inputForm form-control' value='".$currentStudent[0]['stud_fname']."'>";
          echo "</div>";
          
          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Last Name</label>";
            echo "<input type='text' name='stud_lname' placeholder='Enter last name...' class='inputForm form-control' value='".$currentStudent[0]['stud_lname']."'>";
          echo "</div>";

          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Student ID</label>";
            echo "<input type='text' name='stud_id' placeholder='Enter student ID...' class='inputForm form-control' value='".$currentStudent[0]['stud_id']."'>";  
          echo "</div>";
        

          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Student Number</label>";
            echo "<input type='text' name='stud_num' placeholder='Enter student number...' class='inputForm form-control' value='".$currentStudent[0]['stud_num']."'>";
          echo "</div>";
          
          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Student Email</label>";
            echo "<input type='text' name='stud_email' placeholder='Enter student email...' class='inputForm form-control' value='".$currentStudent[0]['stud_email']."'>";
          echo "</div>";
        
          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Student Memorable Moment</label>";
            echo "<input type='text' id ='stud_mem_moment' name='stud_mem_moment' placeholder='' class='inputForm form-control' value='".$currentStudent[0]['stud_mem_moment']."'>";
          echo "</div>";
      
          if (empty($scholarship)){
            $scholarship=array("");
          }
          $arraySize=count($scholarship);

          if (!isset($scholarships[0])) { // if scholarships is not set, set to empty to avoid access errors.
            $scholarships[0] = "";
          }
                      
          echo "<div id='scholDiv'>";  
            $first = true;

            foreach($scholarships as $schol) { // go through every scholarship and display (first scholarship displays + button, rest display remove)
              echo "<div id='scholDiv' class='mb-3 scholDiv'>\n";

              if($first) {
                echo "Scholarships";
                echo "<div class='row'><div class='col input-group'><input type='text' class='inputForm' placeholder='Enter your scholarship...' name='scholarship[]' aria-describedby='button-addon2' value='".$schol."' id='addSchol'>";
                echo "<button class='btn btn-success' type='button' id='button-addon2'>+</button>";
                $first = false;
              }
              else {
                echo "<div class='row'><div class='col input-group'><input type='text' class='inputForm' placeholder='Enter your scholarship...' name='scholarship[]' aria-describedby='button-addon3' value='".$schol."' id='addSchol'>";
                echo "<button class='btn btn-danger' type='button' id='button-addon3'>-</button>";
              }
              echo "</div></div></div>";
            }

          echo "</div>";
          
          $futPlans=json_decode($currentStudent[0]['stud_future_plans']);

          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Student Awards</label>";
            echo "<input type='text' name='stud_awards' placeholder='' class='inputForm form-control' value='".$currentStudent[0]['stud_awards']."'>";
          echo "</div>";
  
          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Destination (Where are you going?)</label>";
            echo "<input type='text' name='stud_future_plans[]' placeholder='' class='inputForm form-control' value='";
            
            if (isset($futPlans)) {
              echo $futPlans[0]; 
            }
            
            echo "'>";
          echo "</div>";

          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Program</label>";
            echo "<input type='text' name='stud_future_plans[]' placeholder='' class='inputForm form-control' value='";

            if (isset($futPlans)) {
              echo $futPlans[1]; 
            }
            
            echo "'>";
          echo "</div>";

          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Student Show</label>";
            echo "<input type='text' name='stud_which_show' placeholder='' class='inputForm form-control' value='".$currentStudent[0]['stud_which_show']."'>";
          echo "</div>";

          echo "<div class='form-check form-switch'>";
            echo "<input class='form-check-input' type='checkbox' role='switch' name='stud_enabled' ";
            
            if ($currentStudent[0]['stud_enabled'] == 1) {
              echo "checked";
            }
            echo ">";

            echo "<label class='form-check-label'>Student Enabled</label>";
          echo "</div>";

          echo "<div class = 'mb-3'";
            echo "<label class='form-label'>Student CSS</label>";
            echo "<input type='text' name='stud_css' placeholder='' class='inputForm form-control' value='".$currentStudent[0]['stud_css']."'>";
          echo "</div>";

          echo "<div class='form-check form-switch'>";
            echo "<input class='form-check-input' type='checkbox' role='switch' name='stud_has_saved' ";

            if ($currentStudent[0]['stud_has_saved'] == 1) {
              echo "checked";
            }
            echo ">";

            echo "<label class='form-check-label'>Student Has Saved</label>";
          echo "</div>";

          echo "<br>";
          echo "<input type='submit' value='Save Data' name='send' id='adminStudSaveButton' class='btn btn-success'>";

        echo "</form>";
        ?>

      <!-- USER MESSAGES MODAL START -->
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">User Messages</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <?php
                $currentStudent = getCurrentStudent($studentId);
                $counter = 0;
                $messages = getUserMessages($studentId);

                if ($messages != null) { // if there are any user messages
                  foreach($messages as $currentMessage) {
                    $counter++;
                    echo $counter.". Email: ".$currentStudent[0]['stud_email'];
                    echo "<br>Message: "; 
                    echo $currentMessage['msg_text'];
                    echo "<br><br>";
                  }
                }
                else {
                  echo "There are no user messages.";
                }
              ?>
              
            </div>

            <div class="modal-footer">
              <a href="adminClearUserMessages.php?id=<?php echo $studentId;?>"><button type="button" onclick='' class="btn btn-danger">Clear Messages</button></a>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
      <!-- USER MESSAGES MODAL END -->
    
      <!-- USER LOGS MODAL START -->
      <div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="myModal2" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">User Messages</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <?php
                $currentStudent = getCurrentStudent($studentId);
                $counter = 0;
                $logs = getStudentLogs($studentId);

                if ($logs != null) { // if there are any user logs
                  foreach($logs as $currentLog) {
                    $counter++;
                    echo $counter.". Timestamp: ".$currentLog['log_timestamp'];
                    echo "<br>Message: "; 
                    echo $currentLog['log_message'];
                    echo "<br><br>";
                  }
                }
                else {
                  echo "There is no user activity.";
                }
              ?>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
      <!-- USER LOGS MODAL END -->
    </div>


<script>
	function openModal() {
		var myModal = new bootstrap.Modal(document.getElementById('myModal'));
    myModal.show();
    //myModal.hide();
    //myModal.toggle();
	}
  function openModal2() {
		var myModal2 = new bootstrap.Modal(document.getElementById('myModal2'));
    myModal2.show();
    //myModal.hide();
    //myModal.toggle();
	}
  
</script>

