<?php
// Start the session
session_start();

// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Include the config file
require_once 'config.php';

// Initialize variables for total amount and date filtering
$totalAmount = 0;
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Get the logged-in user's username
$loggedInUser = $_SESSION['username'];

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

        .export-btn {
            margin: 10px 0;
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
        <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>" required>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo $end_date; ?>" required>
        <button type="submit">Filter</button>
        <button type="button" id="clearButton">Clear Data</button>
        <!-- Export Button -->
        <button id="exportButton" class="export-btn">Export</button>
        <a href="welcome.php" class="btn btn-danger">Cancel</a>
    </form>

    <?php
    // Check if filter is applied
    if ($start_date && $end_date) {
        // Query to fetch data with the date filter
        $sql = "SELECT id, uname, name, amount, date FROM employees WHERE uname = '$loggedInUser' AND date BETWEEN '$start_date' AND '$end_date'";
        $result = mysqli_query($link, $sql);

        if ($result) {
            // Fetch data and analyze
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $analysis = [];
            foreach ($data as $row) {
                $name = strtolower(trim($row['name']));
                $amount = (float)$row['amount'];
                if (!isset($analysis[$name])) {
                    $analysis[$name] = ['count' => 0, 'total' => 0];
                }
                $analysis[$name]['count']++;
                $analysis[$name]['total'] += $amount;
                $totalAmount += $amount;
            }

            // Sort analysis by Quantity
            uasort($analysis, function ($a, $b) {
                return $b['count'] <=> $a['count'];
            });

            // Display the results
            echo "<h2>Analysis Report</h2>";
            echo "<table id='analysisTable' class='display responsive' border='1'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
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



    <!-- JavaScript for Export -->
    <script>
        $(document).ready(function () {
            var table = $('#analysisTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true
            });

            // Clear data from the table
            $('#clearButton').on('click', function () {
                table.clear().draw();
                $('#start_date').val('');
                $('#end_date').val('');
                $('#filterForm').submit();
            });

            // Export to CSV
            $('#exportButton').on('click', function () {
                var csvContent = "data:text/csv;charset=utf-8,";
                csvContent += "Name,Quantity,Total Amount\n";
                
                // Add table rows
                table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    csvContent += data.join(",") + "\n";
                });

                // Add the total amount as the last row
                csvContent += "Total,,<?php echo $totalAmount; ?>\n";

                // Create and download CSV
                var encodedUri = encodeURI(csvContent);
                var link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "analysis_report.csv");
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        });
    </script>
</body>
</html>
