<?php

require_once("BoHelp.php"); 
require_once("BoUnit.php"); 
require_once("BoPerson.php"); 



/**
 * BoPage Manage all heading related of the website 
 */
class BoPage {
    
    /**
     * homepage
     *
     * @return html homepage 
     */
    public static function homepage () {

        $hp  =  '<td valign="top" width="100%">';
        $hp .= '<img src="/images/image_unisciences_homepage.jpg" border="0" width="100%"';
        $hp .= 'alt="Photo ambiance"/>';
        $hp .= '<div style="font-size:15pt; color:#b6b6b6; font-weight: bold;width:100%;text-align:cente">'.  SyGetTexte::GetLibelle(3320) . '</div>';
        $hp .= '</td>';
        
        return $hp;
    } 
    
    /**
     *
     * @param  mixed $page
     * @param  mixed $textId
     * @param  mixed $lanCode
     * @return class Bo relating by heading
     */
    public static function getPage($page, $textId = null, $lanCode = null) {

        if ($page == 'pers') {

            return BoPerson::getText();

        } elseif ($page == 'unit') {

            return BoUnit::getText();

        } elseif ($page == 'aide') {
            // or like website 
            // return  header("Location: https://www.unil.ch/unicom/fr/home/menuinst/prestations/unisciences.html");
            return BoHelp::getText($lanCode);
        } else  {

            return self::homepage();
        }
    }
}