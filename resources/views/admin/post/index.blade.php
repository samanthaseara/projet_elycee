@extends('layouts.admin')

@section('content')

    @if(Session::has('message'))
        @if(is_array(Session::get('message')))
        
            @foreach(Session::get('message') as $message)
<p class="notification">{{$message}}</p>
            @endforeach
        
        @else
        
<p class="notification">{{Session::get('message')}}</p>
        
        @endif
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>status</th>
            <th>title</th>
            <th>auteur</th>
            <th>date</th>
            <th>category</th>
            <th>tags</th>
            <th>image</th>
            <th>action</th>
        </tr>
        </thead>

        @forelse($posts as $post)
            <tr>
                <td>{{$post->status}}</td>
                <td><a href="{{url('post',[$post->id, 'edit'])}}" class="">{{$post->title}}</a></td>
                
                <td>{{$post->user? $post->user->name : 'aucun auteur'}}</td>
                <td>date de publication: {{$post->created_at->format('d/m/Y')}}</td>
                
                <td>
                    @if(!is_null($post->category))
                        {{$post->category->title}}
                    @else
                        Non catégorisé
                    @endif
                </td>
               
               
                <td>
                    @forelse($post->tags as $tag)
                        <span class="tag">{{$tag->name}}</span>
                    @empty
                        aucun tag
                    @endforelse
                </td>
               
                <td>
                    @if(!is_null($post->picture))
                    <div class="picture">
                        <img src="{{url('uploads', $post->picture->uri)}}">
                    </div>
                    @endif
                </td>
        
               
               
                <td style="text-align:center;">
                    <form class="destroy" method="POST" action="{{url('post', $post->id)}}" Onsubmit="return attention();">
                       
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="title_h" value="{{$post->title}}">
                        <input class="btn btn-red" name="delete" type="submit" value="delete">
                    </form>
                    <a href="{{url('post',[$post->id, 'edit'])}}">
                        <input class="btn btn-edit" name="delete" type="submit" value="edit">
                    </a>
                    <a href="{{url('article',[$post->id])}}">
                        <input class="btn btn-view" name="delete" type="submit" value="view">
                    </a>
                </td>
            </tr>
        @empty
            <p>Aucun article en base</p>
        @endforelse
    </table>

    {{ $posts->links() }}

@endsection


<script>
function attention()
{
	resultat=window.confirm('Attention, vous êtes sur le point de supprimer un post, voulez-vous continuer ?');
	if (resultat==1)
	{
	}
	else
	{
		return false;
	}
}
</script>