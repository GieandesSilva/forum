@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">Create a New Discussion</div>

        <div class="panel-body">

            <form action="{{ route('discussion.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title')}}" class="form-control">
                </div>
            
                <div class="form-group">
                    <label for="channel"> Pick a Channel </label>
                    <select name="channel_id" id="channel" class="form-control">
                        @foreach($channels as $channel)

                            <option value="{{ $channel->id}}"> {{ $channel->title }} </option>
                        
                        @endforeach

                    </select>

                </div>
                <div class="form-group">
                    <label for="content"> Ask a Question:</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-success" type="submit">  Store Discussion </button>
                </div>
            </form>

        </div>
    </div>

@endsection
