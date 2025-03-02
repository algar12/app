<?php

use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/../vendor/autoload.php';

if (php_sapi_name() === 'cli-server') {
    // Jika file yang diminta ada, langsung kirim file tersebut
    $path = __DIR__ . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    if (is_file($path)) {
        return false;
    }
}

FrankenPHP\bootstrap();

// Tangani file statis di storage
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);

// Jika file tidak ditemukan, coba cari di storage
if ($response->getStatusCode() == 404 && preg_match('/^\/storage\/(.+)$/', $request->getPathInfo(), $matches)) {
    $filePath = __DIR__ . '/../storage/app/public/' . $matches[1];
    if (file_exists($filePath)) {
        return new Response(file_get_contents($filePath), 200, ['Content-Type' => mime_content_type($filePath)]);
    }
}

$response->send();
$kernel->terminate($request, $response);
