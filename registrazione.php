<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="css/registrazione.css?ts=<?=time()?>">

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

<div> 
<form enctype="multipart/form-data" action="registrazione.php" method="POST"  id="register" AUTOCOMPLETE="Off"> 
    
<h1 style="font-size:25px">Registrazione</h1>





<div id="great_left_form">
<div id="left_form">  

<label class="title">Nome</label> 
<input type="text"  name="nome_proprietario" class="inp_text" autocomplete="off"> <br>

<h2 class="title">Cognome</h2> 
<input type="text"  name="cognome_proprietario" class="inp_text"><br>

<h2 class="title">Codice Fiscale</h2> 
<input type="text"  name="c_fiscale" class="inp_text"><br>

<h2 class="title">Email</h2> 
<input type="text"  name="email" class="inp_text"><br>

<h2 class="title">Telefono</h2> 
<input type="text"  name="telefono" class="inp_text"><br>

</div>

<div id="middle_form">
    
<h3 class="small_title"> Genere</h3>
<select id="genere" name="genere">
  <option value="maschio">Maschio
  <option value="femmina">Femmina
  
</select>

<h2 class="title">Nome imbarcazione</h2> 
<input type="text"  name="nome_imb" class="inp_text"><br>

<h2 class="title">Porto di provenienza</h2> 
<input type="text"  name="Porto_provenienza" class="inp_text"><br>

<h2 class="title">Lunghezza imbarcazione</h2>
 <input type="text"  name="lunghezza" class="inp_text"><br>

 <h3 class="small_title">Nazionalità imbarcazione</h3> 
<select id="nazionalita_imb" name="nazionalita_imb">
  <option value="italia">Italia
  <option value="francia">Francia
  <option value="svizzera">Svizzera
  
</select><br>

</div>
</div>



<div id="great_right_form">  

<div id="right_left_form">

<h3 class="small_title"> Data arrivo imbarcazione</h3>
<input type="date"  name="data_arrivo"><br>

<h3 class="small_title"> Tipo di propulsione</h3>
<select id="tipo_propulsione" name="tipo_propulsione">
  <option value="motore">motore
  <option value="vela">vela
  
</select><br>
<h3  class="small_title"> Foto imbarcazione</h3> <input type="file" name="foto_imbarcazione"><br>

<h3 class="small_title"> Patente Nautica</h3> <input type="file" name="patente_nautica"><br>

<h3  class="small_title"> Libretto di circolazione</h3> <input type="file" name="libretto_circolazione"><br>
</div>


<div id="right_right_form"> 


<h3  class="small_title"> Assicurazione imbarcazione</h3> <input type="file" name="assicurazione_imbarcazione"><br>
<h3  class="small_title"> Carta di identità</h3> <input type="file" name="carta_identita"><br>
</div>
</div>

<input type="submit" value="INVIA" name="invia" id="invia" > 





</form>


<?php

function validateEmail($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
        return true;
    }
    else {
       
        return false;
    }
}

