<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicController extends Controller
{
    public function index()
    {
        return view('topics.index', ["data" => Topic::all()]);
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request, Topic $data)
    {
        $newData = $data->create($request->all());
        return redirect()->route('topics.show', $newData);
    }

    public function show(Topic $data)
    {
        return view('topics.detail', compact("data"));
    }

    public function edit(Topic $data)
    {
        return view('topics.detail', compact($data));
    }

    public function update(Request $request, Topic $data)
    {
        $updateData = $data->update($request->all());
        return redirect()->route('topics.show', $data);
    }

    public function destroy(Topic $data)
    {
        $data->destroy();
        return redirect()->route('topics.index');
    }
}
