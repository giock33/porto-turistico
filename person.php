<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/person.css?ts=<?=time()?>">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title>Utente</title>

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


$id_imbarcazione= $_GET['ID'];
$connection=mysqli_connect("localhost","","","my_sciaccaportoturistico");

$query="SELECT * from registrazioni WHERE id_imbarcazione='$id_imbarcazione'";
$querysezione="SELECT Sezione from postazioni WHERE Id_imbarcazione='$id_imbarcazione'";

$result=mysqli_query($connection,$query)or die(mysqli_error($connection));
$resultsezione=mysqli_query($connection,$querysezione)or die(mysqli_error($connection));

while($row=mysqli_fetch_array($result)){

    
    $nome=$row[1];
    $cognome=$row[2];
    $codice_fiscale=$row[3];
    $nome_imbarcazione=$row[4];
    $nazionalita_imbarcazione=$row[5];
    $data_arrivo=$row[6];
    $porto_provenienza=$row[7];
    $lunghezza=$row[8];
    $propulsione=$row[9];
    $costo_giornaliero=$row[10];
    $email=$row[11];
    $telefono=$row[12];
    $genere=$row[13];
}
while($row=mysqli_fetch_array($resultsezione)){

    $sezione=$row[0];


}

if($genere=="maschio"){

    $icona_utente="icona_utente_uomo.jpg";

}
else {

    $icona_utente="icona_utente_donna.png";

}



//cartella generale di tutti i documenti
$cartella_documenti="./Documenti";

//cartella documenti dell utente 
$cartella_file_utente=$cartella_documenti.'/'.$nome.'-'.$cognome.'-'.$id_imbarcazione;


//////Carta di identità/////////


//identifico carta di identità senza estensione
$carta_di_identita=$cartella_file_utente.'/Carta di identità';

//ipotizzo la estensione della carta di identità
$carta_di_identita_png=$carta_di_identita.'.png';
$carta_di_identita_jpg=$carta_di_identita.'.jpg';
$carta_di_identita_jpeg=$carta_di_identita.'.jpeg';


//controllo la estensione della carta di identità 
if(file_exists($carta_di_identita_png)){

    $vera_carta_di_identita=$carta_di_identita_png;


}
else if(file_exists($carta_di_identita_jpg)){
    

    $vera_carta_di_identita=$carta_di_identita_jpg;


}

else if(file_exists($carta_di_identita_jpeg)){

    $vera_carta_di_identita=$carta_di_identita_jpeg;


}




//identifico patente nautica senza estensione
$patente_nautica=$cartella_file_utente.'/Patente nautica';

//ipotizzo la estensione della patente nautica
$patente_nautica_png=$patente_nautica.'.png';
$patente_nautica_jpg=$patente_nautica.'.jpg';
$patente_nautica_jpeg=$patente_nautica.'.jpeg';


//controllo la estensione della patente nautica
if(file_exists($patente_nautica_png)){

    $vera_patente_nautica=$patente_nautica_png;


}
else if(file_exists($patente_nautica_jpg)){
    

    $vera_patente_nautica=$patente_nautica_jpg;


}

else if(file_exists($patente_nautica_jpeg)){

    $vera_patente_nautica=$patente_nautica_jpeg;


}

//identifico foto imbarcazione senza estensione
$foto_imbarcazione=$cartella_file_utente.'/Foto imbarcazione';

//ipotizzo la estensione della foto imbarcazione
$foto_imbarcazione_png=$foto_imbarcazione.'.png';
$foto_imbarcazione_jpg=$foto_imbarcazione.'.jpg';
$foto_imbarcazione_jpeg=$foto_imbarcazione.'.jpeg';


//controllo la estensione della foto imbarcazione
if(file_exists($foto_imbarcazione_png)){

    $vera_foto_imbarcazione=$foto_imbarcazione_png;


}
else if(file_exists($foto_imbarcazione_jpg)){
    

    $vera_foto_imbarcazione=$foto_imbarcazione_jpg;


}

else if(file_exists($foto_imbarcazione_jpeg)){

    $vera_foto_imbarcazione=$foto_imbarcazione_jpeg;


}



//identifico libretto di circolazione senza estensione
$libretto_circolazione=$cartella_file_utente.'/Libretto circolazione';

//ipotizzo la estensione del libretto di circolazione
$libretto_circolazione_png=$libretto_circolazione.'.png';
$libretto_circolazione_jpg=$libretto_circolazione.'.jpg';
$libretto_circolazione_jpeg=$libretto_circolazione.'.jpeg';


//controllo la estensione del libretto di circolazione
if(file_exists($libretto_circolazione_png)){

    $vera_libretto_circolazione=$libretto_circolazione_png;


}
else if(file_exists($libretto_circolazione_jpg)){
    

    $vera_libretto_circolazione=$libretto_circolazione_jpg;


}

else if(file_exists($libretto_circolazione_jpeg)){

    $vera_libretto_circolazione=$libretto_circolazione_jpeg;


}



//identifico la assicurazione della imbarcazione senza estensione
$assicurazione_imbarcazione=$cartella_file_utente.'/Assicurazione imbarcazione';

