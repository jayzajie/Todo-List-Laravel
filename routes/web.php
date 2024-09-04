<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Rute untuk menampilkan daftar tugas dan pencarian
Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');

// Rute untuk menampilkan form pembuatan tugas baru
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Rute untuk menyimpan tugas baru ke database
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');

// Rute untuk menampilkan form edit tugas
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Rute untuk memperbarui tugas di database
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Rute untuk menghapus tugas dari database
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Rute untuk menandai tugas sebagai selesai
Route::post('tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
