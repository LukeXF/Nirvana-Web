<div class="container">
<div class="main">
<form  method="post" name="form" action="">
<textarea style="width:500px; font-size:14px; height:60px; font-weight:bold; resize:none;" name="content" id="content" ></textarea><br />
<input type="submit" value="Post" name="submit" class="submit_button"/>
</form>
</div>
<div class="space"></div>
<div id="flash"></div>
<div id="show"></div>
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(function() {
$(".submit_button").click(function() {
var textcontent = $("#content").val();
var dataString = 'content='+ textcontent;
if(textcontent=='')
{
alert("Enter some text..");
$("#content").focus();
}
else
{
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "action.php",
data: dataString,
cache: true,
success: function(html){
$("#show").after(html);
document.getElementById('content').value='';
$("#flash").hide();
$("#content").focus();
}  
});
}
return false;
});
});
</script>