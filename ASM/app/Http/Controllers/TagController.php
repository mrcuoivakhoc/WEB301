<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(6);
        return view('tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->save();
        return redirect('/tags');
    }

    public function show(string $id)
    {
        $tag = Tag::find($id);
        return view('tags.show', ['tag' => $tag]);
    }

    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('tags.edit', ['tag' => $tag]);
    }

    public function update(Request $request, string $id)
    {
        $tag = Tag::find($id);
        $tag->description = $request->description;
        $tag->name = $request->name;
        $tag->save();
        return redirect('/tags');
    }

    public function destroy(string $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/tags');
    }
}
