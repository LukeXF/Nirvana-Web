// Username to UUID
$("#username").submit(function( event ) {
  // Stop page from refreshing
  event.preventDefault();

  // Username submitted
  var username = $("#username").find('input[name="username"]').val();

  username = username.trim();
  if (username == "") {return};
  $("#username").find('button[type="submit"]').html("<i class='fa fa-refresh fa-spin'></i>");

  // Get UUID
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "api.php?user=" + username);
  xhr.onreadystatechange = function() {
    $("#username").find('button[type="submit"]').html("Go!");
    if (xhr.readyState == 4) {
      data = JSON.parse(xhr.responseText);
      $("#username").find('input[name="username"]').val(data.id);
      $("#username").find('input[name="username"]').select();
    }
  }
  xhr.send();

});

// UUID to Username
$("#uuid").submit(function( event ) {
  // Stop page from refreshing
  event.preventDefault();

  // Username submitted
  var uuid = $("#uuid").find('input[name="uuid"]').val();

  if (uuid == "") {return};
  $("#uuid").find('button[type="submit"]').html("<i class='fa fa-refresh fa-spin'></i>");

  // Get UUID
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "api.php?uuid_legacy=" + uuid);
  xhr.onreadystatechange = function() {
    $("#uuid").find('button[type="submit"]').html("Go!");
    if (xhr.readyState == 4) {
      data = JSON.parse(xhr.responseText);
      $("#uuid").find('input[name="uuid"]').val(data);
      $("#uuid").find('input[name="uuid"]').select();
    }
  }
  xhr.send();

});