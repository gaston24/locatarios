<?php
/**
 * Script para subir archivos al servidor FTP
 * @author Federico Burgardt <federico@woowup.com>
 */

// Credenciales del FTP
$host = "prod03.woowup.com";
$user = "xl";
$pass = "OjPbE588n6";

// Nombre del archivo destino, formato [extralarge-Y-m-d.csv]
$remoteFile = "/extralarge-". date('Y-m-d') . ".csv";

// Ruta completa del archivo local
$localFile = "D:/files/XL/extralarge-2018-10-16.csv";


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