	<div class="grid__item desk--one-third">
		<article class="module module--secondary">
			<h2>Players Overall</h2>
				<div class="module__content">
					<div class="serverstatus">
						<div class="info">
							<div class="ip">
								A record breaking 12,914 have joined the server in the release.
							</div>
						</div>
					</div>
				</div>
		</article>
	</div>
	<div class="grid__item desk--one-third">
		<article class="module module--secondary">
			<h2>Players Right Now</h2>
			<div class="module__content">
				<div class="serverstatus">
					<div class="info">                             
						<?php
							include_once 'assets/minecraft.php';
							$status = new MinecraftServerStatus();
							$response = $status->getStatus('Play.NirvanaMC.Com');
							if(!$response) {
								echo"There is no one online, because we cannot ping the server";
							} else {
								echo " The is currently " . $response['players'] . " players of a maximum of " . $response['maxplayers'] . " playing online right now.";
							}
						?>
					</div>
				</div>
			</div>
		</article>
	</div>
	<div class="grid__item desk--one-third">
		<article class="module module--secondary">
			<h2>Abusive Players</h2>
			<div class="module__content">
				<div class="serverstatus">
					<div class="info">
						<?php 
							$result = mysql_query("SELECT * FROM Hackasaurus", $link);
							$num_rows = mysql_num_rows($result);

							echo "We have tracked $num_rows abusive players since release. \n";
						?>
					</div>
				</div>
			</div>
		</article>
	</div>