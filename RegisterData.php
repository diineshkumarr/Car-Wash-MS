<?php
include("./header&footer.php");

// Include the header function to output the header section
getHeader();
?>

<?php
include 'connection.php';
$query = "SELECT * FROM form";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Records from Book Table</title>";
echo "<style>
    body {
        font-family: Arial, sans-serif;
    }
    .centerr {
        text-align: center;
    }
    .table-container {
        margin: 0 auto;
        width: 85%;
        padding: 20px;
        border-radius: 8px;
        overflow-x: auto;
    }
    .records-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .records-table th, .records-table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
        
    }
    .records-table th {
        background-color: rgb(230, 105, 10);
        color: black;
    }
    .records-table tr {
        background-color: #e9e9e9;
    }
        .me{
        padding: 30px 0;
        background-color: aquamarine;
    }
</style>";
echo "</head>";
echo "<body>";

echo "<div class='me'><h2 class='centerr'>REGISTER DATA</h2>";
echo "<div class='table-container'>";
echo "<table class='records-table'>
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Booking Date</th>
            <th>Gender</th>
            <th>Password</th>
            <th>Confirm</th>
            <th>Age</th>
            <th>Comments</th>
            <th>Action</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['fullname'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['birthdate'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['pasword'] . "</td>";
    echo "<td>" . $row['confrmpassword'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['cmnt'] . "</td>"; 
    echo "<td style='display:flex;'><button style='padding:0 10px; border:none;'><a href='./edit1.php?id=$row[id]' style='font-size:20px; text-decoration:none;'>📁</a></button> OR
    <button style='padding:0 10px; border:none;'><a href='./delete1.php?id=$row[id]' style='font-size:20px; text-decoration:none;'>🚫</a></button></td>";
   echo "</tr>";
}

echo "</table>";
echo "<button style='padding:10px; font-size:15px; border-radius:10px; background:blue; color:white;'><a href='./delete1.php' style='text-decoration:none; color:white;'>Clear All Data</a></button>";
echo "</div></div>"; 

echo "</body>";
echo "</html>";

mysqli_free_result($result);
$conn->close();
?>

<?php
// Include the footer function to output the footer section
getFooter();
?>