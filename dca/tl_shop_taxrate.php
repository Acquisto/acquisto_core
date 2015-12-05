<?php

$GLOBALS['TL_DCA']['tl_shop_taxrate'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_shop_tax',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id'                      => 'primary',
				'pid'                     => 'index'
			)
		),
	),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('valid_from'),
			'headerFields'            => array('title'),
			'flag'                    => 12,
			'panelLayout'             => 'search,limit',
			'child_record_callback'   => array('tl_shop_taxrates', 'child_records'),
			'disableGrouping'         => true
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
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_taxrate']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_taxrate']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_taxrate']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_taxrate']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'default'                     => '{title_legend},rate,valid_from',
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
		'rate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_taxrate']['rate'],
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "float NOT NULL default '0'"
		),
		'valid_from' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_taxrate']['valid_from'],
			'default'                 => time(),
			'inputType'               => 'text',
			'exclude'                  => true,
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'date', 'mandatory'=>true, 'maxlength'=>20, 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default '0'"
		)
	)
);

class tl_shop_taxrates extends Backend {
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	public function child_records($row) 
	{
		$row = sprintf("%01.2f", $row['rate']) . '% <span style="color:#b3b3b3; padding-left:3px;">[' . date(\Config::get('dateFormat'), $row['valid_from']) . ']</span>';
		return "<div>" . $row . "</div>\n";
	}
}