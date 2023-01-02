<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller {

    public function add(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        $quantity = $request->input('quantity') ?? 1;

        if (empty($basket_id)) {
            // якщо кошик не існує
            $basket = Basket::create();
            $basket_id = $basket->id;
        } else {
            $basket = Basket::findOrFail($basket_id);
            // оновлюємо поле `updated_at` таблиці `baskets`
            $basket->touch();
        }
        if ($basket->products->contains($id)) {
            // якщо цей товар вже є у кошику - змінюємо кількість
            $pivotRow = $basket->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            // якщо цього товару нема у кошику - додаємо його
            $basket->products()->attach($id, ['quantity' => $quantity]);
        }
        // редирект на сторінку дії
        return back()->withCookie(cookie('basket_id', $basket_id, 525600));
    }

    public function index(Request $request) {
        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            return view('basket.index', compact('products'));
        } else {
            abort(404);
        }
    }

    public function checkout() {
        return view('basket.checkout');
    }
}
