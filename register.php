<!DOCTYPE html>

  <head>
    <title>Home</title>
    
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="center">
          <h1>Register</h1>
          <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "idle-resources";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
       
    $stmt = $conn->prepare("INSERT INTO register_account (name, email, password, cpassword) VALUES ( ?, ?, ?, ?)");
        $stmt->bind_param("ssss",$name, $email, $password, $password );

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
$conn->close();
?>
          <form method="POST" action="">
              <div class="txt_field">
                  <input type="text" name="name" required>
                  <span></span>
                  <label>Name</label>
              </div>
              <div class="txt_field">
                  <input type="email" name="email" required>
                  <span></span>
                  <label>Email</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="password" required>
                  <span></span>
                  <label>Password</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="cpassword" required>
                  <span></span>
                  <label>Confirm Password</label>
              </div>
              <input name="submit" type="Submit" value="Sign Up">
             <div class="signup_link">
    Have an Account? <a href="login.html">Login Here</a>
</div>
          </form>
      </div>
  </div>
  </body>
</html>