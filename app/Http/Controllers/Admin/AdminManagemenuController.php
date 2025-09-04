<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class AdminManagemenuController extends Controller
{
    // Show the create menu form
    public function AddMenu()
    {
        return view('Admin.ManageMenu');
    }

    // Store a new menu item
    public function StoreMenu(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('menus', 'public');

        MenuItem::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'price' => $validated['price'],
            'status' => 'active',
            'image_url' => '/storage/' . $path,
        ]);

        return redirect()->route('ManageMenu')->with('success', 'Menu item created successfully!');
    }

    // Show all items
    public function showMenuItems()
    {
        $menuItems = MenuItem::all();
        return view('Admin.ManageMenu', compact('menuItems'));
    }

    // Show edit form
    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        return view('Admin.EditMenu', compact('menuItem')); 
    }

    // Update item
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $menuItem = MenuItem::findOrFail($id);
        $menuItem->name = $request->name;
        $menuItem->price = $request->price;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menus', 'public');
            $menuItem->image_url = '/storage/' . $path; // fixed to match DB
        }

        $menuItem->save();

        return redirect()->route('ManageMenu')->with('success', 'Menu item updated successfully!');
    }

    // Delete item
    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        return redirect()->back()->with('success', 'Menu item deleted successfully!');
    }
}
