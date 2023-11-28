<?php
require ("../functions.php");

$studNum = $_POST['num'];
$studId = $_POST['id'];
$fileDirectory = "../uploads/temp/";

// section below checks for which year's file was uploaded. If not uploaded, the response returns error 4, else 0.
if ($_FILES['yearA']['error'] == 0) {
    $photoYear = 'A';
    $fieldName = 'yearA';
}
else if ($_FILES['yearB']['error'] == 0) {
    $photoYear = 'B';
    $fieldName = 'yearB';
}
else if ($_FILES['yearC']['error'] == 0) {
    $photoYear = 'C';
    $fieldName = 'yearC';
}
else if ($_FILES['yearD']['error'] == 0) {
    $photoYear = 'D';
    $fieldName = 'yearD';
}
else if ($_FILES['yearE']['error'] == 0) {
    $photoYear = 'E';
    $fieldName = 'yearE';
}
else { // if no file was uploaded, go back to specific student page
    header("Location: adminTemplate0.php?page=student&id=".$studId);
}

$fileName = basename($_FILES[$fieldName]["name"]);
$fileTarget = $fileDirectory . basename($_FILES[$fieldName]["name"]);
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

else if ($fileType != "jpg") {
  echo "Sorry, only .jpg files are accepted for individual uploads. Please see the student editor to upload photos in bulk as zip.";
  echo "<br><br><a href = 'adminTemplate0.php?page=uploadPhotos'><button class ='fs-3 fw-bold adminBoxTheme rounded'>Back</button></a>";
  die;
} 

else {
    if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $fileTarget)) {
        echo "Success, files have been uploaded.<br>";
    }
    else {
        echo "Upload failed.<br>";
        echo "<br><br><a href = 'adminTemplate0.php?page=uploadPhotos'><button class ='fs-3 fw-bold adminBoxTheme rounded'>Back</button></a>";
        die;
    }

}

$finalExtractionDir = '../studPics/';
$newFileName = $finalExtractionDir.$studNum.'_'.$photoYear.'.jpg';

rename($fileTarget, $newFileName);

header("Location: adminTemplate0.php?page=student&id=".$studId); // redirect to student page after done upload

?>