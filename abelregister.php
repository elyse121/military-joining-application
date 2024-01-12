<html>
<head>
    <style>

        form {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        border: 15px solid #ccc;
        
        }
        
        label {
        display: block;
        margin-bottom: 20px;
        }
        
        input {
        border-radius:60px;
        width: 100%;
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
         .center {
            text-align: center;
          }
          /* Style buttons */
          
        
        .buttonload {
          background-color:green; /* Green background */
          border: none; /* Remove borders */
          color: black; /* White text */
          padding: 15px 100px 15px 100px; /* Some padding */
          font-size: 16px /* Set a font size */
        }
        .notification {
          background-color: #555;
          color:blue;
          text-decoration: none;
          padding: 15px 26px;
          position: relative;
          display: inline-block;
          border-radius: 2px;
        }
        
        .notification:hover {
          background: red;
         cursor: pointer;
         text-decoration: underline;
        }
        
        .notification .badge {
          position: absolute;
          top: -10px;
          right: -10px;
          padding: 5px 10px;
          border-radius: 50%;
          background: red;
          color: white;
        }
            
            .message {
              display: none;
              margin-top: 10px;
              color:blue;
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
        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid blue;
          border-right: 16px solid green;
          border-bottom: 16px solid red;
          border-left: 16px solid pink;
          width: 20px;
          height: 20px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
          display:inline-flex;
        }
        
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }
        
        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
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
        
        .dark-mode {
            background-color: #333;
            color: #fff;
          }
        
          .light-mode {
            background-color: #fff;
            color: #333;
          }
        </style>
<title>adding new manager</title>
</head>
<body>


<button onclick="showAllMessages()" class="notification">
  <span>Inbox</span>
  <span class="badge">3</span>
</button>

<div id="signupMessage" class="message">
  You must sign up and wait for acceptance.
</div>

<div id="organizationMessage" class="message">
  You must be in a given organization.
</div>

<div id="emailMessage" class="message">
  You must confirm your email within 24 hours.
</div>
<script>
  function showAllMessages() {
    var messages = document.getElementsByClassName('message');
    for (var i = 0; i < messages.length; i++) {
      messages[i].style.display = 'block';
    }
  }

  function showMessage(messageType) {
    var messages = document.getElementsByClassName('message');
    for (var i = 0; i < messages.length; i++) {
      messages[i].style.display = 'none';
    }

    var messageElement = document.getElementById(messageType + 'Message');
    if (messageElement) {
      messageElement.style.display = 'block';
    }
  }
</script>

<button class="buttonload">
  <i class="fa fa-spinner fa-spin"></i>Loading...
</button>

<button class="buttonload">
  <i class="fa fa-circle-o-notch fa-spin"></i>Loading...
</button>

<button class="buttonload">
  <i class="fa fa-refresh fa-spin"></i>Loading...
</button>
<script>
const currentTime = new Date().getHours();
let greeting;
if (currentTime >0 && currentTime<12) {
    greeting="Good morning! dear welcome to signup in page";
} else if (currentTime >11&& currentTime<17) {
    greeting="Good afternoon! dear welcome to signup in page";
} else {
    greeting="Good evening! dear welcome to signup in page";
}
window.onload = function() {
  alert(greeting);
};

</script>
<div class="loader"></div><div class="loader"></div><div class="loader"></div>
<div class="loader"></div><div class="loader"></div><div class="loader"></div>

<form action="" class="form-container" method="post">
    <button class="buto animated-background" onclick="this.classList.toggle('animated-forecolor')">
      <h1>signup form</h1>
        </button>

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
        $managerid = $_POST['managerid'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $company = $_POST['company'];
        $address = $_POST['address'];
        $notes = $_POST['notes'];
        $gender = $_POST['gender'];
        $userPassword = $_POST['psw'];
    $stmt = $conn->prepare("INSERT INTO manager (managerid,fullname, email, phone, company, address, notes, gender, userPassword) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss",$managerid, $fullname, $email, $phone, $company, $address,$notes,$gender, $userPassword );

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


  <form style="float:center;" method="post" >
  <fieldset>
    <legend>New Manager Information</legend>
	 <div>
      <label for="clientName">Manager id:</label>
      <input type="text" id="clientName" name="managerid" required>
    </div>
    <div>
      <label for="clientName">Manager Name:</label>
      <input type="text" id="clientName" name="fullname" required>
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div>
      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
      <small>Format: 10 digits without dashes or spaces</small>
    </div>
    <div>
      <label for="company">Company:</label>
      <input type="text" id="company" name="company" required>
    </div>
    <div>
      <label for="address">Address:</label>
      <textarea id="address" name="address" required></textarea>
    </div>
   <div>
      <label for="company">notes:</label>
      <input type="text" id="company" name="notes" required>
    </div>
    <div>
      <label for="company">gender:</label>
      <input type="text" id="company" name="gender" required>
    </div>
		  <label for="psw"><b>userPassword</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
    <div>
      <input type="submit" value="Add manager">
    </div>

  </fieldset>
</form>



<h3 id="DarkModetext"></h3>
	<button onclick="darkMode()">Darkmode</button>
	<button onclick="lightMode()">LightMode</button>
	<script>
		function darkMode() {
			let element = document.body;
			let content = document.getElementById("DarkModetext");
			element.className = "dark-mode";
		}
		function lightMode() {
			let element = document.body;
			let content = document.getElementById("DarkModetext");
			element.className = "light-mode";
		}
	</script>
</body>
</html>