<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\publicoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\EspecialidadController;

Route::get('/', function () {
    return Inertia::render('Publico/Inicio', [
        'canLogin' => Route::has('IniciarSesion'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return Inertia::render('Chat/contenedor');
})->name('chat');

Route::middleware(['auth:sanctum', 'verified'])->get('/consultas', function () {
    return Inertia::render('Consultas/Inicio');
})->name('consultas');


Route::middleware(['auth:sanctum', 'verified'])->get('/chat/salas',[ChatController::class, 'salas']);
Route::middleware(['auth:sanctum', 'verified'])->get('/chat/salas/{salaId}/mensajes',[ChatController::class, 'mensajes']);
Route::middleware(['auth:sanctum', 'verified'])->post('/chat/salas/{salaId}/mensaje',[ChatController::class, 'nuevoMensaje']);

Route::get('/inicio', function () {
    return Inertia::render('Publico/Inicio');
})->name('inicio');

Route::get('/informacion', function () {
    return Inertia::render('Publico/Informacion');
})->name('informacion');

Route::get('/contactanos', function () {
    return Inertia::render('Publico/Contactanos');
})->name('contactanos');

Route::get('/especialistas', function () {
    return Inertia::render('Publico/Especialistas');
})->name('especialistas');

Route::get('/iniciarSesion', function () {
    return Inertia::render('Publico/IniciarSesion');
})->name('iniciarSesion');

Route::get('/registro', function () {
    return Inertia::render('Publico/Registro');
})->name('registro');

//CRUDS
Route::middleware(['auth:sanctum', 'verified'])->apiResource('/tipoUsuarios', TipoUsuarioController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/cruds/tipoUsuario', function () {
    return Inertia::render('TipoUsuario/Inicio');
})->name('tipoUsuario.index');

Route::middleware(['auth:sanctum', 'verified'])->apiResource('/clientes', ClienteController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/cruds/clientes', function () {
    return Inertia::render('Cliente/Inicio');
})->name('cliente.index');

Route::middleware(['auth:sanctum', 'verified'])->apiResource('/especialidads', EspecialidadController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/cruds/especialidades', function () {
    return Inertia::render('Especialidad/Inicio');
})->name('especialidad.index');