<?php

require_once 'env.php';
require_once 'vendor/autoload.php'; // Autoload files using Composer autoload

use Mifiel\ApiClient\ApiClient;
use Mifiel\ApiClient\Exception\ApiException;

use Mifiel\ApiClient as Mifiel;

Mifiel::setTokens($APP_ID, $APP_SECRET);
// if you want to use our sandbox environment use:
Mifiel::url($ENPOINT);

$response = "";

use Mifiel\Document;


$archivo = "PRUEBA.pdf";
//DOCUMENTACION https://docs.mifiel.com/es/#tag/Documento/operation/api-v1-documents-create-post

//Si tu no quieres que nos hagamos el PDF, puedes enviar solo el
// el original_hash y el nombre del documento. Ambos son requeridos
// $document = new Document([
//     'original_hash' => hash('sha256', file_get_contents('path/to/my-file.pdf')),
//     'name' => 'my-file.pdf',
//     'signatories' => [...

$document = new Document([
    'file_path' => $archivo,
    'signatories' => [ //Lista de firmantes del documento
        [
            'name' => 'Alfonso Meza Martinez',
            'email' => 'alfonso.mezamartinez@blueservices.mx',
            'tax_id' =>  'MEMA960915UN1'
        ]
    ],
    // 'callback_url' => 'http://localhost/callback.php', //URL a la que se enviará el POST cuando se firme el documento.
    'days_to_expire' => 30, //Número de días en los que el documento expirará, después no podrá ser firmado.
    'external_id' => '1234', //Un identificador único de idempotencia para que puedas reconocer el documento. (es el id interno de blueservices)
    'message_for_signers' => 'Hola, este es un mensaje personalizado para los firmantes', //MENSAJE PERSONALIZADO PARA LOS FIRMANTES, MOSTRADO DURANTE EL FLUJO DE FIRMA.
    'remind_every' => 1, //PERIODICIDAD EN QUE SE ENVÍA RECORDATORIOS DE FIRMA A QUIENES NO HAN FIRMADO (SI SEND_MAIL ESTÁ HABILITADO).
    'send_invites' => true, //SI SE ENVÍA INVITACIONES A QUIENES NO HAN FIRMADO (SI SEND_MAIL ESTÁ HABILITADO).
    // 'sign_callback_url' => 'http://localhost/callback.php', //URL a la que se enviará el POST cuando un participante firme o apruebe el documento.
    'viewers' => [ //CORREOS A LOS QUIENES RECIBIRÁN NOTIFICACIONES (SI ESTÁ HABILITADAS)
        [
            'email' => 'alfonso.mezamartinez@blueservices.mx'
        ]
    ]
]);
//manda el documento a firmar
$document->save();
// Para obtener el ID del documento creado
$documentId = $document->id;

// Obtener detalles adicionales del documento (si es necesario)
$documentData = Document::find($documentId);

$idDocumento = $documentData->id;
$file_file_name = $documentData->file_file_name;
$signed_at = $documentData->signed_at;
$state = $documentData->state;
$viewers = $documentData->viewers;
$callback_url = $documentData->callback_url;
$sign_callback_url = $documentData->sign_callback_url;
$file = $documentData->file;
$file_signed = $documentData->file_signed;
$file_zipped = $documentData->file_zipped;
$signers = $documentData->signers;
$external_id = $documentData->external_id;
$days_to_expire = $documentData->days_to_expire;
$remind_every = $documentData->remind_every;

// Imprimir el response completo
Echo "el documento se ha creado con exito con el siguiente ID: " . $idDocumento;
Echo "el nombre del archivo es: " . $file_file_name;
Echo "el archivo firmado esta disponible en: " . $signed_at;
Echo "el estado del documento es: " . $state;
Echo "los viewers del documento son: " . print_r($viewers);
Echo "la url de callback es: " . $callback_url;
Echo "la url de callback de firma es: " . $sign_callback_url;
Echo "el archivo es: " . $file;
Echo "el archivo firmado es: " . $file_signed;
Echo "el archivo zipeado es: " . $file_zipped;
Echo "los firmantes del documento son: " . print_r($signers);
Echo "el id externo del documento es: " . $external_id;
Echo "los dias para expirar el documento son: " . $days_to_expire;
Echo "el intervalo para recordar a los firmantes es: " . $remind_every;

//EJEMPLO DE RESPUESTA
// {
//     "id": "497f6eca-6276-4993-bfeb-53cbbbba6f08",
//     "file_file_name": "string",
//     "signed_at": "2019-08-24T14:15:22Z",
//     "state": "pending",
//     "viewers": [
//       {
//         "name": "string",
//         "email": "user@example.com"
//       }
//     ],
//     "callback_url": "https://example.com",
//     "sign_callback_url": "https://example.com",
//     "file": "/api/v1/documents/497f6eca-6276-4993-bfeb-53cbbbba6f08/file",
//     "file_signed": "/api/v1/documents/497f6eca-6276-4993-bfeb-53cbbbba6f08/file_signed",
//     "file_zipped": "/api/v1/documents/497f6eca-6276-4993-bfeb-53cbbbba6f08/file_zipped",
//     "signers": [
//       {
//         "name": "Sergio Espinoza",
//         "email": "user@example.com",
//         "tax_id": "RERS890421JU9",
//         "widget_id": "V1fCugnDKC"
//       }
//     ],
//     "external_id": "string",
//     "days_to_expire": 0,
//     "remind_every": 0,
//     "expires_at": null
//   }