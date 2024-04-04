<aside>
    <div class="top">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <div class="name">
                <h2 class="danger">JaipongZ<span>Generative</span></h2>
            </div>
        </div>
        <div class="close" id="close-btn">
            <span class="material-symbols-outlined">
                close
            </span>
        </div>
    </div>
    <div class="sidebar">

        <a href="{{ route('logo') }}">
            <span class="material-symbols-outlined">communities</span>
            <h3>Logo</h3>
        </a>
        <a href="{{ route('logopro') }}">
            <span class="material-symbols-outlined">communities</span>
            <h3>Logo <span class="ver-logo">Pro</span></h3>
            
        </a>
        <a href="{{route('package')}}">
            <span class="material-symbols-outlined">inventory_2</span>
            <h3>Packaging</h3>
        </a>
        <a href="{{ route('packagepro') }}">
            <span class="material-symbols-outlined">inventory_2</span>
            <h3>Packaging <span class="ver-logo">Pro</span></h3>
            
        </a>
        <a href="{{ route('albums',['user_id'=>Auth::user()->id] )}}">
            <span class="material-symbols-outlined">photo_library</span>
            <h3>Albums</h3>
        </a>
        {{-- <a href="{{route('dashboard')}}">
            <span class="material-symbols-outlined">grid_view</span>
            <h3>Dashbord</h3>
        </a> --}}


        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="material-symbols-outlined">logout</span>
            <h3>Log Out</h3>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>



    </div>
</aside>
