<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Discussion;

use Auth;

use App\Reply;

use Session;

class DiscussionsController extends Controller
{
    //

    public function create()

    {

        return view('discuss');
    }

    public function store()

    {
        $request = request();

        $this->validate($request, [

            'title' => 'required',
            'channel_id' => 'required',
            'content' => 'required',
        ]);

        $discussion = Discussion::create([

            'title' => $request->title,
            'channel_id' => $request->channel_id,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success', 'Discussion successfully created.');

        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }

    public function show($slug)

    {

        $discussion = Discussion::where('slug', $slug)->first();

        return view('discussions.show')->with('discussion', $discussion);
    }

    public function reply($id)
    
    {

        $discussion = Discussion::find($id);

        $reply = Reply::create([

            'user_id' => Auth::id(),

            'discussion_id' => $id,
            
            'content' => request()->content,
            
        ]);

        Session::flash('success', 'Replied to discussion.');

        return redirect()->back();
    }
}
