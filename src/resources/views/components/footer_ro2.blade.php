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
              <li class="nav-item">
                <div class="col-auto" style="margin-right:5px;">
                    <!-- Button trigger modal -->   
                <div class="input-group">
                <span class="btn btn-sm badge-light3d" data-bs-toggle="modal" data-bs-target="#sajid" style="margin-bottom:3px;">Global &nbsp;<i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span>
                </div>
        </div> </li>
        <li class="nav-item">
        <div class="col-auto" style="margin-right:8px;">
          <div class="input-group input-group-sm">
            <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">From</div>
    
            <input type="date" name="start_date" class="tensor-flow form-control form-control-sm" id="start_date" value="2023-03-01" min="2016-01-01" max="2027-11-10" required="" style="background-color:#dff9fb;">
          </div>
        </div> </li>
        <li class="nav-item">
        <div class="col-auto" style="margin-right:5px;">
          <div class="input-group input-group-sm">
            <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">To</div>
            <input type="date" name="end_date" id="end_date" value="2023-03-31" min="2016-01-31" max="2027-03-30" class="tensor-flow form-control form-control-sm" required="" style="background-color:#dff9fb;">
          </div>
        </div> </li>
        <li class="nav-item">
            <div class="col-auto" style="margin-right:5px;">
                <div class="input-group input-group-sm">
                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">Skid &nbsp;<i class="fa fa-tag" aria-hidden="true" style="color:black;"></i></div>
                <select class="query form-control form-control-sm form-select" id="skidx" style="background-color:#dff9fb;">
                    <option value="a"> 43-A</option>
                    <option value="b">43-B</option>
                    <option value="c">43-C</option>
                    <option value="d">43-D</option>
                    <option value="e" selected="">43-E</option> 
                  </select>
                </div>
            </div> </li>

        <li class="nav-item">
            <div class="col-auto" style="margin-right:5px;">
                <div class="input-group input-group-sm">
                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">Data Interval &nbsp;<i class="fa fa-clock-o" aria-hidden="true" style="color:black;"></i></div>
                <select class="query form-control form-control-sm form-select" id="invt" style="background-color:#dff9fb;">
                  <option value="0.7">1 Hour</option>
                  <option value="1.8">2 Hours</option>
                  <option value="3.7">4 Hours</option>
                  <option value="5.7">6 Hours</option>    
                  <option value="7.7">8 Hours</option>  
                  <option value="11">12 Hours</option>
                  <option value="23">24 Hours</option>
                  <option value="47">48 Hours</option>    
                  </select>
                </div>
            </div> </li>
        <li class="nav-item">
        <div class="col-auto" style="margin-right:15px;">
          <div class="input-group input-group-sm">
            <button id="trigger" class="query_fire btn btn-warning btn-sm">
              <i class="fa fa-rocket" aria-hidden="true" style="color:black;"></i>&nbsp; Send Query</button>
          </div>
        </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  </x-card>