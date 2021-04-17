<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

define('BOX_CONFIGURATION_605', 'Sonstige Einstellungen');
define('TPL_CONF_PAGEINFO', '<strong>Hier k&ouml;nnen Sie verschiedene Template-Verhalten definieren, z. B. ob Produkte in den Produktlisten bzw. auf der Startseite in einer Box oder in einer Liste angezeigt werden sollen.</strong><br><br>Dar&uuml;ber hinaus besteht die M&ouml;glichkeit, von CSS-Buttons zur&uuml;ck auf die Image-Buttons zu wechseln. Au&szlig;erdem kann festgelegt werden, ob f&uuml;r "Neue Artikel" und "Angebote" eine eigene Box angezeigt wird, oder ob diese im Kategoriebaum der Kategorie-Box verlinkt werden sollen. Die Einstellungen Smarty- und HTML-Version sind ggf. f&uuml;r Testzwecke geeignet, sollten also nicht unbedacht ver&auml;ndert werden.<br><br>Beachten Sie bitte ggf. vorhandene Hinweise in den nachstehenden Beschreibungstexten.');
define('TPL_BUTTON_TYPE_TITLE', 'Button-Typ');
define('TPL_BUTTON_TYPE_DESC', 'Entscheiden Sie hier, ob Sie CSS- oder Image-Buttons verwenden wollen. Moderner sind auf jeden Fall die CSS-Buttons. In manchen F&auml;llen hat aber vielleicht noch ein altes Button-Set aus einem anderen Template, von dem man sich nicht m&ouml;chte.');
define('SPECIALS_CATEGORIES_TITLE', '<i>Angebote</i> im Kategoriebaum');
define('SPECIALS_CATEGORIES_DESC', 'M&ouml;chten Sie einen Link zu Ihren (Sonder-)Angeboten mit im Kategoriebaum der Kategoriebox aufnehmen? Bei "Nein" erscheinen Ihre Angebote in einer eigenen Box, sofern diese im Reiter "Boxen" aktiviert ist.');
define('WHATSNEW_CATEGORIES_TITLE', '<i>Neue Artikel</i> im Kategoriebaum');
define('WHATSNEW_CATEGORIES_DESC', 'M&ouml;chten Sie einen Link zu Ihren Neuerscheinungen (Neue Artikel) mit im Kategoriebaum der Kategoriebox aufnehmen? Bei "Nein" erscheinen Ihre Neuerscheinungen in einer eigenen Box, sofern diese im Reiter "Boxen" aktiviert ist.');
define('TEMPLATE_ENGINE_TITLE', 'Smarty-Version');
define('TEMPLATE_ENGINE_DESC', 'W&auml;hlen Sie hier zwischen den Smarty-Versionen "smarty_2" oder "smarty_3".<br><br><strong>Bitte beachten Sie:</strong> Nur "smarty_3" unterst&uuml;tzt die custom-Sprachdateien (lang_english.custom & lang_german.custom) im Template-Ordner /lang/. Bei einer Umschaltung auf smarty_2 werden die hierin enthaltenen Sprach-Konstanten im Shop nicht mehr angezeigt.');
define('TEMPLATE_HTML_ENGINE_TITLE', 'HTML-Version');
define('TEMPLATE_HTML_ENGINE_DESC', 'W&auml;hlen Sie hier zwischen den HTML-Versionen "html5" oder "xhtml".<br><br><strong>Bitte beachten Sie:</strong> Die Einstellung "xhtml" dient nur Testzwecken oder wenn Sie bewusst xhtml-Elemente nutzen. Standard- und zeitgem&auml;&szlig wird heutzutage i. d. R. nur noch "html5" verwendet.');
define('PRODUCT_LIST_BOX_CUSTOM_TITLE', 'Artikel-Darstellung: Produktlisten');
define('PRODUCT_LIST_BOX_CUSTOM_DESC', '<strong>Ja</strong> zeigt Artikel in den Produktlisten einer Kategorie in der Box-Ansicht, <strong>Nein</strong> zeigt sie in einer Listen-Ansicht. Betrachten Sie dies lediglich als Standard-Einstellung: Schaltet ein/e Nutzer/in die Ansicht &uuml;ber die daf&uuml;r vorgesehenen Buttons im Frontend des Shops um, gilt diese Auswahl w&auml;hrend ihrer/seiner Sitzung (also nur f&uuml;r sie/ihn) als Master-Einstellung.');
define('PRODUCT_LIST_BOX_STARTPAGE_TITLE', 'Artikel-Darstellung: Startseite');
define('PRODUCT_LIST_BOX_STARTPAGE_DESC', '<strong>Ja</strong> zeigt Artikel auf der Startseite in der Box-Ansicht, <strong>Nein</strong> zeigt sie in einer Listen-Ansicht. Diese Einstellung ist unabh&auml;ngig von get&auml;tigten Kunden-Einstellungen. (vgl. Beschreibungstext "Artikel-Darstellung: Produktlisten")');
define('PRODUCT_INFO_BOX_TITLE', 'Artikel-Darstellung: Produkt-Seite');
define('PRODUCT_INFO_BOX_DESC', '<strong>Ja</strong> zeigt Artikel auf der Produktseite f&uuml;r die Module Cross-Selling-, Reverse-Cross-Selling- & Also-Purchased-Artikel in der Box-Ansicht, <strong>Nein</strong> zeigt sie in einer Listen-Ansicht. Diese Einstellung ist unabh&auml;ngig von get&auml;tigten Kunden-Einstellungen. (vgl. Beschreibungstext "Artikel-Darstellung: Produktlisten")');
define('THEME_COLOR_TITLE', 'Farbschema (Theme)');
define('THEME_COLOR_DESC', 'Legen Sie hier die Farbgebung des Templates fest. Die &Auml;nderungen werden erst nach L&ouml;schen des Templates-Caches sichtbar!');
?>