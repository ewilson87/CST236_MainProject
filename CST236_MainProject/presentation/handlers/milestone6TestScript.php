<?php
require_once '../../Autoloader.php';

$userDataService = new UserDataService();

$start = $_GET['start'];
$end = $_GET['end'];

header('Content-Type: application/json');

echo $userDataService->getSalesReportJSON($start, $end);