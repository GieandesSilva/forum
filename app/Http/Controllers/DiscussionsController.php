<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Discussion;

use Auth;

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
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'Discussion created successfully.');

        return redirect()->back();
    }
}
