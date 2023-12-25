<?php

// Load the database configuration file 
include_once '../../includes/connect.php';

// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php';

// Excel file name for download 
$fileName = "order-data_" . date('Y-m-d') . ".xlsx";

// Define column names 
$excelData[] = array('ID ĐƠN HÀNG', 'ID NGƯỜI DÙNG', 'TỔNG TIỀN', 'SỐ HOÁ ĐƠN', 'TỔNG SẢN PHẨM', 'NGÀY ĐẶT', 'TRẠNG THÁI');

// Fetch records from the database
$query = $con->query("SELECT * FROM `user_orders` ORDER BY order_id ASC");
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $lineData = array(
            $row['order_id'],
            $row['user_id'],
            $row['amount_due'],
            $row['invoice_number'],
            $row['total_products'],
            $row['order_date'],
            $row['order_status']
        );
        $excelData[] = $lineData;
    }
}

// Export data to Excel and download as XLSX file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray($excelData);
$xlsx->downloadAs($fileName);

exit;
?>