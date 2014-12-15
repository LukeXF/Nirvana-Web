<?php
	if ( empty($jsoninfo_dmt) ) { echo "- error -"; } else {  
		echo "<p class='pageno'><b>You are viewing the top twenty player of Draw My Thing.</b><br> ";					
		$i = 1;
		while ($i < $end){
			$data = json_decode(file_get_contents('https://minespy.net/api/uuid/' . $jsoninfo_dmt[$i]['UUID'] . '/json'), true);
			$image = $data['name'];
			echo "<tr>
					<td width='20%'><img style='border-radius: 25%;' src='//mcapi.ca/v2/avatar/2d/?player=" . $image . "&size=20'> " . $data['name'] . "</td>                             
					<td width='20%'>Words Guessed: " . $jsoninfo_dmt[$i]['Words Guessed'] . "</td> 
					<td width='20%'>Points Earned: " . $jsoninfo_dmt[$i]['Points Earned'] . "</td>                        
				</tr>";
			$i++;
		}
	}
?>