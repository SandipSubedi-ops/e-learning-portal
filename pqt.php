<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Display PDF</title>
  
</head>
<body>
  <div class="div1" >
    <?php
    include 'register_databasecon.php';

    $sql="SELECT pdf from notes_pdf where id='13'";
    $query=mysqli_query($con,$sql);
    while ($info=mysqli_fetch_array($query)) {
      ?>
     <center> 
      <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="800" height="700" ></embed>
     </center>

      <?php
    }


    ?>
  </div>

</body>
</html>