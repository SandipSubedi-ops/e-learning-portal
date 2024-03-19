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
    
    
      ?>

     <center> 
      <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="800" height="700" ></embed>
     </center>

      <?php
    


    ?>
  </div>

</body>
</html>

