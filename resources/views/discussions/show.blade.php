@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            <img src="{{ $discussion->user->avatar }}" alt="" width="40" height="40">&nbsp;&nbsp;&nbsp;&nbsp;
            <span>{{ $discussion->user->name }}, <b>({{ $discussion->user->points}})</b></span>

            @if($discussion->hasBestAnswer())
                <span class="btn btn-success btn-sm">Closed</span>
            @else
                <span class="btn btn-primary btn-sm">Open</span>
            @endif

            @if(Auth::id() == $discussion->user->id)
                @if(!$discussion->hasBestAnswer())
                    <a href="{{ route('discussion.edit', ['slug' => $discussion->slug]) }}"
                       class="btn btn-primary btn-sm mr-0">Edit</a>
                @endif
            @endif
            @if($discussion->is_being_watched_by_auth_user())
                <a href="{{ route('discussion.unwatch', ['slug' => $discussion->id]) }}"
                   class="btn btn-primary btn-sm mr-0">unwatch</a>
            @else
                <a href="{{ route('discussion.watch', ['slug' => $discussion->id]) }}"
                   class="btn btn-primary btn-sm mr-0">watch</a>
            @endif
        </div>
        <div class="card-body">
            <h4 class="text-center">{{ $discussion->title}}</h4>
            <hr>
            <p class="text-center">
                {!! Markdown::convertToHtml($discussion->description) !!}
            </p>
            <hr>
            @if($best_answer)
                <div class="text-center">
                    <div class="card-">
                        <div class="card-header">
                            <h2 class="text-center">Best answer</h2>
                            <hr>
                            <img src="{{ $best_answer->user->avatar }}" alt="" width="40" height="40">&nbsp;&nbsp;&nbsp;&nbsp;
                            <span>{{ $best_answer->user->name }} , <b>({{ $best_answer->user->points}})</b></span>
                        </div>
                        <div class="card-body">
                            {!! Markdown::convertToHtml($best_answer->description) !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer">
           <span class="d-inline-block text-left">
                    {{ $discussion->replies->count() }} Replies
                </span>
            <span class="d-inline-block text-right">
                <a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}"
                   class="btn btn-info btn-sm ml-0">{{ $discussion->channel->title }}</a>
                </span>

        </div>
    </div>

    <br>
    @foreach($discussion->replies as $r)
        <div class="card card-panel">
            <div class="card-header">
                <img src="{{ $r->user->avatar }}" alt="" width="40" height="40">&nbsp;&nbsp;&nbsp;&nbsp;
                <span>{{ $r->user->name }}, <b>({{ $r->user->points}})</b></span>
                @if(!$best_answer)
                    @if(Auth::id() == $discussion->user->id)
                        <a href="{{ route('discussion.best.answer', ['id' => $r->id]) }}"
                           class="btn btn-sm btn-primary ml-3">Mark
                            as best answer</a>
                    @endif
                @endif

                @if(Auth::id() == $r->user->id)
                    @if(!$r->best_answer)
                        <a href="{{ route('replies.edit', ['id' => $r->id]) }}"
                           class="btn btn-sm btn-primary ml-3">edit reply</a>
                    @endif
                @endif
            </div>

            <div class="card-body">
                <p class="text-center">
                    {!! Markdown::convertToHtml($r->description) !!}
                </p>
            </div>
            <div class="card-footer">
                @if($r->is_liked_by_auth_user())
                    <a href="{{ route('reply.unlike', ['id' =>  $r->id]) }}" class="btn btn-danger btn-sm">Unlike <span
                                class="badge">{{ $r->likes->count() }}</span></a>
                @else
                    <a href="{{ route('reply.like', ['id' => $r->id]) }}" class="btn btn-primary btn-sm">Like <span
                                class="badge"> {{ $r->likes->count() }}</span></a>
                @endif
            </div>
        </div>
    @endforeach

    @if(Auth::check())
        <div class="card card-panel">
            <div class="card-body">
                <form action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="reply">Leave a reply</label>
                        <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">reply</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <br>
        <div class="card card-default">
            <div class="card-body">
                <div class="text-center">
                    <h2>Sign in to leave a reply</h2>
                </div>
            </div>
        </div>
    @endif
@endsection
