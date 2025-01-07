<?php
require('fpdf/fpdf.php');
require_once 'config.php';

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET['id']);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Create a PDF invoice using FPDF
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 16);

                // Title
                $pdf->Cell(0, 10, 'Invoice', 0, 1, 'C');
                $pdf->Ln(10);

                // Record details
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(50, 10, 'Item:', 0, 0);
                $pdf->Cell(0, 10, $row['name'], 0, 1);
                $pdf->Cell(50, 10, 'Date:', 0, 0);
                $pdf->Cell(0, 10, $row['date'], 0, 1);
                $pdf->Cell(50, 10, 'Amount:', 0, 0);
                $pdf->Cell(0, 10, $row['amount'], 0, 1);

                // Check if an image exists
                if (!empty($row['file_blob'])) {
                    $imagePath = 'temp_image.jpg';
                    file_put_contents($imagePath, $row['file_blob']);
                    $pdf->Ln(10);
                    $pdf->Cell(0, 10, 'Uploaded Image:', 0, 1);
                    $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 60, 60);
                    unlink($imagePath); // Delete the temporary image file
                } elseif (!empty($row['file_path'])) {
                    $imagePath = "documents/" . $row['file_path'];
                    if (file_exists($imagePath)) {
                        $pdf->Ln(10);
                        $pdf->Cell(0, 10, 'Uploaded Image:', 0, 1);
                        $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 60, 60);
                    }
                }

                // Output the PDF
                $pdf->Output('I', 'Invoice.pdf'); // Display in browser
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($link);

// If no valid ID is provided
http_response_code(404);
echo 'Record not found.';
exit();
?>
