<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $id)
    {
        return view("ideas.show", [
            'idea' => $id
        ]);
    }

    public function edit(Idea $id)
    {
        $editing = true;

        return view("ideas.show", [
            'idea' => $id,
            'editing' => $editing
        ]);
    }

    public function update(Idea $idea)
    {
        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->content = request()->get('content'); 
        $idea->save();

        return redirect()->route("idea.show", $idea -> id)->with("success", "Idea updated successfully!");
    }


    public function store()
    {
        request()->validate([
            'idea' => 'required|min:5|max:240'
        ]);

        $idea = new Idea([
            'content' => request()->get('idea', '')
        ]);
        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea Create successfully !");
    }

    public function destroy(Idea $id)
    {
        // we don't have to do this line when ad Idea model in parameter for $id
        // $idea = Idea::where('id', $id)->firstOrFail()->delete();
        $id->delete();
        return redirect()->route("dashboard")->with("success", "Idea deleted successfully !");
    }
}
