<?php error_reporting(0);
include("connection.php");
if ($con) {
    //echo "connection established";
    echo '<script type="text/javascript">';
    echo 'var connectionStatus = document.getElementById("database")';
    echo 'connectionStatus.style.color = "green"';
    echo '</script>';
} else {
    echo "connection failed";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5rem;
            color: #007bff;
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

        .search-button a {
            width: fit-content;
            align-items: start;
            text-decoration: none;
        }

        button {
            margin-top: 10px;
            padding: 13px 20px;
            background: linear-gradient(345deg, rgb(12 64 197), #34c0c2);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: fit-content;
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
            width: fit-content;
            height: fit-content;
        }

        #create a {
            text-decoration: none;
            color: white;
        }

        #create {
            background: linear-gradient(345deg, rgb(12 64 197), #34c0c2);
        }

        button[type="button"] {
            background: linear-gradient(345deg, rgb(12 64 197), #34c0c2);
        }

        table {
            width: 100%;
            align-items: center;
            border-collapse: collapse;
            margin-bottom: 20px;
            height: auto;
            text-align: left;
            
        }

        /* Style table headers */
        th {
            background-color: #f2f2f6;
            /* padding: 10px; */
        }

        /* Style table rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Style table cells */
        td {
            padding: 10px;
            height: auto;
            
            
        }

        /* Style the "Action" column */
        td[colspan="2"] {
            text-align: center;
            
        }

        /* Style buttons in the "Action" column */
        table button {
            padding: 5px 10px;
            background: linear-gradient(345deg, rgb(12 64 197), #34c0c2);
            width: auto;
            border: none;
            cursor: pointer;
        }
        .delete a,
        .edit a{
            color: #ffffff;
        }
        .action{
            text-align: center;
        }

        .notes-col{
            width: 20%;
            height: auto;
        }

        .disp-table a {
            text-decoration: none;
        }
        .head-col{
            font-weight: bold;
            background:#70a7e2;
        }

        /* Add some margin to buttons */
        button:not(:last-child) {
            margin-right: 5px;
        }

        #database {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
    <span id="database">database</span>

    <!--heading-->
    <h1 id="heading">Contact Information</h1>

    <!----navbar--->
    <div class="header">
        <div class="searchsection">
            <form method="post">
                <input type="search" name="search-contact" id="contact-serch" placeholder="search">
                <button type="submit" class="search-button" id="search-button" name="submit">search</button>
            </form>
        </div>
        <button type="button" id="create"><a href="insert.php">create contact</a></button>
    </div>
    <?php
    //******************************search logic*****************************************************
    if (isset($_POST['submit'])) {
        $sname = $_POST['search-contact'];
        echo $sname;
        // header("Location: search.php?name=".$sname);
        echo '<script type="text/javascript">';
            echo 'window.location.href ="search.php?sname='.$sname.'"'; // Reload the current page
            echo '</script>';
    }
    ?>


    <!---display table----->
    <table class="disp-table" border="2" >
        <tr>
            <td class="head-col">Name</td>
            <td class="head-col">Email</td>
            <td class="head-col">Contact Number</td>
            <!-- <td>Address</td> -->
            <td class="head-col">Organization</td>
            <td class="head-col">Job Title</td>
            <!-- <td>Web Address</td> -->
            <!-- <td class="notes-col">notes</td> -->
            <td class="head-col" colspan="2">Action</td>
        </tr>

        <!---data retrieve----->
        <?php
       
        $sql = "SELECT * FROM contact_details";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $email = $row['Email'];
                $phoneNumber = $row['phoneNumber'];
                // $address = $row['address'];
                $organization = $row['organization'];
                $jobTitle = $row['jobTitle'];
                $webAddress = $row['webAddress'];
                $notes = $row['notes'];
                echo "<tr>";
                echo "<td>$firstName  $lastName</td>";
                echo "<td>$email</td>";
                echo "<td>$phoneNumber</td>";
                // echo "<td>$address</td>";
                echo "<td>$organization</td>";
                echo "<td>$jobTitle</td>";
                // echo "<td>$webAddress</td>";
                // echo "<td class='notes-col'>$notes</td>";
                echo "<td class='action'><button class='edit'><a href='edit.php?editid=" . $id . "'>Edit</a></button></td>";
                echo "<td class='action'><button class='delete'><a href='delete.php?deleteid=" . $id . "'>Delete</a></button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No items found.</td></tr>";
        }
        ?>
    </table>
</body>

</html>


<!----data uplod--->
<?php
if ($con) {
    //echo "connection established";
    echo '<script type="text/javascript">';
    echo 'document.getElementById("database").style.color = "green"';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'document.getElementById("database").style.color = "red"';
    echo '</script>';
}
// mysqli_set_charset($con, "utf8mb4");
///////////////////////////////////////////////////////
?>