<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	












</head>
	<title></title>
</head>
<body>
<a href="user.php"><button type="button"  class="btn btn-success">Success</button></a>

<?php

echo '<table class="table table-striped">
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>';




?>






<img id="myImage" src="l1.jpg" width="100" height="180">

<p>
<button type="button"  id="button" onclick="light(1)">Light On</button>
<button type="button"  id="button" onclick="light(0)">Light Off</button>
</p>
<script type="text/javascript">
function light(sw) {
  var pic;
  if (sw == 0) {
    pic = "lo.jpg"
  } else {
    pic = "l1.jpg"
  }
  document.getElementById('button').src = pic;
}
</script>



</body>
</html>

