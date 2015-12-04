<?php

$GLOBALS['BE_MOD']['acquisto'] = array
(
	'acquisto_category' => array
	(
		'tables'     => array('tl_shop_category'),
		'icon'       => 'system/modules/acquisto_core/assets/icons/be/application_cascade.png',
	)
);

array_insert($GLOBALS['FE_MOD']['acquisto'], 0, array
(
	'acquisto_breadcrumb'          => 'ModuleAcquistoBreadcrumb',
	'acquisto_category_nav'        => 'ModuleAcquistoCategoryNav'
));
