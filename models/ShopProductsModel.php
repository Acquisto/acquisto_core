<?php

namespace Acquisto\Models;

class ShopProductsModel extends \Model
{
	protected static $strTable = 'tl_shop_products';

	public static function findByCategory($intCategory) 
	{ 
		$t = static::$strTable; 
     
		$arrColumns = array("$t.category LIKE ?"); 
		$arrValues = array('%"' . $intCategory . '"%'); 

		$arrOptions = array 
		( 
			'order'  => "$t.tstamp ASC" 
		); 
     
		$arrColumns = static::findBy($arrColumns, $arrValues, $arrOptions); 

		return $arrColumns;
	} 
}
