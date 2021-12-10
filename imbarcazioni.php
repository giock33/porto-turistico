<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imbarcazioni</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="css/imbarcazioni.css?ts=<?=time()?>&quot">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
         


        <div id="elenco">
     <h1 id="title">Utenti</h1>
         <form id="scelta" action="" method="GET" >
          
           <ul>
               
           
            <li><p>Ordina per :</p></li>
           <li><button  name="id">Id</button> </li>
           <li><button name="name">Nome</button> </li>
           <li> <button  name="cognome">Cognome</button></li>
           <li><button  name="propulsione">Propulsione</button></li>
           <li><button  name="data">Data di arrivo</button></li>
           <li><button  name="costo">Costo</button></li>
           <li><button  name="lunghezza">Lunghezza</button></li>
           </ul>
           
         </form>
         </div>
         
        
    <?php

$connection=mysqli_connect("localhost","","","my_sciaccaportoturistico");
$ricerca=false;
if(isset($_GET['name'])){

$ordine='nome_imbarcazione';
$ricerca=true;


}
else if(isset($_GET['cognome'])){ 
    $ordine='cognome';
    $ricerca=true;
}
else if(isset($_GET['propulsione'])){ 
    $ordine='Tipo_propulsione';
    $ricerca=true;
}
else if(isset($_GET['data'])){ 
    $ordine='Data_arrivo';
    $ricerca=true;
}
else if(isset($_GET['id'])){ 
    $ordine='id_imbarcazione';
    $ricerca=true;
}
else if(isset($_GET['costo'])){ 
    $ordine='canone_giornaliero';
    $ricerca=true;
}
else if(isset($_GET['lunghezza'])){ 
    $ordine='Lunghezza';
    $ricerca=true;
}else {   
    $query="SELECT * from registrazioni ORDER BY id_imbarcazione";

    $result=mysqli_query($connection,$query);

   
?>

<table class="table table-hover table-striped">
  <thead class="thead-dark">
  <tr>
    <th scope="col">Id imbarcazione</th>
    <th scope="col">nome</th>
    <th scope="col">cognome</th>
    <th scope="col">codice_fiscale</th>
    <th scope="col">nome_imbarcazione </th>
    <th scope="col">Data_arrivo</th>
    <th scope="col">Porto_provenienza</th>
    <th scope="col">Lunghezza in metri</th>
    
    <th scope="col">Canone Giornaliero</th>
    </tr>
  </thead>
  <tbody>
    
  

    
    <?php
  
    while($row = mysqli_fetch_array($result)){
        ?>
     <tr >
         
     <th scope="row"class="person"> <a style="text-decoration: none;" href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[0]";?> </div></a></th>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[1]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[2]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[3]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[4]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[6]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[7]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[8]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[10]";?> </div></a></td>
     
     
     </tr>
  <?php
    

    }?>

</tbody>
</table>

<?php

}?>


  <?php

  if($ricerca){ 
    $query="SELECT * from registrazioni ORDER BY $ordine";

    $result=mysqli_query($connection,$query);
?>


    <table class="table table-hover table-striped">
    <thead class="thead-dark">
    <tr>
    <th scope="col">Id imbarcazione</th>
    <th scope="col">nome</th>
    <th scope="col">cognome</th>
    <th scope="col">codice_fiscale</th>
    <th scope="col">nome_imbarcazione </th>
   <th scope="col">Data_arrivo</th>
    <th scope="col">Porto_provenienza</th>
    <th scope="col">Lunghezza in metri</th>
    <th scope="col">Canone Giornaliero</th>
    </tr>
    </thead>
    <?php
  
    while($row = mysqli_fetch_array($result)){
        ?>
     <tr>
     <th scope="row"class="person"> <a style="text-decoration: none;" href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[0]";?> </div></a></th>
     
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[1]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[2]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[3]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[4]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[6]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[7]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[8]";?> </div></a></td>
     <td class="person"> <a class="a"href="person.php?ID=<?php echo $row[0]; ?>"><div class="expand_person_link">  <?php echo "$row[10]";?> </div></a></td>
     
     
     </tr>
  <?php
    

    }
    ?>
    </table>
    <?php

}

?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>