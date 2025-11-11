<?php

/*
 * HermesBlog -
 * http://www.hermesblog.com
 * Author Diego Najar

 * All HermesBlog code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
*/

class Plugin {

	public static function title()
	{
		global $page;

		return $page['title'];
	}

}

?>