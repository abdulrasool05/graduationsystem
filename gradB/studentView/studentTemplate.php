<!DOCTYPE html>

<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="adminStyling.css" rel="stylesheet" type="text/css">
        <link href="studentStyling.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="../favicon.ico">
        <script src="https://cdn.tiny.cloud/1/t03uf5ormjh22cia4fb49getjm982kfb7ddhy8izfr6o9zpf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        
        <title>Graduation Slideshow</title>
    </head>
    
    <?php
        require ("../functions.php");
    ?>

    <body>

        <nav class="navbar navbar-expand-lg bg-body-tertiary navbarColour">
            <div class="container-fluid collapse navbar-collapse d-flex justify-content-center">
                <div id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item navItems">
                        
                        <a class="nav-link fw-bold " aria-current="page" href="studentTemplate.php?page=studDashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                        </svg>
                        </a>
                        
                        </li>
                        
                        
                        <?php 
                        //Checking if editing is allowed
                        $studentEdit=getSetting('Stud_Edit_Allow');
                        if ($studentEdit['setting_value']==1){ 
                        ?>
                        
                        <li class="nav-item navItems">
                        <a class="nav-link fw-bold fs-5 w-100" href="studentTemplate.php?page=studInput">Edit Slide</a>
                        </li>
                        <?php } ?>

                        <li class="nav-item navItems">
                        <a class="nav-link fw-bold fs-5 w-100" href="studentTemplate.php?page=studentSlideView">Preview</a>
                        </li>
                        <li class="nav-item navItems">
                        <a class="nav-link fw-bold fs-5 w-100" onclick="showModal(1)">Report</a>
                        </li>
                        <li class="nav-item align-right">
                            <a class="nav-link fw-bold" href="#" onclick="showModal(2)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                            </a>
                        </li>
                        
                    </ul>    
                </div>
            </div>
        </nav>
        

        <div class="modal fade" id="logoutConfirm" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>

                    <div class="modal-footer">
                        <a href="../logout.php" class="btn btn-success" role="button">Yes</a>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="alert alert-warning" role="alert" id='deadlineWarning'>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
            </svg>
            
            <?php
                $deadLineDate=getSetting("Deadline_Date");
                $deadLineTime=getSetting("Deadline_Time");

                echo $deadLineDate['setting_value'].  " "  .$deadLineTime['setting_value'];
            ?>

        </div>
        
        <?php
            stud_Auth();
            
            //getting current student's information
            
            $studEmail=getEmail();
            $studInfo=getStud($studEmail); 
            $studId= $studInfo[0]['stud_id'];
            $studNum=$studInfo[0]['stud_num'];
            $memMoment=$studInfo[0]['stud_mem_moment'];
            $scholarshipCoded=$studInfo[0]['stud_scholarships'];
            $scholarship=json_decode($scholarshipCoded,true);
            $futPlansCoded=$studInfo[0]['stud_future_plans'];
            $futPlans=json_decode($futPlansCoded);
            $studFname=$studInfo[0]['stud_fname'];
            $studLname=$studInfo[0]['stud_lname'];
            
            //Determining what page user is directed to
            if (isset($_GET['page'])){
                $page=$_GET['page'];

                if ($page=='studInput'){
                    include "studentInput.php";
                }
                else if ($page=='studDashboard'){
                    include "studentDash.php";
                }
                else if ($page=='studentSlideView'){
                    include "studentSlideView.php";
                }
                else if ($page=='reportModal'){
                    include "reportModal.php";
                }
                
            }
            else{
                include "studentDash.php"; 
            }

            //Report error Modal
            echo "<div class='modal fade'  tabindex='-1' role='dialog'  aria-hidden='true' id='reporter'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title'>Report Error</h5>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
            echo "</div>";
            echo "<div class='modal-body'>";
        
                //Form to report error
                echo "<ul>";
                echo "<form action='' method='POST' id='modalForm'>";
                echo "<input name='studName' id='errorName' class='form-control' value='".$studFname." ".$studLname."' disabled>"; 
                echo "<input type='text' name='email' value=".$studEmail." id='emailHolder' class='form-control' disabled>";
                echo "<textarea name='error' id='errorMessage' placeholder='Type in your error...' class='form-control'></textarea>";    
                echo "</ul>";
                
                
                echo "<div class='alert alert-success role='alert' id='savedAlert'>";
                echo "Successfully Saved!";
                echo "</div>";

            
                echo "<div class='alert alert-danger' role='alert' id='dangerAlert'>";
                echo "Something must be entered in the error field";
                echo "</div>";
                        
                echo "</div>";
                echo "<div class='modal-footer'>";
                echo "<input type='submit' value='Submit' class='btn btn-success' id='modalSubmit'>";
                echo "</form>";
                echo "<button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>";
            

            echo "</div>";
            
            echo "</div>";
            echo "</div>";
        
            echo "</div>";
            
        ?>


        <!-- START OF JAVASCRIPT -->
        <script src="https://code.jquery.com/jquery-3.6.1.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
        

        <!-- ADD ANY ADDITIONAL JAVASCRIPT BELOW HERE -->

        <script>

            function characterCount(){
                const wordCount = tinymce.activeEditor.plugins.wordcount;
                alert(wordcount.body.getCharacterCountWithoutSpaces());
            }

            function showModal(modalNum){
                if (modalNum==1){
                    var myModal = new bootstrap.Modal(document.getElementById('reporter'));
                }
                else if (modalNum==2){
                    var myModal = new bootstrap.Modal(document.getElementById('logoutConfirm')); 
                }
                myModal.show();
            }
            

            function feedbackAlert(){
                var errorMessage= document.getElementById('errorMessage');
                var savedAlert=document.getElementById('savedAlert');
                var errorAlert=document.getElementById('dangerAlert');
                
                //if an error is entered clear input fields and show success alert
                if (errorMessage.value != ''){
                    savedAlert.style.display="block";
                    
                    errorMessage.value='';

                    setTimeout(() => {
                    savedAlert.style.display="none";
                    }, 4000);
                }
                //if nothing is entered give an error alert
                else{
                    errorAlert.style.display="block"; 
                    
                    setTimeout(() => {
                    errorAlert.style.display="none";
                    }, 4000);
                }
                
            }
        
            tinymce.init({
            selector: '#memorableMoment',
            plugins: 'anchor autolink charmap emoticons lists searchreplace visualblocks wordcount advlist visualchars ',
            height: 300,
            menu: 
                {
                    file: { title: 'File', items: ' preview | export print' },
                    edit: { title: 'Edit', items: 'undo redo | cut copy | selectall | searchreplace' },
                    view: { title: 'View', items: '' },
                    insert: { title: 'Insert', items: ' charmap emoticons hr | pagebreak nonbreaking  tableofcontents | insertdatetime' },
                    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript | align lineheight  | removeformat' },
                    tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' },
                    help: { title: 'Help', items: 'help' }
                },
            toolbar: 'undo redo | bold italic underline | align | numlist bullist indent outdent',

            setup: function(memorableMoment) {
                var max1 = <?php echo getCharLimit();?>;	 
                var max= max1-1;
                var allowedKeys = [8, 37, 38, 39, 40, 46]; 
                //Not allowing for anything to be pasted
                memorableMoment.on('paste', function(event) {
                    return false;
                });
                memorableMoment.on('keydown', function(event) {
                    if (allowedKeys.indexOf(event.keyCode) != -1) return true;
                    var numChars = tinymce.activeEditor.plugins.wordcount.body.getCharacterCount();
                    var memText=document.getElementById("memorableMoment");
                    
                    if (numChars > max) {
                        memText.value=memText.value.substring(0, max);
                    
                        return false;
                    }

                });
                    
                }
            });
        
            //using AJAX to submit student input form        
            $(document).ready(function(){
                $('#studSave').click(function(e){            
                    e.preventDefault();
                    tinymce.triggerSave();
                    $.ajax({
                        method: "post",
                        url: "studentFormProcess.php",
                        data: $('#studentInputform').serialize(),
                        dataType: "text",
                    });
                });
                
            });

            //using AJAX to submit modal form
            $(document).ready(function(){
                var errorMessage= document.getElementById("errorMessage");
                
                    $('#modalSubmit').click(function(e){
                        e.preventDefault();
                        
                        //Preventing empty saves
                        if (errorMessage.value != ''){
                            $.ajax({
                                method: "post",
                                url: "studentFormProcess.php",
                                data: $('#modalForm').serialize(),
                                dataType: "text",
                            });
                        }
                        feedbackAlert();
                    });     
            });

            
            function successAlert(){
                var popup=document.getElementById('successPopup');
                popup.style.display="block";

                setTimeout(() => {
                    popup.style.display="none";
                }, 4000);
            }

            //Adding scholarship inputs
            $(document).ready(function(){
                $('#addButton').click(function(e){ 
                    e.preventDefault();
                    $("#scholDiv").append('<div class="row scholDiv"><div class="col input-group"><input type="text" class="inputForm form-control" placeholder="Enter your scholarship..." name="scholarship[]" aria-describedby="removeButton" id="addSchol"><button class="btn btn-danger" type="button" id="removeButton">-</button></div></div>');
                });
                $(document).on('click', '#removeButton', function(e){
                    e.preventDefault();
                    let myItem= $(this).parent().parent();
                    $(myItem).remove();
                });
            });
        
        </script>

    </body>

</html>