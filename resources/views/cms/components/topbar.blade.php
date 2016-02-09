<!-- NAVIGATION MENU -->
<div class="navbar-nav navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
	  		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{route('cms.dashboard.index')}}">
				<!-- <img src="images/logo30.png" alt="">  -->
				ONEGATE
			</a>
		</div> 
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="@yield('active-dashboard')"><a href="{{route('cms.dashboard.index')}}"><i class="icon-home icon-white"></i> Dashboard</a></li>                            
				<li class="@yield('active-article')" ><a href="{{route('cms.articles.index')}}"><i class="icon-th icon-white"></i> Articles</a></li>
				<li class="@yield('active-category')" ><a href="{{route('cms.categories.index')}}"><i class="icon-th icon-white"></i> Categories</a></li>
				<li class="@yield('active-tag')" ><a href="{{route('cms.tags.index')}}"><i class="icon-th icon-white"></i> Tags</a></li>
				<li class="@yield('active-comment')" ><a href="{{route('cms.comments.index')}}"><i class="icon-th icon-white"></i> Comments</a></li>
				<li class="@yield('active-guest')" ><a href="{{route('cms.guests.index')}}"><i class="icon-th icon-white"></i> Guests</a></li>
				<li class="" ><a href="{{route('cms.logout.get')}}"><i class="icon-th icon-white"></i> Logout</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>
<!-- END OF NAVIGATION MENU -->
