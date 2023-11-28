<div class = "page p-3">
    <p class = "d-flex justify-content-center text-dark fw-bold fs-3 w-100">Match Photo Uploads: </p>
        <div class='rounded-3 adminBoxTheme'>
                    <p class = 'fs-3 fw-bold'>Match Photos to Students</p>
                    <p class = 'fs-5 fw-bold'>Status: </p>

<?php

    $fileDirectory = "../uploads/";
    $fileNameFormat = $_POST["photoNameFormat"];
    $photoYear = $_POST["photoYear"];
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $fileTarget = $fileDirectory . basename($_FILES["fileToUpload"]["name"]);
    $uploadStatus = 1;
    $fileType = strtolower(pathinfo($fileTarget, PATHINFO_EXTENSION));

    $studentList = getStudList();

    if ($fileTarget == $fileDirectory) { // if the file does not exist
        echo "No file was uploaded, please upload a file.";
        echo "<br><br><a href = 'adminTemplate0.php?page=uploadPhotos'><button class ='fs-3 fw-bold adminBoxTheme rounded'>Back</button></a>";
        die;
    }

    else if (file_exists($fileTarget)) {
        echo "Sorry, a file with this name already exists.";
        echo "<br><br><a href = 'adminTemplate0.php?page=uploadPhotos'><button class ='fs-3 fw-bold adminBoxTheme rounded'>Back</button></a>";
        die;
    }

    else if ($fileType != "zip") {
    echo "Sorry, only .ZIP files are accepted for Bulk Uploads. Please see the student editor to upload individual images.";
    echo "<br><br><a href = 'adminTemplate0.php?page=uploadPhotos'><button class ='fs-3 fw-bold adminBoxTheme rounded'>Back</button></a>";
    die;
    } 

    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileTarget)) {
            echo "Success, files have been uploaded.<br>";
        }
        else {
            echo "Upload failed.<br>";
            echo "<br><br><a href = 'adminTemplate0.php?page=uploadPhotos'><button class ='fs-3 fw-bold adminBoxTheme rounded'>Back</button></a>";
            die;
        }
    }
    $fileNameExtension = $fileName;
    $fileName = rtrim($fileName, ".zip");

    $tempExtractionDir = '../uploads/temp/';
    $finalExtractionDir = '../studPics/';

    $zipFile = new ZipArchive;

    if ($zipFile -> open('../uploads/'.$fileNameExtension) == TRUE) {
        $zipFile -> extractTo($tempExtractionDir); // extract jpg files from zip
        $zipFile -> close();
    }

    else {
        echo 'extract failed';
        die;
    }

    unlink($fileTarget);

    $fileList = scandir($tempExtractionDir, SCANDIR_SORT_DESCENDING);
    $fileStudentNum = array(); // array to give matched files a student number

    $counter = 1;

    foreach ($fileList as $currentFile) {
        if ($currentFile != '.' && $currentFile != '..') {
            $currentFileName = $tempExtractionDir.$currentFile;
            $fileExtension = pathinfo($currentFileName, PATHINFO_EXTENSION);

            $tempImageSize = getimagesize($currentFileName);

            if ($tempImageSize[0] > $tempImageSize[1]) {
                echo "Image at ".$currentFileName." has incorrect dimensions..."; // when photos do not match portrait dimensions
            }

            // case for every name format (for example lastName_firstName.jpg)
            else {
                if ($fileNameFormat == 'spaceLF') {
                    $fileNameSplit = explode(' ', $currentFile);
        
                    $lastName = $fileNameSplit[0];
                    $firstName = pathinfo($fileNameSplit[1], PATHINFO_FILENAME);
                }
                
                else if ($fileNameFormat == 'spaceFL') {
                    $fileNameSplit = explode(' ', $currentFile);
        
                    $firstName = $fileNameSplit[0];
                    $lastName = pathinfo($fileNameSplit[1], PATHINFO_FILENAME);
                }
        
                else if ($fileNameFormat == 'underscoreLF') {
                    $fileNameSplit = explode('_', $currentFile);
        
                    $lastName = $fileNameSplit[0];
                    $firstName = pathinfo($fileNameSplit[1], PATHINFO_FILENAME);
                }
        
                else if ($fileNameFormat == 'underscoreFL') {
                    $fileNameSplit = explode('_', $currentFile);
        
                    $firstName = $fileNameSplit[0];
                    $lastName = pathinfo($fileNameSplit[1], PATHINFO_FILENAME);
                }
                
                else if ($fileNameFormat == 'commaSpaceLF') {
                    $fileNameSplit = explode(', ', $currentFile);
        
                    $lastName = $fileNameSplit[0];
                    $firstName = pathinfo($fileNameSplit[1], PATHINFO_FILENAME);
                }    
        
                else if ($fileNameFormat == 'commaSpaceFL') {
                    $fileNameSplit = explode(', ', $currentFile);
        
                    $firstName = $fileNameSplit[0];
                    $lastName = pathinfo($fileNameSplit[1], PATHINFO_FILENAME);
                }
        
                $currentStudent = getStudId($firstName, $lastName);

                if(isset($currentStudent[0]['stud_num'])) { // if there is a student-image match
                    $currentStudentNum = $currentStudent[0]['stud_num'];
                    $fileStudentNum[$counter] = $currentStudentNum;
                }
            }
        }

        $counter++;
    }

    echo "<br><br>";

    $counter = 1;


    echo "<form id='photoNameUploadForm' action='photoRenameScript.php' method='POST'>";

    echo "<input type='hidden' name='photoYear' value='".$photoYear."'>";
    echo "<table>";

    foreach ($fileList as $currentFile) { // display all photos uploaded, and give user the option to change them to any other student in option input field
        if ($currentFile != '.' && $currentFile != '..') {
            echo "<tr>";
            
            echo "<td>";
                echo $currentFile;
            echo "</td>";
                
            echo "<td>";
            
            echo "<select name='fileSelectionField[]'>";
                if (isset($fileStudentNum[$counter])) { // if photo has a match to a student
                    echo "<option value ='".$fileStudentNum[$counter]."'>";
                    echo "Match - ".getStudName($fileStudentNum[$counter]);
                    echo "</option>";
                }

                    foreach ($studentList as $currentStudent) {
                        echo "<option value ='".$currentStudent['stud_num']."'>";
                        echo $currentStudent['stud_fname']." ".$currentStudent['stud_lname'];
                        echo "</option>";
                    }
                
            echo "</select>";

            echo "</td>";

            echo "</tr>";

        }

        $counter++;
    }

    echo "</table>";
    echo "<input type='submit' value='Rename' name='send' id='photoNameUploadButton' class='btn btn-success'>";
    echo "</form>";
    echo "<br><br><a href = 'adminTemplate0.php?page=uploadPhotos'><button class ='fs-3 fw-bold adminBoxTheme rounded'>Back</button></a>";

?>
