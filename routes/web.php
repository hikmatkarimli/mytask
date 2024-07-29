<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
use App\Models\Basket;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/basket', function () {
    $basket = BasketController::all();
    return $basket;
});

Route::get('/basket/addthis', function () {
    $basket = BasketController::add(7, 'myproduct', 1, 2);
    return 'your basket added successfully';
});
// 
Route::get('/basket/add/{id}/{name}/{quantity}/{price}', function ($id, $name, $quantity, $price) {
    $basket = BasketController::add($id, $name, $quantity, $price);
    return 'added successfully';
});

Route::get('/basket/delete/{index}', function ($index) {
    $basket = BasketController::delete($index);
    return 'your basket deleted successfully';
});

Route::get('/basket/count', function () {
    $count = BasketController::count();
    return 'this is count' . ' ' . $count;
});

Route::get('/basket/total', function () {
    $total = BasketController::total();
    return 'this is total' . ' ' . $total;
});

Route::get('/deletesession', function () {
    Session::flush();
    return 'session deleted';
});

Route::get('/basket/update/{index}/{quantity}', function ($index, $quantity) {
    $basket = BasketController::update($index, $quantity);
    return 'updated successfully';
});

Route::get('/basket/getone/{index}', function ($index) {
    $basket = BasketController::getOne($index);
    return $basket;
});

Route::get('/basket/{index}', function ($index) {
    $basket = BasketController::getOne($index);
    return $basket;
});