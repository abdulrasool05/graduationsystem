<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <style>
      body{
        background-color: #BEB9AA;
      }
      .outLine{
        background-color: #E9ECE8;
        margin: auto;
        margin-top: 25px;
        width: 750px;
        height: 800px;
        border-radius: 12px;
        padding: 5px;
        text-align: center;
      }
      h1{
        text-align: center;
      }
      .Middle{
        position: absolute;
        left: 600px;
        top: 250px;
      }
      .p{
        margin: auto;
        width: 50%;
        text-align: center;
      }
      button{
        margin-top: 50px;
      }
      .date{
        margin: auto;
        width: 50%;
        text-align: center;
      }
      .forum{
        position: absolute;
        width: 650px;
        top: 400px;
        left:25px;
      }
      img {
        width: 250px;
    }
    </style>

    <title>Landing Page</title>
  </head>

  <body>

  <?php
    require_once("functions.php");
    if (isset($_GET['login'])) {            
    redirect();
    }

    if (isset($_POST['subEmail'])){
      $email=strip_tags($_POST['subEmail'], "");
      $prob=strip_tags($_POST['subProb'], "");
      adminLogs(1, 3, -1,$email);
      insertMessage($email, $prob, -1);
    }

    $value=getSetting('Deadline_Date');
    $Deadline = $value['setting_value'];
    $value=getSetting('Deadline_Time');
    $DeadlineTime= $value['setting_value'];
  ?>

<div class='outLine justify-content-center'>
  <h1>West Carleton Secondary School Gradution Website</h1><br><br>

                <img  src="studentView/studentStylingImages/mascot.png" alt='w'></img>
                
<p class='p'>Hello, please use the login button below to login to your google account.</p>
<p class='p'>If you require any help or having problems press the report issue button and fill out the form.</p>
<h3 class='p'>Deadline</h3>
<h2 class='date'><?php print_r($Deadline);echo" "; print_r($DeadlineTime); ?></h2>
<div class='d-flex align-items-center justify-content-center'>
<div class="btn-group" role="group" aria-label="Basic example">
<form action="" method="GET" >
<button type="submit" class="btn btn-primary" name='login'>Log in</button>
</form>

<?php
$value=getSetting('Stud_ErrorLog_Allow');
$logStatus= $value['setting_value'];
if($logStatus==1){?>
<button type="button" class="btn btn-danger" onclick='ReportModal()'>Report issue</button>
<?php 
}
else{ ?>
<button type="button" class="btn btn-secondary" >Report issue</button>
<?php
}
?>
</div></div></div>


  <div class='modal fade'  tabindex='-1' role='dialog'  aria-hidden='true' id='ReportModal'>
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <h5 class='modal-title'>Report a Problem</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                <form action="" method="POST">
                <div class="col-md-6">
                <div class="col-12">
                <label for="inputemail" class="form-label">Email</label>
                <input type="email"  name='subEmail' class="form-control" id="inputemial" placeholder="example@gmail.com">
                </div>
                <br>
                <div class="col-12">
                <label for="inputProb" class="form-label">Problem</label>
                <input type="text" name='subProb' class="form-control" id="inputProb" placeholder="Cant log in, Forgot password, etc.">
                </div>
                <br>
                      
            </div>
            <div class='modal-footer'>
            <input type='submit' value='Submit' class='btn btn-success' id='modalSubmit'>
            </form>
            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>

            </div></div></div></div>


  <script src="https://code.jquery.com/jquery-3.6.1.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.js" crossorigin="anonymous"></script>

<script>

function ReportModal(){
            var myModal = new bootstrap.Modal(document.getElementById('ReportModal'));
            myModal.show();
        }
</script>
</body>
</html>