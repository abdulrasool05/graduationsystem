<?php
    $shows = getShowList();
?>

<title>Manage Specific Shows</title>

<div class="page p-3">
    <h1>Manage Specific Shows</h1>

    <!-- CREATE SPECIFIC SHOW SECTION -->
    <div class="rounded-3 createShowButtonTable">
        <!-- Create Show Button -->
        <button type="button" class="btn btn-primary mb-3" onclick="createShow()">Create Specific Show</button><br>
    </div>

    <br>

    <div class="rounded-3 showsTable">
        <!-- Create Show Modal -->
        <div class="modal fade" id="createShowModal" tabindex="-1" aria-labelledby="createShowModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createShowModalLabel">Create Specific Show</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" id="addNewShow">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="longNameInput">Long Show Name</label>
                                <input type="text" class="form-control" id="longNameInput" name="longName">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="shortNameInput">Short Show Name</label>
                                <input type="text" class="form-control" id="shortNameInput" name="shortName">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" id="saveNewShowButton" value="Save">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- DELETE SPECIFIC SHOW SECTION -->
        <?php
            // Foreaching through all shows and printing out a button for them
            foreach($shows as $s) {
                echo "<button type='button' class='btn btn-light mb-3' onclick='deleteShow(".$s['show_id'].", ".'&#39;'.$s['show_long_name'].'&#39;'.")'>".$s['show_long_name']."</button><br>\n";
            }
        ?>

        <!-- Delete Show Modal -->
        <div class="modal fade" id="deleteShowModal" tabindex="-1" aria-labelledby="deleteShowModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteShowModalLabel">Delete Specific Show</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" id="deleteShow">
                        <div class="modal-body">
                            <input type="hidden" id="showId" name="showId" value="">
                            <p id="confirmDeleteMessage"></p>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" id="deleteShowButton" value="Yes">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function for creating a new specific show
    function createShow() {
        var createShowModal = new bootstrap.Modal(document.getElementById('createShowModal'));

        createShowModal.show();
    }

    // Function for deleting an existing show
    function deleteShow(showId, longName) {
        var deleteShowModal = new bootstrap.Modal(document.getElementById('deleteShowModal'));

        document.getElementById("showId").value = showId;
        document.getElementById("confirmDeleteMessage").innerHTML = "Are you sure you want to delete the show " + longName + "?";

        deleteShowModal.show();
    }
</script>