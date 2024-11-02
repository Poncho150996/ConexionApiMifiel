<?php

//documentacion https://docs.mifiel.com/es/#tag/Documento/operation/api-v1-documents-create-post

$datosApi = json_decode(file_get_contents('php://input'), 1);


$idDocument = $datosApi['document']; //identificador unico del documento
$idDocumentExterna = $datosApi['document_external_id']; //identificador unico del documento 
$rfcFirmante = $datosApi['signer']['id']; //RFC del firmante, quien únicamente podrá firmar con la e.firma relacionada a este.
$correoFirmante = $datosApi['signer']['email']; //Correo electrónico del participante (firmante o revisor) al que se le enviará la invitación al documento.
$fechaHoraFirma = $datosApi['signer']['signed_at']; //Fecha y hora en la que el documento fue firmado.
$rolFirma = $datosApi['signer']['role']; //Firmante (signer) o revisor (reviewer) dependiendo del rol que tendrá en el documento. Los firmantes usan su e.firma para firmar.


echo "identificador unico del documento: $idDocument";
echo "identificador unico del documento: $idDocumentExterna";
echo "RFC del firmante, quien únicamente podrá firmar con la e.firma relacionada a este: $rfcFirmante";
echo "Correo electrónico del participante (firmante o revisor) al que se le enviará la invitación al documento: $correoFirmante";
echo "Fecha y hora en la que el documento fue firmado: $fechaHoraFirma";
echo "Rol del firmante: $rolFirma";


?>