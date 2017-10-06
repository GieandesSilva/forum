@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Edit Channel {{ $channel->title }}</div>

        <div class="panel-body">
            <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post">

                {{ csrf_field() }}

                {{ method_field('put')}}

                <div class="form-group">
                    <label for="channel">Channel Name:</label>
                    <input type="text" class="form-control" name="channel" id="channel" value=" {{ $channel->title }} ">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

@endsection
