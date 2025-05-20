<?php
  include 'connexion.php';
 
  
  // Initialisation des messages
  $messages = [];
  $errors = [];
  
  // Ajouter une personne
  if (isset($_POST['add_personn'])) {
      $nom = trim($_POST['nom']);
      $prenom = trim($_POST['prenom']);
      $email = trim($_POST['email']);
  
      if (empty($nom) || empty($prenom) || empty($email)) {
          $errors[] = "Tous les champs sont obligatoires.";
      } else {
          $stmt = $pdo->prepare("INSERT INTO person (Nom, Prenom, email) VALUES (:nom, :prenom, :email)");
          $stmt->execute([':nom' => $nom, ':prenom' => $prenom, ':email' => $email]);
          $messages[] = "Personne ajoutée avec succès.";
      }
  }
  
  // Supprimer une personne
  if (isset($_POST['delete_personn'])) {
      $id = trim($_POST['id']);
  
      if (empty($id)) {
          $errors[] = "ID requis pour la suppression.";
      } else {
          $stmt = $pdo->prepare("DELETE FROM person WHERE ID = :id");
          $stmt->execute([':id' => $id]);
          $messages[] = "Personne supprimée avec succès.";
      }
  }
  
  // Modifier une personne
  if (isset($_POST['update_personn'])) {
      $id = trim($_POST['id']);
      $nom = trim($_POST['nom']);
      $prenom = trim($_POST['prenom']);
      $email = trim($_POST['email']);
  
      if (empty($id) || empty($nom) || empty($prenom) || empty($email)) {
          $errors[] = "Tous les champs sont requis pour la modification.";
      } else {
          $stmt = $pdo->prepare("UPDATE person SET Nom = :nom, Prenom = :prenom, email = :email WHERE ID = :id");
          $stmt->execute([':nom' => $nom, ':prenom' => $prenom, ':email' => $email, ':id' => $id]);
          $messages[] = "Personne modifiée avec succès.";
      }
  }
  
  // Récupérer toutes les personnes
  $stmt = $pdo->query("SELECT * FROM person");
  $persons = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <title>Gestion des Personnes</title>
      <style>
          body {
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              background: #f5f5f5;
              margin: 0;
              padding: 0;
          }
          header {
              background-color: #8b5e3c;
              color: white;
              padding: 20px;
              text-align: center;
              font-size: 24px;
              font-weight: bold;
          }
          .container {
              width: 90%;
              max-width: 900px;
              background: white;
              margin: 40px auto;
              padding: 30px;
              border-radius: 12px;
              box-shadow: 0 0 10px rgba(0,0,0,0.15);
          }
          h2 {
              color: #8b5e3c;
          }
          form {
              margin-bottom: 30px;
          }
          label {
              font-weight: bold;
              margin-top: 10px;
              display: block;
          }
          input[type="text"],
          input[type="email"],
          input[type="number"] {
              width: 100%;
              padding: 10px;
              margin-top: 6px;
              margin-bottom: 20px;
              border: 1px solid #ccc;
              border-radius: 6px;
          }
          button {
              background-color: #8b5e3c;
              color: white;
              border: none;
              padding: 12px 20px;
              font-size: 16px;
              border-radius: 6px;
              cursor: pointer;
          }
          button:hover {
              background-color: #6d4428;
          }
          table {
              width: 100%;
              border-collapse: collapse;
              margin-top: 30px;
          }
          th, td {
              border: 1px solid #ddd;
              padding: 12px;
              text-align: center;
          }
          th {
              background-color: #8b5e3c;
              color: white;
          }
          tr:nth-child(even) {
              background-color: #f9f9f9;
          }
          .message {
              padding: 10px;
              background-color: #d4edda;
              color: #155724;
              margin-bottom: 20px;
              border: 1px solid #c3e6cb;
              border-radius: 6px;
          }
          .error {
              padding: 10px;
              background-color: #f8d7da;
              color: #721c24;
              margin-bottom: 20px;
              border: 1px solid #f5c6cb;
              border-radius: 6px;
          }
      </style>
  </head>
  <body>
  
  <header>
      GESTION DES PERSONNES
  </header>
  
  <div class="container">
  
      <?php if (!empty($messages)): ?>
          <?php foreach ($messages as $message): ?>
              <div class="message"><?= htmlspecialchars($message) ?></div>
          <?php endforeach; ?>
      <?php endif; ?>
  
      <?php if (!empty($errors)): ?>
          <?php foreach ($errors as $error): ?>
              <div class="error"><?= htmlspecialchars($error) ?></div>
          <?php endforeach; ?>
      <?php endif; ?>
  
      <h2>Ajouter une personne</h2>
      <form method="POST" action="">
          <label>Nom :</label>
          <input type="text" name="nom" required>
  
          <label>Prénom :</label>
          <input type="text" name="prenom" required>
  
          <label>Email :</label>
          <input type="email" name="email" required>
  
          <button type="submit" name="add_personn">Ajouter</button>
      </form>
  
      <h2>Supprimer une personne</h2>
      <form method="POST" action="">
          <label>ID de la personne :</label>
          <input type="number" name="id" required min="1">
  
          <button type="submit" name="delete_personn">Supprimer</button>
      </form>
  
      <h2>Modifier une personne</h2>
      <form method="POST" action="">
          <label>ID de la personne :</label>
          <input type="number" name="id" required min="1">
  
          <label>Nouveau Nom :</label>
          <input type="text" name="nom" required>
  
          <label>Nouveau Prénom :</label>
          <input type="text" name="prenom" required>
  
          <label>Nouveau Email :</label>
          <input type="email" name="email" required>
  
          <button type="submit" name="update_personn">Modifier</button>
      </form>
  
      <h2>Liste des personnes</h2>
      <table>
          <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
          </tr>
          <?php foreach ($persons as $person): ?>
              <tr>
                  <td><?= htmlspecialchars($person['ID']) ?></td>
                  <td><?= htmlspecialchars($person['Nom']) ?></td>
                  <td><?= htmlspecialchars($person['Prenom']) ?></td>
                  <td><?= htmlspecialchars($person['email']) ?></td>
              </tr>
          <?php endforeach; ?>
      </table>
  
  </div>
  
  </body>
  </html>
  