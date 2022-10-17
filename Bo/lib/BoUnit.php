<?php

/**
 * BoUnit manage page unit 
 */
class BoUnit 
{    
    /**
     * getFacs
     *
     * @return array from json facs
     */
    private static function getFacs ()  {
        return (new SySQLStmt("./data/facs.json"))->GetArray();
    }
    
    /**
     * getFacsSpecialties
     *
     * @param  mixed $triId facs triId
     * @return array specialties
     */
    private static function getFacsSpecialties ($triId) {

        $filename = "./data/u".$triId.".json";
        $getData = (new SySQLStmt($filename))->GetArray();

        if(is_array($getData) == true) {

            return $getData;
        }
    }     
    /**
     * getText
     *
     * @return string html page  unit 
     */
    public static function getText() {
        $facs = self::getFacs();

        $headerList  = "<h1>" . SyGetTexte::GetLibelle(7) . "</h1>\n";
        $headerList .=  '<div class="show-hide-all">';
        $headerList .= '<a class="open-all" title="Afficher tout">Afficher tout</a>';
        $headerList .= '<span class="caret"></span>';
        $headerList .= '<a class="close-all" title="Masquer tout">Masquer tout</a>';
        $headerList .= '<span class="dropup"><span class="caret"></span></span>';
        $headerList .= '</div>';
        $accordeon =  '<div class="panel-group unil-accordeon" role="tablist" aria-multiselectable="true">';

        foreach ($facs as $fac) {

            $md5Id = md5($fac['unid']);
            $listUnit  = '';

            $listFac  = '<div class="faq collapsed" id="acchead-' . $md5Id  .'" data-toggle="collapse" data-target="#acc-'.  $md5Id .'" aria-expanded="false">';
            $listFac .= '<span class="nothing"><span class="caret"></span></span>';
            $listFac .= '<span> ' .  $fac['urnom'] . '</span>';
            $listFac .= '</div>';
            $listFac .= '<div id="acc-' . $md5Id . '" class="collapse" aria-expanded="false" style="height: 0px;">';
            $listFac .= '<div class="content-faq">';
            $listFac .= '<div class="content">';


            foreach (self::getFacsSpecialties($fac['tri'])  as $key =>  $unit) {

                $displayUnit = true;
                $isParent = false;
                $unitName =  $unit['urnom'];
                $unitAlias = ' (' . $unit['urlalias'] . ')';
                $unitMaj =  $unit['majf'];
                $unitTri = $unit['tri'];
           
    

                if ($unitMaj == 'f') {
                    // Second niveau
                    $triParent = $unitTri;
                   
                }
        
                if (isset($triParent) && strstr($unitTri, $triParent) != false) {
                    if ($unitTri != $triParent) {
                        $displayUnit = false;
                    } else {
                        $isParent = true;
                    }
                }

                $listUnit = $displayUnit == false ? '<p class="' .  $triParent .'" style="display: none;">' : '<p>';
                if(!$isParent) {

                    $listUnit .= '<span> ' . $unitName . ' ' . $unitAlias . '</span>';

                } else  {
                
                    $listUnit .= '<span class="clickable" onclick="myFunctionText('.$triParent. ')">';
                    $listUnit .= '<span class="nothing">';
                    $listUnit .= '<span class="caret"></span>';
                    $listUnit .= '<span>' . $unitName . ' ' . $unitAlias . '</span>';
                    $listUnit .= '</span>' ;
                    $listUnit .= '<br>';
                   
                }

                $listUnit .= '</p>';
                $listFac .= $listUnit;
            } 
        
            $listFac .= '</div>';
            $listFac .= '</div>';  
            $listFac .= $listUnit ;
            $listFac .= '</div>';
            $accordeon  .=  $listFac;
        }
        
        $headerList .= $accordeon;               
            
        return $headerList;
    }
}