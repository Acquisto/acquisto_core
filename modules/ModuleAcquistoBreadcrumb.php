<?php

namespace Acquisto\Frontend;
use Acquisto\Models;

class ModuleAcquistoBreadcrumb extends \Module
{
	protected $strTemplate = 'mod_acquisto_breadcrumb';
	private $trail = array();

	public function generate()
	{
		if (TL_MODE == 'BE') {
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['acquisto_breadcrumb'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		$this->generateTrail(\Input::get('category'));

		if(!is_array($this->trail) OR !count($this->trail)) {
			return '';
		}

		return parent::generate();
	}

	protected function compile()
	{
		foreach($this->trail as $id) {
			$item = \ShopCategoryModel::findById($id);

			switch($item->type) {
				case "category":
					$pageId  = $this->acquisto_jumpTo;
					$pageAdd = '/category/' . $item->alias;
					break;;
				case "redirect":
					$objRedirect = \ShopCategoryModel::findById($item['categoryJump']);

					$pageId = $this->acquisto_jumpTo;
					$pageAdd = '/category/'. $objRedirect->alias;
					break;;
				case "page":
					$pageId  = $item->jumpTo;
					$pageAdd = '';
					break;;
				default:

					if (isset($GLOBALS['TL_HOOKS']['modifyOwnCategoryTyp']) && is_array($GLOBALS['TL_HOOKS']['modifyOwnCategoryTyp'])) {
						foreach ($GLOBALS['TL_HOOKS']['modifyOwnCategoryTyp'] as $callback) {
							$this->import($callback[0]);
							$item = $this->$callback[0]->$callback[1]($item);
						}
					}

					$blnHook = true;

					break;;
			}

			if(!$blnHook) {
				$objPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")->limit(1)->execute($pageId);
				$item->href = \Controller::generateFrontendUrl($objPage->row(), $pageAdd);
			}

			if($item->cssClass) {
				$item->css = $item->cssClass;
			}

			if(($this->showHidden && $item->hide) OR !$item->hide) {
				$items[] = $item;
			}
		}

		$items[0]->css                  = trim($items[0]->css . ' first');
		$items[count($items) - 1]->css  = trim($items[count($items) - 1]->css . ' active last');
		$items[count($items) - 1]->href = '';

		$this->Template->items = $items;
	}


	public function generateTrail($IdOrAlias = '')
	{
		if(!$IdOrAlias) {
			return '';
		}

		$objCategory = $this->Database->prepare("SELECT * FROM tl_shop_category WHERE alias=? or id=?")->execute($IdOrAlias, $IdOrAlias);

		if($objCategory->pid) {
			$this->generateTrail($objCategory->pid);
		}

		$this->trail[] = $objCategory->id;
	}
}