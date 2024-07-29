<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public static function all()
    {
        return session()->get('basket', []);
    }

    public static function add($id, $name, $quantity, $price)
    {
        $basket = session()->get('basket', []);

        $item = [
            'id' => $id,
            'name' => $name,
            'quantity' => $quantity,
            'price' => $price,
        ];

        $basket[] = $item;

        session()->put('basket', $basket);

        return $basket;
    }

    public static function update($index, $quantity)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$index])) {
            $basket[$index]['quantity'] = $quantity;
            session()->put('basket', $basket);
            return $basket;
        }

        return false;
    }

    public static function delete($index)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$index])) {
            unset($basket[$index]);
            session()->put('basket', $basket);
            return $basket;
        }

        return false;
    }

    public static function count()
    {
        $basket = session()->get('basket', []);
        return count($basket);
    }

    public static function total()
    {
        $basket = session()->get('basket', []);
        $total = 0;
        foreach ($basket as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }

    public static function getOne($index)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$index])) {
            return $basket[$index];
        }

        return null;
    }
}
