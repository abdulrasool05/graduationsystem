<title>Logs</title>

<?php
    $logs=getLogs();
    echo "<div class='container'>";
    echo "<div class = 'page p-3'>";
    echo "<h1>Activity Log</h1>";
    echo "<table class='table logTable'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>Type</th>";
    echo "<th scope='col'>Message</th>";
    echo "<th scope='col'>Timestamp</th>";
    echo "<th scope='col'>User Id</th>";
    echo "</tr>";

    echo "</thead>";
    echo "<tbody>";

    foreach ($logs as $l){

        echo "<tr>";
        echo "<td>".$l['log_type']."</td>";
        echo "<td>".$l['log_message']."</td>";
        echo "<td>".$l['log_timestamp']."</td>";
        echo "<td>".$l['log_user_id']."</td>";
        echo "</tr>";   
    }




    echo "</tbody>";
    echo "</table>";
    echo "</div>";

?>






