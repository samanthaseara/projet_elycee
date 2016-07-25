@extends('layouts.master')

@section('title', $title)

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    @forelse($posts as $post)
       <div class="article">
            <h1><a href="{{url('article',[$post->id])}}" class="">{{$post->title}}</a></h1>
            <div class="meta">
                <div class="auteur">
                   @if(!is_null($post->user))
                    <p> Ecrit par {{$post->user->name}}</p>
                    @endif
                </div>
                <div class="date">
                    le {{$post->created_at->format('d/m/Y')}}
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
            
            <div class="tag">
            @forelse($post->tags as $tag)
                <span>{{$tag->name}}</span> 
            @empty
                aucun tag
            @endforelse
           </div>
           
            <p class="content"><?php 
        
echo substr($post->content, 0, 250);  

            ?>   [...]</p>
            <div class="lire">
               <a href="{{url('article',[$post->id])}}" class="">Lire la suite ...</a>
           </div>
           
        
        </div>
    @empty
    @endforelse
    {{ $posts->links() }}
@stop 