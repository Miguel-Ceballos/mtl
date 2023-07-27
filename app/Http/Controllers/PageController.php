<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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

        return redirect()->route('tasks', Str::slug($request->name));
    }

    public function update(Request $request, Page $page)
    {
        $attributes = $this->validate($request, [
            'name' => ['required', 'min:3', 'max:30', Rule::unique('pages')->ignore($page->id)]
        ]);

        $attributes['slug'] = Str::slug($request->name);

        $page->update($attributes);
    }

    public function destroy(Page $page)
    {
		$this->authorize('delete', $page);
        $page->delete();

        return redirect()->route('dashboard');
    }

}
