<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Watcher;

use Session;

class WatchersController extends Controller
{
    //

    public function watch($id)

    {

        Watcher::create([

            'user_id' => Auth::id(),

            'discussion_id' => $id,

        ]);

        Session::flash('success', 'You are watching this discussion.');

        return redirect()->back();

    }

    public function unwatch($id)

    {


        $watcher = Watcher::where('discussion_id', $id)->where('user_id', Auth::id());

        $watcher->delete();

        Session::flash('success', 'You are not watching this discussion more');

        return redirect()->back();

    }
}
