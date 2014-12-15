<div id="container"><img alt="Intro Background" class=
"part-assets store-img" src="assets/img/store-part.png"></div>

<div class="content-lock">
	<div class="front-tile">
		<h1 class="ip shop">NirvanaMC Shop</h1>

		<div class="row shop-module">
			<div class="col-md-8" style="margin-left: 12.666667%;">
				<script data-rocketsrc="ajax/ajaxtabs/shop.js"
				type="text/rocketscript"></script>

				<div class="indentmenu" id="pettabs">
					<ul>
						<li>
							<a class="selected" href=
							"ajax/main.php" rel="#iframe"></a>
						</li>
					</ul><br style="clear: left">
				</div>

				<div id="petsdivcontainer" style=
				"border:0px solid gray; width:100%; height: 750px;">
				</div><script type="text/rocketscript">

				var mypets=new ddajaxtabs("pettabs", "petsdivcontainer")
				mypets.setpersist(false)
				mypets.setselectedClassTarget("link")
				mypets.init()

				</script>
			</div>

			<!--<div class="shop-disclaimer">
				<a data-target="#myModal" data-toggle="modal"
				target="_blank">Terms &amp; conditions</a> (Opens
				in modal)
			</div>

			<div class="shop-disclaimer2">
				Support for our store purchases can be contacted at
				<a href="" target="_blank"><span class=
				"__cf_email__" data-cfemail=
				"394a4c4949564b4d7957504b4f585758545a175a5654">contact@nirvanamc.com</span></a>
			</div>-->
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" type=
				"button"><span>&times;</span><span class=
				"sr-only">Close</span></button>
			</div>

			<div class="modal-body">
				<p><?php include './terms.php'; ?></p>
			</div>

			<div class="modal-footer">
				<button class="btn btn-default close-terms"
				data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>