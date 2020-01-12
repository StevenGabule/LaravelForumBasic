@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">Update discussion</div>

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

            <form action="{{route('discussions.update', ['id' => $discussion->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="content">Ask a question</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $discussion->description }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
