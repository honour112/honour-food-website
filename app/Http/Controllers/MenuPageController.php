<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuPageController extends Controller
{
    public function showMenuItems(Request $request)
    {
        // Get distinct categories from menu items
        $categories = MenuItem::select('category')
            ->distinct()
            ->pluck('category');

        // Check if user selected a category from filter
        $selectedCategory = $request->query('category');

        // Filter items by category if selected
        if ($selectedCategory) {
            $menuItems = MenuItem::where('category', $selectedCategory)->get();
        } else {
            $menuItems = MenuItem::all();
        }

        // Pass everything to the view
        return view('website.menu-page', compact('menuItems', 'categories', 'selectedCategory'));
    }
}
