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
	'Acquisto\Backend\About'                      => 'system/modules/acquisto_core/modules/About.php',

	'Acquisto\Classes\InsertTags'                 => 'system/modules/acquisto_core/classes/system/InsertTags.php',
	'Acquisto\Classes\AcquistoSystem'                     => 'system/modules/acquisto_core/classes/system/AcquistoSystem.php',

	'Acquisto\Drivers\DC_Product'                 => 'system/modules/acquisto_core/drivers/DC_Product.php',

	'Acquisto\Frontend\ModuleAcquistoBreadcrumb'  => 'system/modules/acquisto_core/modules/ModuleAcquistoBreadcrumb.php',
	'Acquisto\Frontend\ModuleAcquistoCart'        => 'system/modules/acquisto_core/modules/ModuleAcquistoCart.php',
	'Acquisto\Frontend\ModuleAcquistoCategoryNav' => 'system/modules/acquisto_core/modules/ModuleAcquistoCategoryNav.php',
	'Acquisto\Frontend\ModuleAcquistoList'        => 'system/modules/acquisto_core/modules/ModuleAcquistoList.php',
	'Acquisto\Frontend\ModuleAcquistoReader'      => 'system/modules/acquisto_core/modules/ModuleAcquistoReader.php',

	'Acquisto\Models\ShopProducttypesModel'       => 'system/modules/acquisto_core/models/ShopProducttypesModel.php',
	'Acquisto\Models\ShopProductsModel'       => 'system/modules/acquisto_core/models/ShopProductsModel.php',
	'Acquisto\Models\ShopCategoryModel'       => 'system/modules/acquisto_core/models/ShopCategoryModel.php',


#
#    // ExportModules
#    'googlemerchant'                      => 'system/modules/acquisto_core/modules/export/googlemerchant.php',
#    'billigerde'                          => 'system/modules/acquisto_core/modules/export/billigerde.php',
#
#    // ProductClasses
#    'AcquistoShop\Product\acquistoPClassNormal'               => 'system/modules/acquisto_core/modules/product/acquistoPClassNormal.php',
#    'AcquistoShop\Product\acquistoPClassDigital'              => 'system/modules/acquisto_core/modules/product/acquistoPClassDigital.php',
#    'AcquistoShop\Product\acquistoPClassVariant'              => 'system/modules/acquisto_core/modules/product/acquistoPClassVariant.php',
#
#    // Widgets
#    'categorieTree'                    => 'system/modules/acquisto_core/widgets/categorieTree.php',
#    'memberWizard'                     => 'system/modules/acquisto_core/widgets/memberWizard.php',
#    'preisWizard'                      => 'system/modules/acquisto_core/widgets/preisWizard.php',
#
#    // Models
#    'AcquistoShop\acquistoShop'                               => 'system/modules/acquisto_core/models/acquistoShop.php',
#    'AcquistoShop\acquistoShopAjax'                           => 'system/modules/acquisto_core/models/acquistoShopAjax.php',
#    'AcquistoShop\acquistoShopPayment'                        => 'system/modules/acquisto_core/models/acquistoShopPayment.php',
#    'AcquistoShop\acquistoShopMessages'                       => 'system/modules/acquisto_core/models/acquistoShopMessages.php',
#    'AcquistoShop\acquistoShopMember'                         => 'system/modules/acquisto_core/models/acquistoShopMember.php',
#    'AcquistoShop\acquistoShopCosts'                          => 'system/modules/acquisto_core/models/acquistoShopCosts.php',
#    'AcquistoShop\acquistoShopOrders'                         => 'system/modules/acquisto_core/models/acquistoShopOrders.php',
#    'AcquistoShop\acquistoShopGutschein'                      => 'system/modules/acquisto_core/models/acquistoShopGutschein.php',
#    'AcquistoShop\acquistoShopBasket'                         => 'system/modules/acquisto_core/models/acquistoShopBasket.php',
#    'AcquistoShop\acquistoShopBackend'                        => 'system/modules/acquisto_core/models/acquistoShopBackend.php',
#    'AcquistoShop\acquistoShopNavigation'                     => 'system/modules/acquisto_core/models/acquistoShopNavigation.php',
#    'AcquistoShop\acquistoShopProduktLoader'                  => 'system/modules/acquisto_core/models/acquistoShopProduktLoader.php',
#    'AcquistoShop\acquistoShopProduktController'              => 'system/modules/acquisto_core/models/acquistoShopProduktController.php',
#    'AcquistoShop\acquistoShopProduktList'                    => 'system/modules/acquisto_core/models/acquistoShopProduktList.php',
#    'AcquistoShop\acquistoShopVariantenController'            => 'system/modules/acquisto_core/models/acquistoShopVariantenController.php',
#
#    // Modules
#    'AcquistoShop\Frontend\ModuleAcquistoProductDetails'      => 'system/modules/acquisto_core/modules/ModuleAcquistoProductDetails.php',
#    'AcquistoShop\Frontend\ModuleAcquistoProductFilter'       => 'system/modules/acquisto_core/modules/ModuleAcquistoProductFilter.php',
#    'AcquistoShop\Frontend\ModuleAcquistoBasketWidget'        => 'system/modules/acquisto_core/modules/ModuleAcquistoBasketWidget.php',
#    'AcquistoShop\Frontend\ModuleAcquistoProductList'         => 'system/modules/acquisto_core/modules/ModuleAcquistoProductList.php',
#    'AcquistoShop\Frontend\ModuleAcquistoRecently'            => 'system/modules/acquisto_core/modules/ModuleAcquistoRecently.php',
#    'AcquistoShop\Frontend\ModuleAcquistoTagCloud'            => 'system/modules/acquisto_core/modules/ModuleAcquistoTagCloud.php',
#    'AcquistoShop\Frontend\ModuleAcquistoShipping'            => 'system/modules/acquisto_core/modules/ModuleAcquistoShipping.php',
#    'AcquistoShop\Frontend\ModuleAcquistoBasket'              => 'system/modules/acquisto_core/modules/ModuleAcquistoBasket.php',
#    'AcquistoShop\Frontend\ModuleAcquistoTerms'               => 'system/modules/acquisto_core/modules/ModuleAcquistoTerms.php',
#    'AcquistoShop\Frontend\ModuleAcquistoFilterList'          => 'system/modules/acquisto_core/modules/ModuleAcquistoFilterList.php',
#    'AcquistoShop\Frontend\ModuleAcquistoCoupon'              => 'system/modules/acquisto_core/modules/ModuleAcquistoCoupon.php',
#    'AcquistoShop\Frontend\ModuleAcquistoOrderList'           => 'system/modules/acquisto_core/modules/ModuleAcquistoOrderList.php',
#    'AcquistoShop\Frontend\ModuleAcquistoOrderDetails'        => 'system/modules/acquisto_core/modules/ModuleAcquistoOrderDetails.php',
#    'AcquistoShop\Frontend\ModuleAcquistoBreadcrumb'          => 'system/modules/acquisto_core/modules/mod_acquistoShop_Breadcrumb.php',
#    'AcquistoShop\Frontend\ModuleAcquistoCategories'          => 'system/modules/acquisto_core/modules/ModuleAcquistoCategories.php',
#    'AcquistoShop\Frontend\ModuleAcquistoSearch'              => 'system/modules/acquisto_core/modules/ModuleAcquistoSearch.php',
#    'AcquistoShop\Frontend\ModuleAcquistoCurrency'            => 'system/modules/acquisto_core/modules/ModuleAcquistoCurrency.php',
#
#    // PaymentModules
#    'vorkasse'                           => 'system/modules/acquisto_core/modules/payment/vorkasse.php',
#    'nachname'                           => 'system/modules/acquisto_core/modules/payment/nachname.php',
#    'rechnung'                           => 'system/modules/acquisto_core/modules/payment/rechnung.php',
#    'sofortueberweisung'                 => 'system/modules/acquisto_core/modules/payment/sofortueberweisung.php',
#    'paypal'                             => 'system/modules/acquisto_core/modules/payment/paypal.php',
#
#    // Helper
#    'AcquistoShop\Helper\AcquistoUpdate'                      => 'system/modules/acquisto_core/models/helper/AcquistoUpdate.php',
#
#    // Content Elements
#    'ContentProduct'                                          => 'system/modules/acquisto_core/elements/ContentProduct.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_about'                           => 'system/modules/acquisto_core/templates/backend',
	'category_node'                      => 'system/modules/acquisto_core/templates/navigation',

	'mod_acquisto_breadcrumb'            => 'system/modules/acquisto_core/templates/modules',
	'mod_acquisto_category_nav'          => 'system/modules/acquisto_core/templates/modules',
	'mod_acquisto_list'                  => 'system/modules/acquisto_core/templates/modules',
	'mod_acquisto_reader'                => 'system/modules/acquisto_core/templates/modules',



