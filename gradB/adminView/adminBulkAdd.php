<title>Awards</title>
<div class = "page p-3">

<?php
global $pdo;
    $query= $pdo->prepare("SELECT * FROM awards");
    $query->execute();
    $awards=$query->fetchALL(PDO::FETCH_ASSOC);
?>


<h1>Bulk Add Awards</h1><br>
<h4>Please choose an option</h4>

<form action="" method="POST">

<select class="form-select s-select Testin " onchange="CheckSelect()" id = "Selectype" name="selectBox" >
          
          <option value="set">Preset Award</option>
          <option value="custom">Custom Award</option>
</select> 

          <select class="form-select s-select Testin " id = "Awards" name="selectt" >
         
            <?php
            foreach ($awards as $a) {
              if($a['award_is_always']==0)
              echo'<option value="'.$a['award_name'].'">'.$a['award_name'].'</option>';
            }?>

          </select> <br> <br>

<h6>When adding preset awards please type in the student numbers seperated by a newline.</h6>
<h6>If you are adding custom awards however please use the following format: studNum, awardName </h6>
<textarea name='input' id='textbox' rows="5" cols="75"></textarea>
<br><br>
<button type="button" class="btn btn-success" onclick="processInfo()" name='award'>Add Awards</button>
</form>
</div>


<div class='modal fade'  tabindex='-1' role='dialog'  aria-hidden='true' id='AwardConfirm'>
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <h5 class='modal-title'>Confirmation</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>

            <div class="modal-body" id="editBody">

            </div>
           
            <div class="modal-footer">
            <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Close</button>
            
            </div>
            </div>
            </div>
        </div>



<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


  <script>

  function processInfo() {
  		var myModal = new bootstrap.Modal(document.getElementById('AwardConfirm'));
      var text = document.getElementById("textbox").value;
      var type = document.getElementById("Selectype").value;
      var award = document.getElementById("Awards").value;
      var editBody = document.getElementById("editBody");

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

          editBody.innerHTML = this.responseText;
              myModal.show();
          }

      };
      xhttp.open("GET", "adminBulkAddAjax.php?text="+JSON.stringify(text)+"&type="+type+"&award="+award); 
      
      xhttp.send();
    }
    
function CheckSelect(){
  var Sloption= document.getElementById("Selectype");
  var AwrdsSelect= document.getElementById("Awards");
  if (Sloption.value == 'custom'){
                 AwrdsSelect.disabled= true;  
                }
  else{
    AwrdsSelect.disabled= false; 
  }
}
</script>