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
    <link href="longstyle1wq.css" rel="stylesheet">
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
                  <a href="indexdashboard1.html" target="_self">
                        <i class="fas fa-th-large"></i>
                        <div class="title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-stethoscope"></i>
                        <div class="title">APPLIERS</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user-md"></i>
                        <div class="title">LONG</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-puzzle-piece"></i>
                        <div class="title">1-YEAR</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div class="title">COMMANDS</div>
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

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT fname, location, phone, email, age FROM oneyear");
    $stmt->execute();

    // Bind the result variables
    $stmt->bind_result($fname, $location, $phone, $email, $age);
1
    // Fetch the data and populate the table
    echo '<table>
            <thead>
              <tr>
                <th>Telephone</th>
                <th>Name</th>
                <th>Location</th>
                <th>Email</th>
                <th>Age</th>
              </tr>
            </thead>
            <tbody>';

    while ($stmt->fetch()) {
        echo '<tr>
                <td>'.$phone.'</td>
                <td>'.$fname.'</td>
                <td>'.$location.'</td>
                 <td>'.$email.'</td>
                <td>'.$age.'</td>
              </tr>';
    }

    echo '</tbody>
          </table>';

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
?>
           
          
           
        </div>
</body>

</html>