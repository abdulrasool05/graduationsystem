<title>Photo Resize</title>
<div class = "page p-3">

<?php

$fileName='studPics';

$fileList = scandir('../studPics/');
unset($fileList[0]);
unset($fileList[1]);
$Allsizes=[];
$check=0;
$message='';



echo"<h1>Resize</h1>";

$smallestW=10000;
$smallestH=10000;

foreach ($fileList as $currentFile) {
  $f='../studPics/'.$currentFile;    
  $info=getimagesize($f);
  $size=$info[0].'x'.$info[1];

  if(!isset($Allsizes[$size]))
      $Allsizes[$size]=$size;

  if($info[0]<$smallestW)
  $smallestW=$info[0];
  
  if($info[1]<$smallestH)
  $smallestH=$info[1]; 
}

echo"<br><p>All photo sizes in: ".$fileName."<br><br>";
foreach ($Allsizes as $as)
echo"- ".$as."<br>";


echo'<br><form action="" method="POST">';
echo'<button type="submit" class="btn btn-success" name="submit">Resize Photos to Smallest Size</button><br>';
echo'</form><br><br>';





if(isset($_POST['submit'])){
$new_height=$smallestH;
$new_width=$smallestW;


foreach ($fileList as $currentFile) {
  $f='../studPics/'.$currentFile;    
  $info=getimagesize($f);
    $srcWidth=$info[0];
    $srcHeight=$info[1];

  $image_new = imagecreatetruecolor($new_width, $new_height);
  $image = imagecreatefromjpeg($f);

  $ratioOrg=$srcWidth/$srcHeight;
  $ratioDest=$new_width/$new_height;
  
  if($ratioOrg>=$ratioDest){
  $src_width=($srcHeight/$new_height)*($new_width);
  $src_width=round($src_width, 0);
  $src_x=($srcWidth-$src_width)/2;
  $src_x=round($src_x, 0);
  $src_y= 0;
  $src_height= $srcHeight;
  }
  
  else{
    $src_height=($srcWidth/$new_width)*($new_height);
    $src_height=round($src_height, 0);
    $src_y=($srcHeight-$src_height)/2;
    $src_y=round($src_y, 0);
    $src_x= 0;
    $src_width= $srcWidth;

  }
  
 
  
  imagecopyresampled($image_new, $image, 0, 0, $src_x, $src_y, $new_width, $new_height, $src_width, $src_height);

 imagejpeg($image_new,'../studPics/'.$currentFile);

  //  echo "NEW FILE: ".$f."\n"
  //  echo " / src_x: ".$src_x."\n"
  //  echo " / src_y: ".$src_y."\n";
  //  echo " / src_width: ".$src_width."\n";
  //  echo " / src_height: ".$src_height."\n<br>";
  
  }

}
//$errorMessage=strip_tags($errorMessage);
?>
</div>
