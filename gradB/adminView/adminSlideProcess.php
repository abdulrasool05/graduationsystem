<?php
    require("../functions.php");

    if(isset($_POST['slideId']) || isset($_POST['editSlideName']) || isset($_POST['slideHTML'])) {
        updateSlideHTML($_POST['slideId'], $_POST['editSlideName'], $_POST['slideHTML']);
    }
?>