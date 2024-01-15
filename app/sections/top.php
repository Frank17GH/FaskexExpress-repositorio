<header id="header">
			<div id="logo-group">
				<span id="logo"> <img src="<?php echo __REC__?>img/<?php echo $_SESSION[fasklog][idgiros] ?>.png" alt="SmartAdmin" style="margin-top: -15px; width: 160px;"> </span>
				<span id="activity" style="display: none" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>
				<div class="ajax-dropdown">
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/mail.html">
							Msgs (14) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/notifications.html">
							notify (3) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/tasks.html">
							Tasks (4) </label>
					</div>
					<div class="ajax-notifications custom-scroll">
						<div class="alert alert-transparent">
							<h4>Click a button to show messages here</h4>
							This blank page message helps protect your privacy, or you can show the first message here automatically.
						</div>
						<i class="fa fa-lock fa-4x fa-border"></i>

					</div>
					<span> Last updated on: 12/12/2013 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> 
					</span>
				</div>
			</div>
			<?php include "fact.php"; ?>
			<div class="project-context hidden-xs">
				<span class="label">Projects:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown" onclick="vUltf()">Últimos C.P.E. emitidos <i class="fa fa-angle-down"></i></span>
				<ul class="dropdown-menu" id="ultifact">
					<li class="divider"></li><li><a><i class="fa fa-power-off"></i> CERRAR</a></li>
				</ul>
			</div>
			<div class="pull-right">
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="<?php echo __REC__?>img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>

							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" onclick="logout('<?php echo $_SESSION['fasklog']['nombres'] ?>')"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<?php include_once("byFact/byfact.php"); ?>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
				<ul class="header-dropdown-list hidden-xs">
					<li>
						<input type="hidden" value="<?php echo $_SESSION['fasklog']['local_pre'] ?>" id="idLocal">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" onclick="vAjax('home','locales',<?php echo $_SESSION['fasklog']['iduser'] ?>,'modal1');">  <span id="nomloc" class="mymayus"> <?php echo ($_SESSION['fasklog']['local_pre']==0)?'Todos los locales permitidos':$_SESSION['fasklog']['lo_abreviatura']; ?> </span> <i class="fa fa-angle-down"></i> </a>
						
					</li>
				</ul>
				
			</div>
		</header>
		<div id="shortcut" style="display: none;">
			<ul>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="javascript:void(0)" onclick="vAjax('home','mod2',0,'modal1');" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>Datos</span> </span> </a>
				</li>
			</ul>
		</div>
