<?php
    require("functions.php");

    $students = getEnabledStud();
    $preSlides = getPreSlides();
    $postSlides = getPostSlides();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="showStyling.css">
        <title>Slideshow</title>
    </head>
    <body>
        <?php
            $mode = $_GET['mode'];
            $id = $_GET['id'];
            //$photo = getPhotoDir("S338563687", "E");

            if(isset($mode) && isset($id)) {
                if($mode == "fullShow") {
                    //$currentStudent = getCurrentStudent($id);
                    //echo $currentStudent[0]['stud_num'];
                    //$year1 = getPhotoDir($studNum, "E");

                    echo "<div id='preAndPostSlides'>\n";
                    echo "<p id='slideHTML'></p><br>\n";
                    echo "</div>\n";

                    echo "<div id='studentSlides'>\n";
                    echo "<div class='nameAndWolf'>\n";
                    echo "<p id='name'></p>\n";
                    echo "<img src='studentView/studentStylingImages/mascot.png' alt='wolf' class='wolf'></img>\n";
                    echo "</div>\n";
                    echo "<div class='col' style='background: blue;'>.</div>\n";

                    //echo $photo;
                    echo "<p class='title'>Awards</p>\n";
                    echo "<span class='bullet'>\n";
                    echo "<ul><li><p class='info' id='awards'></p></li></ul><br>\n";
                    echo "</span>\n";

                    echo "<p class='title'>Scholarships</p>\n";
                    echo "<span class='bullet'>\n";
                    echo "<ul><li><p class='info' id='scholarships'></p></li></ul><br>\n";
                    echo "</span>\n";

                    echo "<p class='title'>Future Plans</p>\n";
                    echo "<span class='bullet'>\n";
                    echo "<ul><li><p class='info' id='futurePlans'></p></li></ul><br>\n";
                    echo "</span>\n";

                    echo "<div class='col' style='background: red;'>.</div>\n";
                    echo "<p class='title'>Memorable Moments</p>\n";
                    echo "<p class='info' id='memMoment'></p><br>\n";
                    echo "<div>\n";
                }

                else if($mode == "preview") {
                    $spefStud = getSpefStudById($id);
                    showSpefStud($spefStud);
                }

                else if($mode == "spefShow") {
                    echo "<div id='preAndPostSlides'>\n";
                    echo "<p id='slideHTML'></p><br>\n";
                    echo "</div>\n";

                    echo "<div id='studentSlides'>\n";
                    echo "<div class='nameAndWolf'>\n";
                    echo "<p id='name'></p>\n";
                    echo "<img src='studentView/studentStylingImages/mascot.png' alt='wolf' class='wolf'></img>\n";
                    echo "</div>\n";
                    echo "<div class='col' style='background: blue;'>.</div>\n";

                    echo "<p class='title'>Awards</p>\n";
                    echo "<span class='bullet'>\n";
                    echo "<ul><li><p class='info' id='awards'></p></li></ul><br>\n";
                    echo "</span>\n";

                    echo "<p class='title'>Scholarships</p>\n";
                    echo "<span class='bullet'>\n";
                    echo "<ul><li><p class='info' id='scholarships'></p></li></ul><br>\n";
                    echo "</span>\n";

                    echo "<p class='title'>Future Plans</p>\n";
                    echo "<span class='bullet'>\n";
                    echo "<ul><li><p class='info' id='futurePlans'></p></li></ul><br>\n";
                    echo "</span>\n";

                    echo "<div class='col' style='background: red;'>.</div>\n";
                    echo "<p class='title'>Memorable Moments</p>\n";
                    echo "<p class='info' id='memMoment'></p><br>\n";
                    echo "<div>\n";
                }

                else if($mode == "spefStud") {
                    $spefStud = getSpefStudById($id);
                    showSpefStud($spefStud);
                }
            }
        ?>

        <script>
            var studentsArray = <?php echo json_encode($students); ?>;
            var preSlidesArray = <?php echo json_encode($preSlides); ?>;
            var postSlidesArray = <?php echo json_encode($postSlides); ?>;
            var currentStudent = -1;
            var currentPreSlide = -1;
            var currentPostSlide = -1;
            var currentStage = 1;
            var studentsLength = 0;
            var preSlidesLength = 0;
            var postSlidesLength = 0;

            // Function for displaying student slide
            function displayStudentSlide(student) {
                document.getElementById("preAndPostSlides").style.display = "none";
                document.getElementById("studentSlides").style.display = "block";

                document.getElementById("name").innerHTML = student['stud_fname'] + " " + student['stud_lname'];
                document.getElementById("awards").innerHTML = student['stud_awards'];
                document.getElementById("scholarships").innerHTML = student['stud_scholarships'];
                document.getElementById("futurePlans").innerHTML = student['stud_future_plans'];
                document.getElementById("memMoment").innerHTML = student['stud_mem_moment'];
            }

            // Function for displaying surrounding slide
            function displaySurroundSlide(slide) {
                document.getElementById("studentSlides").style.display = "none";
                document.getElementById("preAndPostSlides").style.display = "block";

                document.getElementById("slideHTML").innerHTML = slide['surround_html'];
            }

            document.addEventListener("keydown", (event) => {
                studentsLength = studentsArray.length;
                preSlidesLength = preSlidesArray.length;
                postSlidesLength = postSlidesArray.length;

                if(currentStage == 1) {
                    if(event.code == "ArrowRight") {
                        if(currentPreSlide == preSlidesLength - 1) {
                            currentStage++;
                            currentStudent++;

                            displayStudentSlide(studentsArray[currentStudent]);
                        }

                        else {
                            currentPreSlide++;

                            if(currentPreSlide < 0) {
                                currentPreSlide = 0;
                            }

                            else {
                                displaySurroundSlide(preSlidesArray[currentPreSlide]);
                            }
                        }
                    }

                    else if(event.code == "ArrowLeft") {
                        if(currentPreSlide == 0) {
                            displaySurroundSlide(preSlidesArray[currentPreSlide]);
                        }

                        else {
                            currentPreSlide -= 1;

                            displaySurroundSlide(preSlidesArray[currentPreSlide]);
                        }
                    }
                }

                else if(currentStage == 2) {
                    if(event.code == "ArrowRight") {
                        if(currentStudent == studentsLength - 1) {
                            currentStage++;
                            currentPostSlide++;

                            displaySurroundSlide(postSlidesArray[currentPostSlide]);
                        }

                        else {
                            currentStudent++;

                            if(currentStudent < 0) {
                                currentStudent = 0;
                            }

                            else {
                                displayStudentSlide(studentsArray[currentStudent]);
                            }
                        }
                    }

                    else if(event.code == "ArrowLeft") {
                        if(currentStudent == 0) {
                            currentStage -= 1;
                            currentStudent -= 1;

                            displaySurroundSlide(preSlidesArray[currentPreSlide]);
                        }

                        else {
                            currentStudent -= 1;

                            displayStudentSlide(studentsArray[currentStudent]);
                        }
                    }
                }

                else if(currentStage == 3) {
                    if(event.code == "ArrowRight") {
                        if(currentPostSlide == postSlidesLength - 1) {
                            displaySurroundSlide(postSlidesArray[currentPostSlide]);
                        }

                        else {
                            currentPostSlide++;

                            if(currentPostSlide < 0) {
                                currentPostSlide = 0;
                            }

                            else {
                                displaySurroundSlide(postSlidesArray[currentPostSlide]);
                            }
                        }
                    }

                    else if(event.code == "ArrowLeft") {
                        if(currentPostSlide == 0) {
                            currentStage -= 1;
                            currentPostSlide -= 1;

                            displayStudentSlide(studentsArray[currentStudent]);
                        }

                        else {
                            currentPostSlide -= 1;

                            displaySurroundSlide(postSlidesArray[currentPostSlide]);
                        }
                    }
                }
            });
        </script>
    </body>
</html>