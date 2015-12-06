<?php 

$GLOBALS['TL_DCA']['tl_shop_pricelist'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'switchToEdit'                => true,
		'onsubmit_callback'           => array
		(
			array('tl_shop_pricelist', 'onsubmit_callback')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		),
	),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title', 'type'),
			'format'                  => '%s <span style="color:#b3b3b3; padding-left:3px;">[%s]</span>'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'__selector__'                => array('protected'),
		'default'                     => '{title_legend},title,default_list;{config_legend},type,currency,exchange_ratio;{protected_legend},protected'
	),
	'subpalettes' => array
	(
		'protected'                   => 'groups'
	),
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['title'],
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['type'],
			'inputType'               => 'select',
			'filter'                  => true,
			'options'                 => array('+', '-'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['type_reference'],
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50', 'includeBlankOption' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'currency' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['currency'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_shop_currency.title',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50', 'includeBlankOption' => true),
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'protected' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['protected'],
			'inputType'               => 'checkbox',
			'filter'                  => true,
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['groups'],
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'eval'                    => array('multiple'=>true, 'mandatory'=>true),
			'sql'                     => "blob NOT NULL"
		),
		'default_list' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_pricelist']['default_list'],
			'inputType'               => 'checkbox',
			'filter'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		)
	)
);

class tl_shop_pricelist extends Backend
{
	public function onsubmit_callback($dc)
	{
		if($this->Input->Post('default_list') && $this->Input->Post('FORM_SUBMIT') == 'tl_shop_pricelist') {
			$this->Database->prepare("UPDATE tl_shop_pricelist SET default_list = ''")->execute();
			$this->Database->prepare("UPDATE tl_shop_pricelist SET default_list = '1' WHERE id=?")->execute($this->Input->Get('id'));
		}
	}
}