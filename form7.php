
   <html>
<head>
    <title>FFORM</title>
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
        
        .registration-form {
            max-width: 400px;
            margin: 0 auto;
        }
      
      
       
.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="email"],
select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fname'];
        $location = $_POST['location'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        // Prepare and bind the SQL statement using prepared statements
        $stmt = $conn->prepare("INSERT INTO users (fname, location, phone, email, age) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $location, $phone, $email, $age);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>
    
    <form class="registration-form" action="form.php" method="POST">
        <div class="form-group">
            <label for="firstname">Names:</label>
            <input type="text" id="firstname" name="fname">
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="email">Age:</label>
            <input type="text" id="age" name="age">
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
