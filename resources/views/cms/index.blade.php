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
					<img src="images/face80x80.jpg" alt="Marcel Newman" class="img-circle">
				</div><!-- /thumbnail -->
				<h1>Marcel Newman</h1>
				<h3>Madrid, Spain</h3>
				<br>
				<div class="info-user">
					<span aria-hidden="true" class="li_user fs1"></span>
					<span aria-hidden="true" class="li_settings fs1"></span>
					<span aria-hidden="true" class="li_mail fs1"></span>
					<span aria-hidden="true" class="li_key fs1"></span>
				</div>
			</div>
		</div>

		<!-- STAT USER VIEW CATEGORY/TAG -->
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
				<dtitle>Stat User View</dtitle>
				<hr>
				<div class="cont">
					<p><bold>$879</bold> | <ok>Approved</ok></p>
					<br>
					<p><bold>$377</bold> | Pending</p>
					<br>
					<p><bold>$156</bold> | <bad>Denied</bad></p>
					<br>
					<p><img src="images/up-small.png" alt=""> 12% Compared Last Month</p>
				</div>
			</div>
		</div>

		<!-- STAT ARTICLE VIEW -->
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
			<dtitle>Stat Article View</dtitle>
			<hr>
				<div class="section-graph">
					<div id="importantchart"></div>
					<br>
					<div class="graph-info">
						<i class="graph-arrow"></i>
						<span class="graph-info-big">634.39</span>
						<span class="graph-info-small">+2.18 (3.71%)</span>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-3 col-lg-3">
			<!-- LOCAL TIME BLOCK -->
			<div class="half-unit">
				<dtitle>Local Time</dtitle>
				<hr>
				<div class="clockcenter">
					<digiclock>12:45:25</digiclock>
				</div>
			</div>

			<!-- WRITER STAT -->
			<div class="half-unit">
				<dtitle>WRITER INFORMATION</dtitle>
				<hr>
				<div class="cont">
					 <div class="info-aapl">
						<h4>AAPL</h4>
						<ul>
							<li><span class="orange" style="height: 37.5%"></span></li>
							<li><span class="orange" style="height: 47.5%"></span></li>
							<li><span class="orange" style="height: 70%"></span></li>
							<li><span class="orange" style="height: 85%"></span></li>
							<li><span class="green" style="height: 75%"></span></li>
							<li><span class="green" style="height: 50%"></span></li>
							<li><span class="green" style="height: 15%"></span></li>
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
				<dtitle>Comment (1)</dtitle>
				<hr>
				<div class="framemail">
					<div class="window">
						<ul class="mail">
							<li>
								<i class="unread"></i>
								<img class="avatar" src="images/photo01.jpeg" alt="avatar">
								<p class="sender">Adam W.</p>
								<p class="message"><strong>Working</strong> - This is the last...</p>
								<div class="actions">
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a>
								</div>
							</li>
							<li>
								<i class="read"></i>
								<img class="avatar" src="images/photo02.jpg" alt="avatar">
								<p class="sender">Dan E.</p>
								<p class="message"><strong>Hey man!</strong> - You have to taste ...</p>
								<div class="actions">
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a>
								</div>
							</li>
							<li>
								<i class="read"></i>
								<img class="avatar" src="images/photo03.jpg" alt="avatar">
								<p class="sender">Leonard N.</p>
								<p class="message"><strong>New Mac :D</strong> - So happy with ...</p>
								<div class="actions">
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a>
								</div>
							</li>
							<li>
								<i class="read"></i>
								<img class="avatar" src="images/photo04.jpg" alt="avatar">
								<p class="sender">Peter B.</p>
								<p class="message"><strong>Thank you</strong> - Finally I can ...</p>
								<div class="actions">
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>
									<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>
									<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a>
								</div>
							</li>
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
					<p><bold>388</bold></p>
					<p><img src="images/up-small.png" alt=""> 412 Max. | <img src="images/down-small.png" alt=""> 89 Min.</p>
				</div>
			</div>
			
			<!-- PAGE VIEWS BLOCK -->     
			<div class="half-unit">
				<dtitle>Page Views</dtitle>
				<hr>
				<div class="cont">
					<p><bold>145.0K</bold></p>
					<p><img src="images/up-small.png" alt=""> 23.88%</p>
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
				<div class="text">
					<p><b>Alvarez.is:</b> A beautiful new Dashboard theme has been realised by Carlos Alvarez. Please, visit <a href="http://alvarez.is">Alvarez.is</a> for more details.</p>
					<p><grey>Last Update: 5 minutes ago.</grey></p>
				</div>
			</div>
		</div>

		<!-- LAST USER BLOCK -->
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
				<dtitle>Last Registered User</dtitle>
				<hr>
				<div class="cont2">
					<img src="images/user-avatar.jpg" alt="">
					<br>
					<br>
					<p>Paul Smith</p>
					<p><bold>Liverpool, England</bold></p>
				</div>
			</div>
		</div>
	</div><!-- /row -->
@stop	