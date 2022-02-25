@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-7 mx-auto">
        <div class="card mb-2 ">
            <div class="card-body">
                <h5 class="card-title m-1">
                    <!-- {{$article->title }} -->
                    <b>{{$article->user->name}}</b>
                </h5>
                <div class="card-subtitle mb-2 text-muted small">
                    Type
                    <b>
                        {{$article->category->name}}.
                    </b>
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <!-- <a class="btn btn-warning" href="{{ url("/articles/delete/$article->id") }}">
                    Delete
                </a> -->
            </div>
            <div class="mb-2 col-md-12 mx-auto d-flex justify-content-between">
                <a href="">{{ count($article->like) }} Likes</a>
                <div>
                    <a href="">{{ count($article->comments) }} Comments</a>
                    <a href="">5 Share</a>
                </div>
            </div>

            <form method="head">
                <div class="btn-group mb-2 col-md-12 mx-auto">
                    @csrf
                    @method("HEAD")
                    @if (!$article->like->contains('user_id',auth()->user()->id))
                    <a href="/likes/add/{{$article->id}}" class="btn btn-outline-info">Like</a>
                    @else
                    <a href="/likes/remove/{{$article->id}}" class="btn btn-info" >Liked</a>
                    @endif
                    <a href="" class="btn btn-outline-info">Comment</a>
                    <a href="" class="btn btn-outline-info">Share</a>
                </div>
            </form>
        </div>
        @auth
        <form action="{{url('/comments/add')}}" method="post" class="">
            @csrf
            <div class="input-group mb-2">
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <input name="content" class="form-control" placeholder="New Comment">
                <input type="submit" value="Add Comment" class="btn btn-secondary">
            </div>
        </form>
        @endauth
        <ul class="list-group mb-2 ">
            <!-- <li class="list-group-item active">
                <b>Comments ({{ count($article->comments) }})</b>
            </li> -->
            @foreach ($article->comments()->orderBy('created_at', 'desc')->get() as $comment)
            <li class="list-group-item">
                {{$comment->content}}
                <div class="float-right">
                    <a class="small text-mute text-dark ml-2" href="{{ url("/commends/edit/$comment->id") }}">
                        edit
                    </a> |
                    <a class="small text-mute text-dark mr-2" href="{{ url("/commends/delete/$comment->id") }}">
                        delete
                    </a>
                </div>
                <div class="small mt-2">
                    By <b>{{ $comment->user->name }}</b>,
                    {{ $comment->created_at->diffForHumans() }}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
