<?php


require("database.php");

function LogCheck(){
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM admins");
    $query->execute();
    $admins=$query->fetchALL(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM students");
    $query->execute();
    $students=$query->fetchALL(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM settings");
    $query->execute();
    $settings=$query->fetchALL(PDO::FETCH_ASSOC);
   
     
   $email='araso2@ocdsb.ca';
   $x=0;

    foreach ($admins as $ad) {
        if ($ad['admin_email']==$email)
            return 'admin';
    }

    foreach ($students as $st) {
        if($settings[0]['setting_value']==1){
        if ($st['stud_email']==$email){
         return 'stud';
        }
    }
}
       return 'null';

}
function redirect(){
    $stat=LogCheck();
    $email=getEmail();

    date_default_timezone_set(date_default_timezone_get());
    $date = date('Y-m-d', time());
    $time = date('m/d/Y h:i a', time());
    $value=getSetting('Deadline_Date');
    $date2 = ($value['setting_value']);
    $value=getSetting('Stud_LogIn_Allow');
    $allow = ($value['setting_value']);

    
    if($stat=='null')
        echo "You are not in our database please contact someone";
        
    else if($stat=='stud' && $allow!=1){
            echo "Sorry Students are not permitted to login at the time";
        }
    else if($stat=='stud'&& $date2<$date){
            echo "Sorry the deadlines is past";
        }
    else if($stat=='stud') {
        $studentInfo=getStud($email);
        $studId= $studentInfo[0]['stud_id'];
        adminLogs(1, 4, $studId, $email);
        echo('<meta http-equiv="refresh" content="0.2;URL=\'http://localhost/gradB/gradB/studentView/studentTemplate.php" /> ');
    } 
    else if ($stat=='admin') {
        $adminInfo=getCurrentAdmin($email);
        $adminId=$adminInfo[0]['admin_id'];
        adminLogs(2, 4, $adminId, $email);

        echo('<meta http-equiv="refresh" content="0.2;URL=\'http://localhost/gradB/gradB/adminView/adminTemplate0.php" /> ');
    }
        
}

function admin_Auth(){
    $stat=LogCheck();
    if($stat!='admin'){
        echo('<meta http-equiv="refresh" content="0.1;URL=\'https://wcss.emmell.org/gradB/" /> ');
    }
}

function stud_Auth(){
    $stat=LogCheck();
    if($stat!='stud'){
        echo "You are not in our database please contact someone";
        echo('<meta http-equiv="refresh" content="2;URL=\'https://wcss.emmell.org/gradB/" /> ');
      SLogTrack();
    }
}

function SLogTrack(){
    $Stud_LogTrack=getStud('araso2@ocdsb.ca');
    
}
//Delete this one and use one below
function getAdminName($adminEmail) {
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM admins WHERE admin_email=:adminEmail");
    $query->bindparam(":adminEmail", $adminEmail);
    $query->execute();
    $admin=$query->fetchALL(PDO::FETCH_ASSOC);

    return $admin[0]['admin_name'];
}

function getCurrentAdmin($adminEmail) {
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM admins WHERE admin_email=:adminEmail");
    $query->bindparam(":adminEmail", $adminEmail);
    $query->execute();
    $admin=$query->fetchALL(PDO::FETCH_ASSOC);

    return $admin;
}


function getEmail(){
    return 'araso2@ocdsb.ca';
}
   
function getStud($studEmail){
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM students WHERE stud_email=:studentEmail");
    $query->bindparam(":studentEmail", $studEmail);
    $query->execute();
    $students=$query->fetchALL(PDO::FETCH_ASSOC);
    return $students;
}

function getStudId($firstName, $lastName) {
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM students WHERE stud_fname=:firstName AND stud_lname=:lastName");
    $query->bindparam(":firstName", $firstName);
    $query->bindparam(":lastName", $lastName);
    $query->execute();
    $students=$query->fetchALL(PDO::FETCH_ASSOC);
    return $students;
}

function getStudName($studNum) {
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM students WHERE stud_num=:stud_num");
    $query->bindparam(":stud_num", $studNum);
    $query->execute();
    $students=$query->fetchALL(PDO::FETCH_ASSOC);
    return $students[0]['stud_fname']." ".$students[0]['stud_lname'];
}

function splitShows() {
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM students ORDER BY stud_lname");
    $query->execute();
    $studentList=$query->fetchALL(PDO::FETCH_ASSOC);
    
    $query1= $pdo->prepare("SELECT * FROM shows");
    $query1->execute();
    $showList=$query1->fetchALL(PDO::FETCH_ASSOC);

    $numOfStudents = count($studentList);
    $numOfShows = count($showList);
    $numOfStudentsShow = floor($numOfStudents / $numOfShows);

     
    $numOfStudentsRemainder = $numOfStudents % $numOfShows;

    $counter = 0;

    for ($i=0; $i < $numOfShows; $i++) {
        for ($x=0; $x < $numOfStudentsShow; $x++) {
            $studentList[$counter]['stud_which_show'] = $showList[$i]['show_id'];
            $counter++;
        }       
    }
    for ($i=0; $i < $numOfStudentsRemainder; $i++) {
        $studentList[$counter]['stud_which_show'] = $showList[$i]['show_id'];
        $counter++;
    }
    
    foreach ($studentList as $currentStudent) {
        $query=$pdo->prepare("UPDATE students SET stud_which_show=:stud_which_show WHERE stud_id=:stud_id");
        $query->bindparam(":stud_which_show", $currentStudent['stud_which_show']);
        $query->bindparam(":stud_id", $currentStudent['stud_id']);
        $query->execute();
    }


}


function getPhotoDir($studNum, $studentYear) {
    $photoDir = '../studPics/';
    $defaultPhotoDir = '../uploads/';

    $fileList = scandir($photoDir);

    foreach ($fileList as $currentFile) {
        if ($currentFile != '.' && $currentFile != '..') {
            
            
            $fileNameSplit = explode('_', $currentFile);
            //echo '<pre>';
            //print_r($fileNameSplit);
            //echo '</pre>';
            $fileStudentNum = substr($fileNameSplit[0], "0");


            $fileYear = substr($fileNameSplit['1'], "0");
            $fileYear = pathinfo($fileYear, PATHINFO_FILENAME);


            if ($studNum == $fileStudentNum && $studentYear == $fileYear) {
                $matchingFile = $currentFile;
            }
        }
    }

    if (!isset($matchingFile)) {
        return $defaultPhotoDir."default.jpg";
    }
    else {
        return $photoDir.$matchingFile;
    }
}

function getStudList() {
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM students ORDER BY stud_lname");
    $query->execute();
    $studentList=$query->fetchALL(PDO::FETCH_ASSOC);
    return $studentList;
}

function getSideStudents($stud_id, $side) { // 1 is next, -1 is prev
    $students = getStudList();
    $counter = 0;

    foreach ($students as $currentStudent) {
        if ($currentStudent['stud_id'] == $stud_id) {
            if ($side == -1 && isset($students[$counter-1]['stud_id'])) {
                return $students[$counter-1]['stud_id'];
            }
            else if ($side == 1 && isset($students[$counter+1]['stud_id'])) {
                return $students[$counter+1]['stud_id'];
            }
            else {
                return $stud_id;
            }
        } 

        $counter ++;
    }
}

function updateStudData($studNum, $memMoment, $scholarship, $futPlans, $studSaved){
    global $pdo;
    $scholarship = json_encode($scholarship);
    $query=$pdo->prepare("UPDATE students SET stud_mem_moment=:memMoment, stud_scholarships=:scholarships, stud_future_plans=:futplans, stud_has_saved=:studSaved WHERE stud_num=:studentNum");
    $query->bindparam(":studentNum", $studNum);
    $query->bindparam(":memMoment", $memMoment);
    $query->bindparam(":scholarships", $scholarship);
    $query->bindparam(":futplans", $futPlans);
    $query->bindparam(":studSaved", $studSaved);
    
    $query->execute();
    
    
}

function updateStudDataAdmin($stud_id, $stud_num, $stud_email, $stud_lname, $stud_fname, $stud_mem_moment, $stud_scholarships, $stud_awards, $stud_future_plans, $stud_which_show, $stud_enabled, $stud_css, $stud_has_saved) {
    global $pdo;
    $query=$pdo->prepare("UPDATE students SET stud_id=:stud_id, stud_num=:stud_num, stud_email=:stud_email, stud_lname=:stud_lname, stud_fname=:stud_fname, stud_mem_moment=:stud_mem_moment, stud_scholarships=:stud_scholarships, stud_awards=:stud_awards, stud_future_plans=:stud_future_plans, stud_which_show=:stud_which_show, stud_enabled=:stud_enabled, stud_css=:stud_css, stud_has_saved=:stud_has_saved WHERE stud_num=:snum");
    $query->bindparam(":stud_id", $stud_id);
    $query->bindparam(":stud_num", $stud_num);
    $query->bindparam(":stud_email", $stud_email);
    $query->bindparam(":stud_lname", $stud_lname);
    $query->bindparam(":stud_fname", $stud_fname);
    $query->bindparam(":stud_mem_moment", $stud_mem_moment);
    $query->bindparam(":stud_scholarships", $stud_scholarships);
    $query->bindparam(":stud_awards", $stud_awards);
    $query->bindparam(":stud_future_plans", $stud_future_plans);
    $query->bindparam(":stud_which_show", $stud_which_show);
    $query->bindparam(":stud_enabled", $stud_enabled);
    $query->bindparam(":stud_css", $stud_css);
    $query->bindparam(":stud_has_saved", $stud_has_saved);
    $query->bindparam(":snum", $stud_num);
    $query->execute();
    
    
}

function updateStudEnableDataAdmin($stud_id, $stud_enabled) {
    global $pdo;
    $query=$pdo->prepare("UPDATE students SET stud_enabled=:stud_enabled WHERE stud_id=:stud_id");
    $query->bindparam(":stud_enabled", $stud_enabled);
    $query->bindparam(":stud_id", $stud_id);
    $query->execute();
}

function updateStudShowDataAdmin($stud_id, $stud_which_show) {
    global $pdo;
    $query=$pdo->prepare("UPDATE students SET stud_which_show=:stud_which_show WHERE stud_id=:stud_id");
    $query->bindparam(":stud_which_show", $stud_which_show);
    $query->bindparam(":stud_id", $stud_id);
    $query->execute();
}

function getCurrentStudent($studId) {
    global $pdo;
    $query= $pdo->prepare("SELECT * FROM students WHERE stud_id=:studId");
    $query->bindparam(":studId", $studId);
    $query->execute();
    $student=$query->fetchALL(PDO::FETCH_ASSOC);
    return $student;
}

function getMessages() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM messages");
    $query->execute();
    $messagesResults = $query->fetchALL (PDO::FETCH_ASSOC);
    return $messagesResults;
}

function getUserMessages($studId) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM messages WHERE msg_stud_id=:studId");
    $query->bindparam(":studId", $studId);
    $query->execute();
    $messagesResults = $query->fetchALL (PDO::FETCH_ASSOC);
    return $messagesResults;
}

