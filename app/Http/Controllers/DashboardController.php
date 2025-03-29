<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve the products you want to show, e.g. the latest
        $products = Product::orderBy('created_at', 'desc')
            ->take(6) // show the last 6, for example
            ->get();

        // Pass them to the Dashboard Inertia page
        return Inertia::render('Dashboard', [
            'products' => $products,
        ]);
    }
}
