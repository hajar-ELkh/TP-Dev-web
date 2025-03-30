
<!-- formulaire Section -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>FORMULAIRE</title>
        <link rel="stylesheet" href="style.css">
        <!-- Bibliothèque pour utiliser les icônes -->
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
                <nav class="nav">
                    <ul>
                        <li><a href="index.php">Formulaire</a></li>
                        <li><a href="cible.php">Données reçues</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <form id="form" action="cible.php" method="POST">
            <div>
                <label for="fname">FIRST NAME:</label> 
                <input type="text" id="fname" name="fname">

                <label for="lname">LAST NAME:</label> 
                <input type="text" id="lname" name="lname">

                <label for="email">EMAIL:</label>
                <input type="email" id="email" name="email">

                <label for="password">PASSWORD:</label>
                <input type="password" id="password" name="password">

                <label for="phone">TELEPHONE NUMBER:</label>
                <input type="tel" id="phone" name="phone">

                <label for="birthdate">DATE OF BIRTH:</label>
                <input type="date" id="birthdate" name="birthdate">

                <label for="gender">GENDER:</label> 
                <select name="gender" id="gender">
                  <option value="homme">Homme</option>
                  <option value="femme">Femme</option>
                </select>

                <label for="pic">PICTURE:</label>
                <input type="file" id="pic" name="pic" accept="image/*">

                <input type="submit" value="Submit">
            </div>
        </form>
        

 
</body>
</html>
