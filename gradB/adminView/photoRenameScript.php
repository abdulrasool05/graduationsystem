<?php
$tempExtractionDir = '../uploads/temp/';
$finalExtractionDir = '../studPics/';
$photoYear = $_POST["photoYear"];

$fileList = scandir($tempExtractionDir, SCANDIR_SORT_DESCENDING);

$counter = 0;

foreach ($fileList as $currentFile) {
    if ($currentFile != '.' && $currentFile != '..') {

        $currentStudentNum = $_POST['fileSelectionField'][$counter];
        $currentFileName = $tempExtractionDir.$currentFile;
        $fileExtension = pathinfo($currentFileName, PATHINFO_EXTENSION);
        $newFileName = $finalExtractionDir.$currentStudentNum.'_'.$photoYear.'.'.$fileExtension;
        rename($currentFileName, $newFileName);
    }

    $counter++;
}

header("Location: adminTemplate0.php?page=uploadPhotos"); //redirect back to photo upload page when done
?>