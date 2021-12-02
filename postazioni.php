<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postazioni</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="css/postazioni.css">
</head>
<body>
 <!--Navigation bar-->
 <div id="bar"></div>

<script>
$(function(){
  $("#bar").load("navigation_bar.html");
});
</script>
<!--end of Navigation bar-->
    

    <?php

        $connection=mysqli_connect("localhost","root","","porto");


    
        $query="SELECT * from postazioni";

      
        $result=mysqli_query($connection,$query);

    
      ?>
       
        

        <h1 id="title">Posti d'imbarco</h1>
        <table id="table-imbarcazioni">
        <tr>
        <th>Sezione</th>
        <th>Nome_imbarcazione</th>
        <th>Id_imbarcazione</th>
        <th>Lunghezza_imbarcazione</th>
       
        </tr>
     <?php
        while($row = mysqli_fetch_array($result)){
            ?>
         <tr class="row_imbarco">
         <td class="imbarco"><?php echo"$row[0]";?></td>
         <td class="imbarco"><?php echo"$row[1]";?></td>
         <td class="imbarco"><?php echo"$row[2]";?></td>
         <td class="imbarco"><?php echo"$row[3]";?></td>
         
         </tr>
         <?php
     
        }

    ?>
</body>
</html>