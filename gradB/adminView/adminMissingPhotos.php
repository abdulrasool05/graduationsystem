<title>Missing Pictures</title>
<div class = "pageT p-3">
      <p class = "d-flex justify-content-center text-dark fw-bold fs-3 w-250">Missing Pictures</p>

      <table class="table table-primary table-hover table-striped-columns ">
        <thead>
          <tr>
            <td>Number</td>
            <td >Name</td>
            <td >Missing</td>
            <td>Gr 9</td>
            <td>Gr10</td>
            <td>Gr11</td>
            <td>Gr12</td>
            <td>Grad</td>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php 

          $fileNlist=[];
          $TempName=[];
          $count=0;
          $fileList = scandir('../studPics/');
          unset($fileList[0]);
          unset($fileList[1]);
     
  $photoCount = array();
  $phCount=0;
  $studentList = getStudList();
  $studPhCheck=[];



          foreach ($fileList as $f) {
            $fileNewlist[$count]=explode("_",$f);
            $TempName[$count]=explode(".",$fileNewlist[$count]['1']);
            $fileNewlist[$count]['1']=$TempName[$count]['0'];
            $count+=1;
          }
        
         
         $count=0;
  
       
       foreach ($studentList as $currentStudent) {
        $currentNum = $currentStudent['stud_num'];

        foreach ($fileNewlist as $f) {

          if ($f['0'] == $currentNum) {

           if (isset($photoCount[$currentNum]))
              $photoCount[$currentNum] += 1;

           else 
              $photoCount[$currentNum] = 1;

            }

        }

      }

        foreach ($studentList as $currentStudent) {
          $currentStudentId = $currentStudent['stud_id'];
          $currentNum = $currentStudent['stud_num'];
          
          foreach ($fileNewlist as $fn) {
            if($fn['0']==$currentNum){
            $studPhCheck[$fn['1']]=1;
            }
          }

      
          echo "<tr>";
          echo "<td onclick='window.location.assign(\"?page=student&id=$currentStudentId\")'>".$currentStudent['stud_num']."</td>";
          echo "<td>".$currentStudent['stud_fname']." ".$currentStudent['stud_lname']."</td>";


           echo "<td>" ;
           if(isset($photoCount[$currentNum]))
            echo"".(5-$photoCount[$currentNum])."";

           else
            echo'5';

           echo"</td>";


          
          echo "<td><div><input class='form-check-input' type='checkbox' value='' id='flexCheckChecked' disabled"; 
          if (isset($studPhCheck['A']))
            echo " checked";


          echo "><label class='form-check-label' for='flexCheckChecked'></div></td>";
          echo "<td><div><input class='form-check-input' type='checkbox' value='' id='flexCheckChecked' disabled "; 
          if (isset($studPhCheck['B']))
            echo " checked";


          echo "><label class='form-check-label' for='flexCheckChecked'></div></td>";
          echo "<td><div><input class='form-check-input' type='checkbox' value='' id='flexCheckChecked' disabled "; 
          if (isset($studPhCheck['C']))
            echo " checked";


          echo "><label class='form-check-label' for='flexCheckChecked'></div></td>";
          echo "<td><div><input class='form-check-input' type='checkbox' value='' id='flexCheckChecked' disabled "; 
          if (isset($studPhCheck["D"]))
            echo " checked";


          echo "><label class='form-check-label' for='flexCheckChecked'></div></td>";
          echo "<td><div><input class='form-check-input' type='checkbox' value='' id='flexCheckChecked' disabled "; 
          if (isset($studPhCheck['E']))
            echo " checked";

          echo "><label class='form-check-label' for='flexCheckChecked'></div></td></tr>";

         
          unset($studPhCheck); 
          if($count<(count($fileNewlist)-1))
            $count+=1;
        }

      ?>
    </tbody>
  </table>
    
      </div>