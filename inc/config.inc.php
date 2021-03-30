<?php
	ob_start();
	class Config {
		private static $instance;
		public static $g_con;
		public static $_url = array();
		private static $_pages = array(
			'login','loginurl', 'register', 'registerurl', 'logout', 'fillmain', 'invites', 'rejectinv', 'invitetable', 'sendinv',
			'addfriend', 'game'
		);
		public static $_PAGE_URL = 'http://yourwebsite.com/';
			
			
		private function __construct() {
				

			$db['mysql'] = array(
					'host' 		=> 	'localhost',
					'username' 	=> 	'root',
					'password' 	=> 	'',
					'dbname' 	=> 	'game'
			);

			try {
				self::$g_con = new PDO('mysql:host='.$db['mysql']['host'].';dbname='.$db['mysql']['dbname'].';charset=utf8',$db['mysql']['username'],$db['mysql']['password']);
				self::$g_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				self::$g_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			self::_getUrl();
		
		}

		public static function init()
		{
			if (is_null(self::$instance))
			{
				self::$instance = new self();
			}
			return self::$instance;
		}

		private static function _getUrl() {
			$url = isset($_GET['page']) ? $_GET['page'] : null;
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			self::$_url = explode('/', $url);
		}
		
		public static function getContent() {
			if(in_array(self::$_url[0],self::$_pages)) 
				include 'inc/pages/' . self::$_url[0] . '.p.php';
			else 
				include_once 'inc/pages/index.p.php'; 			
		}

		public static function isLogged() {
			return isset($_SESSION['user']) ? true : false;
		}
		
		public static function getPlayerData($where,$data) {
            $q = self::$g_con->prepare("SELECT `".$data."` FROM `users` WHERE `username` IN (?)");
            $q->execute(array($where));
            if($q) {
                $udata = $q->fetch();
                return $udata[$data];
            }    
            else return 0;
    	}
    	
    	public static function getPlayerDataById($where,$data) {
            $q = self::$g_con->prepare("SELECT `".$data."` FROM `users` WHERE `id` IN (?)");
            $q->execute(array($where));
            if($q) {
                $udata = $q->fetch();
                return $udata[$data];
            }    
            else return 0;
    	}
	}
?>
