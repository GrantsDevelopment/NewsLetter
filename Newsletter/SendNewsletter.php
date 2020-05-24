<!-- This is just a playing form -->
<h1>Newsletter sending Script</h1>
<form method="post">
    <input type="text" placeholder="Enter Subject" name="subject">
    <br>
    <textarea rows="10" placeholder="Enter Newsletter" name="content"></textarea>
    <br>
    <input type="submit" value="Send Newsletter">
</form>
<!-- This Script prevents the page from sending anything when it is either closed or refreshed -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php
include 'Send.php';
/*
Created by: Grant Huey on May 20th, 2020
Updated On: May 20th, 2020
My Website: http://www.grantwebdevelopment.com
*/
?>
