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
        /* Make the table more compact */
        table {
            width: 100%;
            font-size: 14px; /* Set default font size */
            margin: 0 auto; /* Center the table */
        }

        th, td {
            padding: 10px; /* Add some padding to make cells more clickable */
            text-align: center;
        }

        /* Adjust font size for mobile screens */
        @media (max-width: 768px) {
            table {
                font-size: 16px; /* Increase font size on smaller screens */
            }

            th, td {
                padding: 15px; /* Add more padding for readability */
            }
        }

        /* Further adjustment for very small screens */
        @media (max-width: 480px) {
            table {
                font-size: 18px; /* Further increase font size on very small screens */
            }

            th, td {
                padding: 20px; /* More padding on very small screens */
            }
        }
    </style>
</head>
<body>
    <h1>Data Analysis</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="excel_file">Choose Excel File:</label>
        <input type="file" name="excel_file" id="excel_file" required>
        <button type="submit">Upload</button>
        <a href="welcome.php">Cancel</a>
    </form>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function () {
            $('#analysisTable').DataTable({
                "paging": true,       // Enable pagination
                "searching": true,    // Enable searching
                "ordering": true,     // Enable sorting
                "info": true,         // Show table information
                "responsive": true    // Enable responsive design
            });
        });
    </script>

    <?php
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\IOFactory;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['excel_file'])) {
        $filePath = $_FILES['excel_file']['tmp_name'];

        // Load the Excel file
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        // Read data into an array
        $data = [];
        foreach ($worksheet->getRowIterator() as $rowIndex => $row) {
            if ($rowIndex == 1) continue; // Skip header row
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            $data[] = $rowData;
        }

        // Analyze data: Group by "name" (case-insensitive) and calculate total amount
        $analysis = [];
        foreach ($data as $row) {
            $name = strtolower(trim($row[1])); // Normalize name (lowercase and trim)
            $amount = (float)$row[3]; // Amount column
            if (!isset($analysis[$name])) {
                $analysis[$name] = ['count' => 0, 'total' => 0];
            }
            $analysis[$name]['count']++;
            $analysis[$name]['total'] += $amount;
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
    }
    ?>
</body>
</html>
