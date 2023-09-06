<?php error_reporting(0);
include "connection.php";
$id = $_GET['editid'];
$sql = "SELECT * FROM contact_details where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$email = $row['Email'];
$phoneNumber = $row['phoneNumber'];
$address = $row['address'];
$organization = $row['organization'];
$jobTitle = $row['jobTitle'];
$webAddress = $row['webAddress'];
$notes = $row['notes'];

// echo $firstName;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>

<body>
    <style>
        #database {
            font-size: 1.2rem;
            font-weight: bold;
        }

        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form {
            margin-top: 20px;
        }

        .form-grid {
            /* max-width: 600px; */
            margin-left: 200px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-grid1 {
            display: flex;
            width: fit-content;
            margin-left: 200px;
            gap: 20px;
            width: auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        #notes {
            width: 100%;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="url"],
        textarea {
            width: 60%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding-bottom: 20px;
        }

        #contact-serch {
            width: 60%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-button {
            width: fit-content;
            align-items: start;
        }

        button {
            margin-top: 10px;
            padding: 13px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 25%;
        }

        #subbtn {
            margin-top: 10px;
            padding: 13px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 25%;
        }

        #create {
            display: flex;
            justify-content: center;
        }

        #create {
            background: linear-gradient(345deg, rgb(12 64 197), #34c0c2);
        }

        button[type="button"] {
            background-color: #ccc;
        }

        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
    <span id="database">database</span>
    <form class="form" id="form1" method="POST">
        <div class="form-grid">
            <div>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required placeholder="firstname">
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required placeholder="lastname">
            </div>

            <div><label for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>" placeholder="6666699999">
            </div>

            <div><label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required placeholder="email@gmail.com">
            </div>

            <div><label for="organization">Organization</label>
                <input type="text" id="organization" name="organization" value="<?php echo $organization; ?>" placeholder="Company">
            </div>

            <div> <label for="jobTitle">Job Title</label>
                <input type="text" id="jobTitle" name="jobTitle" value="<?php echo $jobTitle; ?>" placeholder="Engineer">
            </div>

            <div><label for="address">Address</label>
                <input id="address" name="address" type="text" value="<?php echo $address; ?>" placeholder="Complete adress"></textarea>
            </div>

            <div><label for="webAddress">Web Address</label>
                <input type="text" id="webAddress" name="webAddress" value="<?php echo $webAddress; ?>" placeholder="https://.......">
            </div>

            <div><label for="notes">Notes</label>
                <textarea id="notes" name="notes" value="<?php echo $notes; ?> " rows="1"></textarea>
            </div>
        </div>
        <div class="form-grid1">
            <!-- <input type="submit" value="save" name="register" id="subbtn" > -->
            <button type="submit" value="save" name="register1">update</button>
            <button type="button" onclick="cancelForm()">Cancel</button>
        </div>
    </form>

</body>
<script>
    function cancelForm() {
        if (confirm("Are you sure?")) {
            window.location.href = "index.php";
        }
    }
</script>

</html>
<?php
if ($con) {
    //echo "connection established";
    echo '<script type="text/javascript">';
    echo 'document.getElementById("database").style.color="green"';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'document.getElementById("database").style.color="red"';
    echo '</script>';
    echo "connection failed";
}

if (isset($_POST['register1'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $organization = $_POST['organization'];
    $jobTitle = $_POST['jobTitle'];
    $address = $_POST['address'];
    $webAddress = $_POST['webAddress'];
    $notes = $_POST['notes'];
    // echo "hi";
    $sqll = "update `contact_details` set firstName='$firstName', lastName='$lastName', phoneNumber='$phoneNumber', email='$email', organization='$organization', jobTitle='$jobtitle', address='$address', webAddress='$webAddress', notes='$notes' where id=$id";
    $data = mysqli_query($con, $sqll);

    if ($data) {
        // echo "inserted";
        // header('location:index.php');
        echo '<script type="text/javascript">';
        echo 'window.location.href =" index.php";'; // Reload the current page
        echo '</script>';
    } else {
        echo "failed";
        die(mysqli_error($con));
    }
} else {
    //echo "failed";
}

?>