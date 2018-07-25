<?php
	
	/*
	
	Name	: Simple CSRF protection class for Core-PHP (Non-Framework).
	By	: Banujan Balendrakumar | https://www.facebook.com/balendrakumar.banujan
	License	: Free & Open
	
	*/
	
	class csrf{
		
		private static function startSession(){
			
			if(!isset($_SESSION)){
				
				session_start();
				
			}
			
		}
		
		public static function setToken(){
			
			csrf::startSession();
			
			$keyset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456890";
			$keyset .= str_shuffle($keyset);
			$keyset .= str_shuffle($keyset);
			$key = md5(base64_encode(str_shuffle($keyset)));
			
			if(empty($_SESSION["csrfTokenlist"]) || !isset($_SESSION["csrfTokenlist"])){
				
				$_SESSION["csrfTokenlist"] = $key; 
				
			}else{
				
				$_SESSION["csrfTokenlist"] = $_SESSION["csrfTokenlist"].",".$key;
				
			}
			
			unset($keyset);
			return $key;
			
		}

		public static function checkToken($key){
			
			csrf::startSession();
			
			$sessionSet = explode(",",$_SESSION["csrfTokenlist"]);
			$keys = null;
			$isMatch = false;
			
			foreach($sessionSet as $sessionkey){
				
				if($key == $sessionkey){
					
					$isMatch = true;
					
				}else{
					
					if($keys == null){
						
						$keys = $sessionkey;	
						
					}else{
						
						$keys .= ",".$sessionkey;	
						
					}
					
				}
				
			}
			
			$_SESSION["csrfTokenlist"] = $keys;
			
			unset($sessionSet);
			unset($sessionkey);
			unset($keys);
			
			return $isMatch;
			
			
		}
		
		public static function flushKeys(){
			
			csrf::startSession();
			if(!empty($_SESSION["csrfTokenlist"]) || isset($_SESSION["csrfTokenlist"])){
				
				$_SESSION["csrfTokenlist"] = null;	
				
			}
			
		}
		
	} 
	
	
?>
