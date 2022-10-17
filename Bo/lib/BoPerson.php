<?php

/**
 * BoPerson manage Person page
 */
class BoPerson
{
    /**
     * @return array $result list person
     * list of all persons from json file 
     */
    public static function getListPersons () {

        $persons = (new SySQLStmt("./data/unpers.json"))->GetArray();
        $result = [];

        if(!empty($persons)) {

            foreach (range('A', 'Z') as $char) {    
                foreach ($persons as $person) {
                    $first = mb_substr($person['pernom'], 0, 1);
                    $firstCaratPerson = self::letterVerification($first);

                    if($char == $firstCaratPerson) {

                        $result[$char][] = $person;
                    }
                }
            }
        }
        return $result;
    }
    /**
     * letterVerification Transform specific caracters on Upper Letter
     *
     * @param  string $letter one string expected
     * @return void
     */
    private static  function letterVerification ($letter) {

        $result = "";

        if (strlen($letter) == 1) {

            $unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
    
            $transform = strtoupper(strtr( $letter, $unwanted_array ));
            
            if (!empty($transform)) {
                $result = $transform;
    
            } else {
                $result = strtoupper($letter);
            }

        }

        return $result;
    }
    /**
     * @return @result string html
     * Generate links with alphabet  
     * 
     * */ 
    private static function generateLinkAlpha () {
    
        $result =  "<h1>" . SyGetTexte::GetLibelle(6) . "</h1>\n";
        $listLetter = "";
        $i = 0;
        foreach (range('A', 'Z') as $lettre) {
            if ($i != 0) {
                $listLetter .= " | ";
            }
            $listLetter .=  '<a href="#'. $lettre. '"' . '\" class="abc">' . $lettre . "</a>\n";
            $i++;
        }       
        $addDivIdLetter = '<div id="list-alpha">'. $listLetter . '</div>';
        $result .= $addDivIdLetter;
        return $result;
    }
   
    /**
     * getText
     *
     * @return $result page for heading list of persons
     */
    public static function getText() {

        $persons = self::getListPersons();
        $alpha = self::generateLinkAlpha();
        $result = "";

        foreach(array_keys($persons) as $key) {

            $table = '<table width="100%" border="0" cellspacing="0" cellpadding="2" style="margin-top: 8px; " summary="Liste de personnes dont le nom commence par la lettre '. $key . '">';
            $table .= '<tbody><tr>';
            $table .=  '<td valign="top" class="table_first_title" width="209">'. SyGetTexte::GetLibelle(8) .'<a name="' . $key . '"></a></td>';
            $table .=  '<td valign="top" class="table_second_title" width="345">' . SyGetTexte::GetLibelle(9). '</td>';

            foreach($persons[$key] as $val) {

                if(isset($val['pernom']) && isset($val['perprenom']) && $val['fonnom']) {

                $values   =  '</tr>';
                $values  .=  '<tr><td valign="top" class="bottomdashed2">' .$val['pernom'] . ' ' .  $val['perprenom'] .' </td>';
                $values  .=  '<td valign="top" class="bottomdashed2">'. $val['fonnom'] . ' </td></tr>';
                $table .= $values;

                }
            }
            $table .= '</tbody></table>';
            $table .= '<p align="right"><a href="#Top"><img src="/images/up_button.gif" width="25" height="23" border="0" alt="Pour remonter"></a></p>';
            $result .= $table;
        }
      
       $alpha  .= $result;
       return  $alpha;  
    }
}