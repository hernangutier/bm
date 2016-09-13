<?php
 require_once __DIR__ . "/vendor/autoload.php";
 
use Jaspersoft\Client\Client;
 
$c = new Client(
				"http://192.168.1.19:8080/jasperserver",
				"jasperadmin",
				"jasperadmin"
				
			);
  /*
  $js = $c->jobService();               
  $c->setRequestTimeout(60); 
  $info = $c->serverInfo();
  */
  //print_r($info);

   //$report = $c->reportService()->runReport('/reports/samples/AllAccounts', 'html');

$report = $c->reportService()->runReport('/RBM/LIST', 'pdf');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf');
echo $report;

/*
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf');
 
echo $report;
*/
//echo phpinfo();
				
?>
