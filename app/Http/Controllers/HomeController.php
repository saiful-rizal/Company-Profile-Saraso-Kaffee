<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $menuData = $menus->map(fn($m) => [
            'id' => $m->id,
            'name' => $m->name,
            'cat' => $m->category,
            'price' => $m->price,
            'img' => $m->image,
            'desc' => $m->description,
            'tags' => $m->tags ?? [],
            'badge' => $m->badge,
        ])->values();
        return view('landingpage', compact('menus', 'menuData'));
    }
}
