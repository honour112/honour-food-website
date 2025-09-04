<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuPageController extends Controller
{
    public function showMenuItems()
    {
        // Get all menu items
        $menuItems = MenuItem::all();

        // Pass them to the view
        return view('website.menu-page', compact('menuItems'));
    }
}
