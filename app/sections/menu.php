<aside id="left-panel">
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
				<img src="app/recursos/img/avatars/male.png" alt="me" class="online" /> 
				<span><?php echo ucwords(strtolower(explode(' ', $_SESSION['fasklog']['pe_nombres'])[0].' '.explode(' ', $_SESSION['fasklog']['pe_apellidos'])[0])); ?></span>
					<i class="fa fa-angle-down"></i>
			</a> 
		</span>
	</div>
	<nav>
		<ul>
			<?php
				foreach ($Menu as $row1): 
    				?>
    					<li class="menu v<?php echo $row1['vista'] ?>">
							<a <?php echo ($row1['prins']==0)?'href="#!/'.$row1['vista'].'/"':'role="button" tabindex="0"'; ?>>
								<i class="fa fa-lg fa-fw <?php echo $row1['icon'] ?>"></i> 
								<span class="menu-item-parent" ><?php echo $row1['nombre'] ?></span>
							</a>
							<?php 
								if ($row1['prins']!=0){
									?>
										<ul class="vvv pp<?php echo $row1['vista'] ?>"><?php
											$funcion2 = new Mod(); 
    										$data2= $funcion2->SubMenu($row1['idmenu']);
    										if ($data2) {
    											foreach ($data2 as $row2): 
													?>
														<li class="menu v<?php echo $row2['vista'] ?>">
															<a id="<?php echo $row2['vista'] ?>" href="#!/<?php echo $row1['vista'] ?>/<?php echo $row2['vista'] ?>">
																<span><?php echo $row2['nombre'] ?></span>
															</a>
														</li>
													<?php
												endforeach;
    										}
    									?></ul>
    								<?php
								}
							?>
						</li>
    				<?php
    			endforeach;
		    ?>
		</ul>
	</nav>
	<span class="minifyme" data-action="minifyMenu"> 
		<i class="fa fa-arrow-circle-left hit"></i> 
	</span>
</aside>