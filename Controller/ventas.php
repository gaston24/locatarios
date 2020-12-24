<?php
// $fechaHora = date("Y") .  date("m") .  date("d") . (date("H")-5) . date("i") . date("s");
$nombre = 'ventas-extralarge.csv';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$nombre);

$output = fopen('php://output', 'w');

$desde = $_GET['desde'];
$hasta = $_GET['hasta'];
$suc = $_GET['suc'];


include '../AccesoDatos/sql_conexion.php';

$sql=
"
SET DATEFORMAT YMD
EXEC SJ_LOCATARIOS_IRSA '$desde', '$hasta', $suc
";

$query = sqlsrv_prepare($cid_locales, $sql);
$result = sqlsrv_execute($query);

while($v=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
{
	fputcsv($output, $v);
}




?>