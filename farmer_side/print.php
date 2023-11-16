<?php
session_start();
require '../logic/db_connection.php';

if (isset($_SESSION['id'])) {
    $seller_id = $_SESSION['id'];
    
    // Your SQL query to fetch sales data
    $sql = "SELECT `order`.`product_name`, MONTH(`order`.`date_ordered`) AS order_month, SUM(`order`.`quantity`) AS product_count FROM `order` INNER JOIN farmer ON `order`.`seller_id` = `farmer`.`seller_id` WHERE `order`.`status` = 'received' AND `farmer`.`seller_id` = '$seller_id' AND MONTH(`order`.`date_ordered`) = MONTH(CURDATE()) AND YEAR(`order`.`date_ordered`) = YEAR(CURDATE()) GROUP BY `order`.`product_name`";

    $result = $connect->query($sql);

    $productNames = [];
    $productCounts = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $productNames[] = $row['product_name'];
            $productCounts[] = $row['product_count'];
        }
    } else {
        echo "Error: " . mysqli_error($connect);
        echo "Query: " . $sql;
    }

    $connect->close();
}

// Generate printable content (e.g., HTML)
$htmlContent = '<html>
<head>
    <title>Sales Report</title>
    <style>
        /* Add your custom styles for the printable content here */
    </style>
</head>
<body>
    <h1>Sales Report</h1>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Quantity Sold</th>
        </tr>';

for ($i = 0; $i < count($productNames); $i++) {
    $htmlContent .= '<tr>
                        <td>' . $productNames[$i] . '</td>
                        <td>' . $productCounts[$i] . '</td>
                    </tr>';
}

$htmlContent .= '</table>
</body>
</html>';

// Set the content type to PDF and output the content
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="sales_report.pdf"');

// Convert HTML content to PDF using TCPDF or other PDF generation library
require_once('tcpdf/tcpdf.php');
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->writeHTML($htmlContent, true, false, true, false, '');

// Output the PDF
$pdf->Output('sales_report.pdf', 'I');
?>
