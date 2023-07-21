<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
//        ddd(\request()->all());
//        ddd($request);
        $this->validate($request, [
            'name' => 'required|min:3|max:30'
        ]);

//        $attributes['slug'] = \Illuminate\Support\Str::slug($request->name);

        Page::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect('dashboard');
    }

}
