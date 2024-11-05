<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        return view("ideas.show", [
            'idea' => $idea
        ]);
    }

    public function edit(Idea $idea)
    {
        if (Auth::id() !== $idea->user_id) {
            abort(404);
        }

        $editing = true;

        return view("ideas.show", [
            'idea' => $idea,
            'editing' => $editing
        ]);
    }

    public function update(Idea $idea)
    {
        if (Auth::id() !== $idea->user_id) {
            abort(404);
        }

        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->content = request()->get('content');
        $idea->save();

        return redirect()->route("idea.show", $idea->id)->with("success", "Idea updated successfully!");
    }


    public function store()
    {
        $validate = request()->validate([
            'idea' => 'required|min:5|max:240'
        ]);

        $validate['user_id'] = Auth::id();
        // dd($validate);
        $idea = new Idea([
            'content' => request()->get('idea', ''),
            'user_id' => Auth::id(),
        ]);
        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea Create successfully !");
    }

    public function destroy(Idea $idea)
    {
        if (Auth::id() !== $idea->user_id) {
            abort(404);
        }
        // we don't have to do this line when ad Idea model in parameter for $id
        // $idea = Idea::where('id', $id)->firstOrFail()->delete();
        $idea->delete();
        return redirect()->route("dashboard")->with("success", "Idea deleted successfully !");
    }
}
