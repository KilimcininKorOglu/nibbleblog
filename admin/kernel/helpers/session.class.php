<?php

/*
 * HermesBlog -
 * http://www.hermesblog.com
 * Author Diego Najar

 * All HermesBlog code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
*/

class Session {

	public static function init()
	{
		$_SESSION['hermesblog'] = array(
			'error'=>false,
			'alert'=>'',
			'last_comment_at'=>0,
			'last_session_at'=>0,
			'fail_session'=>0
		);
	}

	public static function get($name)
	{
		if(isset($_SESSION['hermesblog'][$name]))
			return $_SESSION['hermesblog'][$name];
		else
			return false;
	}

	public static function set($key, $value)
	{
		$_SESSION['hermesblog'][$key] = $value;
	}

	public static function generateFormToken()
	{
		$token = Text::random_text(8);
		$token = sha1($token);
		self::set('token', $token);
	}

	public static function getFormToken()
	{
		return self::get('token');
	}

	public static function validFormToken($token)
	{
		$sessionToken = self::getFormToken();

		return ( !empty($sessionToken) && ($sessionToken===$token) );
	}

	public static function printFormToken()
	{
		echo self::getFormToken();
	}

	public static function get_error()
	{
		if(isset($_SESSION['hermesblog']['error']))
		{
			return($_SESSION['hermesblog']['error']);
		}

		return false;
	}

	public static function get_last_comment_at()
	{
		if(isset($_SESSION['hermesblog']['last_comment_at']))
		{
			return($_SESSION['hermesblog']['last_comment_at']);
		}

		return false;
	}

	public static function get_last_session_at()
	{
		if(isset($_SESSION['hermesblog']['last_session_at']))
		{
			return($_SESSION['hermesblog']['last_session_at']);
		}

		return false;
	}

	public static function get_fail_session()
	{
		if(isset($_SESSION['hermesblog']['fail_session']))
		{
			return($_SESSION['hermesblog']['fail_session']);
		}

		return false;
	}

	public static function get_comment($field)
	{
		if(isset($_SESSION['hermesblog']['comment'][$field]))
			return $_SESSION['hermesblog']['comment'][$field];

		return false;
	}

	public static function set_comment($field, $data)
	{
		$_SESSION['hermesblog']['comment'][$field] = $data;
	}

	public static function get_alert()
	{
		self::set_error(false);
		return($_SESSION['hermesblog']['alert']);
	}

	public static function set_error($boolean = true)
	{
		$_SESSION['hermesblog']['error'] = $boolean;
	}

	public static function set_last_comment_at($time)
	{
		$_SESSION['hermesblog']['last_comment_at'] = $time;
	}

	public static function set_last_session_at($time)
	{
		$_SESSION['hermesblog']['last_session_at'] = $time;
	}

	public static function set_fail_session($amount)
	{
		$_SESSION['hermesblog']['fail_session'] = $amount;
	}

	public static function set_alert($text = '')
	{
		self::set_error(true);
		$_SESSION['hermesblog']['alert'] = $text;
	}

}

?>