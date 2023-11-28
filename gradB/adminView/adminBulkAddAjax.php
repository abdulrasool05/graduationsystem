<?php
require ("../functions.php");

global $pdo;

    echo"The following awards have been added to the following students: ";
    echo"<br><br>";

    $text=$_GET['text'];
    $text=str_replace('"', '', $text);
    $sep=explode('\n',$text);

    if($_GET['type']=='set'){
    foreach ($sep as $s) {

   $query=$pdo->prepare("SELECT * FROM students WHERE stud_num=:snum");
   $query->bindparam(":snum", $s);
   $query->execute();
   $studAwards=$query->fetchALL(PDO::FETCH_ASSOC);

   if($studAwards==null){
    echo'The student number doesnt exist';
    die();
   }

   $studAwards= $studAwards[0]['stud_awards'];

      if(($studAwards)==null)
      $studAwards='';

      $arr=explode("|",$studAwards);
      array_push($arr,$_GET['award']);
      $award=implode("|",$arr);

    $query=$pdo->prepare("UPDATE students SET stud_awards=:saward WHERE stud_num=:snum");
    $query->bindparam(":snum", $s);
    $query->bindparam(":saward", $award);
    $query->execute();
    echo"".$s." -> ".$_GET['award'];
   }

  }
    else{
      foreach ($sep as $s) {
        $comBreak=explode(',',$s);
        
   $query=$pdo->prepare("SELECT * FROM students WHERE stud_num=:snum");
   $query->bindparam(":snum", $comBreak[0]);
   $query->execute();
   $studAwards=$query->fetchALL(PDO::FETCH_ASSOC);
  

   if($studAwards==null){
    echo'The student number doesnt exist';
    die();
   }
   $studAwards= $studAwards[0]['stud_awards'];
   if(($studAwards)==null)
      $studAwards='';

      $arr=explode("|",$studAwards);
      array_push($arr, $comBreak[1]);
      $award=implode("|",$arr);

        $query=$pdo->prepare("UPDATE students SET stud_awards=:saward WHERE stud_num=:snum");
        $query->bindparam(":snum", $comBreak[0]);
        $query->bindparam(":saward", $award);
        $query->execute();
        echo"".$comBreak[0]." -> ".$comBreak[1];
        }

      
   }



?>
