<?php
$fechaHora = date("Y") .  date("m") .  date("d") . (date("H")-5) . date("i") . date("s");
$nombreFecha = 'stock-extralarge-'.$fechaHora.'.csv';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$nombreFecha);

$output = fopen('php://output', 'w');

$dsn = '1 - CENTRAL';
$usuario = "sa";
$clave="Axoft1988";

$cid=odbc_connect($dsn, $usuario, $clave);

$sql=
	"
	
	SET DATEFORMAT YMD
	SELECT COD_ARTICU+';'+CAST(STOCK AS VARCHAR) FROM 
	(
		SELECT COD_ARTICU, CAST(SUM(CANT_STOCK) AS INT)STOCK 
		FROM STA19 WHERE COD_DEPOSI IN ('01', '09')
		GROUP BY COD_ARTICU
	)A

	";

ini_set('max_execution_time', 300);
$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));

while($v=odbc_fetch_array($result))fputcsv($output, $v);




$host = "prod03.woowup.com";
$user = "xl";
$pass = "OjPbE588n6";

// Nombre del archivo destino, formato [extralarge-Y-m-d.csv]
$remoteFile = "/extralarge-". date('Y-m-d') . ".csv";

// Ruta completa del archivo local
//$localFile = "D:/files/XL/extralarge-2018-10-16.csv";
$localFile = "C:/Users/SistemaTest/Downloads/stock-extralarge-20181018152919.csv";

$ftp = ftp_connect($host);

if ($ftp !== false) {
	if (@ftp_login($ftp, $user, $pass)) {

		echo "Logeado \n";

		if (!file_exists($localFile)) {
			throw new Exception("Error: el archivo local $localFile no existe", 3);
		}

		echo "Subiendo archivo $localFile a la ruta $remoteFile \n";
		if (ftp_put($ftp, $remoteFile, $localFile, FTP_ASCII)) {
			echo "Archivo subido con éxito \n";
		} else {
			throw new Exception("Error al subir el archivo", 4);
		}

	} else {
		throw new Exception("No se pudo autenticar al FTP", 2);
	}
} else {
	throw new Exception("No se pudo conectar al FTP", 1);
	
}

?>