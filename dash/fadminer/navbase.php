 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="#" onclick="parent.location='./'"><i class="fa fa-user"></i> <font class="r">Welcome <b><?php echo $_SESSION["IQGAMES_NAME_2018_VISION"];?></b></font></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active" onclick="parent.location='./'"><a href="#"><i class="fa fa-home homo"></i> Home</a></li>
       
        <li><a href="#"><i class="fa fa-bell"></i> Notifications <span class="badge">0</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li onclick="parent.location='profile'"><a href="#"><i class="glyphicon glyphicon-user"></i> <font class="r">Profile</font></a></li>
        <li onclick="parent.location='logmeout'"><a href="#"><i class="glyphicon glyphicon-log-out"></i> <font class="r">Logout</font></a></li>
      </ul>
    </div>
  </div>
</nav>