function deleteUserMessages($studId) {
    global $pdo;
    $query= $pdo->prepare("DELETE FROM messages WHERE msg_stud_id=:studId");
    $query->bindparam(":studId", $studId);
    $query->execute();
}

function insertMessage($email, $errorMessage, $studId){
    global $pdo;
    $query=$pdo->prepare("INSERT INTO messages (msg_email, msg_text, msg_stud_id) VALUES (:email, :msgtext, :studId)");
    $query->bindparam(':email', $email);
    $query->bindparam(':msgtext', $errorMessage);
    $query->bindparam(':studId', $studId);
    $query->execute();

}

function adminLogs($action, $message, $userId, $userEmail){
    if ($message==1){
        $messageType="$userEmail has saved data";
    }
    else if ($message==2){
        $messageType="$userEmail has submitted an error";
    }
    else if ($message==3){
        $messageType="An error was submitted from the landing page";
    }
    else if ($message==4){
        $messageType= "$userEmail logged in";
    }
    
    if ($action==1){
        $logType='STUDENT';
    }
    else if ($action==2){
        $logType='ADMIN';
    }

    global $pdo;
    $query=$pdo->prepare("INSERT INTO logs (log_message, log_user_id, log_type) VALUES (:logMessage, :logUserId, :logType)");
    $query->bindparam(':logMessage', $messageType);
    $query->bindparam(':logUserId', $userId);
    $query->bindparam(':logType', $logType);
    $query->execute();

}

