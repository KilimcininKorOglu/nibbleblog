<?php

/*
 * HermesBlog -
 * http://www.hermesblog.com
 * Author Diego Najar

 * All HermesBlog code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
*/

class Category {

	public static function id()
	{
		global $category;

		return $category['id'];
	}

	public static function name()
	{
		global $category;

		return $category['name'];
	}

}

?>