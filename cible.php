<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULAIRE - Données reçues</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Formulaire */
        #form {
            background: white;
            padding: 20px;
            width: 60%;
            margin: 30px auto;
            margin-top: 60px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        #form div {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #form label {
            font-weight: bold;
            padding: 10px;
        }

        #form input,
        #form select {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        #form input[type="submit"] {
            background-color: #8b5e3c; /* Marron */
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        #form input[type="submit"]:hover {
            background-color: #6d4428;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="header-content">
        <div class="logo">FORMULAIRE</div>
        <div class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="cible.php">Données reçues</a>
    </div>
</header>

<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser les données reçues
    $fname = htmlspecialchars($_POST["fname"]);
    $lname = htmlspecialchars($_POST["lname"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $birthdate = htmlspecialchars($_POST["birthdate"]);
    $gender = htmlspecialchars($_POST["gender"]);
} else {
    echo "<p>Aucune donnée reçue.</p>";
    exit;
}
?>

<!-- Affichage du formulaire pré-rempli -->
<form id="form" action="cible.php" method="POST">
    <div>
        <label for="fname">FIRST NAME:</label> 
        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required>

        <label for="lname">LAST NAME:</label> 
        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required>

        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>

        <label for="phone">TELEPHONE NUMBER:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required>

        <label for="birthdate">DATE OF BIRTH:</label>
        <input type="date" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>" required>

        <label for="gender">GENDER:</label> 
        <select name="gender" id="gender" required>
            <option value="homme" <?php echo ($gender == "homme") ? "selected" : ""; ?>>Homme</option>
            <option value="femme" <?php echo ($gender == "femme") ? "selected" : ""; ?>>Femme</option>
        </select>

        <input type="submit" value="Submit">
    </div>
</form>

</body>
</html>
