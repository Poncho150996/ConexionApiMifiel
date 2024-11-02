<?php

//documentacion https://docs.mifiel.com/es/#tag/Documento/operation/api-v1-documents-create-post

$datosApi = json_decode(file_get_contents('php://input'), 1);


$id = $datosApi['id']; //ID DEL DOCUMENTO
$external_id = $datosApi['external_id'];//ID INTERNO DEL DOCUMENTO
$file_file_name = $datosApi['file']['file_name'];//NOMBRE DEL ARCHIVO
$signed_at = $datosApi['signed_at'];//FECHA EN LA CUAL FUE FIRMADO

echo "ID DEL DOCUMENTO: $id";
echo "ID INTERNO DEL DOCUMENTO: $external_id";
echo "NOMBRE DEL ARCHIVO: $file_file_name";
echo "FECHA EN LA CUAL FUE FIRMADO: $signed_at";


?>