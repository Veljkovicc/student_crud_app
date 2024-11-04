<?php
$konekcija=mysqli_connect("localhost","root","","pva");
if(mysqli_connect_errno()){
    die ("Neuspela konekcija sa bazom <br>Poruka o gresci:".mysqli_connect_error());
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $upit="SELECT * FROM student WHERE ID_STUDENTA={$id}";
    $rez=mysqli_query($konekcija, $upit);
    $red=mysqli_fetch_assoc($rez);
    extract($red);
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
        <h4 class='display-4'>Izmeni studenta</h4><a href="index.php" class='btn btn-outline-dark'><- Nazad na pocetnu stranicu</a>
    </div><hr>
    <div class='container'>
    <form action="usersUpdate.php" method='post'> 
        <input type="text" name='id' readonly value="<?= $ID_STUDENTA?>"><br><br>
        <input type="text" name='ime' value="<?= $IME?>"><br><br>
        <input type="text" name='prezime' value="<?= $PREZIME?>"><br><br>
        <input type="text" name='smer' value="<?= $SMER?>"><br><br>
        <input type="text" name='broj' value="<?= $BROJ?>"><br><br>
        <input type="text" name='godina_upisa' value="<?= $GODINA_UPISA?>"><br><br>
        <button class='btn btn-outline-primary btn-lg' name='dugme'>Izmeni studenta</button><br><br>
    </form>
    </div>
    <?php
        if(isset($_POST['dugme'])){
            $id=$_POST['id'];   
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $smer=$_POST['smer'];
            $broj=$_POST['broj'];
            $godina_upisa=$_POST['godina_upisa'];
            if($ime!="" and $prezime!="" and $smer!="" and $broj!="" and $godina_upisa!=""){
                $upit="UPDATE student SET IME='{$ime}', PREZIME='{$prezime}', smer='{$smer}', broj='{$broj}', godina_upisa='{$godina_upisa}' WHERE ID_STUDENTA={$id}";
                mysqli_query($konekcija, $upit);
                echo "<div class='alert alert-success container'>Uspesno ste izmenili studenta!</div>";
                header("Location: index.php");
            }
                
        }
        
        mysqli_close($konekcija);
    ?>
</body>
</html>