<h1>Sign up for the newsletter</h1>
<form method="post">
    <input type="text" name="emailing" placeholder="Email Here">
    <input type="submit" value="Sign Up">
</form>
<!-- This Script prevents the page from sending anything when it is either closed or refreshed -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php
//Will Get the script, Awesomely, it will run the script like it was inhere!
include 'SignUp.php';
?>