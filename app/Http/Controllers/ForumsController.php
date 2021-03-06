<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ForumsController extends Controller
{
    public function index()
    {
        switch (request('filter')) {
            case 'me':
                $discussions = Discussion::where('user_id', Auth::id())->paginate(3);
                break;
            case 'solved':
                $answered = array();
                foreach (Discussion::all() as $d) {
                    if($d->hasBestAnswer()) {
                        array_push($answered, $d);
                    }
                }
                $discussions = new Paginator($answered, 3);
                break;
            case 'unsolved':
                $unanswered = array();
                foreach (Discussion::all() as $d) {
                    if(!$d->hasBestAnswer()) {
                        array_push($unanswered, $d);
                    }
                }
                $discussions = new Paginator($unanswered, 3);
                break;
            default:
                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }

        return view('forum', compact('discussions'));
    }

    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();
        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}
