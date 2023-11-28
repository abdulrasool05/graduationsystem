<?php
    $preSlides = getPreSlides();
    $postSlides = getPostSlides();
    $disabledSlides = getDisabledSlides();
?>

<style>
    /* Our two classes that we use to define the containers, and the draggable items themselves */
    .dragContainer {
        background-color: #343a40;
        padding-top: 16px;
        padding-left: 16px;
        padding-right: 16px;
    }

    .draggableItem {
        border: 1px solid black;
        height:50px;
        margin:5px;
        text-align:center;
        background-color:white;
    }

    /* .gu classes related to the automate classes uses by dragula */
    .gu-mirror {
        position: fixed !important;
        margin: 0 !important;
        z-index: 9999 !important;
        opacity: 0.8;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
        filter: alpha(opacity=80);
    }

    .gu-hide {
        display: none !important;
    }

    .gu-unselectable {
        -webkit-user-select: none !important;
        -moz-user-select: none !important;
        -ms-user-select: none !important;
        user-select: none !important;
    }

    .gu-transit {
        opacity: 0.2;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
        filter: alpha(opacity=20);
    }
</style>

<title>Manage Shows</title>

<div class="page p-3">
    <h1>Manage Shows</h1>

    <!-- CREATING A NEW SLIDE SECTION -->
    <!-- Create Slide Button -->
    <button type="button" class="btn btn-primary" onclick="createSlide()">Create Slide</button>

    <br>
    <br>
    <br>

    <!-- Create Slide Modal -->
    <div class="modal fade" id="createSlideModal" tabindex="-1" aria-labelledby="createSlideModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createSlideModalLabel">Add Slide</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="addSlide">
                    <div class="modal-body">
                        <div class="form-group">
			                <label for="slideNameInput">Slide Name</label>
			                <input type="text" class="form-control" id="slideNameInput" name="slideName">
			            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" id="saveAddSlideButton" value="Save">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- DRAG AND DROP -->
    <div class="container">
        <div class="row">
            <div class="col"><h3 class="text-center">Pre Slides</h3></div>
            <div class="col"><h3 class="text-center">Post Slides</h3></div>
            <div class="col"><h3 class="text-center">Disabled Slides</h3></div>
        </div>
        <div class="row">
            <div class="col dragContainer text-center m-1 rounded-3" id="box-1">
                <?php
                    // Foreaching through all pre slides and displaying them on a button
                    foreach($preSlides as $pre) {
                        echo "<button type='button' class='btn btn-light mb-3 draggableItem' id='".$pre['surround_id']."' onclick='window.location.href=".'&#39;'."adminTemplate0.php?page=slideEdit&slideId=".$pre['surround_id']."".'&#39;'."'>".$pre['surround_name']."</button><br>\n";
                    }
                ?>
            </div>
            <div class="col dragContainer text-center m-1 rounded-3" id="box-2">
                <?php
                    // Foreaching through all post slides and displaying them on a button
                    foreach($postSlides as $post) {
                        echo "<button type='button' class='btn btn-light mb-3 draggableItem' id='".$post['surround_id']."' onclick='window.location.href=".'&#39;'."adminTemplate0.php?page=slideEdit&slideId=".$post['surround_id']."".'&#39;'."'>".$post['surround_name']."</button><br>\n";
                    }
                ?>
            </div>
            <div class="col dragContainer text-center m-1 rounded-3" id="box-3">
                <?php
                    // Foreaching through all disabled slides and displaying them on a button
                    foreach($disabledSlides as $dis) {
                        echo "<button type='button' class='btn btn-light mb-3 draggableItem' id='".$dis['surround_id']."' onclick='window.location.href=".'&#39;'."adminTemplate0.php?page=slideEdit&slideId=".$dis['surround_id']."".'&#39;'."'>".$dis['surround_name']."</button><br>\n";
                    }
                ?>
            </div>
        </div>
        <div class="row"><div class="col text-center"><button class="btn btn-primary" onclick="describe()">Describe Boxes</button></div></div>
        <div class="row"><div class="col text-center"><button class="btn btn-primary" onclick='updateSlide()'>Describe Boxes</button></div></div>
    </div>
</div>

<script src='/dragula/dragula.min.js'></script>

<script>
    var containers = [  
        document.getElementById("box-1"), 
        document.getElementById("box-2"), 
        document.getElementById("box-3")
    ];
    
    function init() {        
        // Initialize all dragula features, being sure to pass in the containers that we want to be draggable
        var draggy = dragula(containers, {
            copy: false,
            revertOnSpill: true,
            removeOnSpill: false
        });

        // Describe what to do when a dragged block is dropped
        // 'el' refers to the element that has been dragged
        draggy.on ('drop',function(el) {
            var droppedId = el.id;
            var targetId = el.parentNode.id;
            alert("New block dropped!\n\nID: " + droppedId + " was dropped into ID: " + targetId);
            // updateSlide();
        });
    }

    // Example function to describe all elements in our 3 boxes
    // Everything revolves around the ID of the elements (both container and draggable item)
    function describe() {
        var outputText = "";

        //Iterate through all our 'containers' (defined above)
        containers.forEach(function (el) {

            outputText += el.id + "\n-------\n";
            
            var children = el.children;         //for each container, obtain children
            var numChildren = children.length;  //get count of children, for the FOR loop

            for (var x=0;x<numChildren;x++) {
                outputText += children[x].id + "\n";
            }
            outputText += "\n";
        });
        alert(outputText);
    }

    function updateSlide() {
        var outputText = "";
        var myArray = []; // Array holding arrays for each box
        var boxCounter = 0;

        //Iterate through all our 'containers' (defined above)
        containers.forEach(function (el) {
            var childArray = [];

            myArray[boxCounter] = el.id;

            var children = el.children;         //for each container, obtain children
            var numChildren = children.length;  //get count of children, for the FOR loop

            for (var x=0;x<numChildren;x++) {
                childArray.push(children[x].id);
            }

            myArray.push(children[x].id);
            boxCounter++;
        });
        // alert(outputText);

        // var xhttp = new XMLHttpRequest();

        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         // this.responseText is the response
        //         // your id.innerHTML = this.responseText;
        //     }
        // };

        // xhttp.open("GET", "arhamajax.php?info=" + myArray);
        // xhttp.send();
    }

    // el.id and children.id, put into js array, then send that into ajax
    // function updateSlide(slideId, boxId) {
    //     $(document).ready(function(){
    //         $('#').click(function(e){
    //             e.preventDefault();
    //             tinymce.triggerSave();

    //             $.ajax({
    //                 method: "post",
    //                 url: "adminFormProcess.php",
    //                 data: $('#').serialize(),
    //                 dataType: "text",

    //                 success: function (response){
    //                     $('#displayMessage').text(response);
    //                     }

    //             });
    //         }); 
    //     });
    // }

	init(); //after everything is all loaded and read, run the init function to start everything up.
</script>

<script>
    // Function for creating a new slide
    function createSlide() {
        var createSlideModal = new bootstrap.Modal(document.getElementById('createSlideModal'));

        createSlideModal.show();
    }
</script>