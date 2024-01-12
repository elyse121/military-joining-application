<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
        .error {
            color: red;
        }
    </style>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="styles13.css" />
  </head>
  <body>
    <div class="container">
      <div class="center">
          <h1>Login</h1>
        
          <?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $username = $_POST['text'];
    $password = $_POST['password'];

    // Validate the username and password (you can add more validation if needed)
    if (!empty($username) && !empty($password)) {
        // Perform database query to check if the username and password exist in the "manager" table
        $servername = "localhost";
        $dbname = "idle-resources";
        $dbusername = "root";
        $dbpassword = "";

        // Create a new connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement
        $sql = "SELECT * FROM register_account WHERE name = '$username' AND cpassword='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User is authenticated, redirect to the dashboard page
         header("location: dashboard.html");
        } else {
            // Invalid credentials
            $error = "Invalid username or password";
        }

        // Close the database connection
        $conn->close();
    } else {
        // Empty username or password
        $error = "Please enter both username and password";
    }
}
?>

    <form action="" method="POST">
        <div class="txt_field">
            <input type="text" name="text" required>
            <span></span>
            <label>Username</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
        </div>
        <div class="pass">Forget Password?</div>
        
        <input type="submit" value="LOGIN" class="login-link">
        <div class="signup_link">
            Have an Account? <a href="register.html">Register now</a>
        </div>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
    </form>


      </div>
    </div>
  </body>
</html>