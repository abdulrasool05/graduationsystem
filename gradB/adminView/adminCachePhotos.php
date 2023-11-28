<?php
    $extractionDir = "../studPics/";
    $fileList = scandir($extractionDir);
    unset($fileList[0]);
    unset($fileList[1]);
?>

<title>Pre-Cache Photos</title>

<div class="page p-3">
    <h1>Pre-Cache Photos</h1>

    <!-- WARNING ALERT -->
    <div class="alert alert-warning" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>

        Please wait until all photos are loaded to pre-cache them.
    </div>

    <!-- PRE-CACHE PICTURES SECTION -->
    <div class="rounded-3 preCacheTable">
        <?php
            // Foreaching through all photos in studPics file and printing them on screen
            foreach($fileList as $currentFile) {
                echo "<img src='../studPics/".$currentFile."' width='100px'>\n";
            }
        ?>
    </div>
</div>