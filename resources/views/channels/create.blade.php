@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Channel</div>

                <div class="panel-body">
                    <form action="{{ route('channels.store') }}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="channel">Channel Name:</label>
                            <input type="text" class="form-control" name="channel" id="channel">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Store</button>
                        </div>
                    </form>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
