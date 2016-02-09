@inject('stats' ,'App\Models\StatUserView')
@inject('comments' ,'App\Models\Comment')
@inject('articles' ,'App\Models\Article')
@inject('guests' ,'App\Models\Guest')
<?php 
$stat 				= $stats->selectraw('user_id')->selectraw('IFNULL(sum(view),0) as total_views')->ondate(['first day of this month', 'first day of next month'])->groupby('user_id')->with(['user'])->take(3)->get();
$stat_this_month	= $stats->ondate(['first day of this month', 'first day of next month'])->sum('view');
$stat_last_month	= $stats->ondate(['first day of last month', 'first day of this month'])->sum('view');
$compared 			= ceil((($stat_last_month!=0 ? $stat_last_month : 1)/($stat_this_month!=0 ? $stat_this_month : 1))*100);
$comment 			= $comments->ondate([Auth::user()->last_logged_at->format('Y-m-d H:i:s'), Carbon::now()->format('Y-m-d H:i:s')])->get();
$total_visitors		= $stats->selectraw('IFNULL(count(user_id),0) as total_visitors')->where('user_id', '<>', 0)->groupby('user_id')->first();
$visitor 			= $stats->selectraw('IFNULL(count(user_id),0) as total_visitors')->where('user_id', '<>', 0)->groupby('ondate')->orderby('total_visitors', 'desc')->first();
$page_views 		= $stats->selectraw('IFNULL(sum(view),0) as total_views')->first();
$latest_article 	= $articles->published('now')->orderby('created_at')->first();
$latest_guests 		= $guests->ondate([Auth::user()->last_logged_at->format('Y-m-d H:i:s'), Carbon::now()->format('Y-m-d H:i:s')])->get();
$writer_stat		= $stats->selectraw('IFNULL(sum(view),0) as total_views')->authorofarticle('now')->get();
$comment_this_month	= $comments->ondate(['first day of this month', 'first day of next month'])->count('id');
$comment_last_month	= $comments->ondate(['first day of last month', 'first day of thist month'])->count('id');
$response 			= ceil((($comment_last_month!=0 ? $comment_last_month : 1)/($comment_this_month!=0 ? $comment_this_month : 1))*100);
$range_comment 		= $comment_this_month - $comment_last_month;
?>

@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
				<dtitle>User Profile</dtitle>
				<hr>
				<div class="thumbnail">
					<img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" class="img-circle img-responsive" style="max-width:80px;">
				</div><!-- /thumbnail -->
				<h1>{{Auth::user()->name}}</h1>
				<h3>{{strtoupper(Auth::user()->role)}}</h3>
				<br>
				<div class="info-user">
					<a href="{{route('cms.profile.index')}}">
						<span aria-hidden="true" class="li_settings fs1"></span>
					</a>
					<!-- <span aria-hidden="true" class="li_user fs1"></span> -->
					<!-- <span aria-hidden="true" class="li_mail fs1"></span> -->
					<a href="{{route('cms.password.index')}}">
						<span aria-hidden="true" class="li_key fs1"></span>
					</a>
				</div>
			</div>
		</div>

		<!-- STAT USER VIEW CATEGORY/TAG -->
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
				<dtitle>Stat User View</dtitle>
				<hr>
				<div class="cont">
					@foreach($stat as $value)
					<p><bold>{{$value['total_views']}}</bold> | <ok>{{($value['user'] ? $value['user']['name'] : 'Public')}}</ok></p>
					<br>
					@endforeach
					<p><img src="images/up-small.png" alt=""> {{$compared}}% Compared Last Month</p>
				</div>
			</div>
		</div>

		<!-- STAT ARTICLE VIEW -->
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
			<dtitle>Stat User Response</dtitle>
			<hr>
				<div class="section-graph">
					<div id="importantchart"></div>
					<br>
					<div class="graph-info">
						<i class="graph-arrow"></i>
						<span class="graph-info-big">@number($comment_this_month)</span>
						<span class="graph-info-small"> +{{$range_comment}} ({{$response}}%)</span>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-3 col-lg-3">
			<!-- LOCAL TIME BLOCK -->
			<div class="half-unit">
				<dtitle>Last Logged Time</dtitle>
				<hr>
				<div class="clockcenter">
					<digiclock>{{Auth::user()->last_logged_at->format('y-m-d H:i')}}</digiclock>
				</div>
			</div>

			<!-- WRITER STAT -->
			<div class="half-unit">
				<dtitle>WRITER INFORMATION</dtitle>
				<hr>
				<div class="cont">
					 <div class="info-aapl">
						<!-- <h4>AAPL</h4> -->
						<ul>
							<?php $color = ['orange', 'green'];?>
							@foreach($writer_stat as $writer)
							<?php $performance 		= ceil((($writer['total_views']!=0 ? $writer['total_views'] : 1)/($page_views['total_views']!=0 ? $page_views['total_views'] : 1))*100) ?>
							<li><span class="{{$color[rand(0,1)]}}" style="height: {{$performance}}%"></span></li>
							@endforeach
						</ul>
					  </div>
				</div>
			</div>

		</div>
	</div><!-- /row -->
	<!-- SECOND ROW OF BLOCKS -->
	<div class="row">
		<div class="col-sm-3 col-lg-3">
		<!-- COMMENT BLOCK -->
			<div class="dash-unit">
				<dtitle>New Comments ({{count($comment)}})</dtitle>
				<hr>
				<div class="framemail">
					<div class="window">
						<ul class="mail">
							@forelse($comment as $value)
							<li>
								<i class="unread"></i>
								<img class="avatar" src="{{$value['user']['avatar']}}" alt="avatar">
								<p class="sender">{{$value['user']['name']}}</p>
								<p class="message"><strong>{{$value['article']['title']}}</strong> - {{$value['content']}}...</p>
								<div class="actions">
