<?php

// Load the database configuration file 
include_once '../../includes/connect.php';

// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php';

// Excel file name for download 
$fileName = "payment-data" . date('Y-m-d') . ".xlsx";

// Define column names 
$excelData[] = array('ID THANH TOÁN', 'ID ĐƠN HÀNG', 'SÓ HOÁ ĐƠN', 'TỔNG TIỀN', 'PHƯƠNG THỨC THANH TOÁN', 'NGÀY THANH TOÁN');

// Fetch records from the database
$query = $con->query("SELECT * FROM `user_payments` ORDER BY payment_id ASC");
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $lineData = array(
            $row['payment_id'],
            $row['order_id'],
            $row['invoice_number'],
            $row['amount'],
            $row['payment_mode'],
            $row['date']
        );
        $excelData[] = $lineData;
    }
}

// Export data to Excel and download as XLSX file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray($excelData);
$xlsx->downloadAs($fileName);

exit;
?>