<!-- Sidebar Toggle (Topbar) -->
<nav class="navbar navbar-expand navbar-warning topbar mb-4 static-top font-weight-bold" style="background-color: #ff9933;font-family: Arial, Helvetica, sans-serif">
    <div class="container justify-content-between">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-5 btn-light">
            <i class="fa fa-bars"></i>
        </button>
        <span  class="text-white"> </span>
        @auth
        <div class="sidebar-brand-text mx-3 font-weight-bold"
        style="color: black;font-family: Arial, Helvetica, sans-serif; text-align: center">
    <SPan class="text-white">SIREJAK</SPan>
    <br>
    <SPan class="text-white">{{ auth()->user()->name }}</SPan>
    </div>
         @endauth
        <img src="{{asset('/img/logop3m.png')}}" alt="" height="40" width="40">
    </div>
</nav>