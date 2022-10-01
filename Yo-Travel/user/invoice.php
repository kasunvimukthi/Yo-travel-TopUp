<?php
use Phppot\Order;

require_once __DIR__ . './pdf_values.php';
$orderModel = new Order();
$result = $orderModel->getPdfGenerateValues($_GET["id"]);

if (! empty($result)) {
    require_once __DIR__ . "./pdf_service.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result, $package);
}