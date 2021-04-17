<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

define('BOX_CONFIGURATION_601', 'Boxen-Steuerung');
define('TPL_CONF_PAGEINFO', '<strong>Auf dieser Seite k&ouml;nnen Sie die im Template/Frontend eingeblendeten Boxen nach Bedarf deaktivieren und auch wieder aktivieren.</strong><br><br>Bei aktivierter Einstellung "Nein" wird die Box nicht mehr in Ihr Template eingebunden und folglich auch nicht mehr vom Shop ausgef&uuml;hrt. Dies ist deutlich perfomanter als der allgemein &uuml;bliche Weg, bei dem man stattdessen die Smarty-Variable nach folgendem Schema auskommentiert: {*$box_BEISPIEL*}<br><br>Es empfiehlt sich auch, Boxen zu deaktivieren, die nicht angezeigt werden, weil die Voraussetzungen nicht erf&uuml;llt werden, wie z. B. die Box "W&auml;hrungen", wenn man beispielsweise nur Euro als W&auml;hrung anbietet, oder bei einsprachigen Shops die Box "Sprache". Denn dann wird auch der Code nicht geladen, welcher die Voraussetzung zur Anzeige der Box pr&uuml;ft.');
define('TPL_BOX_STANDARD_DESCRIPTION', 'M&ouml;chten Sie die Box &raquo;%s&laquo; im Frontend anzeigen lassen?');
define('TPL_BOX_CATEGORIES_TITLE', 'Kategorien');
define('TPL_BOX_CATEGORIES_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_CATEGORIES_TITLE).' Diese Box ist grunds&auml;tzlich wichtig, damit Ihr Kunde im Shop navigieren kann. Haben Sie aber z. B. nur eine Kategorie mit wenigen Produkten - und diese auf der Startseite verlinkt - kann es sich durchaus empfehlen, diese Box zu deaktiveren.');
define('TPL_BOX_MANUFACTURERS_TITLE', 'Hersteller-Liste');
define('TPL_BOX_MANUFACTURERS_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_MANUFACTURERS_TITLE).' In dieser Box werden alle Hersteller aufgelistet, welche aktivierte Produkte in Ihrem Shop haben. Beim Klick auf den jeweiligen Hersteller-Namen in der Liste wird die jeweilige Hersteller-&Uuml;bersichtsseite ge&ouml;ffnet.');
define('TPL_BOX_LAST_VIEWED_TITLE', 'Zuletzt angesehen');
define('TPL_BOX_LAST_VIEWED_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_LAST_VIEWED_TITLE).' Hier wird der/dem Kundin/Kunden der zuletzt besuchte Artikel angezeigt, um ihr/ihm die Option zu bieten, zur entsprechenden Artikelseite zur&uuml;ck zu wechseln.');
define('TPL_BOX_SEARCH_TITLE', 'Suche');
define('TPL_BOX_SEARCH_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_SEARCH_TITLE).' Sie wird oben rechts oberhalb des Warenkorbes angezeigt und erm&ouml;glicht, mit wenigen Schlagworten nach Produkten zu suchen.');
define('TPL_BOX_CONTENT_TITLE', 'Mehr &uuml;ber...');
define('TPL_BOX_CONTENT_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_CONTENT_TITLE).' Hier und in der Box "Informationen" sind all Ihre wichtigen Contentseiten (z. B. AGB, Datenschutzerkl&auml;rung, Impressum, u. v. m.) verlinkt.');
define('TPL_BOX_INFORMATION_TITLE', 'Informationen');
define('TPL_BOX_INFORMATION_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_INFORMATION_TITLE).' Hier und in der Box "Mehr &uuml;ber..." sind all Ihre wichtigen Contentseiten (z. B. AGB, Datenschutzerkl&auml;rung, Impressum, u. v. m.) verlinkt.');
define('TPL_BOX_NEWSLETTER_TITLE', 'Newsletter');
define('TPL_BOX_NEWSLETTER_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_NEWSLETTER_TITLE).' Kunden, die regelm&auml;&szlig;ig von Ihnen &uuml;ber Ihre Angebote und Neuheiten informiert werden wollen, k&ouml;nnen hier ihre E-Mailadresse eintragen und landen somit in Ihrem Verteiler.');
define('TPL_BOX_TRUSTEDSHOPS_TITLE', 'Trusted Shops');
define('TPL_BOX_TRUSTEDSHOPS_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_TRUSTEDSHOPS_TITLE).' Es wird das Trusted Shops Bewertungs-Widget angezeigt, &uuml; ber welches Ihre Kunden einsehen k&ouml;nnen, wie viele Bewertungen Sie hier bereits erhalten haben und wie Ihr Bewertungsdurchschnitt lautet. Es wird ein Konto bei Trusted Shops ben&ouml;tigt.');
define('TPL_BOX_QUICKIE_TITLE', 'Schnellkauf');
define('TPL_BOX_QUICKIE_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_QUICKIE_TITLE).' Sie eignet sich eigentlich nur, wenn Sie einen Artikel-Katalog anbieten und die enthaltenen Angebote mit Artikelnummer einsehbar sind. Die Artikelnummern kann Ihr Kunde dann in das Input-Feld f&uuml;r eintragen und per Button direkt in den Warenkorb legen.');
define('TPL_BOX_MISCELLANEOUS_TITLE', 'Zahlungsm&ouml;glichkeiten');
define('TPL_BOX_MISCELLANEOUS_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_MISCELLANEOUS_TITLE).' Informieren Sie Ihre Kunden ganz einfach &uuml;ber die m&ouml;glichen Zahlungsweisen, die Sie in Ihrem Shop anbieten. Legen Sie hierzu einfach einen Content im Content-Manager an und weisen ihn unter dem Reiter "Texte" dieser Box zu.');
define('TPL_BOX_LANGUAGES_TITLE', 'Sprachen');
define('TPL_BOX_LANGUAGES_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_LANGUAGES_TITLE).' Sofern Sie Ihren Shop einsprachig f&uuml;hren, k&ouml;nnen Sie diese Box pauschal deaktivieren, um den Shop davon abzuhalten, unn&ouml;tig PHP-Code auszuf&uuml;hren, welcher die Voraussetzung zur Anzeige &uuml;berpr&uuml;ft.');
define('TPL_BOX_INFOBOX_TITLE', 'Info-Box');
define('TPL_BOX_INFOBOX_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_INFOBOX_TITLE).' In dieser wird die jeweilige Kundengruppe angezeigt.');
define('TPL_BOX_LOGIN_TITLE', 'Login');
define('TPL_BOX_LOGIN_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_LOGIN_TITLE).' Sie erm&ouml;glicht einen Login &uuml;ber jede x-beliebige Seite, auf der sie angezeigt wird. Wenn Sie diese Box deaktivieren, kann sich Ihr Kunde weiterhin &uuml;ber den Link im Header des Shops anmelden. In diesem Fall erfolgt der Login &uuml;ber eine entsprechende Login-Seite.');
define('TPL_BOX_SHOPPING_CART_TITLE', 'Warenkorb');
define('TPL_BOX_SHOPPING_CART_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_SHOPPING_CART_TITLE).' Hier sieht Ihr Kunde auf einem Blick, welche Artikel er im Warenkorb hat und kann &uuml;ber entsprechende Verlinkungen direkt zur Warenkorb-Seite oder in den Checkout wechseln. Ferner kann er &uuml;ber die &Uuml;bersicht der Box auch Artikel wieder aus dem Warenkorb l&ouml;schen.');
define('TPL_BOX_WISHLIST_TITLE', 'Merkzettel');
define('TPL_BOX_WISHLIST_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_WISHLIST_TITLE).' Ist das entsprechende Modul hierzu installiert und aktiv, wird der Merkzettel direkt neben der Box "Warenkorb" angezeigt. Auf dem Merkzettel k&ouml;nnen Sie/Ihre Kunden w&auml;hrend des Shopbesuchs Artikel speichern und diese beim n&auml;chsten Besuch sofort wieder finden.');
define('TPL_BOX_WHATSNEW_TITLE', 'Neue Artikel');
define('TPL_BOX_WHATSNEW_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_WHATSNEW_TITLE).' Die Box wird nur angezeigt, wenn unter dem Reiter "Einstellungen" bei "Neue-Artikel im Kategoriebaum" die Einstellung "Nein" ausgew&auml;hlt wurde.');
define('TPL_BOX_SPECIALS_TITLE', 'Angebote');
define('TPL_BOX_SPECIALS_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_SPECIALS_TITLE).' Die Box wird nur angezeigt, wenn unter dem Reiter "Einstellungen" bei "Angebote im Kategoriebaum" die Einstellung "Nein" ausgew&auml;hlt wurde.');
define('TPL_BOX_CURRENCIES_TITLE', 'W&auml;hrungen');
define('TPL_BOX_CURRENCIES_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_CURRENCIES_TITLE).' &Uuml;ber ein Dropdown kann Ihr Kunde hier zwischen den verschiedenen W&auml;hrungen w&auml;hlen, wenn Sie diese im Shop aktiviert und eingerichtet haben. Bieten Sie nur eine W&auml;hrung an, wird diese Box auch nicht ben&ouml;tigt und sie k&ouml;nnen sie pauschal deaktivieren, um den Shop davon abzuhalten, unn&ouml;tig PHP-Code auszuf&uuml;hren, welcher die Voraussetzung zur Anzeige &uuml;berpr&uuml;ft.');
define('TPL_BOX_ADMIN_TITLE', 'Admin');
define('TPL_BOX_ADMIN_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_ADMIN_TITLE).' Am oben Rand des Shops wird eine Leiste mit verschiedenen Shortcuts in Form von Symbolen angezeigt, von welcher aus Sie schnell zu den wichtigsten Einstellungen wechseln k&ouml;nnen. Manchmal bietet es sich zu Testzwecken an, diese Box zu deaktivieren, um zu simulieren, was Ihr Kunde sieht. Grunds&auml;tzlich sollten Sie diese Box aber aktiviert lassen, um in den Admin-Bereich zu gelangen. Bei dauerhafter Deaktivierung sollten Sie zumindest einen Link in die Favoriten(-Leiste) des Browsers packen.');
define('TPL_BOX_MANUFACTURERS_INFO_TITLE', 'Hersteller-Infobox');
define('TPL_BOX_MANUFACTURERS_INFO_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_MANUFACTURERS_INFO_TITLE).' Sie wird auf der Produktseite angezeigt, wenn dem jeweiligen Produkt ein Hersteller zugeordnet wurde und enth&auml;lt im Titel den Hersteller-Namen und im Contentbereich das ggf. hinterlegte Hersteller-Logo und einen Link zur entsprechenden Hersteller-&Uuml;bersichtsseite.');
define('TPL_BOX_BESTSELLERS_TITLE', 'Bestseller');
define('TPL_BOX_BESTSELLERS_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_BESTSELLERS_TITLE).' Hier werden auf ausgew&auml;hlten Seiten die Bestseller Ihres Shops pr&auml;sentiert. Innerhalb der Kategorien werden nur Bestseller aus dieser angezeigt, auf den anderen Seiten eine Auswahl aus allen Bestsellern Ihres Shop.');
define('TPL_BOX_REVIEWS_TITLE', 'Rezensionen');
define('TPL_BOX_REVIEWS_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_REVIEWS_TITLE).' Rezensionen sind die Produktbewertungen von Kunden in Ihrem Shop. Im Kopf der Box wird auf die Hauptseite f&uuml;r die Rezensionen verlinkt, im Body wird eine zuf&auml;llig ausgew&auml;hlte Bewertung zu einem Produkt angezeigt.');
define('TPL_BOX_ORDER_HISTORY_TITLE', 'Bestell&uuml;bersicht');
define('TPL_BOX_ORDER_HISTORY_DESC', sprintf(TPL_BOX_STANDARD_DESCRIPTION, TPL_BOX_ORDER_HISTORY_TITLE).' Hier werden Ihrem Kunden die zuletzt bestellten Artikel angezeigt. Mittels eines kleinen Warenkob-Buttons hinter dem Produktnamen kann der Artikel erneut zum Warenkorb hinzugef&uuml;gt werden.');
?>