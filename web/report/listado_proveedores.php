<?php
 require_once __DIR__ . "/vendor/autoload.php";
 
use Jaspersoft\Client\Client;
 
$c = new Client(
				"http://192.168.1.112:8080/jasperserver",
				"jasperadmin",
				"jasperadmin"
				
			);

$report = $c->reportService()->runReport('/BM/LISTADO_PROVEEDORES', 'pdf');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf');
 
echo $report;

				
?>
