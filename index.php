<?php
// Indítjuk a session-t
session_start();

if (!isset($_SESSION['anyereseg'])) {
    $_SESSION['anyereseg'] = 0;} 

if (!isset($_SESSION['bnyereseg'])) {
        $_SESSION['bnyereseg'] = 0;}
        
if (!isset($_SESSION['bveszteseg'])) {
        $_SESSION['bveszteseg'] = 0;} 

if (!isset($_SESSION['aveszteseg'])) {
    $_SESSION['aveszteseg'] = 0;} 


if(isset($_POST['gomb1'])){
    $_SESSION['anyereseg'] = 0;
    $_SESSION['bveszteseg']=0;
    $_SESSION['bnyereseg'] = 0;
    $_SESSION['aveszteseg']=0;
}

// Ellenőrizzük, hogy a POST adatok be lettek-e küldve
if(isset($_POST['ertek1']) && isset($_POST['ertek2'])) {
    // Az értékeket beolvassuk a POST adatokból és float-vá alakítjuk őket, majd összeszorozzuk
    $szorzat = floatval($_POST['ertek1']) * floatval($_POST['ertek2']);
    
    // A szorzatot elmentjük a session változóba
    $_SESSION['anyereseg'] = ($szorzat-$_POST['ertek1'])+$_SESSION['anyereseg'];
    $_SESSION['bveszteseg']=$_SESSION['bveszteseg']+$_POST['ertek1'];
}

if(isset($_POST['ertek3']) && isset($_POST['ertek4'])) {
    // Az értékeket beolvassuk a POST adatokból és float-vá alakítjuk őket, majd összeszorozzuk
    $szorzat = floatval($_POST['ertek3']) * floatval($_POST['ertek4']);
    
    // A szorzatot elmentjük a session változóba
    $_SESSION['bnyereseg'] = $szorzat-$_POST['ertek3'];
    $_SESSION['aveszteseg']=$_SESSION['aveszteseg']+$szorzat-$_POST['ertek1'];
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Szorzás és Session</title>
</head>
<a href="index.php">takarítás</a>

<body>
    <form method="post" action="">
        <label for="ertek1">Első érték:</label>
        <input type="number" id="ertek1" name="ertek1" step="any">
        <br>
        <label for="ertek2">Második érték:</label>
        <input type="number" id="ertek2" name="ertek2" step="any">
        <br>
        <button type="submit">Szorozzunk!</button>
    </form>

    <?php
    // Ha van szorzat értékünk a session-ban, kiírjuk azt
    if(isset($_SESSION['anyereseg'])) {
        echo "<p>A nyereség eredménye: " . $_SESSION['anyereseg'] . "</p>";
        
    };
    if(isset($_SESSION['aveszteseg'])) {
       
        echo "<p>A vereség eredménye: " . $_SESSION['aveszteseg'] . "</p>";
    };
    ?>


        <label for="ertek3">Első érték:</label>
        <input type="number" id="ertek1" name="ertek1" step="any">
        <br>
        <label for="ertek4">Második érték:</label>
        <input type="number" id="ertek2" name="ertek2" step="any">
        <br>
        <button type="submit">Szorozzunk!</button>
    </form>
    <?php
    // Ha van szorzat értékünk a session-ban, kiírjuk azt
    if(isset($_SESSION['bnyereseg'])) {
        echo "<p>b nyereség eredménye: " . $_SESSION['bnyereseg'] . "</p>";
       
    }
    if(isset($_SESSION['bveszteseg'])) {
     
        echo "<p>A vereség eredménye: " . $_SESSION['bveszteseg'] . "</p>";
    }




    ?>
<form method="post" action="">
    <input type="submit" name="gomb1" value="törlés">

</form>

</body>
</html>
