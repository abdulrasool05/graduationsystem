<title>Student List</title>
   <div class = "page p-3">
      <p class = "d-flex justify-content-center text-dark fw-bold fs-1 w-100">Student List</p>

      <div class="mb-3 searchBar">
        <label for="searchBarInput" class="form-label">Search</label>
        <input type="text" class="form-control" id="searchBarInput" placeholder="Search for first name, last name, id, email...">
      </div>

      <a href="adminSplitShows.php"><button type="button" class="btn btn-primary splitShowButton">Split Shows</button></a>

      <table class="table table-dark table-hover table-striped-columns studentTable" id='studentTable'>
        <thead>
          <tr>
            <td style="width: 60px;">✔️</td>
            <td class="fw-bold" style="width: 50px;">ID</td>
            <td class="fw-bold" style="width: 175px;">First Name</td>
            <td class="fw-bold" style="width: 175px;">Last Name</td>
            <td class="fw-bold" style="width: 375px;">Email</td>
            <td class="fw-bold">Show</td>
            <!-- <td hidden>Student Number</td> this column can be used to extend search results, unhide this and the other hidden column data to allow for searching by student number-->
          </tr>
        </thead>

        <tbody class="table-group-divider">
          <?php 
            $studentList = getStudList();
            $showList = getShowList();

            foreach ($studentList as $currentStudent) {
              $studEnabled = $currentStudent['stud_enabled'];
              $whichShow = $currentStudent['stud_which_show'];
              $currentStudentId = $currentStudent['stud_id'];

              echo "<form id='studentListDataForm".$currentStudentId."' action='' method='POST'>";
              echo "<tr>";
              echo "<td>";
              echo "<div class='form-check form-switch'>";

              if ($studEnabled == 1) {
                echo "<input class='form-check-input' onclick='updateStudentEnabled(".$currentStudentId.", 0)' type='checkbox' role='switch' name='stud_enabled_".$currentStudent['stud_id']."' checked>";
              }
              else {
                echo "<input class='form-check-input' onclick='updateStudentEnabled(".$currentStudentId.", 1)' type='checkbox' role='switch' name='stud_enabled_".$currentStudent['stud_id']."'>";
              }
  
              echo "</div>";
              echo "<input type='hidden' name='stud_which_show' value='".$currentStudent['stud_which_show']."'>";
              echo "<label class='form-check-label' for='flexCheckChecked'></div></td>";
              echo "<td onclick='window.location.assign(\"?page=student&id=$currentStudentId\")'>".$currentStudent['stud_id']."</td>"; // onclick makes row redirect when clicked
              echo "<td onclick='window.location.assign(\"?page=student&id=$currentStudentId\")'>".$currentStudent['stud_fname']."</td>";
              echo "<td onclick='window.location.assign(\"?page=student&id=$currentStudentId\")'>".$currentStudent['stud_lname']."</td>";
              echo "<td onclick='window.location.assign(\"?page=student&id=$currentStudentId\")'>".$currentStudent['stud_email']."</td>";
                         
              echo "<td>";
                echo "<div class='btn-group' id='showButtonGroup".$currentStudentId."' role='group' aria-label='Basic radio toggle button group'>";

                foreach($showList as $currentShow) { // prints all show buttons
                  echo "<input type='radio' class='btn-check' onclick='updateStudentShow(".$currentStudentId.", ".$currentShow['show_id'].")' name='btnradio' id='showButton".$currentStudentId."_".$currentShow['show_id']."' autocomplete='off'";
                  
                  if ($whichShow == $currentShow['show_id']) {
                    echo " checked>";
                  }
                  else {
                    echo ">";
                  }

                  echo "<label class='btn btn-outline-primary' for='showButton".$currentStudentId."_".$currentShow['show_id']."'>".$currentShow['show_short_name']."</label>";
                }
                echo "</div>";
              echo "</td>";

              // echo "<td hidden>".$currentStudent['stud_num']."</td>"; this column can be used to extend search results, unhide this and the other hidden column head to allow for searching by student number

              echo "</tr>";

              echo "</form>";
            }

          ?>
        </tbody>
      </table>
    </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script>
        $(document).ready(function(){
          $("#searchBarInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#studentTable tr:not(:first)").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });


        function updateStudentEnabled(stud_id, stud_enabled) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "adminListProcess.php?id="+stud_id+"&enabled="+stud_enabled);
            xhttp.send();
        }
        function updateStudentShow(stud_id, stud_which_show) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "adminListProcess.php?id="+stud_id+"&show="+stud_which_show);
            xhttp.send();
        }
      </script>

