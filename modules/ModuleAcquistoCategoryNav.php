<?php

namespace Acquisto\Frontend;
use Acquisto\Models;

class ModuleAcquistoCategoryNav extends \Module
{
	protected $strTemplate = 'mod_acquisto_category_nav';
	private $trail = array();
	private $items = array();

	public function generate()
	{
		if (TL_MODE == 'BE') {
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['acquisto_category_nav'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		if(FE_USER_LOGGED_IN) {
			$this->Import('FrontendUser', 'Member');
		}

		$this->generateTrail(\Input::get('category'));

		$pid = 0;

		if($this->acquisto_levelOffset != 0) {
			$pid = $this->trail[$this->acquisto_levelOffset - 1];
		}
		elseif($this->acquisto_referenceCategory) {
			$pid = $this->acquisto_referenceCategory;
		}

		$this->items = $this->getCategory($pid, $this->acquisto_levelOffset, 0, $this->acquisto_hardlimit);

		if(!is_array($this->items)) {
			return '';
		}

		return parent::generate();
	}

	protected function compile()
	{
		if(is_array($this->items)) {
			$this->Template->html = $this->renderCategory($this->items);
		}
	}

	public function getCategory($pid, $offset, $level, $hardlimit = false)
	{
		$objData = $this->Database->prepare("SELECT * FROM tl_shop_category WHERE pid=? && published=? && hide=? && ((start = '' && stop = '') OR (start = '' && stop > ?) OR (start < ? && stop > ?))")->execute($pid, 1, '', time(), time(), time());
		while($objData->next()) {
			if(($objData->protected && $this->checkPermission(deserialize($objData->groups))) OR !$objData->protected) {
				if((!FE_USER_LOGGED_IN && $objData->guests) OR !$objData->guests) {
					if($this->showTrail($level, $objData->row())) {
						$subitems = $this->getCategory($objData->id, $offset, ($level + 1), $hardlimit);
					}
					else {
						unset($subitems);
					}

					$item = $objData->row();
					$item['level']    = $level;
					$item['subitems'] = $subitems;

					$items[] = $item;
				}
			}
		}

		return $items;
	}

	public function renderCategory($items = array(), $level = 1)
	{
		$objPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")->limit(1)->execute($this->acquisto_jumpTo);
		$strUrl  = \Controller::generateFrontendUrl($objPage->fetchAssoc(), '/category/%s');

		if(count($items) > 1) {
			$items[0]['css'] .= 'first ';
			$items[count($items) - 1]['css'] .= 'last ';
		}
		else {
			$items[0]['css'] .= 'only ';
		}

		foreach($items as $item) {
			$item = (object) $item;

			if($item->subitems) {
				$item->subitems = $this->renderCategory($item->subitems, $level + 1);
				$item->css .= 'submenu ';
			}

			if($this->trail[$level - 1] == $item->id) {
				if($this->trail[$level - 1] == end($this->trail)) {
					$item->css .= 'active ';
				}
				else {
					$item->css .= 'trail ';
				}
			}

			switch($item->type) {
				case "category":
					$pageId  = $this->acquisto_jumpTo;
					$pageAdd = '/category/' . $item->alias;
					break;;
				case "redirect":
					$objRedirect = \ShopCategoryModel::findById($item->categoryJump);

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

			$item->css = trim(trim($item->css) . ' ' . trim($item->cssClass));
			$index[] = $item;
		}

		$objTemplate = new \FrontendTemplate('category_node');
		$objTemplate->items = $index;
		$objTemplate->level = $level;

		return $objTemplate->parse();
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

	public function checkPermission($groups)
	{
		$access = false;

		if(FE_USER_LOGGED_IN && is_array($groups)) {
			foreach($groups as $group) {
				if(in_array($group, $this->Member->groups)) {
					$access = true;
				}
			}
		}

		return $access;
	}

	public function showTrail($level, $item)
	{
		$show = false;

		if($this->acquisto_showLevel == 0) {
			$show = true;
		}
		else {
			if(($this->acquisto_showLevel - 1) > $level) {
				$show = true;
			}
			else {
				if(!$this->acquisto_hardLimit && in_array($item['id'], $this->trail) && $this->trail[$level]) {
				    $show = true;
				}
			}
		}

		return $show;
	}
}