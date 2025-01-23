<?php
// Database credentials
$servername = "localhost";
$username = "ido";
$password = "vmk1ngRVi855LS";
$dbname = "ido_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all data from Customers table
$sql = "SELECT * FROM Customers";
$result = $conn->query($sql);

// Check for empty result
if ($result->num_rows > 0) {
    // Output data of each row in a table
    echo "<table>";
    echo "<tr><th>CustomerID</th><th>FirstName</th><th>LastName</th><th>Email</th><th>City</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["CustomerID"] . "</td>";
        echo "<td>" . $row["FirstName"] . "</td>";
        echo "<td>" . $row["LastName"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["City"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
