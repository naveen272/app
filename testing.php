<?php
// Start the session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize date and created_by variables
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save filter values to session
    $_SESSION['from_date'] = $_POST['from_date'] ?? '';
    $_SESSION['to_date'] = $_POST['to_date'] ?? '';
    $_SESSION['created_by'] = $_POST['created_by'] ?? '';
} elseif (isset($_GET['clear_filters'])) {
    // Clear session variables if "Clear Filters" is clicked
    unset($_SESSION['from_date'], $_SESSION['to_date'], $_SESSION['created_by']);
}

// Retrieve filter values from session
$from_date = $_SESSION['from_date'] ?? '';
$to_date = $_SESSION['to_date'] ?? '';
$created_by = $_SESSION['created_by'] ?? '';

// Base SQL query
$sql = "SELECT id AS `S.No`, name AS `Item`, DATE_FORMAT(date, '%Y-%m-%d') AS `Date`, amount AS `Amount`, uname AS `Created by`
        FROM employees";

$totalSql = "SELECT SUM(amount) AS `Total` FROM employees";

// Variables to hold parameterized values
$params = [];
$types = "";
$conditions = [];

// If a date range is selected, add the condition
if ($from_date && $to_date) {
    $conditions[] = "date BETWEEN ? AND ?";
    $params[] = $from_date;
    $params[] = $to_date;
    $types .= "ss";
}

// If "Created by" filter is provided, add the condition
if ($created_by) {
    $conditions[] = "uname LIKE ?";
    $params[] = "%$created_by%";
    $types .= "s";
}

// Combine conditions into the query
if (!empty($conditions)) {
    $whereClause = " WHERE " . implode(" AND ", $conditions);
    $sql .= $whereClause;
    $totalSql .= $whereClause;
}

// Prepare and bind parameters for both queries
$stmt = $conn->prepare($sql);
$totalStmt = $conn->prepare($totalSql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
    $totalStmt->bind_param($types, ...$params);
}

// Execute the queries
$stmt->execute();
$result = $stmt->get_result();

$totalStmt->execute();
$totalResult = $totalStmt->get_result();
$totalRow = $totalResult->fetch_assoc();
$totalAmount = $totalRow['Total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Report Table</h1>

    <!-- Date and Created by Filter Form -->
    <form method="POST" action="">
        <label for="from_date">From Date:</label>
        <input type="date" id="from_date" name="from_date" value="<?php echo htmlspecialchars($from_date); ?>">
        
        <label for="to_date">To Date:</label>
        <input type="date" id="to_date" name="to_date" value="<?php echo htmlspecialchars($to_date); ?>">
        
        <label for="created_by">Created by:</label>
        <input type="text" id="created_by" name="created_by" value="<?php echo htmlspecialchars($created_by); ?>" placeholder="Enter username">
        
        <input type="submit" value="Filter">
        <a href="?clear_filters=1" style="text-decoration: none; margin-left: 10px;">Clear Filters</a>
        <a href="welcome.php" class="btn btn-danger">Cancel</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Item</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Created by</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $serialNumber = 1; 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $serialNumber++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['Item']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Amount']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Created by']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <th>Total</th>
                <td><?php echo number_format($totalAmount, 2); ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
