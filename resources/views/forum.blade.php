@extends('layouts.app')

@section('content')

    @foreach($discussions as $discussion)

        <div class="panel panel-default">
            
            <div class="panel-heading">
            
                <img src="{{ asset($discussion->user->avatar) }}" alt="Avatar User" style="width:30px; heigth:30px; border-radius:50%;">&nbsp;&nbsp;&nbsp;
                <span> {{ $discussion->user->name }},&nbsp; <b>{{ $discussion->created_at->diffForHumans()}}</b>  </span>

                @if($discussion->is_being_watched_by_auth_user())

                    <a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-xs btn-default pull-right" style="margin-top: 5px;">unwatch</a>
            
                @else

                    <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-xs btn-info pull-right" style="margin-top: 5px;">Watch</a>            
                
                @endif
            </div>

            <div class="panel-body">

                <h4 class="text-center"><a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" style="text-decoration:none;">{{ $discussion->title }}</a></h4>
                <p>{{ str_limit($discussion->content, 250) }}</p>

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

    @endforeach

        <div class="text-center">

            {{ $discussions->links() }}

        </div>

@endsection
