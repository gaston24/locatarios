<?php
$fechaHora = date("Y") .  date("m") .  date("d") . (date("H")-5) . date("i") . date("s");


//echo $fechaHora;
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=price-extralarge-'.$fechaHora.'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
//fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

// fetch the data
/*
mysql_connect('localhost', 'username', 'password');
mysql_select_db('database');
$rows = mysql_query('SELECT field1,field2,field3 FROM table');
*/

//fputs($out, chr(0xEF) . chr(0xBB) . chr(0xBF) );

$dsn = '1 - CENTRAL';
$usuario = "Axoft";
$clave="Axoft";

$cid=odbc_connect($dsn, $usuario, $clave);

$sql=
	"
	
	SET DATEFORMAT YMD
	SELECT COD_ARTICU+';'+CAST(PRECIO AS VARCHAR)+';'+CAST(PRECIO AS VARCHAR) 
	FROM (SELECT COD_ARTICU, CAST(SUM(PRECIO) AS INT)PRECIO FROM GVA17 WHERE NRO_DE_LIS = 20 GROUP BY COD_ARTICU, NRO_DE_LIS)A 
	WHERE COD_ARTICU IN (SELECT COD_ARTICU FROM STA19 WHERE COD_DEPOSI IN ('01', '09')) AND COD_ARTICU NOT LIKE '**%'

	";

ini_set('max_execution_time', 300);
$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));

while($v=odbc_fetch_array($result))fputcsv($output, $v);


// loop over the rows, outputting them
//while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);

?>