function getLogs() {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM logs");
    $query->execute();
    $logResults = $query->fetchALL (PDO::FETCH_ASSOC);

    return $logResults;
}

function getStudentLogs($stud_id) {
    global $pdo;

    $log_type= "STUDENT";

    $query = $pdo->prepare("SELECT * FROM logs WHERE log_user_id=:stud_id AND log_type=:log_type");
    $query->bindparam(':stud_id', $stud_id);
    $query->bindparam(':log_type', $log_type);
    $query->execute();
    $logResults = $query->fetchALL (PDO::FETCH_ASSOC);

    return $logResults;
}

function logOut() {
    google_logout();
}

function insertSlide($surroundName, $surroundHTML, $surroundActive, $surroundOrder) {
    global $pdo;
    $query = $pdo->prepare("INSERT INTO surroundingSlides (surround_name, surround_html, surround_active, surround_order) VALUES (:title, :html, :active, :order)");
    $query->bindparam(":title", $surroundName);
    $query->bindparam(":html", $surroundHTML);
    $query->bindparam(":active", $surroundActive);
    $query->bindparam(":order", $surroundOrder);
    $query->execute();
}

function getSlides() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM surroundingSlides");
    $query->execute();
    $slides = $query->fetchALL (PDO::FETCH_ASSOC);
    return $slides;
}

