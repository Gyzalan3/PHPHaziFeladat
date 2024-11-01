<?php
$errors=[];
$data=[];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])){
        $errors[]="Nem lehet üres a név";
    }else{
        $data["name"]=$_POST["name"];
        }
        if(empty($_POST["email"])||!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $errors[]="Érvénytelen email";
        }else{
            $data["email"]=$_POST["email"];
        }
        if (empty($_POST["password"]) || strlen($_POST["password"]) < 8 ||
            !preg_match('/[A-Z]/', $_POST["password"]) ||
            !preg_match('/[0-9]/', $_POST["password"]) ||
            !preg_match('/[\W]/', $_POST["password"])) {
            $errors[] = "A jelszónak minimum 8 karakterből kell állnia, tartalmaznia kell egy nagybetűt, egy számot és egy speciális karaktert.";
        } elseif ($_POST["password"] !== $_POST["password2"]) {
            $errors[] = "A jelszó és a jelszó megerősítése nem egyezik.";
        } else {
            $data["password"] = ($_POST["password"]);
        }
        if (empty($_POST["birthdate"]) || !strtotime($_POST["birthdate"])) {
            $errors[] = "A születési dátum érvénytelen.";
        } else {
            $data["birthdate"] = ($_POST["birthdate"]);
        }

        $data["gender"] = isset($_POST["gender"]) ? ($_POST["gender"]) : "";

        $data["interests"] = [];
        if (isset($_POST["sport"])) $data["interests"][] = "Sport";
        if (isset($_POST["mu"])) $data["interests"][] = "Művészet";
        if (isset($_POST["tud"])) $data["interests"][] = "Tudomány";
        $data["country"] = isset($_POST["country"]) ? ($_POST["country"]) : "";


        if ($errors) {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li style='color:red;'>$error</li>";
            }
            echo "</ul>";
        } else {
            echo "<h2>Bevitt adatok:</h2>";
            foreach ($data as $key => $value) {
                if ($key == "interests") {
                    echo "Érdeklődési területek: " . implode(", ", $value) . "<br>";
                } elseif ($value) {
                    echo ($key) . ": " . $value . "<br>";
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html>
<body>

<h1>Registráció</h1>
<form method="POST" action="">
    Név: <input type="text" name="name"><br>
    <br>
    E-mail: <input type="text" name="email"><br>
    <br>
    Jelszó: <input type="text" name="password"><br>
    <br>
    Jelszó újra: <input type="text" name="password2"><br>
    <br>
    Születési dátum: <input type="date" name="birthdate"><br>
    <br>
    Nem: <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
                value="female">Nő
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
           value="male">Férfi
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == "other") echo "checked"; ?>
           value="other">Más<br>
    <br>
    Érdeklődési területek:
    <br><input type="checkbox" name="sport" >Sport<br>
    <input type="checkbox" name="mu" >Művészet<br>
    <input type="checkbox" name="tud" >Tudomány<br>
    <br>
    Ország:
    <select name="country">
        <option value="">Válasszon országot</option>
        <option value="hungary">Magyarország</option>
        <option value="romania">Románia</option>
        <option value="germany">Németország</option>
        <option value="france">Franciaország</option>
        <option value="uk">Egyesült Királyság</option>
        <option value="usa">Amerikai Egyesült Államok</option>
        <option value="usa">Egyéb ország</option>
    </select><br>
    <br>

    <input type="submit">


</form>
</body>
</html>
