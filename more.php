<html>
<html lang="en">

</html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <title> dashboard</title>
    <link href="dashboardstyleseemore.css" rel="stylesheet">
    <style>

.header {
      text-align: center;
      margin-bottom: 5px;
    }

    .info {
      display: flex;
      flex-wrap: wrap;
      gap: 5px;
      padding: 20px;
      
      border-radius: 10px;
      background-color: #efe6e6; /* Added background color inside bordered sections */
    }

    .item {
      width: calc(50% - 20px);
      margin-bottom: 20px;
    }

    .item label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    .item span {
      display: block;
      margin-bottom: 15px;
    }
     
    .photocopy img {
        margin-top: 200px;
        margin-left: 620px;
      width: 100%;
      max-width: 200px;
      height: auto;
      border: 2px solid #b83232;
      border-radius: 5px;
      padding: 5px;
      margin-bottom: 10px;
      background-color: #f9f9f9; /* Added background color inside the image bordered section */
    }
    .button-section {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

.button-section button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease; /* Smooth transition on hover */
}

.button-section button.admit {
  background-color: green;
  color: white;
  margin-right: 10px; /* Adjust margin-right for space between buttons */
}

.button-section button.not-admit {
  background-color: red;
  color: white;
  margin-left: 10px; /* Adjust margin-left for space between buttons */
}

.button-section button.admit:hover {
  background-color: black; /* Darker green on hover */
}

.button-section button.not-admit:hover {
  background-color: black; /* Darker red on hover */
}

    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-clinic-medical"></i>
                        <div class="title">RDF APPLICATION</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-th-large"></i>
                        <div class="title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-stethoscope"></i>
                        <div class="title">manage</div>
                    </a>
                </li>
                <li>
                  <a href="long.php" target="_self">

                        <i class="fas fa-user-md"></i>
                        <div class="title">Long</div>
                    </a>
                </li>
                <li>
                    <a href="ONEYEAR.php" target="_self">
                        <i class="fas fa-puzzle-piece"></i>
                        <div class="title">Set-time</div>
                    </a>
                </li>
                <li>
                    <a href="emails.php">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div class="title">Emails</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <div class="title">Settings</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        <div class="title">Help</div>
                    </a>
                </li>
            </ul>

        </div>
        <div class="main">
            <div class="top-bar">
                <div class="input-box">
                    <i class="uil uil-search"></i>
                    <input type="text" placeholder="Search here..." />
                    <button class="button">Search</button>
                </div>
                <i class="fas fa-bell"></i>
                <div class="user">
                    <img src="profile.png" alt="">
                </div>
            </div>
            <div class="cardd">
                
                </style>
              </head>
              
               





















              <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "generalform";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the ID from the URL parameter
$id = $_GET["id"];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT fnamee, lname, email, id, marks, height, phone, province, combination, gender,  dob FROM form WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

// Bind the result variables
$stmt->bind_result($fname, $lname, $email, $id, $marks, $height, $phone, $combination,  $province, $gender, $dob);

// Fetch the data
$stmt->fetch();

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>

<div class="paper">
<div class="header">
    <h1><?php echo $lname . ' ' . $fname . '\'s data'; ?></h1>
</div>



    <div class="info">
        <div class="item">
            <label for="name">Name:</label>
            <span><?php echo $fname . ' ' . $lname; ?></span>
        </div>
        <div class="item">
                <label for="age">Age:</label>
                <span><?php echo $dob; ?></span>
            </div>
            <div class="item">
                <label for="id">ID:</label>
                <span><?php echo $id; ?></span>
            </div>
            <div class="item">
                <label for="marks">marks:</label>
                <span><?php echo $marks; ?></span>
            </div>
            <div class="item">
                <label for="height">height:</label>
                <span><?php echo $height; ?></span>
            </div>
            <div class="item">
                <label for="combination">combination:</label>
                <span><?php echo $combination; ?></span>
            </div>
            
            <div class="item">
                <label for="email">Email:</label>
                <span><?php echo $email; ?></span>
            </div>
            <div class="item">
                <label for="location">Location:</label>
                <span><?php echo $province; ?></span>
            </div>
            <div class="item">
                <label for="phone">Phone Number:</label>
                <span><?php echo $phone; ?></span>
            </div>
            <div class="item">
                <label for="gender">Gender:</label>
                <span><?php echo $gender; ?></span>
            </div>
            <div class="item">
                <div class="photocopy">
                    <img src="ty/gako3.png" alt="Marks">
                </div>
            </div>

            <div class="button-section">
                <button class="admit">Admit</button>
                <button class="not-admit">Not Admit</button>
            </div>
        </div>
    </div>
</div>
              
                <script>
                  function animateLine(cardId, valueId) {
                    const line = document.getElementById(cardId);
                    const value = document.getElementById(valueId);
                    const width = value.innerText + 'px';
                    line.style.width = width;
                  }
              
                  // Call the function to animate lines for each card
                  animateLine('line1', 'value1');
                  animateLine('line2', 'value2');
                  animateLine('line3', 'value3');
                  animateLine('line4', 'value4');
                </script>
            </div>
           
            
        </div>
        </div>
       
</body>

</html>