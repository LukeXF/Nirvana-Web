<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="ajaxtabs/ajaxtabs.css" />

<script type="text/javascript" src="ajaxtabs/ajaxtabs.js">

/***********************************************
* Ajax Tabs Content script v2.2- � Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>





<h3>Demo #3- All contents fetched via "IFRAME"</h3>

<div id="pettabs" class="indentmenu">
<ul>
<li><a href="external1.htm" rel="#iframe" class="selected">Tab 1</a></li>
<li><a href="external2.htm" rel="#iframe">Tab 2</a></li>
<li><a href="external3.htm" rel="#iframe">Tab 3</a></li>
<li><a href="external4.htm" rel="#iframe">Tab 4</a></li>
</ul>
<br style="clear: left" />
</div>

<div id="petsdivcontainer" style="border:1px solid gray; width:550px; height: 150px; padding: 5px; margin-bottom:1em">
</div>


<script type="text/javascript">

var mypets=new ddajaxtabs("pettabs", "petsdivcontainer")
mypets.setpersist(false)
mypets.setselectedClassTarget("link")
mypets.init()

</script>

