<?php

namespace Acquisto\Frontend;
use Acquisto\Models\ShopProductsModel as ProductModel;
use Acquisto\Models\ShopCategoryModel as CategoryModel;
use Acquisto\Models\ShopProducttypesModel as ProductTypeModel;

class ModuleAcquistoList extends \Module
{
	protected $strTemplate = 'mod_acquisto_list';

	public function generate()
	{
		if (TL_MODE == 'BE') {
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['acquisto_list'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		if(!\Input::get('category')) {
			return '';
		}

		return parent::generate();
	}

	protected function compile()
	{
		$objCategory = CategoryModel::findByAlias(\Input::get('category'));
		$objProduct = ProductModel::findByCategory($objCategory->id);

#		while($objProduct->next()) {
#		    $objProduct->type = ProductTypeModel::findById($objProduct->type);
#		    print_r($objProduct->row());
#		}
	}

	public function generateAjax()
	{

	}
}