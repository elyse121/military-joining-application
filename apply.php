<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RDF JOINING APPLICATION FORM</title>
    <style>
        body{
background-color: rgba(63, 58, 58, 0.5);
        }
        /* Existing CSS styles */
        h2 {
            font-family: Sans-serif;
            font-size: 24px;
            font-style: normal;
            font-weight: bold;
            color: blue;
            text-align: center;
            text-decoration: underline;
        }
        table {
            font-family: verdana;
            color: white;
            font-size: 16px;
            font-style: normal;
            font-weight: bold;
            background: linear-gradient(
    135deg,
    rgba(51, 204, 255, 0.8) 0%,
    rgba(255, 153, 204, 0.8) 50%,
    rgba(255, 204, 153, 0.8) 100%
  );            border-collapse: collapse;
            border: 4px solid #000000;
            border-style: dashed;
            margin: 0 auto;
        }

        input[type=text],
        input[type=email],
        input[type=number],
        textarea,
        select {
            width: 90%;
            padding: 6px 12px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type=submit],
        input[type=reset] {
            width: 15%;
            padding: 8px 12px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        

        
    </style>
</head>
<body>
    <h2>RDF JOINING APPLICATION FORM</h2>
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $sector = $_POST['sector'];
        $why = $_POST['why'];
        $marks = $_POST['marks'];
        $status = $_POST['status'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $combination = $_POST['combination'];
        
        
        
        // File upload handling
        $documentFile = $_FILES['pdffile']['name']; // Get the name of the uploaded file
        $documentFileTmp = $_FILES['pdffile']['tmp_name']; // Get the temporary file location
        
        $targetDirectory = "documents"; // Directory where you want to store the uploaded files
        $targetFilePath = $targetDirectory . basename($documentFile);
        move_uploaded_file($documentFileTmp, $targetFilePath);

        // Prepare and bind the SQL statement using prepared statements
        $stmt = $conn->prepare("INSERT INTO form (fnamee, lname, email, id, phone,  gender, dob,  province, district, sector, why, marks, height, weight, combination, document_file , status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssss", $fname, $lname, $email, $id, $phone, $gender, $dob, $province,  $district, $sector, $why, $marks, $height, $weight, $combination, $targetFilePath, $status);

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
<form class="registration-form" action="" method="POST" enctype="multipart/form-data">
    <table cellpadding="10">
   
        <tr>
            <td>fname</td>
            <td><input type="text" name="fname" maxlength="50" placeholder="First Name" /></td>
        </tr>
        <tr>
            <td>lname</td>
            <td><input type="text" name="lname" maxlength="50" placeholder="Last Name" /></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="email" name="email" maxlength="100" placeholder="youremail@gmail.com" /></td>
        </tr>
        <tr>
            <td>id</td>
            <td><input type="text" name="id" maxlength="15" placeholder="********" /></td>
        </tr>
        <tr>
            <td>phone</td>
            <td><input type="text" name="phone" maxlength="15" placeholder="+250xxxxxxxxx" /></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </td>
        </tr>
        
        <tr>
          
        <tr>
            <td>dob</td>
            <td><input type="date" name="dob" /></td>
        </tr>
        <tr>
    <td>Province</td>
    <td>
        <select name="province">
            <option value="Northern Province">Northern Province</option>
            <option value="Eastern Province">Eastern Province</option>
            <option value="Southern Province">Southern Province</option>
            <option value="Western Province">Western Province</option>
            <option value="Kigali City">Kigali City</option>
        </select>
    </td>
</tr>

        <tr>
    <td>District</td>
    <td>
        <select name="district">
            <option value="Gasabo">Gasabo</option>
            <option value="Kicukiro">Kicukiro</option>
            <option value="Nyarugenge">Nyarugenge</option>
            <option value="Bugesera">Bugesera</option>
            <option value="Gatsibo">Gatsibo</option>
            <option value="Kayonza">Kayonza</option>
            <option value="Rwamagana">Rwamagana</option>
            <option value="Ruhango">Ruhango</option>
            <option value="Muhanga">Muhanga</option>
            <option value="Nyanza">Nyanza</option>
            <option value="Huye">Huye</option>
            <option value="Gisagara">Gisagara</option>
            <option value="Nyamagabe">Nyamagabe</option>
            <option value="Nyaruguru">Nyaruguru</option>
            <option value="Karongi">Karongi</option>
            <option value="Rutsiro">Rutsiro</option>
            <option value="Rubavu">Rubavu</option>
            <option value="Nyabihu">Nyabihu</option>
            <option value="Ruhango">Ruhango</option>
            <option value="Ngororero">Ngororero</option>
            <option value="Nyamasheke">Nyamasheke</option>
            <option value="Rusizi">Rusizi</option>
            <option value="Kirehe">Kirehe</option>
            <option value="Ngoma">Ngoma</option>
            <option value="Kayonza">Kayonza</option>
            <option value="Kicukiro">Kicukiro</option>
            <option value="Rubavu">Rubavu</option>
            <option value="Gakenke">Gakenke</option>
            <option value="Gicumbi">Gicumbi</option>
            <option value="Burera">Burera</option>
        </select>
    </td>
</tr>

        <tr>
            <td>sector</td>
            <td><input type="text" name="sector" maxlength="50" placeholder="Sector" /></td>
        </tr>
        <tr>
            <td>why</td>
            <td><textarea name="why" rows="4" cols="30" placeholder="At least ten lines"></textarea></td>
        </tr>
        <tr>
    <td>marks</td>
    <td><input type="text" name="marks" id="marks-input" maxlength="50" placeholder="Marks" /></td>
</tr>
<script>
    var marksInput = document.getElementById("marks-input");

    marksInput.addEventListener("blur", function() {
        var marks = parseFloat(marksInput.value);

        if (marks < 0 || marks > 60) {
            alert("Invalid marks! Please enter a value between 0 and 60.");
            marksInput.value = "";
            marksInput.focus();
        }
    });
</script>
        <tr>
            <td>height</td>
            <td><input type="text" name="height" maxlength="50" placeholder="Height" /></td>
        </tr>
        <tr>
            <td>weight</td>
            <td><input type="text" name="weight" maxlength="50" placeholder="Weight" /></td>
        </tr>
        <tr>
            <td>combination</td>
            <td><input type="text" name="combination" maxlength="50" placeholder="Combination" /></td>
        </tr>
        <tr>
            <td>Upload PDF</td>
            <td><input type="file" name="pdffile" id="pdffile" accept=".pdf" /></td>
        </tr>
        <tr>
            <td>status</td>
            <td><input type="text" name="status"  /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