//    'mod_acquisto_agb'                   => 'system/modules/acquisto_core/templates/modules',
    'acquisto_produkt_default'           => 'system/modules/acquisto_core/templates/modules',
    'acquisto_list_default'              => 'system/modules/acquisto_core/templates/modules',
    'be_acquistoshop_portal'             => 'system/modules/acquisto_core/templates/modules',
    'com_default_gravatar'               => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_bestelldetails'        => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_bestellliste'          => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_breadcrumb'            => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_gutschein'             => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_produktdetails'        => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_produktfilter'         => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_produktliste'          => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_recent'                => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_suchergebnis'          => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_suchformular'          => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_tagcloud'              => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_versand'               => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_warengruppen'          => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb'                      => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb_agb'                  => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb_check_and_order'      => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb_customer'             => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb_pay'                  => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb_payment_and_shipping' => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb_widget'               => 'system/modules/acquisto_core/templates/modules',
    'variant_radio'                      => 'system/modules/acquisto_core/templates/modules',
    'variant_select'                     => 'system/modules/acquisto_core/templates/modules',
    'warengruppen_default'               => 'system/modules/acquisto_core/templates/modules',
    'warengruppen_nav_default'           => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb_paypal_revieworder'   => 'system/modules/acquisto_core/templates/modules',
    'mod_warenkorb_access_denied'        => 'system/modules/acquisto_core/templates/modules',
    'mod_acquisto_currency'              => 'system/modules/acquisto_core/templates/modules',

    'warenkorb_email_default'            => 'system/modules/acquisto_core/templates/email',

    'variant_radio'                      => 'system/modules/acquisto_core/templates/forms',
    'variant_select'                     => 'system/modules/acquisto_core/templates/forms',
    'variant_checkbox'                   => 'system/modules/acquisto_core/templates/forms',
    'form_textarea'                      => 'system/modules/acquisto_core/templates/forms',
    'form_text'                          => 'system/modules/acquisto_core/templates/forms',

    'ce_productdetails'                  => 'system/modules/acquisto_core/templates/elements'
));
