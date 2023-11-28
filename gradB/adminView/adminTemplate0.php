<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="adminStyling.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <script src="https://cdn.tiny.cloud/1/t03uf5ormjh22cia4fb49getjm982kfb7ddhy8izfr6o9zpf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  </head>

  <body>
    
    <?php 
        require ("../functions.php");
        admin_Auth();
        include 'adminTemplate.php';  

        $slides = getSlides();
    ?>

    <?php
        if(isset($_POST['slideName'])) {
            insertSlide($_POST['slideName'], "", 0, 0);
        }

        if(isset($_POST['deleteSlideId'])) {
            deleteExistingSlide($_POST['deleteSlideId']);
        }

        if(isset($_POST['longName']) || isset($_POST['shortName'])) {
            insertShow($_POST['longName'], $_POST['shortName']);
        }

        else if(isset($_POST['showId'])) {
            deleteExistingShow($_POST['showId']);
        }

        if (isset($_GET['page'])){
            $page=$_GET['page'];

            if ($page=='studList'){
                include "adminStudList.php";
            }
            else if ($page=='student'){
                include "adminSpefStud.php";
            }
            else if ($page=='uploadPhotos'){
                include "adminPhotoUpload.php";
            }
            else if ($page=='matchUploadedPhotos') {
                include "photoUploadScript.php";
            }
            else if ($page=='resizePhotos'){
                include "adminPhotoSize.php";
            }
            else if ($page=='missingPhotos'){
                include "adminMissingPhotos.php";
            }
            else if ($page=='cachePhotos'){
                include "adminCachePhotos.php";
            }
            else if ($page=='manageShows'){
                include "adminManageShows.php";
            }
            else if ($page=='manageSpecificShows'){
                include "adminSpecificShows.php";
            }
            else if ($page=='slideEdit') {
                include "adminSlideEdit.php";
            }
            else if ($page=='slideshow'){
                include "adminSlides.php";
            }
            else if ($page=='logs'){
                include "adminLog.php";
            }
            else if ($page=='config'){
                include "systemConfig.php";
            }
            else if ($page=='awards'){
                include "adminBulkAdd.php";
            }
        }
        else{
            include "adminDash.php";
            
        }
    ?>

    <!-- START OF JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
    <!-- ADD ANY ADDITIONAL JAVASCRIPT BELOW HERE -->

    <script>
        tinymce.init({
            selector: '#slideEditInput',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | code wordcount',
            height: 1080
        });

    tinymce.init({
        selector: '#stud_mem_moment',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | code wordcount',
    });

    

        $(document).ready(function(){
            $('#adminStudSaveButton').click(function(e){

                e.preventDefault();
                tinymce.triggerSave();
                $.ajax({
                    method: "post",
                    url: "adminFormProcess.php",
                    data: $('#studentDataForm').serialize(),
                    dataType: "text",
                    success: function (response){
                        $('#displayMessage').text(response);
                        }

                });
            });
            
        
            
        });

        // Using JQUERY AJAX to submit slide name and slide HTML to the database
        $(document).ready(function() {
            var editSlideNameInput = document.getElementById("editSlideNameInput");
            var emptySlideNameAlert = document.getElementById("emptySlideNameAlert");
            var savedEditSlideAlert = document.getElementById("savedEditSlideAlert");

            $('#saveEditSlideButton').click(function(e) {            
                e.preventDefault();
                tinymce.triggerSave();

                if(editSlideNameInput.value == "") {
                    emptySlideNameAlert.style.display = "block";
                }

                else {
                    $.ajax({
                        method: "POST",
                        url: "adminSlideProcess.php",
                        data: $('#editSlide').serialize(),
                        dataType: "text",
                    });

                    emptySlideNameAlert.style.display = "none";
                    savedEditSlideAlert.style.display = "block";

                    setTimeout(() => {
                        savedEditSlideAlert.style.display = "none";
                    }, 4000);
                }
            });  
        });

        $(document).ready(function(){
        $('#button-addon2').click(function(e){ 
            
            e.preventDefault();
            $("#scholDiv").append('<div class="row scholDiv"><div class="col input-group"><input type="text" class="inputForm" placeholder="Enter your scholarship..." name="scholarship[]" aria-describedby="button-addon2" id="addSchol"><button class="btn btn-danger" type="button" id="button-addon3">-</button></div></div>');               

        
        });
        $(document).on('click', '#button-addon3', function(e){
            e.preventDefault();
            let myItem= $(this).parent().parent();
            $(myItem).remove();
        });

        


        });

        function showModal(){
            var myModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            myModal.show();
        }

        

    
    </script>

</body>

</html>