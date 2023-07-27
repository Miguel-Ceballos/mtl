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

        $exist = \DB::table('pages')
            ->select('id')
            ->where('user_id', '=', auth()->user()->id)
            ->where('slug', '=', Str::slug($request->name))
            ->get()
        ;

        if(count($exist) > 0){
                return back()->with('error', 'This page already exist');
        }

        $this->validate($request, [
            'name' => 'required|min:3|max:30'
        ]);

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
