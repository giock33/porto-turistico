<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imbarcazioni</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/imbarcazioni.css?ts=<?=time()?>">
</head>
<body style="background-image: url('back.jpg');">
 <!--Navigation bar-->
 <div id="nav-placeholder"></div>

<script>
$(function(){
  $("#nav-placeholder").load("navigation_bar.html");
});
</script>
<!--end of Navigation bar-->
         
<div>
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

$connection=mysqli_connect("localhost","root","","porto");
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


    <table>
    <tr>
    <th>Id imbarcazione</th>
    <th>nome</th>
    <th>cognome</th>
    <th>codice_fiscale</th>
    <th>nome_imbarcazione </th>
    <th>nazionalità_imbarcazione</th>
   <th>Data_arrivo</th>
    <th>Porto_provenienza</th>
    <th>Lunghezza in metri</th>
    <th>Tipo_Propulsione</th>
    <th>Canone Giornaliero</th>
    </tr>
    <?php
  
    while($row = mysqli_fetch_array($result)){
        ?>
     <tr>
     <td><?php echo "$row[0]";?></td>
     <td><?php echo "$row[1]";?></td>
     <td><?php echo "$row[2]";?></td>
     <td><?php echo "$row[3]";?></td>
     <td><?php echo "$row[4]";?></td>
     <td><?php echo "$row[5]";?></td>
     <td><?php echo "$row[6]";?></td>
     <td><?php echo "$row[7]";?></td>
     <td><?php echo "$row[8]";?></td>
     <td><?php echo "$row[9]";?></td>
     <td><?php echo "$row[10]";?></td>
     
     </tr>
  <?php
    

    }

}

  

  if($ricerca){ 
    $query="SELECT * from registrazioni ORDER BY $ordine";

    $result=mysqli_query($connection,$query);
?>


    <table  style='margin-top:100px;background-color: cadetblue;text-align: center;'>
    <tr>
    <th>Id imbarcazione</th>
    <th>nome</th>
    <th>cognome</th>
    <th>codice_fiscale</th>
    <th>nome_imbarcazione </th>
    <th>nazionalità_imbarcazione</th>
   <th>Data_arrivo</th>
    <th>Porto_provenienza</th>
    <th>Lunghezza in metri</th>
    <th>Tipo_Propulsione</th>
    <th>Canone Giornaliero</th>
    </tr>
    <?php
  
    while($row = mysqli_fetch_array($result)){
        ?>
     <tr>
     <td><?php echo "$row[0]";?></td>
     <td><?php echo "$row[1]";?></td>
     <td><?php echo "$row[2]";?></td>
     <td><?php echo "$row[3]";?></td>
     <td><?php echo "$row[4]";?></td>
     <td><?php echo "$row[5]";?></td>
     <td><?php echo "$row[6]";?></td>
     <td><?php echo "$row[7]";?></td>
     <td><?php echo "$row[8]";?></td>
     <td><?php echo "$row[9]";?></td>
     <td><?php echo "$row[10]";?></td>
     
     </tr>
  <?php
    

    }

}




?>
</body>
</html>