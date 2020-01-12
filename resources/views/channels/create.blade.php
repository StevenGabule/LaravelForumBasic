@extends('layouts.app')

@section('content')

    @if($errors->count() > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif

    <div class="card">
        <div class="card-header">Create a new channel</div>
        <div class="card-body">
            <form action="{{route('channels.store')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="channel" class="form-control" placeholder="Channel name">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Save channel
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
