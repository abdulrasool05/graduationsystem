<?php
        
    $year1=getPhotoDir($studNum, "A");
    $year2=getPhotoDir($studNum, "B");
    $year3=getPhotoDir($studNum, "C");
    $year4=getPhotoDir($studNum, "D");
    $grad=getPhotoDir($studNum, "E");
        
?>


<div class="container">
    
    <div class="row justify-content-center">
    <div id="inputDiv" class="col-10">
    <img id="inputImg" src="studentStylingImages/inputBackground.jpg">


    <div class="row photoRow">
    
        <div class="card studImages col">
        <img src="<?php echo $year1 ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Grade 9</h5>
        </div>
        </div>

        <div class="card studImages col">
        <img src="<?php echo $year2 ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Grade 10</h5>
        </div>
        </div>

        <div class="card studImages col ">
        <img src="<?php echo $year3 ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Grade 11</h5>
        </div>
        </div>

        <div class="card studImages col">
        <img src="<?php echo $year4 ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Grade 12</h5>
        </div>
        </div>


        <div class="card studImages col">
        <img src="<?php echo $grad ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Graduation</h5>
        </div>
        </div>


    </div>


    <div class="row">
        <div class="col text-center">
            <h2 class="headings">Slide Preview</h2>
        </div>
    </div>

    <div class="row justify-content-center">

        <?php
            echo "<div id='wrap' class='col-3'>";
            echo "<iframe src='../show.php?mode=preview&id=".$studId."' title='preview' id='iFrameID'></iframe>";
            echo "</div>";
        ?>
    </div>

    </div>
    </div>
</div>

