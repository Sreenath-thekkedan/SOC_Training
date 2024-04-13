<?php
// Check if the 'month' parameter is set in the URL
if(isset($_GET['month'])) {
    // Get the selected month from the URL parameter
    $selectedMonth = $_GET['month'];

    // Define the directory where payslip PDF files are stored
    $payslipDirectory = "payslips/";

    // Define the file path to the payslip PDF for the selected month
    $filePath = $payslipDirectory . strtolower($selectedMonth) . "/payslip.pdf";

    // Check if the PDF file exists
    if(file_exists($filePath)) {
        // Set appropriate headers to force download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="payslip_' . strtolower($selectedMonth) . '.pdf"');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Output the PDF file content
        readfile($filePath);
        exit;
    } else {
        // If the PDF file does not exist, display an error message
        echo "Payslip for " . ucfirst($selectedMonth) . " does not exist.";
    }
} else {
    // If the 'month' parameter is not set, display an error message
    echo "Invalid request. Please select a month.";
}
?>
