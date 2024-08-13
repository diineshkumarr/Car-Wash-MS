<?php
include("./header&footer.php");

// Include the header function to output the header section
getHeader();
?>

<?php
include 'connection.php';
$query = "SELECT * FROM book";
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
        width: 90%;
        max-width: 1000px;
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

echo "<div class='me'><h2 class='centerr'>Booking Data</h2>";
echo "<div class='table-container'>";
echo "<table class='records-table'>
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Number</th>
            <th>Vehicle Name</th>
            <th>Booking</th>
            <th>Complete or Not</th>
            <th>Action</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['fullname'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['number'] . "</td>";
    echo "<td>" . $row['vehiclename'] . "</td>";
    echo "<td>" . $row['book'] . "</td>";
    echo "<td><button class='complete-btn' data-email='" . $row['email'] . "' style='margin-left:20px; padding:10px; font-size:15px; border-radius:10px; background:aquamarine;'>Complete</button></td>";
    echo "<td style='display:flex;'><button style='padding:0 10px; border:none;'><a href='./edit.php?id=$row[id]' style='font-size:20px; text-decoration:none;'>📁</a></button> OR
     <button style='padding:0 10px; border:none;'><a href='./delete.php?id=$row[id]' style='font-size:20px; text-decoration:none;'>🚫</a></button></td>";
    echo "</tr>";
}

echo "</table>";
echo "<button style='padding:10px; font-size:15px; border-radius:10px; background:blue; color:white;'><a href='./delete.php' style='text-decoration:none; color:white;'>Clear All Data</a></button>";
echo "</div></div>"; 

echo "</body>";
echo "</html>";

mysqli_free_result($result);
$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.complete-btn').click(function() {
        var email = $(this).data('email');
        $.ajax({
            type: 'POST',
            url: 'send_email.php', // PHP script to send email
            data: { email: email },
            success: function(response) {
                alert('Email sent successfully to ' + email);
                // Optionally, update UI or do something else after email is sent
            },
            error: function(xhr, status, error) {
                alert('Error sending email.');
                console.error(xhr.responseText);
            }
        });
    });
});
</script>


<?php
// Include the footer function to output the footer section
getFooter();
?>