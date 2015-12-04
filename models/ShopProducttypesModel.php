<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Acquisto\Models;


class ShopProducttypesModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_shop_producttypes';

	public static function findActiveByEmailAndUsername($strEmail, $strUsername=null, array $arrOptions=array())
	{
#		$t = static::$strTable;
#		$time = \Date::floorToMinute();
#
#		$arrColumns = array("$t.email=? AND $t.login='1' AND ($t.start='' OR $t.start<='$time') AND ($t.stop='' OR $t.stop>'" . ($time + 60) . "') AND $t.disable=''");
#
#		if ($strUsername !== null)
#		{
#			$arrColumns[] = "$t.username=?";
#		}
#
#		return static::findOneBy($arrColumns, array($strEmail, $strUsername), $arrOptions);
	}
}
