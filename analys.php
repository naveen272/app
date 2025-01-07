<?php
// Start the session
session_start();

// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Analysis</title>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Include DataTables Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- Include DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <style>
        table {
            width: 100%;
            font-size: 14px;
            margin: 0 auto;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        .filter-container {
            margin: 20px 0;
        }

        .total-container {
            margin: 20px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Welcome message -->
    <div class="container">          
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Welcome.</h1>
    </div>

    <!-- Date Filter Form -->
    <form method="GET" class="filter-container" id="filterForm">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>" required>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>" required>
        <button type="submit">Filter</button>
        <button type="button" id="clearButton">ClearData</button>
        <a href="welcome.php" class="btn btn-danger">Cancel</a>
    </form>
    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function () {
            var table = $('#analysisTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true
            });

            // Clear data from the table when the clear button is clicked
            $('#clearButton').on('click', function () {
                // Clear the data in the table (without page reload)
                table.clear().draw();
                // Reset the filter form but keep the date inputs empty
                $('#start_date').val('');
                $('#end_date').val('');
                // Optionally, you can trigger form submission to reload the page with no filter
                $('#filterForm').submit();
            });
        });
    </script>
</body>
</html>
<?php

// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Include the config file
require_once 'config.php';

// Initialize variables for total amount
$totalAmount = 0;

// Get the logged-in user's username
$loggedInUser = $_SESSION['username'];

// Check if filter is applied (both start_date and end_date are set)
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

if ($start_date && $end_date) {
    // Initialize SQL query with date filter and logged-in user filter
    $sql = "SELECT id, uname, name, amount, date FROM employees WHERE uname = '$loggedInUser' AND date BETWEEN '$start_date' AND '$end_date'";

    // Execute the query
    $result = mysqli_query($link, $sql);

    if ($result) {
        // Fetch data
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Analyze data: Group by "name" (case-insensitive) and calculate total amount
        $analysis = [];
        foreach ($data as $row) {
            $name = strtolower(trim($row['name']));
            $amount = (float)$row['amount'];
            if (!isset($analysis[$name])) {
                $analysis[$name] = ['count' => 0, 'total' => 0];
            }
            $analysis[$name]['count']++;
            $analysis[$name]['total'] += $amount;

            // Add to the total amount
            $totalAmount += $amount;
        }

        // Sort analysis by frequency (descending)
        uasort($analysis, function ($a, $b) {
            return $b['count'] <=> $a['count'];
        });

        // Generate the table for display
        echo "<h2>Analysis Results</h2>";
        echo "<table id='analysisTable' class='display responsive' border='1'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Frequency</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($analysis as $name => $stats) {
            echo "<tr>
                    <td>" . ucfirst($name) . "</td>
                    <td>{$stats['count']}</td>
                    <td>{$stats['total']}</td>
                </tr>";
        }
        echo "</tbody>
              </table>";
    } else {
        echo "Error: " . mysqli_error($link);
    }
}

// Close the connection
mysqli_close($link);
?>
    <!-- Total Amount Container -->
    <div class="total-container">
        <?php
        if (isset($totalAmount)) {
            echo "Total Amount: " . $totalAmount;
        }
        ?>
    </div>