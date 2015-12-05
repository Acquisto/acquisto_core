<?php

namespace Acquisto\Classes;
use Acquisto\Models;

class AcquistoSystem extends \Frontend
{
	public function onGeneratePage($objPage, $objLayout, $objPageRegular)
	{
		if(\Input::get('category')) {
			$objCategory = \ShopCategoryModel::findByAlias(\Input::get('category'));

			if(trim($objCategory->cssClass)) {
				$objLayout->cssClass .= $objCategory->cssClass . ' ';
			}
		}
	}
}