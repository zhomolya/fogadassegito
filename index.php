<?php
// Indítjuk a session-t
session_start();

if (!isset($_SESSION['a_valnyert'])) {
    $_SESSION['a_valnyert'] = 0;} 

if (!isset($_SESSION['b_velnyert'])) {
        $_SESSION['b_velnyert'] = 0;}
        
if (!isset($_SESSION['a_rarakott'])) {
        $_SESSION['a_rarakott'] = 0;} 

if (!isset($_SESSION['b_rerakott'])) {
    $_SESSION['b_rerakott'] = 0;} 


if(isset($_POST['gomb1'])){
    $_SESSION['a_valnyert'] = 0;
    $_SESSION['a_rarakott']=0;
    $_SESSION['b_velnyert'] = 0;
    $_SESSION['b_rerakott']=0;
}

// Ellenőrizzük, hogy a POST adatok be lettek-e küldve
if(isset($_POST['ertek1']) && isset($_POST['ertek2'])) {
    // Az értékeket beolvassuk a POST adatokból és float-vá alakítjuk őket, majd összeszorozzuk
    $szorzat = floatval($_POST['ertek1']) * floatval($_POST['ertek2']);
    
    // A szorzatot elmentjük a session változóba
    $_SESSION['a_valnyert'] = ($szorzat-$_POST['ertek1'])+$_SESSION['a_valnyert'];
    $_SESSION['a_rarakott']=$_SESSION['a_rarakott']+$_POST['ertek1'];
}

if(isset($_POST['ertek3']) && isset($_POST['ertek4'])) {
    // Az értékeket beolvassuk a POST adatokból és float-vá alakítjuk őket, majd összeszorozzuk
    $szorzat = floatval($_POST['ertek3']) * floatval($_POST['ertek4']);
    
    // A szorzatot elmentjük a session változóba
    $_SESSION['b_velnyert'] = ($szorzat-$_POST['ertek3'])+$_SESSION['b_velnyert'];
    $_SESSION['b_rerakott']=$_SESSION['b_rerakott']+$_POST['ertek3'];
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
    if(isset($_SESSION['a_valnyert'])) {
        echo "<p>A-val nyert: " . $_SESSION['a_valnyert'] . "</p>";
        
    };
    if(isset($_SESSION['b_rerakott'])) {
       
        echo "<p>A-ra rakott: " . $_SESSION['a_rarakott'] . "</p>";
    };
    ?>

<form method="post" action="">
        <label for="ertek3">Első érték:</label>
        <input type="number" id="ertek3" name="ertek3" step="any">
        <br>
        <label for="ertek4">Második érték:</label>
        <input type="number" id="ertek4" name="ertek4" step="any">
        <br>
        <button type="submit">Szorozzunk!</button>
    </form>
    <?php
    // Ha van szorzat értékünk a session-ban, kiírjuk azt
    if(isset($_SESSION['b_velnyert'])) {
        echo "<p>b nyereség eredménye: " . $_SESSION['b_velnyert'] . "</p>";
       
    }
    if(isset($_SESSION['a_rarakott'])) {
     
        echo "<p>B vereség eredménye: " . $_SESSION['b_rerakott'] . "</p>";
    }




    ?>
<form method="post" action="">
    <input type="submit" name="gomb1" value="törlés">

</form>

</body>
</html>
