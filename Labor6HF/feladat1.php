<?php
$errors = [];
$data = [];
if ($_SERVER['REQUEST_METHOD' ]== 'POST') {
    if (empty($_POST['firstName'])) {
        $errors[] = "First name is required.";
    } else {
        $data['First Name'] = htmlspecialchars($_POST['firstName']);
    }

    if (empty($_POST['lastName'])) {
        $errors[] = "Last name is required.";
    } else {
        $data['Last Name'] = htmlspecialchars($_POST['lastName']);
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    } else {
        $data['email'] = $_POST['email'];
    }
    if (empty($_POST['attend'])) {
        $errors[] = "Attend fields are required";
    } else {
        $data['Attending Events'] = implode(',', $_POST['attend']);
    }
    if (!isset($_FILES['abstract']) || $_FILES['abstract']['error'] != 0 || $_FILES['abstract']['type'] != 'application/pdf' || $_FILES['abstract']['size'] > 3 * 1024 * 1024) {
        $errors[] = "Abstract upload is required in PDF format with a max size of 3MB.";
    }

    if (!isset($_POST['terms'])) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    if ($errors) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        foreach ($data as $key => $value) {
            echo "<p><strong>$key:</strong> $value</p>";
        }
    }
}


?>
<h3>Online conference registration</h3>

<form method="post" action="">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>
