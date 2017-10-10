@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">

            <img src="{{ asset($discussion->user->avatar) }}" alt="Avatar User" style="width:50px; heigth:50px; border-radius:50%;">&nbsp;&nbsp;&nbsp;
            <span> {{ $discussion->user->name }},&nbsp; <b>({{ $discussion->user->points }}) - {{ $discussion->created_at->diffForHumans() }}</b></span>

            @if($discussion->is_being_watched_by_auth_user())

                <a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-xs btn-default pull-right" style="margin-top: 15px;">unwatch</a>
            
            @else

                <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-xs btn-info pull-right" style="margin-top: 15px;">Watch</a>            
            
            @endif

        </div>

        <div class="panel-body">

            <h4 class="text-center"><a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" style="text-decoration:none;">{{ $discussion->title }}</a></h4>
            <p>{{ $discussion->content }}</p>
            <hr>
            @if($best_answer)

                <div class="panel panel-success">
                    <h4 class="text-center">Best Answer</h4>
                    <div class="panel-heading">

                        <img src="{{ asset($best_answer->user->avatar) }}" alt="Avatar User" style="width:35px; heigth:35px; border-radius:50%;">&nbsp;&nbsp;&nbsp;
                        <span> {{ $best_answer->user->name }},&nbsp; <b>({{ $best_answer->user->points }})</b> - {{ $best_answer->created_at->diffForHumans() }}</span>

                    </div>
                    <div class="panel-body">

                        <p>{{ $best_answer->content }}</p>

                    </div>

                </div>
            @endif            

        </div>
        <div class="panel-footer">

            @if($discussion->replies)

                @if($discussion->replies->count() == 1)    
                
                    <span>{{ $discussion->replies->count() }} Reply </span>
                    <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="btn-xs pull-right" style="text-decoration:none">{{ $discussion->channel->title }}</a>
                
                @else
                
                    <span>{{ $discussion->replies->count() }} Replies </span>
                    <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="btn-xs pull-right" style="text-decoration:none">{{ $discussion->channel->title }}</a>

                @endif
            
            @else

                <span>No Reply Yet </span>
                <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="btn-xs pull-right" style="text-decoration:none">{{ $discussion->channel->title }}</a>

            @endif

        </div>
    </div>

    @foreach($discussion->replies as $reply)

    <div class="panel panel-default">

        <div class="panel-heading">

            <img src="{{ asset($reply->user->avatar) }}" alt="Avatar User" style="width:30px; heigth:30px; border-radius:50%;">&nbsp;&nbsp;&nbsp;
            <span> {{ $reply->user->name }},&nbsp; <b>({{ $reply->user->points }})</b> - <b>{{ $reply->created_at->diffForHumans() }}</b>  </span>

            @if(!$best_answer)

                @if(Auth::id() == $discussion->user->id)

                    <a href="{{ route('discussion.best.answer', ['id' => $reply->id]) }}" class="btn btn-xs btn-default pull-right" style="margin-top:5px;">Best Answer</a>
                @endif
                
            @endif
        </div>

        <div class="panel-body">

            <p>{{ $reply->content }}</p>

        </div>
        <div class="panel-footer">

            @if($reply->is_liked_by_auth_user())

                <a href="{{ route('reply.unlike', [ 'id' => $reply->id ]) }}" class="btn btn-xs btn-danger">Unlike</a>
                
                @if($reply->likes->count() == 1)
                
                    <p class="pull-right">{{ $reply->likes->count() }} like</p>               

                @else

                    <p class="pull-right">{{ $reply->likes->count() }} likes</p>               

                @endif

            @else
            
                <a href="{{ route('reply.like', [ 'id' => $reply->id ]) }}" class="btn btn-xs btn-success">Like</a>                

                @if($reply->likes->count() == 1)
                
                    <p class="pull-right">{{ $reply->likes->count() }} like</p>               

                @else

                    <p class="pull-right">{{ $reply->likes->count() }} likes</p>               

                @endif

            @endif

        </div>

    </div>


    @endforeach

    <div class="panel panel-default">

        
        <div class="panel-body">
            
            @if(Auth::check())

                <form action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">
                    
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="reply"> Leave  a Replay </label>
                        <textarea name="content" id="reply" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success pull-right" type="submit"> Send </button>
                    </div>

                </form>
            
            @else
            
                <div class="text-center">
                    
                    <h2>Sign In To Leave a Reply</h2>
                    
                </div>
            
            @endif

        </div>

    </div>
@endsection
