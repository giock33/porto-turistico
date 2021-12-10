<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abbonamenti in corso</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body style="background-image: url('back.jpg');">
<header class="l-header">
            <nav class="nav bd-grid">
                <div>
                    <a href="#" class="nav__logo" style="float: left;">Porto imbarcazioni <br>Sciacca's company</a>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="registrazione.php" class="nav__link active">Registrazione</a></li>
                        <li class="nav__item"><a href="abbonamenti_in_corso.php" class="nav__link">Imbarcazioni</a></li>
                        <li class="nav__item"><a href="postazioni.php" class="nav__link">posti d'imbarco</a></li>
                        <li class="nav__item"><a href="partenze.php" class="nav__link">partenze</a></li>
                        <li class="nav__item"><a href="ricerca.php" class="nav__link">Ricerca</a></li>
           
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>
    

<?php
 $connection=mysqli_connect("localhost","","","my_sciaccaportoturistico");
 $query="SELECT * from registrazioni ORDER BY id_imbarcazione";

 $result=mysqli_query($connection,$query);




   echo "<table border style='float:left;margin-top:100px;margin-left:10px;background-color: cadetblue;text-align: center;'>";
   echo "<tr>";
   echo "<th>id imbarcazione</th>";
   echo "<th>nome</th>";
   echo "<th>cognome</th>";
   echo "<th>codice_fiscale</th>";
   echo "<th>nome_imbarcazione </th>";
   echo "<th>nazionalità_imbarcazione</th>";
   echo "<th>Data_arrivo</th>";
   echo "<th>Porto_provenienza</th>";
   echo "<th>Lunghezza in metri</th>";
   echo "<th>Tipo_Propulsione</th>";
   echo "<th>Canone Giornaliero</th>";
   
   echo "</tr>";

   while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "<td>$row[4]</td>";
    echo "<td>$row[5]</td>";
    echo "<td>$row[6]</td>";
    echo "<td>$row[7]</td>";
    echo "<td>$row[8]</td>";
    echo "<td>$row[9]</td>";
    echo "<td>$row[10]</td>";
    echo "</tr>"; }



?>
<a href="index.html">Menu</a>
</body>
</html>