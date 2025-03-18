<?php

use App\Livewire\Form;

\Illuminate\Support\Facades\Route::get('form', Form::class);

use App\Http\Controllers\PagesController;
use Aws\S3\S3Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/about-me/', [PagesController::class, 'about'])->name('about');
Route::get('/projects/', [PagesController::class, 'projects'])->name('project');
Route::get('/contact/', [PagesController::class, 'contact'])->name('contact');


Route::fallback(function () {
    return view('mejba-theme-24.pages.404');
});

Route::get('/test-upload', function () {
    $s3 = new S3Client([
        'version' => 'latest',
        'region'  => env('AWS_DEFAULT_REGION', 'us-east-1'),
        'credentials' => [
            'key'    => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
        ],
    ]);

    $bucket = env('AWS_BUCKET');
    $key = 'test-upload.txt';
    $body = 'Hello S3 from Laravel!';

    try {
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $key,
            'Body'   => $body,
        ]);

        return response()->json(['message' => 'File uploaded!', 'url' => $result['ObjectURL']]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
