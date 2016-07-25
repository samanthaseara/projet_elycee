
@if(isset($post) && $post->picture)
<img width="90" src="{{url('uploads', $post->picture->uri)}}" alt="">

    <label for="delete_picture">Supprimer l'image</label>
    <input id="delete_picture" type="checkbox" name="delete_picture" value="delete">
    <div class="clear"></div>
@endif
   <br>Ou remplacer l'image:
    <label for="name">Nom de l'image (*)</label>
    <input type="text" name="name">
    <div class="clear"></div>
    <label for="picture">Télécharger une image</label>
    <input  type="file" name="picture">
    <div class="clear"></div>
    @if($errors->has('picture')) <span class="error">{{$errors->first('picture')}}@endif
</p>