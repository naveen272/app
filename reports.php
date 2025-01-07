<?php
// Start the session
session_start();

// Include database configuration
require 'config.php';

// Create connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deletion
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $deleteQuery = "DELETE FROM employees WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    if ($deleteStmt === false) {
        die('Prepare failed: ' . $conn->error);
    }
    $deleteStmt->bind_param("i", $delete_id);
    $deleteStmt->execute();
    $deleteStmt->close();

    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Initialize date, created_by, and item variables
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save filter values to session
    $_SESSION['from_date'] = $_POST['from_date'] ?? '';
    $_SESSION['to_date'] = $_POST['to_date'] ?? '';
    $_SESSION['created_by'] = $_POST['created_by'] ?? '';
    $_SESSION['item'] = $_POST['item'] ?? '';
} elseif (isset($_GET['clear_filters'])) {
    // Clear session variables if "Clear Filters" is clicked
    unset($_SESSION['from_date'], $_SESSION['to_date'], $_SESSION['created_by'], $_SESSION['item']);
    // Redirect to clear filters and reload the page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Retrieve filter values from session
$from_date = $_SESSION['from_date'] ?? '';
$to_date = $_SESSION['to_date'] ?? '';
$created_by = $_SESSION['created_by'] ?? '';
$item = $_SESSION['item'] ?? '';

// Base SQL query to fetch filtered data for the logged-in user
$sql = "SELECT id AS `S.No`, name AS Item, DATE_FORMAT(date, '%Y-%m-%d') AS Date, amount AS Amount, uname AS `Created by`
        FROM employees WHERE uname = ?";

// SQL to calculate total amount for the selected filters
$totalSql = "SELECT SUM(amount) AS Total FROM employees WHERE uname = ?";

// Variables to hold parameterized values
$createdByParam = "%$created_by%";
$itemParam = "%$item%";

// Apply filters only if at least one filter is set
$conditions = [];
$params = [$_SESSION["username"]]; // Default condition: filter by logged-in user
$types = "s"; // 's' for string parameter (username)

// If date range is provided
if ($from_date && $to_date) {
    $conditions[] = "date BETWEEN ? AND ?";
    $params[] = $from_date;
    $params[] = $to_date;
    $types .= "ss"; // Adding 'ss' for two string parameters (date)
}

// If "Created by" filter is provided
if ($created_by) {
    $conditions[] = "uname LIKE ?";
    $params[] = $createdByParam;
    $types .= "s"; // Adding 's' for the "created_by" filter
}

// If "Item" filter is provided
if ($item) {
    $conditions[] = "name LIKE ?";
    $params[] = $itemParam;
    $types .= "s"; // Adding 's' for the "item" filter
}

// Add conditions to SQL queries if any filters are applied
if (!empty($conditions)) {
    $conditionSql = " AND " . implode(" AND ", $conditions);
    $sql .= $conditionSql;
    $totalSql .= $conditionSql;
}

// Prepare and execute the main query
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param($types, ...$params); // Binding parameters correctly
$stmt->execute();
$result = $stmt->get_result();

// Prepare and execute the total query
$totalStmt = $conn->prepare($totalSql);
if ($totalStmt === false) {
    die('Prepare failed: ' . $conn->error);
}

$totalStmt->bind_param($types, ...$params);
$totalStmt->execute();
$totalResult = $totalStmt->get_result();
$totalRow = $totalResult->fetch_assoc();
$totalAmount = $totalRow['Total'] ?? 0;

// Handle PDF Export
if (isset($_POST['export_pdf'])) {
    // Start output buffering
    ob_start();

    require('fpdf/fpdf.php'); // Include FPDF library

    class PDF extends FPDF {
        // Page header
        function Header() {
            // Start session to access the username
            $username = isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Guest';
            
            // Set font and add report title
            $this->SetFont('Arial', 'B', 14);
            $this->Ln(5);
            
            // Add a personalized welcome message
            $this->SetFont('Arial', '', 16);
            $this->Cell(0, 10, 'Hi, ' . $username . ' Welcome.', 0, 1, 'C');
            $this->Ln(10);
        }
        
    }

    // Create instance of PDF
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // Add table headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(20, 10, 'S.No', 1);
    $pdf->Cell(50, 10, 'Item', 1);
    $pdf->Cell(30, 10, 'Date', 1);
    $pdf->Cell(50, 10, 'Created', 1);
    $pdf->Cell(30, 10, 'Amount', 1);
    $pdf->Ln();

    // Fetch filtered data for export
    $pdf->SetFont('Arial', '', 12);
    $serialNumber = 1;
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(20, 10, $serialNumber++, 1);
        $pdf->Cell(50, 10, $row['Item'], 1);
        $pdf->Cell(30, 10, $row['Date'], 1);
        $pdf->Cell(50, 10, $row['Created by'], 1);
        $pdf->Cell(30, 10, number_format($row['Amount'], 2), 1);
        $pdf->Ln();
    }

    // Add total amount row
    $pdf->Cell(150, 10, 'Total', 1);
    $pdf->Cell(30, 10, number_format($totalAmount, 2), 1);
    $pdf->Ln();

    // Clear buffer and output the PDF
    ob_end_clean();
    $pdf->Output('D', 'Report.pdf'); // D: Forces download
    exit;
}
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
        .delete-button {
            color: red;
            text-decoration: none;
        }
        .container{
            padding: .5px;
            line-height: 1.42857143;
            vertical-align: top;
        }
    </style>
</head>
<body>
<div class="container">          
<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Welcome.</h1>
</div>
    <!-- Filter Form -->
    <form method="POST" action="">
        <label for="from_date">From Date:</label>
        <input type="date" id="from_date" name="from_date" value="<?php echo htmlspecialchars($from_date); ?>">
        
        <label for="to_date">To Date:</label>
        <input type="date" id="to_date" name="to_date" value="<?php echo htmlspecialchars($to_date); ?>">
        
        <label for="item">Item:</label>
        <input type="text" id="item" name="item" value="<?php echo htmlspecialchars($item); ?>" placeholder="Enter item name">
        
        <input type="submit" value="Submit">
        <a href="?clear_filters">Clear</a>
        <a href="welcome.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="export_pdf">Export</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Item</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $serialNumber = 1; 
            if (!empty($conditions) && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $serialNumber++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['Item']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Amount']) . "</td>";
                    echo "<td><a class='delete-button' href='?delete_id=" . $row['S.No'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
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
                <td>
                    <?php 
                    if (!empty($conditions) && $result->num_rows > 0) {
                        echo number_format($totalAmount, 2); 
                    } else {
                        echo ""; // Leave the total empty if no data is available
                    }
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
