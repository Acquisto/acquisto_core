<?php

$GLOBALS['TL_DCA']['tl_shop_category'] = array
(
	'config' => array
	(
		'label'                       => 'Acquisto - ' . $GLOBALS['TL_LANG']['MOD']['acquisto_category'][0],
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index',
				'alias' => 'index'
			)
		)
	),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 5,
			'panelLayout'             => 'search'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s',
			'label_callback'          => array('tl_shop_category', 'addIcon')
		),
		'global_operations' => array
		(
			'toggleNodes' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['toggleNodes'],
				'href'                => 'ptg=all',
				'class'               => 'header_toggle'
			),
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_category']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif',
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_category']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"',
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_category']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_category']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_category']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'__selector__'                => array('type', 'addImage', 'protected', 'published'),
		'default'                     => '{title_legend},title,alias,type;{config_legend},description,addImage;{seo_legend},SEOKeywords,SEODescription;{expert_legend:hide},cssClass,,hide,guests;{protected_legend},protected;{publish_legend},published',
		'category'                    => '{title_legend},title,alias,type;{config_legend},description,addImage;{seo_legend},SEOKeywords,SEODescription;{expert_legend:hide},cssClass,,hide,guests;{protected_legend},protected;{publish_legend},published',
		'redirect'                    => '{title_legend},title,alias,type;{config_legend},categoryJump;{protected_legend},protected;{publish_legend},cssID,published',
		'page'                        => '{title_legend},title,alias,type;{config_legend},jumpTo;{protected_legend},protected;{publish_legend},cssID,published',
	),
	'subpalettes' => array
	(
		'addImage'                    => 'imageSRC',
		'published'                   => 'start,stop',
		'protected'                   => 'groups'
	),
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'sorting' => array
		(
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['title'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'decodeEntities'=>true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['alias'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alnum', 'doNotCopy'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''",
			'save_callback' => array
			(
				array('tl_shop_category', 'generateAlias')
			)
		),
		'type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['type'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('category', 'redirect', 'page'),
			'reference'               => $GLOBALS['TL_LANG']['tl_shop_category']['type_ref'],
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'addImage' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['addImage'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true, 'submitOnChange'=>true,),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['description'],
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>false, 'rte'=>'tinyMCE', 'tl_class'=>'clr'),
			'sql'                     => "text NOT NULL"
		),
		'imageSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['imageSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'clr'),
			'sql'                     => "binary(16) NULL",
		),
		'SEOKeywords' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['SEOKeywords'],
			'inputType'               => 'textarea',
			'search'                  => false,
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'clr'),
			'sql'                     => "text NOT NULL"
		),
		'SEODescription' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['SEODescription'],
			'inputType'               => 'textarea',
			'search'                  => false,
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'clr'),
			'sql'                     => "text NOT NULL"
		),
		'categoryJump' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['categoryJump'],
			'exclude'                 => true,
			'inputType'               => 'treePicker',
			'eval'                    => array
			(
				'mandatory'       => true,
				'foreignTable'    => 'tl_shop_category',
				'titleField'      => 'title',
				'searchField'     => 'title',
				'managerHref'     => 'do=acquisto_category',
				'fieldType'       => 'radio',
				'multiple'        => false,
				'pickerCallback'  => function($row) {
					return $row['title'] . ' [' . $row['id'] . ']';
				}
			),
			'sql'                     => "blob NULL"
		),
		'jumpTo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['jumpTo'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true, 'fieldType'=>'radio'),
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'cssClass' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['cssClass'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'hide' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['hide'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'guests' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['guests'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),


		'protected' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['protected'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true, 'submitOnChange'=>true,),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['groups'],
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'search'                  => false,
			'eval'                    => array('mandatory'=>true, 'multiple'=>true, 'mandatory'=>false),
			'sql'                     => "text NOT NULL"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['published'],
			'default'                 => 1,
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true, 'submitOnChange'=>true,),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['start'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_category']['stop'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		)
	)
);

class tl_shop_category extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		if (!strlen($varValue)) {
			$autoAlias = true;
			$varValue = standardize($dc->activeRecord->title);
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_shop_category WHERE id=? OR alias=?")->execute($dc->id, $varValue);

		if ($objAlias->numRows > 1) {
			$arrDomains = array();

			while ($objAlias->next()) {
				$_pid = $objAlias->id;
				$_type = '';

				do {
					$objParentPage = $this->Database->prepare("SELECT id, pid, alias, type, dns FROM tl_shop_category WHERE id=?")->limit(1)->execute($_pid);

					if ($objParentPage->numRows < 1) {
						break;
					}

					$_pid = $objParentPage->pid;
					$_type = $objParentPage->type;
				}
				while ($_pid > 0 && $_type != 'catroot');

				$arrDomains[] = ($objParentPage->numRows && ($objParentPage->type == 'catroot' || $objParentPage->pid > 0)) ? $objParentPage->dns : '';
			}

			$arrUnique = array_unique($arrDomains);

			if (count($arrDomains) != count($arrUnique)) {
				if (!$autoAlias) {
					throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
				}

				$varValue .= '-' . $dc->id;
			}
		}

		return $varValue;
	}

	public function addIcon($row, $label, DataContainer $dc=null, $imageAttribute='', $blnReturnImage=false)
	{
		$sub = 0;
		$image = $row['type'] . '.png';

		if(!$row['published']) {
			$image = 'hide.png';
		}

		$image = 'system/modules/acquisto_core/assets/icons/category/' . $image;
		return $this->generateImage($image, '', $imageAttribute) . ' ' . $label;
	}
}