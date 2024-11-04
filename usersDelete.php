<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
$konekcija=mysqli_connect("localhost","root","","pva");
if(mysqli_connect_errno()){
    die ("Neuspela konekcija sa bazom <br>Poruka o gresci:".mysqli_connect_error());
}
$id=$_GET['id'];
$upit="DELETE FROM student WHERE ID_STUDENTA={$id}";
mysqli_query($konekcija, $upit);
if(mysqli_affected_rows($konekcija)!=1){
    echo "<div class='container'><h1 class='display-5'>Greska prilikom brisanja studenta. Obrisano studenta: ".mysqli_affected_rows($konekcija)."</h1><br><br><a href='index.php' class='btn btn-primary btn-sm'>Povratak</a></div>";
    exit();
    
}
else
    header("Location: index.php");
?>
</body>
</html>
