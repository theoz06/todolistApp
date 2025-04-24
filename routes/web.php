<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get("/", [TaskController::class, "index"]);
Route::post("/task", [TaskController::class, "store"]);
Route::patch("/task/{id}", [TaskController::class, "update"]);
Route::delete("/task/{id}", [TaskController::class, "delete"]);
