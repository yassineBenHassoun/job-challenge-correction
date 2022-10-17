<?php


/**
 * BoHelp manage Help page
 */
class BoHelp 
{
     
    /**
     * getText
     *
     * @param  mixed $lanCode
     * @return $result htlm string
     */
    public static function getText($lanCode)  {
        $result = '';

        if ($lanCode == 37) {
            $Titre1 = "Aide";
            $Ligne1 = "La base de données Unisciences regroupe des informations scientifiques sur l'ensemble des unités et des collaborateurs rattachés à l'Université de Lausanne.";
            $Ligne2 = "La saisie est décentralisée et de l'entière responsabilité des utilisateurs UNIL. Ceci explique l'hétérogénéité des informations mises à disposition.";
        } else {
            $Titre1 = "Help";
            $Ligne1 = "UniScience data-base contains scientific information relating to all disciplines and collaborators connected with the University of Lausanne.";
            $Ligne2 = "Data entry is decentralised and entirely the responsibility of UNIL users. This explains the heterogenous nature of the entries.";
        }

        $result .= "<h1> $Titre1 </h1>\n";
        $result .= "<p>  $Ligne1 </p>\n";
        $result .= "<p>  $Ligne2 </p>\n";
        $result .= "<br /><img src=\"/images/unisciences.png\" border=\"0\" alt=\"Unisciences\" />\n";
        $result .= "</table>\n";
        return $result;
    }
}