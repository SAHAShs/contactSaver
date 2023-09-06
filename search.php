<?php error_reporting(0);
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        /* Style table headers */
        th {
            background-color: #f2f2f2;
            text-align: left;
            padding: 10px;
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
        }

        /* Style the "Action" column */
        td[colspan="2"] {
            text-align: center;
        }

        /* Style buttons in the "Action" column */
        table button {
            padding: 5px 10px;
            background-color: #007bff;
            width: auto;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .disp-table a {
            text-decoration: none;
        }

        /* Add some margin to buttons */
        button:not(:last-child) {
            margin-right: 5px;
        }
        button {
            margin-top: 10px;
            padding: 13px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: fit-content;
        }

        #database {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
    <span id="database">database</span>
    <table class="disp-table" width="100%" border="1" cellspacing="1" cellpadding="1">
        <tr>
            <td>id</id>
            <td>Name</td>
            <td>Email</td>
            <td>Contact No.</td>
            <td>Address</td>
            <td>Organization</td>
            <td>Job Title</td>
            <td>Web Address</td>
            <td>notes</td>
            <td colspan="2">Action</td>
        </tr>

        <!---data retrieve----->
        <?php
        if ($con) {
            //echo "connection established";
            echo '<script type="text/javascript">';
            echo 'document.getElementById("database").style.color="green"';
            echo '</script>';
        } else {
            echo "connection failed";
        }


        $firstName = $_GET['sname'];
        //echo $firstName;
        $sql = "SELECT * FROM contact_details where firstName Like '%$firstName%'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $email = $row['email'];
                $phoneNumber = $row['phoneNumber'];
                $address = $row['address'];
                $organization = $row['organization'];
                $jobTitle = $row['jobTitle'];
                $webAddress = $row['webAddress'];
                $notes = $row['notes'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$firstName  $lastName</td>";
                echo "<td>$email</td>";
                echo "<td>$phoneNumber</td>";
                echo "<td>$address</td>";
                echo "<td>$organization</td>";
                echo "<td>$jobTitle</td>";
                echo "<td>$webAddress</td>";
                echo "<td>$notes</td>";
                echo "<td><button class='edit'><a href='edit.php?editid=" . $id . "'>Edit</a></button></td>"; // You can replace this with an edit link/button
                echo "<td><button class='delete'><a href='delete.php?deleteid=" . $id . "'>Delete</a></button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No items found.</td></tr>";
        }
        ?>
    </table>
    <button name=button onclick="cancelForm()">ok</button>

    <script>
    function cancelForm() {
            window.location.href = "index.php";
    }
</script>
</body>

</html>