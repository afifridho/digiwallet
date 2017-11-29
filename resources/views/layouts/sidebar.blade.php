<div class="profile-sidebar">
  <div class="profile-userpic">
    <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
  </div>
  <div class="profile-usertitle">
    <div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
  </div>
  <div class="clear"></div>
</div>
<div class="divider"></div>
<form role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search">
  </div>
</form>
<ul class="nav menu">
  <li><a href="#"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
  <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
    <em class="fa fa-navicon">&nbsp;</em> Agency<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"></span>
    </a>
    <ul class="children collapse" id="sub-item-1">
      <li><a class="" href="{{ url('/agencies') }}">
        <span class="fa fa-arrow-right">&nbsp;</span> Agency List
      </a></li>
      <li><a class="" href="{{ url('/agencycategories') }}">
        <span class="fa fa-arrow-right">&nbsp;</span> Agency Categories
      </a></li>
    </ul>
  </li>
  <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
    <em class="fa fa-navicon">&nbsp;</em> Finance<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"></span>
    </a>
    <ul class="children collapse" id="sub-item-2">
      <li><a class="" href="{{ url('/financelogs') }}">
        <span class="fa fa-arrow-right">&nbsp;</span> Financial Records
      </a></li>
      <li><a class="" href="{{ url('/incomes') }}">
        <span class="fa fa-arrow-right">&nbsp;</span> Income Records
      </a></li>
      <li><a class="" href="{{ url('/expenses') }}">
        <span class="fa fa-arrow-right">&nbsp;</span> Expense Records
      </a></li>
    </ul>
  </li>
  <li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
</ul>
