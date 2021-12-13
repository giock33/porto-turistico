<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partenze</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="css/partenze.css?ts=<?=time()?>&quot">
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

$connection=mysqli_connect("localhost","","","my_sciaccaportoturistico");

if(!isset($_POST['invia'])){
?>
<form action="" method="POST" id="partenza">

<h3 id="title">Inserire l' ID della imbarcazione che sta partendo </h3>
<input type="text" name="id" id="id_imbarcazione">
<input type="submit" name="invia" id="invia">


</form>


<?php
}else {


   
  

    $tariffa_base=100;
    $costo_propulsione;
    $costo_lunghezza=6;
    $costo_stagione=1;
    $costo_totale;

    $id=$_POST['id'];
    $costo;


    $query="SELECT * from registrazioni WHERE id_imbarcazione='$id'";
    $result=mysqli_query($connection,$query);

        if(mysqli_num_rows($result)>0){   
            $query="SELECT Data_arrivo from registrazioni where id_imbarcazione='$id'";
        $result=mysqli_query($connection,$query);
        $dataattuale=date("Y/m/d");
        
        while($row = mysqli_fetch_array($result)) {
           
            
            
            
            
            $giorni_permanenza= floor((strtotime($dataattuale) - strtotime($row[0])) / 86400);
           
            
        } 

      

       /* ///Funzione di rimozione di una cartella ed il suo contenuto 
        function removeDir($target)
        {
            $directory = new RecursiveDirectoryIterator($target,  FilesystemIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::CHILD_FIRST);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    rmdir($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($target);
        }*/



        $query="SELECT * FROM registrazioni  WHERE id_imbarcazione='$id'";
        $result=mysqli_query($connection,$query);
        
        

       /* while($row = mysqli_fetch_array($result)){
            $cartella="Documenti/".$row['1']."-".$row['2']."-".$row['0'];
        
            removeDir($cartella);
           
       
           

        }*/
        $query="DELETE  FROM postazioni  WHERE Id_imbarcazione='$id'";
        $result=mysqli_query($connection,$query);
        
        
       


          
        $query="SELECT * from registrazioni WHERE id_imbarcazione='$id' ";
        $result=mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($result)) {
            
            
            $idimbarcazione=$row[0];
            
            $nome_proprietario=$row[1];
            $cognome_proprietario=$row[2];
            $nome=$row[4];
            $costo_totale=$giorni_permanenza*$row[10];
            
        }

        $query="INSERT INTO partenze VALUES ('$idimbarcazione','$nome','$nome_proprietario','$cognome_proprietario','$dataattuale')";
        $result=mysqli_query($connection,$query);

        $query="DELETE  FROM registrazioni  WHERE id_imbarcazione='$id'";
        $result=mysqli_query($connection,$query);
        
        ?>
        <h2 style="color: white;margin-top: 100px;">Permanenza della imbarcazione  terminata</h2>
        <h2 style="color: white;">Ecco il costo totale da pagare : <?php echo "$costo_totale "; ?> euro</h2>
       
        
    <?php
     
}
else {   


?>

<h2>Id non presente nel database </h2>

<?php


}
}

?>

<?php


$query="SELECT * from partenze";

$result=mysqli_query($connection,$query);

?>
<h2 id="title">Cronologia Partenze</h2>
<table  class="table table-hover table-striped">
<thead class="thead-dark">
    <tr>
    <th scope="col">Id imbarcazione</th>
    <th scope="col">nome imbarcazione</th>
    <th scope="col">nome proprietario</th>
    <th scope="col">cognome proprietario</th>
    <th scope="col">data partenza </th>
    </tr>
</thead>

<tbody>

<?php

while($row=mysqli_fetch_array($result)){

?>
<tr>
<th class="person" scope="row"> <a style="text-decoration: none;" href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[0]";?> </div></a></th>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[1]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[2]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[3]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[4]";?> </div></a></td>
     </tr>

<?php
}
?>
</tbody>
</table>
</body>
</html>