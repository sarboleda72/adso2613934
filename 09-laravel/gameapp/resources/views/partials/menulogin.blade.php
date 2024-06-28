<menu>
    <div class="imgUpload">
        <img src="images/img-viewUser.png" class="upload" alt="upload photo">
    </div>

    <div>Jeremias Springfield</div>

    <a href="editUser.html" class="btncustomer">Customer</a>

    <a href="profile.html">
        <img src="images/icon-profile.svg" alt="Login">
        Profile
    </a>
    <img src="images/Line-menu.svg" alt="">

    <a href="dashboard.html">
        <img src="images/icon-dashboard.svg" alt="Register">
        Dashboard
    </a>
    <img src="images/Line-menu.svg" alt="">
 
    <a href="javascript:;" onclick="logout.submit();">
        <img src="images/icon-logout.svg" alt="Catalogue">
        LogOut
    </a>
    <form id="logout" action="{{route('logout')}}" method="POST">@csrf</form>
    <img src="images/Line-menu.svg" alt="">
</menu>