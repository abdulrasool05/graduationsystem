<title>Photo Upload</title>

<div class = "page p-3">
      <p class = "d-flex justify-content-center text-dark fw-bold fs-3 w-100">Photo Upload</p>

      <form action="?page=matchUploadedPhotos" method="post" enctype="multipart/form-data">
            <div class='rounded-3 adminBoxTheme'>
                  <p class = 'fs-3 fw-bold'>Upload Photos</p>
                  <p class = 'fs-5'>Upload .zip files with .JPG files for students, selecting the year and naming format. The site will match the photo to each student.</p>
                  <p class = 'fs-5 fw-bold'>Select file to upload: <input type="file" name="fileToUpload" id="fileToUpload"></p>
                  

                  <p class = 'fs-5 fw-bold'>Year:
                        <select class='fs-5 adminBoxTheme1 rounded' id = 'photoYear' name = 'photoYear'>
                              <option value = 'A'>Grade 9</option>
                              <option value = 'B'>Grade 10</option>
                              <option value = 'C'>Grade 11</option>
                              <option value = 'D'>Grade 12</option>
                              <option value = 'E'>Graduation</option>
                        </select>
                  </p>

                  <p class = 'fs-5 fw-bold'>Name Format:
                  <select class='fs-5 adminBoxTheme1 rounded' id = 'photoNameFormat' name = 'photoNameFormat'>
                        <option value = 'spaceLF'>lastName firstName</option>
                        <option value = 'spaceFL'>firstName lastName</option>
                        <option value = 'underscoreLF'>lastName_firstName</option>
                        <option value = 'underscoreFL'>firstName_lastName</option>
                        <option value = 'commaSpaceLF'>lastName, firstName</option>
                        <option value = 'commaSpaceFL'>firstName, lastName</option>
                  </select>
                  </p>

                  <input class = "fs-3 fw-bold adminBoxTheme rounded" type="submit" value="Upload" name="submit">
            </div>  
            
            <br><br>
      </form>
</div>