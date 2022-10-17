<?php

/*
 * Nom : index
 * Date : 11.09.2006/ET
 * But : Index d'UniSciences, affiche la page principale, les résultats de recherches
 * ainsi que la liste complète des unités et des personnes
 * Modifié par : Elvis P., le 14.10.2010 Ajout test sur SY_TEST pour Telux
 *               Marilyn M., le 21.02.2011 Ajout cache
 * Auteur : Johnny C.
 */

require_once("../Bo/lib/BoUtil.php");
require_once("../Bo/lib/BoPage.php"); 
require_once("../Bo/lib/BoResume.php"); 
require_once(dirname(__FILE__) . "/../Sy/lib/SySQLStmt.php");
require_once(dirname(__FILE__) . "/../Sy/lib/SyEmail.php");

$LanCode = BoUtil::getRequest('LanCode');

if ($LanCode) {
    $LanCode = (int)$LanCode;
} else {
    $LanCode = 37;
}

require(dirname(__FILE__) . "/lib/Header.php");

// Ecran d'entrée dans UniSciences
if (is_null(BoUtil::getRequest('list'))) { 
    echo  BoPage::homepage();
} // Affichage de la petite photo avec le bandeau à gauche
elseif (!is_null(BoUtil::getRequest('list'))) {
    // Unil en bref
    if (BoUtil::getRequest('list') == 'bref') {
        // Passer directly textId  
        echo BoResume::getText(511 , $LanCode);

    } else {

        echo BoPage::getPage(BoUtil::getRequest('list'), $LanCode);
    }
}
// put here the email management need a connection to the database 
//SyEmail::notPrivateEmail($email);

require(dirname(__FILE__) . "/lib/Footer.php");
?>
