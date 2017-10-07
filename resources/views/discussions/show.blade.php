@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">

            <img src="{{ asset($discussion->user->avatar) }}" alt="Avatar User" style="width:50px; heigth:50px; border-radius:50%;">&nbsp;&nbsp;&nbsp;
            <span> {{ $discussion->user->name }},&nbsp; <b>{{ $discussion->created_at->diffForHumans() }}</b>  </span>

        </div>

        <div class="panel-body">

            <h4 class="text-center"><a href="{{ route('discussion', ['slug' => $discussion->slug]) }}">{{ $discussion->title }}</a></h4>
            <p>{{ $discussion->content }}</p>

        </div>
        <div class="panel-footer">
            @if($discussion->replies->count = 0)    
                
                <p>No Reply Yet </p>

            @elseif($discussion->replies->count = 1)    
            
                <p>{{ $discussion->replies->count() }} Reply </p>
            
            @else
            
                <p>{{ $discussion->replies->count() }} Replies </p>

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

                LIKE

            </div>

        </div>


    @endforeach

    <div class="panel panel-default">

        <div class="panel-body">

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

        </div>

    </div>
@endsection
