<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryImageController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerTeamController;
use App\Models\InventoryImage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/random-team', function () {
    $player = new PlayerController;
    $players = $player->index();
    $playerTeam = new PlayerTeamController;
    $playerTeams = $playerTeam->getPlayerTeams();
    return view('random-team', compact('players', 'playerTeams'));
})->middleware(['auth'])->name('random-team');

Route::post('player/store', [PlayerController::class, 'store'])->middleware(['auth'])->name('player.store');
Route::post('player/destroy', [PlayerController::class, 'destroy'])->middleware(['auth'])->name('player.destroy');
Route::post('player/random', [PlayerController::class, 'random'])->middleware(['auth'])->name('player.random');

Route::get('buku-tamu', function () {
    $bukuTamu = new BukuTamuController;
    return $bukuTamu->index();
})->middleware(['auth'])->name('buku-tamu');

Route::post('buku-tamu/store', [BukuTamuController::class, 'store'])->middleware(['auth'])->name('buku-tamu.store');
Route::post('buku-tamu/destroy', [BukuTamuController::class, 'destroy'])->middleware(['auth'])->name('buku-tamu.destroy');
Route::post('buku-tamu/update', [BukuTamuController::class, 'update'])->middleware(['auth'])->name('buku-tamu.update');

Route::get('inventory', function () {
    $inventory = new InventoryController;
    return $inventory->index();
})->middleware(['auth'])->name('inventory');

Route::post('inventory/destroy', [InventoryController::class, 'destroy'])->name('inventory.destroy');
Route::post('inventory/post', [InventoryController::class, 'post'])->name('inventory.post');

Route::delete('inventory-image/{id}', [InventoryImageController::class, 'destroy'])->middleware(['auth'])->name('inventory-image.destroy');


require __DIR__ . '/auth.php';
