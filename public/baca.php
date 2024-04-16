<?php


header("Access-Control-Allow-Origin: *"); // Izinkan akses dari semua domain (secara terbuka, sebaiknya diatur sesuai kebutuhan)
header("Access-Control-Allow-Methods: GET, POST"); // Izinkan metode GET dan POST
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Izinkan header Content-Type dan Authorization

// Load Composer's autoloader
require __DIR__.'/../vendor/autoload.php';

// Inisialisasi aplikasi Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle HTTP request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Ambil data dari model atau database
$data = App\Models\Data::all(); // Ganti dengan model dan tabel yang sesuai

// Ubah data menjadi array untuk dijadikan JSON
$jsonData = [];
foreach ($data as $location) {
    $jsonData[] = [$location->nama_rs, $location->latitude, $location->longtitude];
}

// Kembalikan data dalam format JSON
echo json_encode($jsonData);

// Selesaikan aplikasi Laravel
$kernel->terminate($request, $response);