if (isset($_POST['invia'])){
    $errore_inserimento=false;
if (isset($_POST['nome_imb'])&&isset($_POST['nazionalita_imb'])&&isset($_POST['data_arrivo'])&&isset($_POST['Porto_provenienza'])&&isset($_POST['lunghezza'])&&isset($_POST['tipo_propulsione'])&&isset($_POST['email'])&&isset($_POST['genere'])&&isset($_POST['telefono'])&&is_uploaded_file($_FILES['patente_nautica']['tmp_name'])&&is_uploaded_file($_FILES['foto_imbarcazione']['tmp_name'])&&is_uploaded_file($_FILES['libretto_circolazione']['tmp_name'])&&is_uploaded_file($_FILES['assicurazione_imbarcazione']['tmp_name'])&&is_uploaded_file($_FILES['carta_identita']['tmp_name'])){
    $errore_formato=false;
    $tariffa_base=100;
    $costo_propulsione;
    $costo_lunghezza=6;
    $costo_stagione=1;
    
    $nome=$_POST['nome_imb'];
    $nazionalita=$_POST['nazionalita_imb'];
    $data_arrivo=$_POST['data_arrivo'];
    $porto_provenienza=$_POST['Porto_provenienza'];
    $lunghezza=$_POST['lunghezza'];
    $propulsione=$_POST['tipo_propulsione'];
    $nome_proprietario=$_POST['nome_proprietario'];
    $cognome_priprietario=$_POST['cognome_proprietario'];
    $c_fiscale=$_POST['c_fiscale'];
    $email=$_POST['email'];
    $genere=$_POST['genere'];
    $telefono=$_POST['telefono'];
    
   
  
    if($lunghezza>10 && $lunghezza <=24 && validateEmail($email)){
       
    

       
        if($propulsione=="motore"){
            $costo_propulsione=40;
        }
        else if($propulsione=="vela"){
            $costo_propulsione=60;

        }

       
     
           
          
          
         

        
        
        $costo_lunghezza *=$lunghezza;

        $canone_giornaliero=$costo_propulsione+$costo_lunghezza+$tariffa_base+$costo_stagione;

       

        $connection=mysqli_connect("localhost","","","my_sciaccaportoturistico");

        
        $idimbarcazione=-1;

        for($j=0;$idimbarcazione==-1;$j++){

            $query="SELECT * from registrazioni WHERE id_imbarcazione='$j' ";
            $result=mysqli_query($connection,$query); 
            if(mysqli_num_rows($result)==0){
                $idimbarcazione=$j;
            }

        }
       
        

   
/////Dichiarazione Dei documenti


    ///Dichiarazione nomi 
    $patente_nautica=$_FILES['patente_nautica']['name'];
    $foto_imbarcazione=$_FILES['foto_imbarcazione']['name'];
    $libretto_circolazione=$_FILES['libretto_circolazione']['name'];
    $assicurazione_imbarcazione=$_FILES['assicurazione_imbarcazione']['name'];
    $carta_identita=$_FILES['carta_identita']['name'];

///Dichiarazione locazione temporanea
    $tmp_patente_nautica=$_FILES['patente_nautica']['tmp_name'];
    $tmp_foto_imbarcazione=$_FILES['foto_imbarcazione']['tmp_name'];
    $tmp_libretto_circolazione=$_FILES['libretto_circolazione']['tmp_name'];
    $tmp_assicurazione_imbarcazione=$_FILES['assicurazione_imbarcazione']['tmp_name'];
    $tmp_carta_identita=$_FILES['carta_identita']['tmp_name'];

///Dichiarazione estensione
    $type_patente_nautica=$_FILES['patente_nautica']['type'];
    $type_foto_imbarcazione=$_FILES['foto_imbarcazione']['type'];
    $type_libretto_circolazione=$_FILES['libretto_circolazione']['type'];
    $type_assicurazione_imbarcazione=$_FILES['assicurazione_imbarcazione']['type'];
    $type_carta_identita=$_FILES['carta_identita']['type'];
   

    if(!getimagesize($tmp_patente_nautica)||!getimagesize($tmp_assicurazione_imbarcazione)||!getimagesize($tmp_foto_imbarcazione)||!getimagesize($tmp_libretto_circolazione)||!getimagesize($tmp_carta_identita)){
            
        $errore_formato=true;


    }

if($errore_formato){

?>

<h2 style="background-color: gray;color: black;">I documenti devono essere in formato immagine</h2>

<?php

}

else {

        ///Locazione generica

        $dir='Documenti';

        ///Locazione sottocartella per ogni imbarcazione
        $dirImbarcazione=$dir.'/'.$nome_proprietario.'-'.$cognome_priprietario.'-'.$idimbarcazione;
       
       ///Controllo ed eventuale creazione della directory
        if(!is_dir($dirImbarcazione)){
            mkdir($dirImbarcazione);


        }
        
        //Locazione finale della patente
        $dirpatente=$dirImbarcazione.'/Patente nautica.png';


        ///Upload del file alla locazione finale

        move_uploaded_file($tmp_patente_nautica,$dirpatente);
            

       //Locazione finale della foto imbarcazione
        $dirfoto=$dirImbarcazione.'/Foto imbarcazione.png';

        
        move_uploaded_file($tmp_foto_imbarcazione,$dirfoto);


        //Locazione finale del libretto di circolazione
        $dirlibretto=$dirImbarcazione.'/Libretto circolazione.png';

       
        move_uploaded_file($tmp_libretto_circolazione,$dirlibretto);


       //Locazione finale della assicurazione
        $dirAssicurazione=$dirImbarcazione.'/Assicurazione imbarcazione.png';


        move_uploaded_file($tmp_assicurazione_imbarcazione,$dirAssicurazione);

        $dircarta_identita=$dirImbarcazione.'/Carta di identità.png';


        move_uploaded_file($tmp_carta_identita,$dircarta_identita);



        if($lunghezza<14){
            $sez = 1; 
   
        }
        else if($lunghezza<18){
           $sez = 2; 
        }
        else if($lunghezza<22){
   
           $sez = 3;
        }
   
        else if($lunghezza<=24){
           $sez = 4;
   
        }
       
      
        $query="INSERT INTO registrazioni  VALUES ('$idimbarcazione','$nome_proprietario','$cognome_priprietario','$c_fiscale','$nome','$nazionalita',
        '$data_arrivo','$porto_provenienza','$lunghezza','$propulsione','$canone_giornaliero','$email','$telefono','$genere')";

        $result=mysqli_query($connection,$query )or die (mysqli_error($connection));

        $query="INSERT INTO postazioni VALUES ('$sez','$nome','$idimbarcazione','$lunghezza')";
        $result=mysqli_query($connection,$query);

       
       

        
       
        

       ?>
        
        <h2 style="font-size:30px;color: white;margin-top: 60px;">Registrazione effettuata</h2>
        <p style="font-size: 20px;color: white;">Costo giornaliero : <?php echo "$canone_giornaliero euro"; ?></p>
        <p style="font-size: 20px;color: white;">ID assegnato : <?php echo "$idimbarcazione "; ?></p>
       
       <?php
        
    }
        

    } 
    if($lunghezza<10 || $lunghezza>24){

        ?>
        <div class="alert alert-danger alert-dismissible fade show fixed-top " role="alert">
  <strong>ERRORE </strong> La lunghezza della imbarcazione deve essere compresa tra 10m e 24m 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
       
        <?php
        
        }

         if(!validateEmail($email)){

            ?>
            <div class="alert alert-danger alert-dismissible fade show fixed-top " role="alert">
  <strong>ERRORE </strong> Email non corretta
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
          
            <?php

        }
    

    }
    else {   

        $errore_inserimento=true;
        ?>
       <div class="alert alert-danger alert-dismissible fade show fixed-bottom bottom-0" role="alert">
  <strong>ERRORE </strong> Inserisci tutti i parametri richiesti
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
         
        <?php
        
        }
}


?>





</div>
    
</body>
</html>