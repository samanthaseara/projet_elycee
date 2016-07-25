@extends('layouts.admin')

@section('content')

@if(Session::has('message'))
    <p>{{Session::get('message')}}</p>
@endif

<form method="POST" action="{{url('post', $post->id)}}" enctype="multipart/form-data" >
    <div class="info">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="user_id" value="{{$userId}}">
        {{csrf_field()}}
    
        <label>Titre</label>
        <input style="margin-top:10px;" type="text" name="title" value="{{$post->title}}">
        @if($errors->has('title')) 
            <span class="error">{{$errors->first('title')}}</span>
        @endif
        <div class="clear"></div>
    
       <label for="category_id">Catégorie</label>
        <select style="margin-top:10px;" name="category_id">
        @foreach( $categories as $id=>$title )
            <option {{$post->category_id==$id? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
        @endforeach
            <option {{is_null($post->category_id)? 'selected' : ''}} value="0">Non catégorisé</option>
        </select>
        <div class="clear"></div>
        
        <label for="tag_id">Mot clé</label>
        <select style="margin-top:10px;height:200px;" name="tag_id[]" multiple>
            @foreach( $tags as $id => $title )
                <option {{$post->hasTag($id)? 'selected' : ''}}  value="{{$id}}">{{$title}}</option>
             @endforeach
         </select>
        @if($errors->has('tag_id')) 
            <span class="error">{{$errors->first('tag_id')}}</span>
         @endif
         <div class="clear"></div>
         
        <label>Contenu</label>
        <textarea style="height:350px" name="content">{{$post->content}}</textarea>
        @if($errors->has('content')) 
            <span class="error">{{$errors->first('content')}}</span>
        @endif
        <div class="clear"></div>
 @include('admin.post.partials.file')
        
         <label for="status">Publier l'article:</label>
         <input class="coche" {{$post->status=='opened'? 'checked' : ''}} id="status" type="checkbox" name="status" value="opened">
        <div class="clear"></div>

         <input class="ok" type="submit" value="Valider">
    </div>     
               
    <div class="form_img">
        <img src="{{url('uploads', $post->picture->uri)}}">
    </div>
    <div class="clear"></div>              
    
</form>
@endsection