@extends('layouts.app')

@section('content')

                <div class="card">
                    <div class="card-header">Channels</div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($channels as $channel)
                                <tr>
                                    <td>{{$channel->title}}</td>

                                    <td><a href="{{ route('channels.edit', ['channel' => $channel->id]) }}"
                                           class="btn btn-sm btn-primary">Edit</a></td>

                                    <td>
                                        <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

@endsection
