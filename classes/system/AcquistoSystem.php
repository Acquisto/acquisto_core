<?php

namespace Acquisto\Classes;
use Acquisto\Models\ShopCategoryModel As CategoryModel;

class AcquistoSystem extends \Frontend
{
	public function onGeneratePage($objPage, $objLayout, $objPageRegular)
	{
		if(\Input::get('category')) {
			$objCategory = CategoryModel::findByAlias(\Input::get('category'));

			if(trim($objCategory->cssClass)) {
				$objLayout->cssClass .= $objCategory->cssClass . ' ';
			}
		}
	}
}