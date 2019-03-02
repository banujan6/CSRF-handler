# CSRF-Handler ![version](https://img.shields.io/badge/Version-2.0-green.svg) ![stars](https://img.shields.io/github/stars/banujan6/CSRF-handler.svg) ![commit](https://img.shields.io/badge/Commit-Verified-brightgreen.svg)
<b>CSRF protection</b> class file for <b>PHP</b>.<br><br>
<b>Bye Bye, Version 1.0!</b><br>
We released version 2.0 with better implementation. :)


# Functions

| Function  | Description |
| ------------- | ------------- |
| get()  | Validate CSRF only for GET requests  |
| post()   | Validate CSRF only for POST requests   |
| all()   | Validate CSRF for GET & POST requests   |
| token()   | Generate CSRF Token   |
| flushToken()  | Remove all tokens |


# Installation

<br>
<i><b>Via Composer</b></i>
<br>
<p>
	Require the package.
</p>

```php
	composer require banujan6/csrf-handler
```
<br>
<p>Use namespace & class.</p>

```php
	<?php
		//If you are using any frameworks, It will load autoload.php automatically. So you don't need.
		require_once __DIR__ . '/../../vendor/autoload.php';
		use csrfhandler\csrf as csrf;
	?>
```

<br>
<br>
<i><b>Including File</b></i>
<br><br>
<p>Download the <b>csrf.php</b> file in directory <b>src</b>. Then include it in your PHP file.</p>
<br><br>

```php
<?php 
  require_once("path/csrf.php");
  use csrfhandler\csrf as csrf;
?>
```

# Usages

<p>
 This <b>CSRF-Handler</b> will look for a <i>form-data</i> / <i>url-parameter</i> called <b>_token</b>. To verify the request, <i>POST</i> request need to have a <b>_token</b> in <i>form-data</i>. And <i>GET</i> request need to have a <b>_token</b> in <i>url-parameter</i>.  
</p>


### Generating Token

```php
<form>
  <input type="hidden" name="_token" value="<?php echo csrf::token(); ?>">
</form>
```

### Validating Request

<b>GET Request Only</b>

```php
  $isValid = csrf::get(); // return TRUE or FALSE
  
  if ( $isValid ) {
  
    //Do something if valid
  
  } else {
  
    //Do something if not vaid
  
  }
```

<b>POST Request Only</b>

```php
  $isValid = csrf::post(); // return TRUE or FALSE
  
  if ( $isValid ) {
  
    //Do something if valid
  
  } else {
  
    //Do something if not vaid
  
  }
```

<b>GET & POST Request</b>

```php
  $isValid = csrf::all(); // return TRUE or FALSE
  
  if ( $isValid ) {
  
    //Do something if valid
  
  } else {
  
    //Do something if not vaid
  
  }
```


### Clear All Active Tokens

```php
  csrf::flushToken(); // will destroy all active tokens
```


# Examples

<p>
  You can find basic examples in <b><i>example/</i></b> directory. 
  </p>
  
# License

Licensed under MIT