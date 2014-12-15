<div id="container"><img alt="Intro Background" class="part-assets stats-img" src="assets/img/stats-part.png"></div>
	<div  class="stats-magic">

		<?php 
			$commingsoon = "<p class='pageno'><b>- coming soon -</b><br>";
			echo "
				<ul class='nav nav-tabs' role='tablist' id='myTab'>
					<li class='active'><a  data-target='#home' role='tab' data-toggle='tab'>Survival Games</a></li>
					<li><a  data-target='#dmt' role='tab' data-toggle='tab'>Draw My Thing</a></li>
					<li><a  data-target='#ip' role='tab' data-toggle='tab'>Infinite Parkour</a></li>
					<li><a  data-target='#global' role='tab' data-toggle='tab'>Global</a></li>
				</ul>
				<div class='tab-content'>
			";





			echo "<div class='tab-pane active' id='home'><table style='width:100%'>";
			if ( empty($jsoninfo_sg) ) { echo "- error -"; } else {  
				echo "<p class='pageno'><b>You are viewing the top twenty player of Survival Games.</b><br> ";					
				$i = 1;			
				while ($i < $end){
					$data = json_decode(file_get_contents('http://uuid.nirvanamc.com/api.php?uuid=' . $jsoninfo_sg[$i]['UUID']), true);
					echo "<tr>
							<td width='20%'><div class='player-head' id='" . $data['name'] . "'> " . $data['name'] . "</div></td>                             
							<td width='20%'>Wins: " . $jsoninfo_sg[$i]['Wins'] . "</td> 
							<td width='20%'>Kills: " . $jsoninfo_sg[$i]['Kills'] . "</td>                            
							<td width='20%'>Deaths: " . $jsoninfo_sg[$i]['Deaths'] . "</td>                         
							<td width='20%'>Games Played: " . $jsoninfo_sg[$i]['Games Played'] . "</td>                          
						</tr>";
					$i++;
				}
			}
			echo "</table></div>";




			echo "<div class='tab-pane' id='dmt'><table style='width:100%'>";
			if ( empty($jsoninfo_dmt) ) { echo "- error -"; } else {  
				echo "<p class='pageno'><b>You are viewing the top twenty player of Draw My Thing.</b><br> ";					
				$i = 1;
				while ($i < $end){
					$data = json_decode(file_get_contents('http://uuid.nirvanamc.com/api.php?uuid=' . $jsoninfo_dmt[$i]['UUID']), true);
					$image = $data['name'];
					echo "<tr>
							<td width='20%'><div class='player-head' id='" . $data['name'] . "'> " . $data['name'] . "</div></td>                               
							<td width='20%'>Words Guessed: " . $jsoninfo_dmt[$i]['Words Guessed'] . "</td> 
							<td width='20%'>Points Earned: " . $jsoninfo_dmt[$i]['Points Earned'] . "</td>                        
							<td width='20%'>Coming Soon: "  . "-" . "</td>                  
						</tr>";
					$i++;
				}
			}
			echo "</table></div>";



			echo "<div class='tab-pane' id='ip'><table style='width:100%'>";
			if ( empty($jsoninfo_ip) ) { echo "- error -"; } else {  
				echo "<p class='pageno'><b>You are viewing the top twenty player of Infinite Parkour</b><br> ";					
				$i = 1;
				while ($i < $end){
					$data = json_decode(file_get_contents('http://uuid.nirvanamc.com/api.php?uuid=' . $jsoninfo_ip[$i]['UUID']), true);
					$image = $data['name'];
					echo "<tr>
							<td width='20%'><div class='player-head' id='" . $data['name'] . "'> " . $data['name'] . "</div></td>                               
							<td width='20%'>Total Score: " . $jsoninfo_ip[$i]['Total Score'] . "</td> 
							<td width='20%'>Best Distance: " . $jsoninfo_ip[$i]['Best Score'] . "</td>                        
							<td width='20%'>Games Played: " . $jsoninfo_ip[$i]['Games Played'] . "</td>                        
						</tr>";

					// <td width='20%'><img style='border-radius: 25%;' src='//mcapi.ca/v2/avatar/2d/?player=" . $image . "&size=20'> " . $data['name'] . "</td>  
					$i++;
				}
			}
			echo "</table></div>";
				



				echo "
					  <div class='tab-pane' id='global'>" .  $commingsoon . "</div>
					</div>

					<script>
					  $(function () {
						$('#myTab a:last').tab('show')
					  })
					</script>
				";
				echo "<br>";
		?>


		<script type="text/javascript">

			console.log("hi");
			// Create the function
			$(document).ready(function() {
				console.log("hi2");
			  	// laod each player head into the function

			    $(".player-head").each(function(head, name) {
			      		// load the username by grabbing the id.
			           var username = $(name).attr('id');
			           console.log(username);
			      		// insert into the current div the image with the name
			           $(this).html("<img style='border-radius: 25%;' src='//mcapi.ca/v2/avatar/2d/?player=" + username + "' />" + username + "");
			      		// magic is over!
			    });
			});
		</script>
	</div>
	<div class="i_love_kyle">
		<input type="text" name="user" placeholder="Search Coming Soon" class="formbox">
		<button type="submit" class="btn btn-default">Search</button>
	</div>