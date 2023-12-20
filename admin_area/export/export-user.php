<?php

// Load the database configuration file 
include_once '../../includes/connect.php';

// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php';

// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xlsx";

// Define column names 
$excelData[] = array('ID', 'TÊN TÀI KHOẢN', 'TÊN KHÁCH HÀNG', 'EMAIL', 'ĐỊA CHỉ', 'SỐ ĐIỆN THOẠI');

// Fetch records from the database
$query = $con->query("SELECT * FROM `user_table` ORDER BY user_id ASC");
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $lineData = array(
            $row['user_id'],
            $row['username'],
            $row['user_fullname'],
            $row['user_email'],
            $row['user_address'],
            $row['user_mobile']
        );
        $excelData[] = $lineData;
    }
}

// Export data to Excel and download as XLSX file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray($excelData);
$xlsx->downloadAs($fileName);

exit;
?>