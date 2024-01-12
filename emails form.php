<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <style>
    body {
      background-image: url('ty/we.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 0;
      position: relative;
    }

    .form-container {
      max-width: 400px;
      width: 100%;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group textarea {
      height: 100px;
    }

    .submit-btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .success-message {
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      display: <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && isset($stmt) && $stmt->affected_rows > 0) ? 'block' : 'none'; ?>;
    }
  </style>
</head>
<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "registration";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $successMessage = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $names = $_POST['names'];
      $email = $_POST['email'];
      $message = $_POST['message'];

      // Prepare and bind the SQL statement using prepared statements
      $stmt = $conn->prepare("INSERT INTO emails (names, email, message) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $names, $email, $message);

      // Execute the prepared statement
      if ($stmt->execute()) {
          $successMessage = "Record updated successfully.";
      } else {
          echo "Error updating record: " . $stmt->error;
      }

      // Close the prepared statement
      $stmt->close();
  }

  // Close the database connection
  $conn->close();
  ?>

  <div class="success-message"><?php echo $successMessage; ?></div>

  <div class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="names" required>
      </div>
      <div class="form-group">
        <label for="email">Your Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" required></textarea>
      </div>
      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>
</body>
</html>
