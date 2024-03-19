


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

 
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#" >Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="adminlogout.php">logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
  
</head>
<body>
  <div class="p-3 mb-2 bg-warning text-dark">
    <form class="" action="adminpannel.php" method="post" enctype="multipart/form-data">
      <center><label for="">Choose your PDF file</label><br><br>
      <label >Faculty:</label>
      <input type="text" name="faculty" placeholder="enter the faculty" >
      <br><br>
      <label>Semister:</label>
      <input type="text" name="semister" placeholder="semister " >
      <br><br>
      <label>Subject:</label>
      <input type="text" name="subject" placeholder="subject" >
      <br><br>
      <input id="pdf" type="file" name="pdf" value="" required><br><br>
      <input id="upload" type="submit" name="submit" value="Upload">
      <br>
       <br>
        <br>
         <br>
          <br>
           <br>
            <br>
             <br>
              <br>
               <br>
                <br>
                 <br>
      <?php
        include 'register_databasecon.php'; 

      if (isset($_POST['submit'])) {
        $faculty= $_POST['faculty'];
        $semister = $_POST['semister'];
        $subject = $_POST['subject']; 
        $_SESSION['message'] = "Address saved";
        $pdf=$_FILES['pdf']['name'];
        $pdf_type=$_FILES['pdf']['type'];
        $pdf_size=$_FILES['pdf']['size'];
        $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
        $pdf_store="pdf/".$pdf;

        move_uploaded_file($pdf_tem_loc, $pdf_store);

        $sql="INSERT INTO notes_pdf(faculty,semister,subject,pdf) values('$faculty','$semister','$subject','$pdf')";
        $query=mysqli_query($con,$sql);

      }


      ?></center>
    </form>
  </div>

</body>
</html>
    