function getSetting($name) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM settings WHERE setting_name=:settingName");
    $query->bindparam(":settingName", $name);
    $query->execute();

    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        return $result[0];
    }
    else 
        return null;
}

function getCharLimit() {
    return getSetting("Max_MemMoment_Char")['setting_value'];
}

function getDisabledSlides() {
    $num = 0;
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM surroundingSlides WHERE surround_active = :num");
    $query->bindparam(":num", $num);
    $query->execute();
    $disabledSlides = $query->fetchALL (PDO::FETCH_ASSOC);
    return $disabledSlides;
}

function getPreSlides() {
    $num = -1;
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM surroundingSlides WHERE surround_active = :num");
    $query->bindparam(":num", $num);
    $query->execute();
    $preSlides = $query->fetchALL (PDO::FETCH_ASSOC);
    return $preSlides;
}

function getPostSlides() {
    $num = 1;
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM surroundingSlides WHERE surround_active = :num");
    $query->bindparam(":num", $num);
    $query->execute();
    $postSlides = $query->fetchALL (PDO::FETCH_ASSOC);
    return $postSlides;
}

function updateSurroundSlides($surroundActive) {
    global $pdo;
    $query = $pdo->prepare("UPDATE surroundSlides SET surround_active = :active");
    $query->bindparam(":active", $surroundActive);
    $query->execute();
    
}

function getShowList() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM shows");
    $query->execute();
    $showList = $query->fetchALL(PDO::FETCH_ASSOC);
    return $showList;
}

function insertShow($longName, $shortName) {
    global $pdo;
    $query = $pdo->prepare("INSERT INTO shows (show_long_name, show_short_name) VALUES (:longName, :shortName)");
    $query->bindparam("longName", $longName);
    $query->bindparam(":shortName", $shortName);
    $query->execute();
}

function deleteExistingShow($showId) {
    global $pdo;
    $query = $pdo->prepare("DELETE FROM shows WHERE show_id = :showId");
    $query->bindparam(":showId", $showId);
    $query->execute();
}

function updateSlideHTML($surroundId, $surroundName, $surroundHTML) {
    global $pdo;
    $query = $pdo->prepare("UPDATE surroundingSlides SET surround_name = :surroundName, surround_html = :surroundHTML WHERE surround_id = :surroundId");
    $query->bindparam(":surroundId", $surroundId);
    $query->bindparam(":surroundName", $surroundName);
    $query->bindparam(":surroundHTML", $surroundHTML);
    $query->execute();
}

function getSlideById($surroundId) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM surroundingSlides WHERE surround_id = :surroundId");
    $query->bindparam(":surroundId", $surroundId);
    $query->execute();
    $slide = $query->fetchALL(PDO::FETCH_ASSOC);
    return $slide;
}

function deleteExistingSlide($surroundId) {
    global $pdo;
    $query = $pdo->prepare("DELETE FROM surroundingSlides WHERE surround_id = :surroundId");
    $query->bindparam(":surroundId", $surroundId);
    $query->execute();
}

function getEnabledStud() {
    $num = 1;
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM students WHERE stud_enabled = :num ORDER BY stud_lname");
    $query->bindparam(":num", $num);
    $query->execute();
    $students = $query->fetchALL(PDO::FETCH_ASSOC);
    return $students;
}

function getSpefStudById($studentId) {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM students WHERE stud_id=:studId");
    $query->bindparam(":studId", $studentId);
    $query->execute();
    $spefStud = $query->fetchALL (PDO::FETCH_ASSOC);

    return $spefStud;
}

function showSpefStud($spefStudent) {
    foreach($spefStudent as $s) {
        echo $s['stud_fname']." ".$s['stud_lname']."<br>\n";
        echo $s['stud_awards']."<br>\n";
        echo $s['stud_scholarships']."<br>\n";
        echo $s['stud_future_plans']."<br>\n";
        echo $s['stud_mem_moment']."<br>\n";
    }
}
?>
