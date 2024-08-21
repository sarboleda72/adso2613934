<menu>
    <div class="imgUpload">
        <img src="{{ asset('img').'/'.Auth::user()->photo}}" class="upload" alt="upload photo">
    </div>

    <div>{{ Auth::user()->fullname }}</div>

    <a href="/editUser" class="btncustomer">{{ Auth::user()->role }}</a>

    <a href="/profile">
        <img src="{{asset('images/icon-profile.svg')}}" alt="Login">
        Profile
    </a>
    <img src="{{asset('images/Line-menu.svg')}}" alt="">

    <a href="/dashboard">
        <img src="{{ asset('images/icon-dashboard.svg')}}" alt="Register">
        Dashboard
    </a>
    <img src="{{ asset('images/Line-menu.svg')}}" alt="">
 
    <a href="javascript:;" onclick="logout.submit();">
        <img src="{{ asset('images/icon-logout.svg')}}" alt="Catalogue">
        LogOut
    </a>
    <form id="logout" action="{{route('logout')}}" method="POST">@csrf</form>
    <img src="{{ asset('images/Line-menu.svg')}}" alt="">
</menu>