//ipotizzo la estensione della assicurazione della imbarcazione
$assicurazione_imbarcazione_png=$assicurazione_imbarcazione.'.png';
$assicurazione_imbarcazione_jpg=$assicurazione_imbarcazione.'.jpg';
$assicurazione_imbarcazione_jpeg=$assicurazione_imbarcazione.'.jpeg';


//controllo la estensione della assicurazione della imbarcazione
if(file_exists($assicurazione_imbarcazione_png)){

    $vera_assicurazione_imbarcazione=$assicurazione_imbarcazione_png;


}
else if(file_exists($assicurazione_imbarcazione_jpg)){
    

    $vera_assicurazione_imbarcazione=$assicurazione_imbarcazione_jpg;


}

else if(file_exists($assicurazione_imbarcazione_jpeg)){

    $vera_assicurazione_imbarcazione=$assicurazione_imbarcazione_jpeg;


}

?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey" id="container" style="margin-top: 200px; margin-left:0px">
<div class="row" >
  <div class="profile-nav col-md-3" >
      <div class="panel">
          <div class="user-heading round"style="background-color: white;" >
              <a href="#">
                  <img src="<?php echo $icona_utente; ?>" style="width: 250px;height:250px; " alt="">
              </a>
              <h1 style="color: black;"><?php echo $nome."  ".$cognome;?></h1>
              <p  style="color: black;"><?php echo $email;?></p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li><a href="#"> <i class="fa fa-edit"></i> Modifica profilo</a></li>
              <li><a href="pagamento.php"> <i class="fa fa-edit"></i> Effettua pagamento</a></li>
              <li><a href="#"> <i class="fa fa-edit"></i> Effettua partenza</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">
          
         
      </div>
      <div class="panel">
         
          <div class="panel-body bio-graph-info" style="display: inline-block;width:40%;margin-top:0px">
              <h1 style="color: black; font-family:bold ">Dati utente</h1>
              <div class="row">
                  <div class="bio-row">
                      <p> Nome : <?php echo $nome;  ?></p>
                  </div>
                  <div class="bio-row">
                      <p> Cognome : <?php echo $cognome;  ?></p>
                  </div>

                  <div class="bio-row">
                      <p> Genere : <?php echo $genere;  ?></p>
                  </div>
                  
                 
                  <div class="bio-row">
                      <p>Email : <?php echo $email;?></p>
                  </div>
                
                  <div class="bio-row">
                      <p>Telefono : <?php echo $telefono;?></p>
                  </div>
                  <div class="bio-row">
                      <p>Data di arrivo : <?php echo $data_arrivo ?></p>
                  </div>
                  <div class="bio-row">
                      <p>Codice fiscale : <?php echo $codice_fiscale ?></p>
                  </div>
                 
                  <div class="bio-row">
                      <p>Pagamento giornaliero : <?php echo $costo_giornaliero ?> euro</p>
                  </div>

                  <div class="bio-row">
                  <a href="<?php echo $vera_carta_di_identita ?>"  target="_blank">Carta di identità</a>
                  </div>
                  <div class="bio-row">
                  <a href="<?php echo $vera_patente_nautica ?>"  target="_blank">Patente nautica</a>
                  </div>
                  <div class="bio-row">
                  <a href="<?php echo $vera_libretto_circolazione ?>"  target="_blank">Libretto di circolazione</a>
                  </div>
                  
              </div>
          </div>
          <div class="panel-body bio-graph-info" style="display: inline-block; width:40%;margin-left: 150px;margin-top:0px">
              <h1 style="color: black; font-family:bold ">Dati imbarcazione</h1>
              <div class="row" >
              <div class="bio-row">
                      <p> Id imbarcazione: <?php echo $id_imbarcazione ?></p>
                  </div>

                  <div class="bio-row">
                      <p>Nome imbarcazione : <?php echo $nome_imbarcazione ?></p>
                  </div>

                  <div class="bio-row" style="width: 100%;">
                      <p>Sezione del porto occupata : <?php echo $sezione ?></p>
                  </div>
                  <div class="bio-row">
                      <p>Porto di provenienza : <?php echo $porto_provenienza ?></p>
                  </div>
                  <div class="bio-row">
                      <p>Lunghezza : <?php echo $lunghezza ?> metri</p>
                  </div>

                  <div class="bio-row">
                  <a href="<?php echo $vera_foto_imbarcazione ?>"  target="_blank">Foto della imbarcazione</a>
                  </div>
                  <div class="bio-row">
                  <a href="<?php echo $vera_assicurazione_imbarcazione ?>"  target="_blank">Assicurazione della imbarcazione</a>
                  </div>


                  
              </div>
          </div>
      </div>



   <div id="bottom-conteiner-mail"> 

      <form action="" method="post" id="form-mail">
          <h1 class="title">Contatta</h1>

      <textarea name="area-mail" id="area-mail" cols="30" rows="10" placeholder="Inserisci testo della mail ..."></textarea>

      <button id="invia" name="invia">Invia mail</button>




      </form>


      <?php

      if(isset($_POST['invia'])&&isset($_POST['area-mail'])){

        $messaggio=$_POST['area-mail'];
        


        if(mail($email,"",$messaggio)){

            echo "Email inviata con successo";


        }
        else{

            echo "invio email fallito";
        }



      }



      ?>

      </div>





      
      

    
</body>
</html>