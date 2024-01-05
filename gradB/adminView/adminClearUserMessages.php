<?php
    require ("../functions.php");
    $studId = $_GET['id'];

    deleteUserMessages($studId);

    header("Location: adminTemplate0.php?page=student&id=".$studId); // redirects back to specific student page
?>