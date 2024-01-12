<html>
<head>
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Login Form</title>
<style>
body {
background-color:rgb(39, 37, 37);
background-size:cover;
background-position:center;
min-height:60vh;
font-family: sans-serif;
}

form {
width: 70%;
margin: 0 auto;
padding: 20px;
border: 5px solid #ccc;
color: white;
}

label {
display: block;
margin-bottom: 10px;
}

input {
border-radius:40px;
width: 100%;
height: 50px;
padding: 5px;
border: 1px solid #ccc;
}

.submit {
background-color: #008CBA;
color: white;
padding: 10px 20px;
border: none;
cursor: pointer;
border-radius:40px;
}
a {
  text-align:center;
}
  /* Style buttons */
.buttonload {
  background-color: White; /* Green background */
  border: none; /* Remove borders */
  color: black; /* White text */
  padding: 15px 100px 15px 100px; /* Some padding */
  font-size: 16px /* Set a font size */
}
#myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: red; /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 18px; /* Increase font size */
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
.buto {
  display: inline-block;
  border-radius: 50px;
  width: 90%;
  height: 80px;
  background-color: #ccc;
  transition: background-color 1s, color 0.2s;
  overflow: hidden;
  position: relative;
  justify-content: center;
  align-items: center;
}

.buto::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to right, blue, green, yellow);
  opacity: 0.5;
  pointer-events: none;
}

.buto:hover {
  background-color: #555;
}

.buto::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 50px;
  color: white;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
  z-index: 1;
}

/* Animation */
@keyframes changeBackground {
  0% { background-color: #ccc; }
  50% { background-color: #f00; }
  100% { background-color: #ccc; }
}

@keyframes changeForecolor {
  0%, 50% { color: white; }
  100% { color: black; }
}

.buto.animated-background {
  animation: changeBackground 2s infinite;
}

.buto.animated-forecolor {
  animation: changeForecolor 0.4s infinite;
}

</style>
</head>
<body >




 

  <?php
ob_start(); // Start output buffering

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
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $userPassword = mysqli_real_escape_string($conn, $_POST['userPassword']);

    // Prepare secure SQL query
    $stmt = $conn->prepare("SELECT * FROM manager WHERE fullname = ? AND userPassword = ?");
    $stmt->bind_param("ss", $fullname, $userPassword);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Successful login as admin
        session_start();
        $_SESSION['user'] = $fullname;
        $stmt->close();
        $conn->close(); // Close the database connection before redirecting
        header("Location: email.php");
        exit();
    } else {
        // Invalid credentials for both
        echo "Invalid username or password. Please try again.";
    }
}

// Close the database connection
$conn->close();
?>

<form method="post" action="role1.php">
    <fieldset>
        <legend>Log in as manager</legend>
        <div>
            <label for="clientName">Manager Name:</label>
            <input type="text" id="clientName" name="fullname" required>
        </div>
        <div>
            <label for="userPassword"><b>Password</b></label>
            <input type="text" placeholder="Enter Password" name="userPassword" required><br>
        </div>
        <div>
            <input type="submit" value="Login as manager">
        </div>
    </fieldset>
</form>

<div class="register-link">
    <p>Don't have an account? <a href="addnew1.php">Register</a></p>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script>// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}


function topFunction() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0; 
}</script>
</body>
</html>