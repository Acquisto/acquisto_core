<?php

/**
 * Buttons
 **/
$GLOBALS['TL_LANG']['tl_shop_category']['new']    = array('Neue Gruppe', 'new');
$GLOBALS['TL_LANG']['tl_shop_category']['edit']   = array('edit', 'Gruppe ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_shop_category']['copy']   = array('copy', 'Gruppe ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_shop_category']['cut']    = array('cut', 'Gruppe ID %s verschieben');
$GLOBALS['TL_LANG']['tl_shop_category']['delete'] = array('delete', 'Seite ID %s löschen');
$GLOBALS['TL_LANG']['tl_shop_category']['show']   = array('show', 'Details der Gruppe ID %s anzeigen');

/**
 * Legends
 **/
$GLOBALS['TL_LANG']['tl_shop_category']['title_legend']     = 'Allgemein';
$GLOBALS['TL_LANG']['tl_shop_category']['config_legend']    = 'Typen-Einstellungen';
$GLOBALS['TL_LANG']['tl_shop_category']['seo_legend']       = 'Meta-Informationen';
$GLOBALS['TL_LANG']['tl_shop_category']['expert_legend']    = 'Experten-Einstellungen';
$GLOBALS['TL_LANG']['tl_shop_category']['protected_legend'] = 'Zugriffsschutz';
$GLOBALS['TL_LANG']['tl_shop_category']['publish_legend']   = 'Ver&ouml;ffentlicung';

/**
 * Fields
 **/
$GLOBALS['TL_LANG']['tl_shop_category']['title'] = array('Gruppenname', 'Bitte geben Sie den Namen der Gruppe ein.');
$GLOBALS['TL_LANG']['tl_shop_category']['alias'] = array('Gruppenalias', 'Der Gruppenalias ist eine eindeutige Referenz, die anstelle der numerischen Gruppen-ID aufgerufen werden kann.');
$GLOBALS['TL_LANG']['tl_shop_category']['type'] = array('Gruppentyp', 'Bitte w&auml;hlen Sie den Typ der Gruppe aus.');
$GLOBALS['TL_LANG']['tl_shop_category']['description'] = array('Beschreibung', 'Bitte geben Sie eine Beschreibung der Gruppe ein.');
$GLOBALS['TL_LANG']['tl_shop_category']['addImage'] = array('Ein Bild hinzuf&uuml;gen', 'Der Gruppe ein Bild hinzuf&uuml;gen.');
$GLOBALS['TL_LANG']['tl_shop_category']['imageSRC'] = array('Quelldatei', 'Bitte w&auml;hlen Sie eine Datei aus der Datei&uuml;bersicht.');
$GLOBALS['TL_LANG']['tl_shop_category']['SEODescription'] = array('Meta-Description', 'Bitte geben Sie eine kurze Beschreibung oder Abstract den Inhalt der Gruppe ein.');
$GLOBALS['TL_LANG']['tl_shop_category']['SEOKeywords'] = array('Meta-Keywords', 'Bitte geben Sie Stichw&ouml;rter oder Themen ein, die in der Gruppe vorkommen bzw. behandelt werden. Die Stichw&ouml;rter werden durch Kommata voneinander getrennt.');
$GLOBALS['TL_LANG']['tl_shop_category']['categoryJump'] = array('Weiterleitungsgruppe', 'Bitte w&auml;hlen Sie die Gruppe aus, zu der Besucher weitergeleitet werden.');
$GLOBALS['TL_LANG']['tl_shop_category']['jumpTo'] = array('Weiterleitungsseite', 'Bitte wählen Sie die Seite aus, zu der Besucher weitergeleitet werden.');
$GLOBALS['TL_LANG']['tl_shop_category']['cssClass'] = array('CSS-Klasse', 'Die Klasse wird sowohl in der Shop-Navigation als auch im <body>-Tag verwendet.');
$GLOBALS['TL_LANG']['tl_shop_category']['hide'] = array('Im Shop verstecken', 'Diese Gruppe in der Shop-Navigation nicht anzeigen.');
$GLOBALS['TL_LANG']['tl_shop_category']['guests'] = array('Nur G&auml;sten anzeigen', 'Diese Gruppe ausblenden, sobald ein Benutzer angemeldet ist.');
$GLOBALS['TL_LANG']['tl_shop_category']['protected'] = array('Gruppe sch&uuml;tzen', 'Den Gruppen-Zugriff auf bestimmte Mitgliedergruppen beschr&auml;nken.');
$GLOBALS['TL_LANG']['tl_shop_category']['groups'] = array('Mitgliedergruppen', 'Diese Mitgliedergruppen d&uuml;rfen auf diese Gruppe zugreifen.');
$GLOBALS['TL_LANG']['tl_shop_category']['published'] = array('Gruppe ver&ouml;ffentlichen', 'Die Gruppe wird in der Shop-Navigation angezeigt.');
$GLOBALS['TL_LANG']['tl_shop_category']['start'] = array('Anzeigen ab', 'Die Gruppe erst ab diesem Tag auf der Webseite anzeigen.');
$GLOBALS['TL_LANG']['tl_shop_category']['stop'] = array('Anzeigen bis', 'Die Gruppe nur bis zu diesem Tag auf der Webseite anzeigen.');

/**
 * References
 **/
$GLOBALS['TL_LANG']['tl_shop_category']['type_ref']['category'] = array('Standard-Gruppe');
$GLOBALS['TL_LANG']['tl_shop_category']['type_ref']['redirect'] = array('Weiterleitung');
$GLOBALS['TL_LANG']['tl_shop_category']['type_ref']['page']     = array('Seite');