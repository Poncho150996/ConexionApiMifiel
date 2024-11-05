# API en PHP para Integración con Mifiel

Este proyecto implementa una API en PHP que interactúa con el sistema de [Mifiel](https://www.mifiel.com/), una plataforma para la gestión y firma electrónica de documentos legales. La API permite a los usuarios gestionar documentos y realizar acciones como la creación, firma y verificación de documentos electrónicos directamente desde una aplicación en PHP.

## Funcionalidades Principales

- **Creación de documentos**: Permite cargar documentos y prepararlos para la firma electrónica mediante Mifiel.
- **Firma electrónica**: Integra el proceso de firma para que los usuarios puedan firmar documentos de manera remota y segura.
- **Verificación de documentos**: Permite verificar la autenticidad y la validez de documentos ya firmados.
- **Descarga de documentos firmados**: Facilita la descarga de documentos en formato PDF o XML.

## Tecnologías Utilizadas

- **PHP**: Lenguaje de backend para la lógica de la API.
- **Mifiel SDK para PHP**: Librería oficial de Mifiel para facilitar la integración con sus servicios.
- **cURL**: Se utiliza para manejar solicitudes HTTP hacia la API de Mifiel.

## Ejemplo de Código

A continuación, un ejemplo de cómo esta API crea un documento en Mifiel:

```php
// Crear un nuevo cliente de Mifiel
$mifiel = new Mifiel\Client('<API_KEY>', '<SECRET_KEY>');

// Crear un nuevo documento en Mifiel
$document = $mifiel->documents->create([
    'file' => 'path/to/document.pdf',
    'signatories' => ['email@example.com'],
    'callback_url' => 'https://yourapp.com/callback'
]); ```

Configuración
Clonar el repositorio.

Configurar las credenciales de API de Mifiel (API_KEY y SECRET_KEY) en el código.

Instalar dependencias a través de Composer (si el SDK de Mifiel no está preinstalado):


 
