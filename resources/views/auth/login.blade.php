@extends('layouts.master')

@section('content')
   <div class="connexion">
   <h1>Se connecter</h1>
    <form method="POST" action="{{url('login')}}">
        {!! csrf_field() !!}
        <div class="form-text">
            <label class="label" for="email">Email</label>
            <input style="margin-top:10px;" class="input-text" id="email" name="email" type="email" value="{{old('email')}}" >
            @if($errors->has('email')) 
            <span class="error">{{$errors->first('email')}}</span> 
            @endif
            <div class="clear"></div>
        </div>
        <div class="form-text">
            <label class="label" for="password">Password</label>
            <input style="margin-top:10px;" class="input-text" id="password" name="password" type="password"  >
            @if($errors->has('password')) 
            <span class="error">{{$errors->first('password')}}</span>                 @endif
            <div class="clear"></div>
        </div>
        <div class="form-text">
            <label class="label" for="remember">Remember</label>
            <input class="coche" type="radio" name="remember" value="remember"/>
            <div class="clear"></div>
        </div>
        <div class="form-submit">
            <input style="margin-top:10px;" class="ok" type="submit" value="login" >
        </div>
    </form>
    
</div>
@stop