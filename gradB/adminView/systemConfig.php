
<title>Settings</title>

<?php

global $pdo;
    $query= $pdo->prepare("SELECT * FROM settings");
    $query->execute();
    $settings=$query->fetchALL(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM students");
    $query->execute();
    $students=$query->fetchALL(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM admins");
    $query->execute();
    $admins=$query->fetchALL(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM awards");
    $query->execute();
    $awards=$query->fetchALL(PDO::FETCH_ASSOC);


    $signIn=      $settings[0]['setting_value'];
    $Edit=        $settings[1]['setting_value'];
    $ErrorLog=    $settings[2]['setting_value'];
    $DeadlineDate=$settings[3]['setting_value'];
    $DeadlineTime=$settings[4]['setting_value'];
    $MaxChar=     $settings[5]['setting_value'];
    $SlideTime=   $settings[6]['setting_value'];



    if (isset($_POST['Max_MemMoment_Char'])){
    
      $DeadlineDate=$_POST['Deadline_Date'];
      $DeadlineTime=$_POST['Deadline_Time'];
      $MaxChar=$_POST['Max_MemMoment_Char'];
      $SlideTime=$_POST['Slide_Time'];

      if (!isset($_POST['Stud_LogIn_Allow'])){
        $signIn='off';
      }
      else {
        $signIn='1';
      }
      if (!isset($_POST["Stud_Edit_Allow"])){
        $Edit='off';
      }
      else {
        $Edit="1";
      }
      if (!isset($_POST['Stud_ErrorLog_Allow'])){
        $ErrorLog='off';
      }
      else {
        $ErrorLog='1';
      }

            global $pdo;
            $query=$pdo->prepare("UPDATE `settings` SET `setting_value` =:signIn WHERE `settings`.`setting_name` = 'Stud_LogIn_Allow';");
            $query->bindparam(":signIn", $signIn);
            $query->execute();

            $query=$pdo->prepare("UPDATE `settings` SET `setting_value` =:Edit WHERE `settings`.`setting_name` = 'Stud_Edit_Allow';");
            $query->bindparam(":Edit", $Edit);
            $query->execute();

            $query=$pdo->prepare("UPDATE `settings` SET `setting_value` =:ErrorLog WHERE `settings`.`setting_name` = 'Stud_ErrorLog_Allow';");
            $query->bindparam(":ErrorLog", $ErrorLog);
            $query->execute();
            
            $query=$pdo->prepare("UPDATE `settings` SET `setting_value` =:DeadlineDate WHERE `settings`.`setting_name` = 'Deadline_Date';");
            $query->bindparam(":DeadlineDate", $DeadlineDate);
            $query->execute();
            
            $query=$pdo->prepare("UPDATE `settings` SET `setting_value` =:DeadlineTime WHERE `settings`.`setting_name` = 'Deadline_Time';");
            $query->bindparam(":DeadlineTime", $DeadlineTime);
            $query->execute();

            $query=$pdo->prepare("UPDATE `settings` SET `setting_value` =:MaxChar WHERE `settings`.`setting_name` = 'Max_MemMoment_Char';");
            $query->bindparam(":MaxChar", $MaxChar);
            $query->execute();

            $query=$pdo->prepare("UPDATE `settings` SET `setting_value` =:SlideTime WHERE `settings`.`setting_name` = 'Slide_Time';");
            $query->bindparam(":SlideTime", $SlideTime);
            $query->execute();
            
          
            if(isset($_FILES['csvUpload']) && $_FILES['csvUpload']['error'] == 0){
              
            $file = fopen($_FILES['csvUpload']['tmp_name'],"r");
            $studs = [];

            while ($row = fgetcsv($file)) {
                if ($row[0] == "stud_num") continue;

                $studNum = $row[0];
                $studEmail = $row[1];
                $studLName = $row[2];
                $studFName = $row[3];
            
                $studs[$studNum]['num'] = $studNum;
                $studs[$studNum]['email'] = $studEmail;
                $studs[$studNum]['Lname'] = $studLName;
                $studs[$studNum]['Fname'] = $studFName;
            }

            foreach ($studs as $s) {
            $query=$pdo->prepare("INSERT INTO `students` (`stud_num`, `stud_email`, `stud_lname`, `stud_fname`) VALUES (:stud_num, :stud_email, :stud_lname, :stud_fname)");
            $query->bindparam(":stud_num", $s['num']);
            $query->bindparam(":stud_email", $s['email']);
            $query->bindparam(":stud_lname", $s['Lname']);
            $query->bindparam(":stud_fname", $s['Fname']);
            $query->execute();
          }
          }
          echo('<meta http-equiv="refresh" content="0.1; URL=\'https://wcss.emmell.org/gradB/adminView/adminTemplate0.php?page=config"/> ');
          }
          
          if (isset($_POST['reset'])){
            $query=$pdo->prepare("TRUNCATE students");
            $query->execute();
            $query=$pdo->prepare("TRUNCATE messages");
            $query->execute();
            $query=$pdo->prepare("TRUNCATE logs");
            $query->execute();
            echo('<meta http-equiv="refresh" content="0.1; URL=\'https://wcss.emmell.org/gradB/adminView/adminTemplate0.php?page=config"/> ');
          }

          if (isset($_POST['Studemail'])){
            $query=$pdo->prepare("INSERT INTO `students` (`stud_num`, `stud_email`, `stud_lname`, `stud_fname`) VALUES (:stud_num, :stud_email, :stud_lname, :stud_fname)");
            $query->bindparam(":stud_num", $_POST['Studnum']);
            $query->bindparam(":stud_email", $_POST['Studemail']);
            $query->bindparam(":stud_lname", $_POST['Studlname']);
            $query->bindparam(":stud_fname", $_POST['Studfname']);
            $query->execute();
            echo('<meta http-equiv="refresh" content="0.1; URL=\'https://wcss.emmell.org/gradB/adminView/adminTemplate0.php?page=config"/> ');
          }


          if (isset($_POST['AdminEmail'])){
            $query=$pdo->prepare("INSERT INTO `admins` (`admin_name`, `admin_email`) VALUES (:admin_name, :admin_email)");
            $query->bindparam(":admin_name", $_POST['AdminName']);
            $query->bindparam(":admin_email", $_POST['AdminEmail']);
            $query->execute();
            echo('<meta http-equiv="refresh" content="0.1; URL=\'https://wcss.emmell.org/gradB/adminView/adminTemplate0.php?page=config"/> ');
          }

          
          if (isset($_POST['AwardName'])){
            if (!isset($_POST['Award_on']))
              $AwardAlways='0';
            else
              $AwardAlways='1';

            $query=$pdo->prepare("INSERT INTO `awards` (`award_name`, `award_is_always`) VALUES (:award_name, :award_is_always)");
            $query->bindparam(":award_name", $_POST['AwardName']);
            $query->bindparam(":award_is_always", $AwardAlways);
            $query->execute();
            echo('<meta http-equiv="refresh" content="0.1; URL=\'https://wcss.emmell.org/gradB/adminView/adminTemplate0.php?page=config"/> ');
          }

          if (isset($_POST['RemoveAdmin'])){
            $adminRem=$_POST['Aremove'];
            $query=$pdo->prepare("DELETE FROM admins WHERE admin_id = :adminName;");
            $query->bindparam(":adminName", $adminRem);
            $query->execute();
            echo('<meta http-equiv="refresh" content="0.1; URL=\'https://wcss.emmell.org/gradB/adminView/adminTemplate0.php?page=config"/> ');
          }

          if (isset($_POST['RemoveAward'])){
            $awardRem=$_POST['AwardRemove'];
            $query=$pdo->prepare("DELETE FROM awards WHERE award_id = :awardId;");
            $query->bindparam(":awardId", $awardRem);
            $query->execute();
            echo('<meta http-equiv="refresh" content="0.1; URL=\'https://wcss.emmell.org/gradB/adminView/adminTemplate0.php?page=config"/> ');
          }
          
    ?>

<div class = "pageL">

    <H1>Settings</H1><br>


      <form action="" method="POST" enctype="multipart/form-data">

          <p>Students are allowed to sign in</p>
          <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" role="switch" name='Stud_LogIn_Allow' id="flexSwitchCheckDefault"
          <?php
          if($signIn==1){
            echo"checked";
          }
          ?>>
          </div><br>


          <p>Students are allowed to edit</p>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="Stud_Edit_Allow" id="flexSwitchCheckChecked" 
            <?php
            if($Edit==1){
              echo"checked";
            }
            ?>>
          </div><br>


          <p>Students are allowed log errors</p>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name='Stud_ErrorLog_Allow' id="flexSwitchCheckChecked" 
            <?php
            if($ErrorLog==1){
              echo"checked";
            }
            ?>>
          </div><br>


          <p>Deadline:</p>
          <input class="form-control" type="date" placeholder="Default input" name='Deadline_Date' aria-label="default input example" <?php echo"value='".$DeadlineDate."'"; ?>>
          <input class="form-control" type="time" placeholder="Default input" name='Deadline_Time'aria-label="default input example" <?php echo"value='".$DeadlineTime."'"; ?>><br>


          <p>max # of char for the memorable moments:</p>
          <input class="form-control" type="int" name='Max_MemMoment_Char' <?php echo"value='".$MaxChar."'"; ?>><br>


          <p>Time inteval for photos:</p>
          <input class="form-control" type="int" name='Slide_Time' <?php echo"value='".$SlideTime."'"; ?>><br>
</div>
<div class='pageR'>


          <p>Manage Students:</p>
          <div class="mb-3">
          <input class="form-control" type="file" id="formFile" name='csvUpload' >
          </div>


          <button type="button" class="btn btn-primary" onclick='OpenModal("Addstud")'>Add new Student</button>
          <br><br><br>


          <p>Manage Admins:</p>
          <select class="form-select s-select Testin " id = "adminSelect" name="Aremove" >
            <?php
            echo"<br>";
            foreach ($admins as $a) {
              echo"<option value=".$a['admin_id'].">".$a['admin_name']."</option>";
            }
            ?> </select>
          <button type="submit" name='RemoveAdmin' class="btn btn-secondary">Remove Admin</button><br><br>


          <button type="button" class="btn btn-primary" onclick='OpenModal("adminAdd")' >Add Admin</button>
          <br><br><br>


          <p>Manage Preset Awards:</p>
          <select class="form-select s-select Testin " id = "award" name="AwardRemove" 
            <?php
            echo "<br>";
            foreach ($awards as $a) {
              echo"<option value=".$a['award_id'].">".$a['award_name']."</option>";
            }
            ?> >
            </select>
          <button type="submit" name="RemoveAward" class="btn btn-secondary" >Remove Preset Award</button><br><br>


          <button type="button" class="btn btn-primary"  onclick='OpenModal("AddAward")'  >Add Preset Award</button>
          <br><br><br>


          <button type="submit" id="test" class="btn btn-success" >Save</button>

          
          <button type="button" class="btn btn-danger"  onclick='OpenModal("ResetWarning")' name='reset'>Reset all Data</button>
      </form>


            <!-- Adding New Student Modal -->
            <div class='modal fade'  tabindex='-1' role='dialog'  aria-hidden='true' id='Addstud'>
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <h5 class='modal-title'>Add a new Student</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
            
            <form action='' method='POST' id='studAdd'>
            
            First Name:<br> <input type='text' name='Studfname' ><br><br>

              Last Name:<br> <input type='text' name='Studlname' ><br><br>

            Student Number:<br><input type='text' name='Studnum'><br><br>

             Student Email:<br> <input type='text' name='Studemail' >
            
            </div>
            <div class='modal-footer'>
            <input type='submit' value='Submit' class='btn btn-success' id='modalSubmit'>
            </form>
            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
            </div></div></div></div>


              <!--Adding New Admin Modal -->
            <div class='modal fade'  tabindex='-1' role='dialog'  aria-hidden='true' id='adminAdd'>
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <h5 class='modal-title'>Add a new Admin</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
            
            <form action='' method='POST' id='modalForm'>
            
            Admin Name:<br> <input type='text' name='AdminName' ><br><br>

            Email:<br> <input type='text' name='AdminEmail' ><br><br>
            
            </div>
            <div class='modal-footer'>
            <input type='submit' value='Submit' class='btn btn-success' id='modalSubmit'>
            </form>
            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
            </div></div></div></div>

            
            <!-- Adding new Preset Award Modal -->
            <div class='modal fade'  tabindex='-1' role='dialog'  aria-hidden='true' id='AddAward'>
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <h5 class='modal-title'>Add a new Award</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>

            <form action='' method='POST' id='modalForm'>
            
            Award Name:<br> <input type='text' name='AwardName' ><br><br>

            Always on: <input class="form-check-input" type="checkbox" role="switch" name='Award_on' id="flexSwitchCheckChecked" >

            </div>
            <div class='modal-footer'>
            <input type='submit' value='Submit' class='btn btn-success' id='modalSubmit'>
            </form>
            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
            </div> </div> </div></div>


              <!-- Reset Confirmation Modal -->
            <div class='modal fade'  tabindex='-1' role='dialog'  aria-hidden='true' id='ResetWarning'>
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <h5 class='modal-title'>Reset Data</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>

            <form action='' method='POST' id='modalForm'>

            WARNING THIS WILL RESET ALL STUDENT DATA ARE YOU SURE?

            </div>
            <div class='modal-footer'>
            <input type='submit' value='Confirm' class='btn btn-success' name='reset' id='modalSubmit'>
            </form>
            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancel</button>
            </div> </div> </div></div>

</div>
</div>

<script>
   function OpenModal(ModalName){
            var myModal = new bootstrap.Modal(document.getElementById(ModalName));
            myModal.show();
        }
</script>