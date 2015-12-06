<?php

$GLOBALS['BE_MOD']['acquisto'] = array
(
	'acquisto_manufacture' => array
	(
		'tables'     => array('tl_shop_manufacture'),
		'icon'       => 'system/modules/acquisto_core/assets/icons/be/cog.png',
	),
	'acquisto_category' => array
	(
		'tables'     => array('tl_shop_category'),
		'icon'       => 'system/modules/acquisto_core/assets/icons/be/application_cascade.png',
	)
);

$GLOBALS['BE_MOD']['acquisto_settings'] = array
(
	'acquisto_unit' => array
	(
		'tables'     => array('tl_shop_unit'),
		'icon'       => 'system/modules/acquisto_core/assets/icons/be/table.png',
	),
	'acquisto_tax' => array
	(
		'tables'     => array('tl_shop_tax', 'tl_shop_taxrate'),
		'icon'       => 'system/modules/acquisto_core/assets/icons/be/ruby.png',
	),
	'acquisto_currency' => array
	(
		'tables'     => array('tl_shop_currency'),
		'icon'       => 'system/modules/acquisto_core/assets/icons/be/coins.png',
	),
	'acquisto_pricelist' => array
	(
		'tables'     => array('tl_shop_pricelist'),
		'icon'       => 'system/modules/acquisto_core/assets/icons/be/page_paste.png',
	)
);


array_insert($GLOBALS['FE_MOD']['acquisto'], 0, array
(
	'acquisto_breadcrumb'          => 'ModuleAcquistoBreadcrumb',
	'acquisto_category_nav'        => 'ModuleAcquistoCategoryNav'
));

$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('Acquisto\Classes\InsertTags', 'onReplaceInsertTags');
$GLOBALS['TL_HOOKS']['generatePage'][]      = array('Acquisto\Classes\AcquistoSystem', 'onGeneratePage');
