<?php
$konekcija=mysqli_connect("localhost","root","","pva");
if(mysqli_connect_errno()){
    die ("Neuspela konekcija sa bazom <br>Poruka o gresci:".mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
   
    </style>
</head>
<body>
    <div class='container'>
        <h4 class='display-4'>Dodaj studenta</h4><a href="index.php" class='btn btn-outline-dark'><- Nazad na pocetnu stranicu</a>
    </div><hr>
    <div class='container'>
    <form action="usersAdd.php" method='post'> 
        <input type="text" name='ime' placeholder='Ime'><br><br>
        <input type="text" name='prezime' placeholder='Prezime'><br><br>
        <input type="text" name='smer' placeholder='Smer'><br><br>
        <input type="text" name='broj' placeholder='Broj'><br><br>
        <input type="text" name='godina_upisa' placeholder='Godina Upisa'><br><br>
        <button class='btn btn-outline-primary btn-lg' name='dugme'>Dodaj studenta</button><br><br>
    </form>
    </div>
    <?php
        if(isset($_POST['dugme'])){
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $smer=$_POST['smer'];
            $broj=$_POST['broj'];
            $godina_upisa=$_POST['godina_upisa'];
            if($ime!="" and $prezime!="" and $smer!="" and $broj!="" and $godina_upisa!=""){
                $upit="INSERT INTO student (IME, PREZIME, SMER, BROJ, GODINA_UPISA) VALUES ('{$ime}', '{$prezime}', '{$smer}', '{$broj}', '{$godina_upisa}')";
                mysqli_query($konekcija, $upit);
                echo "<div class='alert alert-success container'>Uspesno ste dodali studenta!</div>";
            }
            else
                echo "<div class='alert alert-danger container'>Svi podaci su neophodni!</div>";
        }
        
        mysqli_close($konekcija);
    ?>
</body>
</html>