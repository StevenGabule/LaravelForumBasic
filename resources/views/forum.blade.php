@extends('layouts.app')

@section('content')

    @foreach($discussions as $d)
        <div class="card card-default">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="" width="40" height="40">&nbsp;&nbsp;&nbsp;&nbsp;
                <span>{{ $d->user->name }}&nbsp;&nbsp;&nbsp;&nbsp; {{$d->created_at->diffForHumans()}}</span>
                @if($d->hasBestAnswer())
                    <span class="btn btn-success btn-sm">Closed</span>
                @else
                    <span class="btn btn-primary btn-sm">Open</span>
                @endif
                <a href="{{ route('discussion', ['slug' => $d->slug]) }}" class="btn btn-primary btn-sm mr-0">view</a>
            </div>
            <div class="card-body">
                <h4 class="text-center">{{ $d->title}}</h4>
                <p class="text-center">
                    {{ str_limit($d->description, 100) }}
                </p>
            </div>
            <div class="card-footer">
                <span class="d-inline-block text-left">
                    {{ $d->replies->count() }} Replies
                </span>
                <span class="d-inline-block text-right">
                <a href="{{ route('channel', ['slug' => $d->channel->slug]) }}"
                   class="btn btn-info btn-sm ml-0">{{ $d->channel->title }}</a>
                </span>
            </div>
        </div>
        <br>
    @endforeach
    <br>
    <div class="text-center">
        {{ $discussions->links() }}
    </div>
@endsection
