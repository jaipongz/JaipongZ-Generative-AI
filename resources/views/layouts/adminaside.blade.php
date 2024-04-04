<aside>
    <div class="top">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <div class="name">
                <h2 class="danger">JaipongZ<span>Admin</span></h2>
            </div>
        </div>
        <div class="close" id="close-btn">
            <span class="material-symbols-outlined">
                close
            </span>
        </div>
    </div>
    <div class="sidebar">

        <a href="{{route('admin.user')}}">
            <span class="material-symbols-outlined">
                person
                </span>
            <h3>User</h3>
        </a>
       
        


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
