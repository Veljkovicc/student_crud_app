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
</head>
<body>
   <div class="container">
        <h2 class="display-5">Prikaz studenta</h2>
        <hr>
        <a href="usersAdd.php" class="btn btn-outline-dark btn-lg container">Upis studenta</a>
        <br><br>
        <form action="index.php" method="post">
        <table class="table">
            <thead>
              <tr>
                <th scope="col"><input style='width: 100%;' type="text" name="terminId" placeholder="Unesite id pretrage">
                <button style='width: 100%; margin-top:10px;' class="btn btn-outline-primary btn-sm" name="pretraziId" style='margin-left: 15px;'>Pretrazi</button></th>
                <th scope="col"><input style='width: 100%;' type="text" name="terminIme" placeholder="Unesite ime pretrage">
                <button style='width: 100%; margin-top:10px;' class="btn btn-outline-primary btn-sm" name="pretraziIme" style='margin-left: 15px;'>Pretrazi</button></th>
                <th scope="col"><input style='width: 100%;' type="text" name="terminPrezime" placeholder="Unesite prezime pretrage">
                <button style='width: 100%; margin-top:10px;' class="btn btn-outline-primary btn-sm" name="pretraziPrezime" style='margin-left: 15px;'>Pretrazi</button></th>
                <th scope="col"><th scope="col"><input style='width: 100%;' type="text" name="terminSmer" placeholder="Unesite smer pretrage">
                <button style='width: 100%; margin-top:10px;' class="btn btn-outline-primary btn-sm" name="pretraziSmer" style='margin-left: 15px;'>Pretrazi</button></th>
              </tr>
            </thead>
            <tr>
                <td colspan='5'><button style='width: 100%;' class="btn btn-outline-primary" name="reset">Resetuj pretragu</button></td>
            </tr>
        </table>    
        <!-- <input type="text" name="terminId" placeholder="Unesite id pretrage">
        <button class="btn btn-outline-primary btn-sm" name="pretraziId" style='margin-left: 15px;'>Pretrazi</button>
        <input type="text" name="terminIme" placeholder="Unesite ime pretrage">
        <button class="btn btn-outline-primary btn-sm" name="pretraziIme" style='margin-left: 15px;'>Pretrazi</button>
        <input type="text" name="terminPrezime" placeholder="Unesite prezime pretrage">
        <button class="btn btn-outline-primary btn-sm" name="pretraziPrezime" style='margin-left: 15px;'>Pretrazi</button> -->
        </form>
        <br><br>
        <?php
            $upit="SELECT * FROM student";
            if(isset($_POST['terminId']) AND $_POST['terminId']!="")
                $upit="SELECT * FROM student WHERE ID_STUDENTA={$_POST['terminId']}";
            if(isset($_POST['terminIme']) AND $_POST['terminIme']!="")
                $upit="SELECT * FROM student WHERE IME LIKE ('%{$_POST['terminIme']}%')";    
            if(isset($_POST['terminPrezime']) AND $_POST['terminPrezime']!="")
                $upit="SELECT * FROM student WHERE PREZIME LIKE ('%{$_POST['terminPrezime']}%')";   
            if(isset($_POST['terminSmer']) AND $_POST['terminSmer']!="")
                $upit="SELECT * FROM student WHERE SMER LIKE ('%{$_POST['terminSmer']}%')";     
            $rez=mysqli_query($konekcija, $upit);
            echo '<table class="table">
            <thead>
              <tr>
                <th scope="col">Id Sudenta</th>
                <th scope="col">Ime</th>
                <th scope="col">Prezime</th>
                <th scope="col">Smer</th>
                <th scope="col">Broj</th>
                <th scope="col" style="text-align: center;">Godina upisa</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>';
            while($red=mysqli_fetch_assoc($rez)){
                echo "<tr>
                <th scope='row'>{$red['ID_STUDENTA']}</th>
                <td>{$red['IME']}</td>
                <td>{$red['PREZIME']}</td>
                <td>{$red['SMER']}</td>
                <td>{$red['BROJ']}</td>
                <td style='text-align: center;'>{$red['GODINA_UPISA']}</td>
                <td><a href='usersUpdate.php?id={$red['ID_STUDENTA']}'' class='btn btn-outline-success btn-sm'>Izmeni</a></td>
                <td><a href='usersDelete.php?id={$red['ID_STUDENTA']}' class='btn btn-outline-danger btn-sm'>Obrisi</a></td>
              </tr>";
            }
            echo '</tbody>
            </table>';
             mysqli_close($konekcija);
        ?>

    </div>
</body>
</html>