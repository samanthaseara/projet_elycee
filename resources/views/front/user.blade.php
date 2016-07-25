@extends('layouts.master')

@section('title', $title)

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    @forelse($posts as $post)
        <h1><a href="{{url('post',[$post->id])}}" class="">{{$post->title}}</a></h1>
        @if(!is_null($post->category))
            {{$post->category->title}}
        @else
            <p>Pas de catégorie associée pour cette article</p>
        @endif
        @if(!is_null($post->user))
            <p> auteur: {{$post->user->name}}</p>
        @else
            <p>pas d'auteur</p>
        @endif
    @empty
    @endforelse
@stop