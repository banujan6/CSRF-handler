# CSRF-Handler ![version](https://img.shields.io/badge/Version-1.0.0-green.svg) ![stars](https://img.shields.io/github/stars/banujan6/CSRF-handler.svg) ![commit](https://img.shields.io/badge/Commit-Verified-brightgreen.svg)
<b>CSRF protection</b> class file for <b>Core-PHP</b>.<br><br>
<b>CSRF - Cross Site Request forgery</b> is a common and dangerous <b>vulnerability</b> in <b>Web Sites/Applications</b>. 
But we can fix it simply using tokens. This is simple PHP class file to help you to generate random tokens and verify it! 
<br><br>
# Usage
This class has just 3 functions called <b>setToken()</b>, <b>checkToken()</b>, <b>flushKeys()</b>.<br>
<br>

<h3>setToken()</h3>
<br>
setToken() function is used to generate random token.
<br><br>
<i><b>Example</b></i>
<br><br>

```php
<?php 
  include("csrfhandler.lib.php");
?>

<form action="" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf::setToken();?>"/>
</form>

```
<br>
<h3>checkToken()</h3>
<br>
checkToken() function is used to check the incoming random token.<br>
If the token valid, It will return <b>true</b>, Otherwise It will return <b>false</b>
<br><br>
<i><b>Example</b></i>
<br><br>

```php
<?php

include("csrfhandler.lib.php");

$token = $_POST["_token"];
$isValid = csrf::checkToken($token);

if($isValid == true){

//your code if valid

}else{

//your code if not-valid

}

?>


```
<br>
<h3>flushKeys()</h3>
<br>
flushKeys() function is used to delete all active CSRF Token Keys from Session.<br>
<br><br>
<i><b>Example</b></i>
<br><br>

```php
<?php

include("csrfhandler.lib.php");

  csrf::flushKeys();

?>


```

