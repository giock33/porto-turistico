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

if(!isset($_POST['invia'])){
?>
<form action="" method="POST" id="partenza">

<h3 id="title">Inserire l' ID della imbarcazione che sta partendo </h3>
<input type="text" name="id" id="id_imbarcazione">
<input type="submit" name="invia" id="invia">


</form>


<?php
}else {


    $connection=mysqli_connect("localhost","root","","porto");
  

    $tariffa_base=100;
    $costo_propulsione;
    $costo_lunghezza=6;
    $costo_stagione=1;
    $costo_totale;

    $id=$_POST['id'];
    $costo;


    $query="SELECT * from registrazioni ";
    $result=mysqli_query($connection,$query);

        if(mysqli_num_rows($result)>0){   
            $query="SELECT data_arrivo from registrazioni where id_imbarcazione='$id'";
        $result=mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($result)) {
           
            $dataattuale=date("Y/m/d");
            
            
            
            $giorni_permanenza= floor((strtotime($dataattuale) - strtotime($row[0])) / 86400);
           
            
        } 

        
        $query="SELECT canone_giornaliero from registrazioni where id_imbarcazione='$id' ";
        $result=mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($result)) {
            
            $costo_totale=$giorni_permanenza*$row[0];
            
        }

        ///Funzione di rimozione di una cartella ed il suo contenuto 
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
        }



        $query="SELECT * FROM registrazioni  WHERE id_imbarcazione='$id'";
        $result=mysqli_query($connection,$query);
        
        

        while($row = mysqli_fetch_array($result)){
            $cartella="Documenti/".$row['1']."-".$row['2']."-".$row['0'];
        
            removeDir($cartella);
           
       
           

        }
        $query="DELETE  FROM postazioni  WHERE Id_imbarcazione='$id'";
        $result=mysqli_query($connection,$query);
        
        
        $query="DELETE  FROM registrazioni  WHERE id_imbarcazione='$id'";
        $result=mysqli_query($connection,$query);
        
        ?>
        <h2 style="color: white;margin-top: 25px;">Permanenza della imbarcazione  terminata</h2>
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

</body>
</html>