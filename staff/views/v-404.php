<?php //Background Randomisation By Luke Brown
	$bg = array(
		"These are not the droids you are looking for.",
		"My dog ate that page.",
		"Woah there!",
		"Uh-oh",
		"You done broke'ded it." 
		);

	$i = rand(0, count($bg)-1);  
	$errorMessage = "$bg[$i]";
?>

<div class="container">
	<h1 align="center"><?php echo $errorMessage ?></h1>
	<h4 align="center">That page was not found</h4>
	<form style="margin-bottom:50px;" method="post" action="http://dev.gunsdaily.net/login">


	<div class="row">
		<div class="col-md-4 col-md-offset-4">	

			<div class="row" style="margin-top:20px;">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<input type="button" class="form-button green" value="Profile" onClick="parent.location='<?php echo $fullUrl; ?>account'">
						</div>
						<div class="col-md-6">
							<input type="button" class="form-button red  " value="Home"    onClick="parent.location='<?php echo $fullUrl; ?>'" style="margin-right: 10px; float: left !important;">
						</div>
					</div>
					
				</div>


			</div>
		</div>
	</div>


	</form>
</div>
