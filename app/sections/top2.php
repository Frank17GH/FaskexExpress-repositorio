<header id="header">
			<div id="logo-group">
				<span id="logo"> <img src="<?php echo __REC__?>img/<?php echo $_SESSION[fasklog][idgiros] ?>.png" alt="SmartAdmin" style="margin-top: -15px; width: 160px;"> </span>							
			</div>
					
			<div class="pull-right">
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut"><i class="fa fa-reorder"></i></a>

					 </span>
				</div>			
				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" onclick="logout('<?php echo $_SESSION['fasklog']['nombres'] ?>')"><i class="fa fa-sign-out"></i></a> </span>
				</div>							
			
			</div>
		</header>
			<div id="shortcut" style="display: none;">
			<ul style="padding: 15px 1px 10px;">				
				<li>
					<a href="#!/personal/recojo" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa  fa-truck fa-3x"></i> <span>Recojos <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				
				<li>
					<a href="#!/personal/entrega" onclick="vAjax('home','mod2',0,'modal1');" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-book fa-3x"></i> <span>Entregas <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				
				<li>
					<a href="javascript:void(0)" onclick="vAjax('home','mod2',0,'modal1');" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-3x"></i> <span>Datos</span> </span> </a>
				</li>
			</ul>
		</div>

