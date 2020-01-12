@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">Create a new discussion</div>

        <div class="card-body">
            @if($errors->count() > 0)
                @foreach($errors->all() as $error)
                    <div class="form-group">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif

            <form action="{{route('discussions.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="channed_id">Pick a channel</label>
                    <select name="channel_id" id="channed_id" class="form-control">
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">{{$channel->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Ask a question</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create Discussion</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
