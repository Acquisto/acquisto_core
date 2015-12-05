<?php

ClassLoader::addNamespaces(array
(

	'Acquisto',
	'Acquisto\Backend',
	'Acquisto\Classes',
	'Acquisto\Drivers',
	'Acquisto\Frontend',
	'Acquisto\Models',
));
 
ClassLoader::addClasses(array
(
	'Acquisto\Classes\InsertTags'                 => 'system/modules/acquisto_core/classes/system/InsertTags.php',
	'Acquisto\Classes\AcquistoSystem'             => 'system/modules/acquisto_core/classes/system/AcquistoSystem.php',

	'Acquisto\Frontend\ModuleAcquistoBreadcrumb'  => 'system/modules/acquisto_core/modules/ModuleAcquistoBreadcrumb.php',
	'Acquisto\Frontend\ModuleAcquistoCategoryNav' => 'system/modules/acquisto_core/modules/ModuleAcquistoCategoryNav.php',

	'Acquisto\Models\ShopCategoryModel'           => 'system/modules/acquisto_core/models/ShopCategoryModel.php',
));

TemplateLoader::addFiles(array
(
	'category_node'                      => 'system/modules/acquisto_core/templates/navigation',

	'mod_acquisto_breadcrumb'            => 'system/modules/acquisto_core/templates/modules',
	'mod_acquisto_category_nav'          => 'system/modules/acquisto_core/templates/modules',
));
