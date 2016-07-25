@extends('layouts.admin')

@section('content')

@if(Session::has('message'))
    <p>{{Session::get('message')}}</p>
@endif

<form method="POST" action="{{url('post')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{$userId}}">
    
    <label>Titre</label>
    <input style="margin-top:10px;" type="text" name="title" value="{{old('title')}}">
    @if($errors->has('title')) 
        <span class="error">{{$errors->first('title')}}</span>
    @endif
    <div class="clear"></div>
    
    <label>sélectionner une catégorie</label>
    <select style="margin-top:10px;" name="category_id">
        @forelse($categories as $id=>$title)
            <option value="{{$id}}">{{$title}}</option>
        @empty
        @endforelse
        <option value="0" selected>non catégorisé</option>
    </select>
    <div class="clear"></div>
    
     <div class="form-select">
    <label >Mot clé</label>
    <select style="margin-top:10px;height:200px;" name="tag_id[]" multiple>
        @foreach($tags as $id => $name)
            <option value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
    </div>
    <div class="clear"></div>
    
    <label>Contenu</label>
    <textarea style="height:300px;" name="content">{{old('content')}}</textarea>
    @if($errors->has('content')) 
        <span class="error">{{$errors->first('content')}}</span>
    @endif
    <div class="clear"></div>

    <label for="name">Nom de l'image (*)</label>
    <input style="margin-top:10px;" type="text" name="name">
    <div class="clear"></div>
    
    <label for="picture">Télécharger une image</label>
    <input style="margin-top:10px;" type="file" name="picture">
    @if($errors->has('picture')) 
        <span class="error">{{$errors->first('picture')}}</span>
    @endif
    <div class="clear"></div>

    <label for="status">Publier l'article:</label>
    <input class="coche" id="status" type="checkbox" name="status" value="opened">
    <div class="clear"></div>
        
<input class="ok" type="submit" value="Valider">



</form>
@endsection