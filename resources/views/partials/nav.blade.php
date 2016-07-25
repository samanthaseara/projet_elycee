<div class="container">
    <a href="{{url('/')}}"><div class="logo">logo</div></a>
  <div class="nav">
       <ul>
        <li><a href="{{url('/')}}">accueil</a></li>
        @forelse($categories as $id => $title)
            <li><a href="{{url('category', $id)}}">{{$title}}</a></li>
        @empty
        @endforelse
        </ul>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{url('post')}}">Dashboard</a></li>
            <li><a href="{{url('logout')}}">Logout</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>