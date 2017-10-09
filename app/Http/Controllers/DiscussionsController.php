<?php

namespace App\Http\Controllers;

use App\Discussion;

use Auth;

use Session;

use App\User;

use App\Reply;

use Notification;

use Illuminate\Http\Request;

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

        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show')->with('discussion', $discussion)->with('best_answer', $best_answer);
    }

    public function reply($id)
    
    {

        $discussion = Discussion::find($id);


        $reply = Reply::create([

            'user_id' => Auth::id(),

            'discussion_id' => $id,
            
            'content' => request()->content,
            
        ]);

        $reply->user->points += 25;

        $reply->user->save();

        $watchers = array();
        
        foreach($discussion->watchers as $watcher):

            array_push($watchers, User::find($watcher->user_id));

        endforeach;


        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));
                

        Session::flash('success', 'Replied to discussion.');

        return redirect()->back();
    }
}
