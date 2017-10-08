@extends('layouts.app')

@section('content')

    @foreach($discussions as $discussion)

        <div class="panel panel-default">
            
            <div class="panel-heading">
            
                <img src="{{ asset($discussion->user->avatar) }}" alt="Avatar User" style="width:30px; heigth:30px; border-radius:50%;">&nbsp;&nbsp;&nbsp;
                <span> {{ $discussion->user->name }},&nbsp; <b>{{ $discussion->created_at->diffForHumans()}}</b>  </span>

                <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" class="btn btn-xs btn-info pull-right">View Discussion</a>
            </div>

            <div class="panel-body">

                <h4 class="text-center"><a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" style="text-decoration:none;">{{ $discussion->title }}</a></h4>
                <p>{{ str_limit($discussion->content, 250) }}</p>

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

    @endforeach

        <div class="text-center">

            {{ $discussions->links() }}

        </div>

@endsection