<!-- 									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a> -->
								</div>
							</li>
							@empty
							<li>
								<i class="read"></i>
								<img class="avatar" src="{{Auth::user()->avatar}}" alt="avatar">
								<p class="sender">System</p>
								<p class="message"><strong>no new comment</strong></p>
								<div class="actions">
<!-- 									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a> -->
								</div>
							</li>
							@endforelse
						</ul>
					</div>
				</div>
			</div><!-- /dash-unit -->
		</div><!-- /span3 -->
		<div class="col-sm-3 col-lg-3">

			<!-- LIVE VISITORS BLOCK -->     
			<div class="half-unit">
				<dtitle>Total Visitors</dtitle>
				<hr>
				<div class="cont">
					<p><bold>@number($total_visitors['total_visitors'])</bold></p>
					<p><img src="images/up-small.png" alt=""> {{$visitor[0]['total_visitors']}} Max. | <img src="images/down-small.png" alt=""> {{$visitor[count($visitor)-1]['total_visitors']}} Min.</p>
				</div>
			</div>
			
			<!-- PAGE VIEWS BLOCK -->     
			<div class="half-unit">
				<dtitle>Page Views</dtitle>
				<hr>
				<div class="cont">
					<p><bold>@number($page_views['total_views'])</bold></p>
					<p><img src="images/up-small.png" alt=""> @number($compared)%</p>
				</div>
			</div>
		</div>

		<!-- LATEST ARTICLE BLOCK -->     
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
				<dtitle>Latest Article</dtitle>
				<hr>
				<div class="info-user">
					<span aria-hidden="true" class="li_news fs2"></span>
				</div>
				<br>
				@if($latest_article)
				<div class="text">
					<p><b>{{$latest_article['user']['name']}}:</b> {!!$latest_article['title']!!}</p>
					<p><grey>Last Update: {{$latest_article['updated_at']->diffForHumans()}}.</grey></p>
				</div>
				@else
				<div class="text">
					<p>no latest article</p>
				</div>
				@endif
			</div>
		</div>

		<!-- LAST USER BLOCK -->
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
				<dtitle>Last Registered User</dtitle>
				<hr>
				@forelse($latest_guests as $guest)
				<div class="cont2">
					<!-- <img src="images/user-avatar.jpg" alt=""> -->
					<br/>
					<p>{{$guest['name']}}
						<br/>
						<bold>{{$guest['email']}}</bold>
					</p>
				</div>
				@empty
				<div class="cont2">
					<p>no new user registered</p>
				</div>
				@endforelse
			</div>
		</div>
	</div><!-- /row -->
@stop

@section('active-dashboard')
	active
@stop