<x-card>
    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgba(0, 0, 0, 0.8)">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
              <li class="nav-item" style="margin-top:8px">
              </li>
              <li class="nav-item dropup">
                <a class="nav-link" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bars" aria-hidden="true" style="color:rgb(121, 119, 119);"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdown10">
                  <li><a  href="{{ url('/register') }}"  style="text-decoration: none;" class="dropdown-item menu ">
                   <i class="ancher fa fa-user-plus" aria-hidden="true"></i>&nbsp;Add New User</a></li>
                  <li><a class="dropdown-item" href="#">User Profile</a></li>
                  <li><a class="dropdown-item" href="#">
                    <i class="fa fa-key" aria-hidden="true"></i>&nbsp;Change Password</a></li>
                  <li><a class="dropdown-item" href="#">Admin</a></li>
                  <li>
                    <form class="" method="POST" action="/logout" >
                        @csrf
                        <button type="submit" class="dropdown-item menu">
                        <i class="fa fa-sign-out" aria-hidden="true" style="color:rgb(18, 17, 17);"></i> &nbsp;Logout</button>
                        </form> 
                </li>
                </ul>
              </li>
              <li class="nav-item">
                <div class="col-auto" style="margin-right:5px;">
                    <a href="{{ url('/home') }}"> 
                        <button class="btn form-control btn-sm badge-light3d">Home &nbsp;
                            <i class="fa fa-home" aria-hidden="true" style="color:black;"></i></button></a>
                    </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>
  </x-card>