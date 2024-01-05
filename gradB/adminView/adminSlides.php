<?php
    $students = getStudList();
    $shows = getShowList();
?>

<title>Slideshow Settings</title>

<div class="page p-3">
    <h1>Slideshows</h1>

    <button type="button" class="btn btn-primary" onclick="clickShow(0, 0)">Full Show</button>

    <?php
        $showsCounter = 1;

        // Foreaching through all shows and displaying them on a button
        foreach($shows as $s) {
            echo "<button class='btn btn-primary' onclick='clickShow(".$showsCounter.", 0)'>".$s['show_long_name']."</button>\n";

            $showsCounter++;
        }
    ?>
</div>

<script>
    // Function for determining which show is clicked
    function clickShow(num, id) {
        if(num == 0) {
            window.open("../show.php?mode=fullShow&id=" + id, "fullShow", "width=500,height=500");
        }

        else if(num > 0) {
            window.open("../show.php?mode=spefShow&id=" + id, "spefShow", "width=500,height=500");
        }
    }
</script>