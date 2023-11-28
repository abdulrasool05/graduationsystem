<title>Specific Slide</title>

<div class="page p-3">
	<?php
		if(isset($_GET['slideId'])) {
			$slide = getSlideById($_GET['slideId']);
			$slideNameCounter = 0;
			$slideNameSub = "\'";

			$slideNameCounter = strlen($slide[0]['surround_name']);

			for($x=0; $x<$slideNameCounter; $x++) {
				if($slide[0]['surround_name'][$x] == "'") {
					// $slide[0]['surround_name'][$x] = "\'";
					// $newSlide = str_replace($slide[0]['surround_name'][$x], $slideNameSub, $slide[0]['surround_name']);
				}

				else {
					continue;
				}
			}

			echo "<h1>Edit Slide</h1>\n";
			echo "<button type='button' class='btn btn-primary' onclick='window.location.href=".'&#39;'."adminTemplate0.php?page=manageShows".'&#39;'."'>Back</button>\n";

			########## DELETE SLIDE SECTION ##########
			// Delete Slide Button
			echo "<button type='button' class='btn btn-danger' onclick='deleteSlide(".$slide[0]['surround_id'].", ".'&#39;'.$slide[0]['surround_name'].'&#39;'.")'>Delete</button><br>\n";

			// Delete Slide Modal
			echo "<div class='modal fade' id='deleteSlideModal' tabindex='-1' aria-labelledby='deleteSlideModalLabel' aria-hidden='true'>\n";
  			echo "<div class='modal-dialog'>\n";
    		echo "<div class='modal-content'>\n";

      		echo "<div class='modal-header'>\n";
        	echo "<h1 class='modal-title fs-5' id='deleteSlideModalLabel'>Delete Slide</h1>\n";
        	echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>\n";
      		echo "</div>\n";

			echo "<form action='' method='POST' id='deleteSlide'>\n";
      		echo "<div class='modal-body'>\n";
			echo "<input type='hidden' id='deleteSlideId' name='deleteSlideId' value=''>\n";
			echo "<p id='confirmDeleteMessage'></p>\n";
      		echo "</div>\n";

      		echo "<div class='modal-footer'>\n";
			echo "<input type='submit' class='btn btn-success' id='deleteSlideButton' value='Yes'>\n";
        	echo "<button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancel</button>\n";
      		echo "</div>\n";
			echo "</form>\n";
    		
			echo "</div>\n";
			echo "</div>\n";
			echo "</div>\n";

			echo "<br>\n";

			########## EDIT SLIDE SECTION ##########
			// When the admin saves the edit slide form, this alert confirming it has been saved will popup
			echo "<div class='alert alert-success' role='alert' id='savedEditSlideAlert'>\n";
			echo "Succesfully saved!\n";
			echo "</div>\n";

			// If the admin leaves slide name empty, then this danger alert will popup notifying them that the slide name is empty
			echo "<div class='alert alert-danger' role='alert' id='emptySlideNameAlert'>\n";
			echo "Slide name is empty. Please type in a name for the slide you are currently editing.\n";
			echo "</div>\n";

			echo "<form action='' method='POST' id='editSlide'>\n";
			echo "<input type='hidden' id='slideId' name='slideId' value='".$slide[0]['surround_id']."'>\n";
			echo "<div class='form-group'>\n";
			echo "<label for='editSlideNameInput'><strong>Slide Name</strong></label>\n";
			echo "<input type='text' class='form-control' id='editSlideNameInput' name='editSlideName' value='".$slide[0]['surround_name']."'>\n";
			echo "</div>\n";

			echo "<br>\n";

			echo "<div class='form-group'>\n";
			echo "<label for='slideEditInput'><strong>Edit Slide</strong></label>\n";
			echo "<input type='text' class='form-control' id='slideEditInput' name='slideHTML' value='".$slide[0]['surround_html']."'>\n";
			echo "</div>\n";

			echo "<br>\n";

			echo "<input type='submit' class='btn btn-success' id='saveEditSlideButton' value='Save'>\n";
			echo "</form>\n";
		}

		else {
			echo "No id was passed. Please enter an id.\n";
		}
	?>
</div>

<script>
	// Function for deleting an existing slide
	function deleteSlide(slideId, slideName) {
    var deleteSlideModal = new bootstrap.Modal(document.getElementById('deleteSlideModal'));

    document.getElementById("deleteSlideId").value = slideId;
    document.getElementById("confirmDeleteMessage").innerHTML = "Are you sure you want to delete the slide " + slideName + "?";

    deleteSlideModal.show();
    }
</script>