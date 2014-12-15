<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

header('Location: http://m.cubedchaos.com');

?>
<html>
<head>
	<title>Cubed Chaos</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel=stylesheet href="//raw.github.com/daneden/animate.css/master/animate.css">
	<link rel="icon shortcut" type="image/png" href="assets/img/favicon.ico">
	<link href='//fonts.googleapis.com/css?family=Roboto+Slab:400,300,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.8.3.min.js"></script>

<?php 
	// Background Randomisation By Luke Brown
	$bg = array(
		'assets/img/1.png',
		'assets/img/2.png',
		'assets/img/3.png',
		);

	// Randomizer 
	$i = rand(0, count($bg)-1);  
	$selectedBg = "$bg[$i]";
?>

<style type="text/css">

	body {
		text-align: center;
		overflow: hidden;
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	h1, h2, h3, h4, .designed {

		font-family: 'Roboto Slab', serif;
		font-weight: 100;
		color: white;
	}

	h1 {
		font-size: 80px;
	}

	#landing-content {
		overflow: hidden;
		width: 100%;
		background-position:center;
		background-size: 120% 120%  !important;
		background-repeat: no-repeat;
		height: 100%;
		position: fixed;
	}

	.slider {
		margin-left: auto;
		margin-right: auto;
		overflow: hidden;
		max-width: 1002px;
	}

	.slider img {
		width: 80%;
		padding-left: 10%;
		padding-right: 10%;
		height: auto;
		margin-left: auto;
		margin-right: auto;
	}

	.alignment {
		z-index: 1;
		right: 10vw;
		left: 10vw;
		top: 20%;
		position: absolute;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
	}

	.rnd-btn {
	width:25%;
	}

	.rnd-btn-o {
		width: 50px;
		height: 50px;
		border-radius: 50%;
		border: 2px solid #FFFFFF;
		overflow: hidden;
		box-shadow: 0 0 3px gray;
		margin: 5px;
		-webkit-transition: background 150ms ease-in 200ms;
		-moz-transition: background 150ms ease-in 200ms;
		-o-transition: background 150ms ease-in 200ms;
		transition: background 150ms ease-in 200ms;
	}
	.rnd-btn-o:hover {
		background:rgba(48, 88, 142, 0.5);
	}
	.rnd-btn a {
	    display:block;
		float:left;
		width:100%;
		padding-top:50%;
	    padding-bottom:50%;
		line-height:1em;
		margin-top:-0.5em;
	    
		text-align:center;
		color:#e2eaf3;
	    font-family:Verdana;
	    font-size:1.2em;
	    font-weight:bold;
	    text-decoration:none;
	}
	.buttons {
		margin-left: auto;
		margin-right: auto;
		display: -webkit-inline-box;
		margin-right: 79px;
		width: 300px;
	}
	.designed {
		position: fixed;
		right: 0;
		bottom: 0;
		color: rgba(255, 255, 255, 0.30) !important;
		padding: 10px;
		font-weight: 400;
	}
	.designed a {
		color: rgba(255, 255, 255, 1.0) !important;
		font-weight: 700;
		opacity: 0.3;
		transition: opacity 0.35s ease-in-out;
		-moz-transition: opacity 0.35s ease-in-out;
		-webkit-transition: opacity 0.35s ease-in-out;
	}
	.designed a:hover {
		font-weight: 700;
		text-decoration: none;
		opacity: 0.75;
		transition: opacity 0.35s ease-in-out;
		-moz-transition: opacity 0.35s ease-in-out;
		-webkit-transition: opacity 0.35s ease-in-out;
	}
	h1 > img {
		width: 500px;
	}
</style>



<script type="text/javascript">


$(document).ready(function(){    
    $('#landing-content').mousemove(function(e){
    var x = -(e.pageX + this.offsetLeft) / 50;
    var y = -(e.pageY + this.offsetTop) / 50;
    $(this).css('background-position', (-125 + x) + 'px ' + (-105 + y) + 'px');
  });    
});
 


$('img').bind('contextmenu', function(e) {
	return false;
});
$('img').on('dragstart', function(event) { 
	event.preventDefault(); 
});
$(document).ready(function() {
	$("*").bind("contextmenu",function(){
		return false;
	}); 
});   
  



	</script>

</head>
<body>
	<div id="landing-content" <?php echo "style='background: linear-gradient(rgba(44, 44, 44, 0.658824), rgba(0, 0, 0, 0.6)) -160.02px -112.04px, url(" . $selectedBg .  ")'"; ?> >
		<div id="parallax_wrapper">
			<div class="plax animated bounceIn alignment container">
				<h1><img src="assets/img/logo.png"></h1>
				<h2><b>play.cubedchaos.com</b></h2>
				<h2>Come join us today</h2>

				<!--<div class="buttons">
					<?php /*
						foreach($links as $x => $x_value) {
							if ($links[$x]["open-in-newtab"] == true) {
								$newtab = "target='_blank'";
							} else {
								$newtab = "";
							}
							echo "\r\n" . "<div class='rnd-btn'><div class='rnd-btn-o'>" . PHP_EOL;
							echo "\t" . "<a href='" . $links[$x]["URL"] ."'" . $newtab . " class='rnd-btn'>" . PHP_EOL;
							echo "\t\t" . "<i class='fa fa-" . $links[$x]["icon"] . " fa-fw'></i>" . PHP_EOL;
							echo "\t" . "</a>" . PHP_EOL;
							echo "</div></div>" . PHP_EOL;
						}; */ 
					?>
				</div>-->

			</div>
		<div id="bg" data-xrange="10" data-yrange="10" data-invert=true class="plax"></div>
		<div class="designed">Designed by <a href="http://luke.sx" target="_blank">Luke Brown</a></div>
	 </div>
</body>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</html>
