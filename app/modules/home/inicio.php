<?php 
    session_start(); 
 ?>
<div id="content" style="opacity: 1;">
<div class="row">
</div>
<section id="widget-grid" class="">	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">				
			<div class=" padding-10 text-center bg-color-white">
				<?php $logo="";
				if($_SESSION['fasklog']['local_pre']==55){$logo="fasklog_lima.jpg";}
				elseif ($_SESSION['fasklog']['local_pre']==56){$logo="fasklog_ica.jpg";}
				elseif ($_SESSION['fasklog']['local_pre']==58){$logo="fasklog_chincha.jpg";}
				elseif ($_SESSION['fasklog']['local_pre']==59){$logo="fasklog_pisco.jpg";}
				else{   }?>
			
						
			</div>			
		</div>

	</div>

</section>
<!-- end widget grid -->

</div>