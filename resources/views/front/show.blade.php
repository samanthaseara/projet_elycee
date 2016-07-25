@extends('layouts.master')

@section('title', $title)

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
        @if($post)
        <div class="article">
            <h1> {{ $post->title }} </h1>
            <div class="meta">
                <div class="auteur">
                   @if(!is_null($post->user))
                    <p> Ecrit par {{$post->user->name}}</p>
                    @endif
                </div>
                <div class="date">
                    le {{$post->published_at->format('d/m/Y')}}
                </div>
           </div>
           <div class="categorie">
               @if(!is_null($post->category))
                {{$post->category->title}}
            @endif
           </div>
           <div class="clear"></div>
        @if(!is_null($post->picture))
        <div class="picture">
            <img src="{{url('uploads', $post->picture->uri)}}">
        </div>
        @endif

        <!-- <p class="content"> {{ nl2br(e($post->content)) }}</p>-->
            <p class="content"><?php echo htmlspecialchars_decode($post->content); ?></p>
        <div class="tag">
            @forelse($post->tags as $tag)
                <span>{{$tag->name}}</span> 
            @empty
                aucun tag
            @endforelse
           </div>
        
    @else
            <p>pas de d'article</p>
    @endif
</div>
@stop