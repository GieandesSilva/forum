@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">

            <img src="{{ asset($discussion->user->avatar) }}" alt="Avatar User" style="width:50px; heigth:50px; border-radius:50%;">&nbsp;&nbsp;&nbsp;
            <span> {{ $discussion->user->name }},&nbsp; <b>{{ $discussion->created_at->diffForHumans() }}</b>  </span>

        </div>

        <div class="panel-body">

            <h4 class="text-center"><a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" style="text-decoration:none;">{{ $discussion->title }}</a></h4>
            <p>{{ $discussion->content }}</p>

        </div>
        <div class="panel-footer">
        @if($discussion->replies->count = 0)    
            
            <span>No Reply Yet </span>
            <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="btn-xs pull-right" style="text-decoration:none">{{ $discussion->channel->title }}</a>

        @elseif($discussion->replies->count = 1)    
        
            <span>{{ $discussion->replies->count() }} Reply </span>
            <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="btn-xs pull-right" style="text-decoration:none">{{ $discussion->channel->title }}</a>
        
        @else
        
            <span>{{ $discussion->replies->count() }} Replies </span>
            <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="btn-xs pull-right" style="text-decoration:none">{{ $discussion->channel->title }}</a>

        @endif
    </div>

    </div>

    @foreach($discussion->replies as $reply)

        <div class="panel panel-default">

            <div class="panel-heading">

                <img src="{{ asset($reply->user->avatar) }}" alt="Avatar User" style="width:30px; heigth:30px; border-radius:50%;">&nbsp;&nbsp;&nbsp;
                <span> {{ $reply->user->name }},&nbsp; <b>{{ $reply->created_at->diffForHumans() }}</b>  </span>

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
