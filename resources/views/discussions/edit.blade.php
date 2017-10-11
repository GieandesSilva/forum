@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">Update the Discussion {{ $discussion->title }}</div>

        <div class="panel-body">

            <form action="{{ route('discussion.update', ['id' => $discussion->id ]) }}" method="post">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="content"> Ask a Question:</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $discussion->content }}</textarea>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-success" type="submit"> Update Discussion </button>
                </div>
            </form>

        </div>
    </div>

@endsection