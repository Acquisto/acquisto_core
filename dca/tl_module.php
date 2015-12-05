<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][]        = 'acquisto_reference';
$GLOBALS['TL_DCA']['tl_module']['palettes']['acquisto_category_nav'] = '{title_legend},name,headline,type;{nav_legend},acquisto_levelOffset,acquisto_showLevel,acquisto_hardLimit;{list_legend},acquisto_jumpTo;{reference_legend},acquisto_reference;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['acquisto_breadcrumb']   = '{title_legend},name,headline,type;{list_legend},acquisto_jumpTo;{nav_legend},showHidden;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['subpalettes']['acquisto_reference'] = 'acquisto_referenceCategory';

$GLOBALS['TL_DCA']['tl_module']['fields']['acquisto_jumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['acquisto_jumpTo'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('mandatory'=>true, 'fieldType'=>'radio', 'tl_class' => 'clr'),
	'sql'                     => "int(10) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['acquisto_levelOffset'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['acquisto_levelOffset'],
	'default'                 => 0,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['acquisto_showLevel'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['acquisto_showLevel'],
	'default'                 => 0,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['acquisto_hardLimit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['acquisto_hardLimit'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'inputType'               => 'checkbox',
	'eval'                    => array('mandatory'=>false, 'isBoolean'=>true, 'tl_class'=>'clr'),
	'sql'                     => "smallint(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['acquisto_reference'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['acquisto_reference'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['acquisto_referenceCategory'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['acquisto_referenceCategory'],
	'exclude'                 => true,
	'inputType'               => 'treePicker',
	'eval'                    => array
	(
		'foreignTable'    => 'tl_shop_category',
		'titleField'      => 'title',
		'searchField'     => 'title',
		'managerHref'     => 'do=theme&table=tl_module',
		'fieldType'       => 'radio',
		'multiple'        => false,
		'pickerCallback'  => function($row) {
			return $row['title'] . ' [' . $row['id'] . ']';
		}
	),
	'sql'                     => "blob NULL"
);

if(\Input::Get('do') == 'themes' && \Input::Get('act') == 'edit' && \Input::Get('table') == 'tl_module')
{
	$objModule = \ModuleModel::findById(\Input::Get('id'));
	$defaultLangStr = 'acquisto_jumpTo';

	switch($objModule->type) {
		case "acquisto_category_nav":
		case "acquisto_breadcrumb":
			$defaultLangStr = 'acquisto_listJumpTo';
			break;;
	}

	$GLOBALS['TL_DCA']['tl_module']['fields']['acquisto_jumpTo']['label'] = $GLOBALS['TL_LANG']['tl_module'][$defaultLangStr];
}

class tl_module_acquisto extends Backend
{
	public function _construct()
	{
		parent::_construct();
		$this->import('BackendUser', 'User');
	}
}