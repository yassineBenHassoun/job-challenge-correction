<?php

/**
 * BoResume Manage Resume page 
 */
class BoResume 
{
    /**
     * getText
     * @param  mixed $texteId
     * @param  mixed $lanCode
     * @return $text html for heading resume page 
     */
    public static function getText($texteId, $lanCode = 37) {

        // *** SIMULATED SQL QUERY ***
        $texts = [
            511 => "<h1>Unisciences en bref</h1>
                    <h2>Unisciences, qu'est-ce que c'est ?</h2><p>Unisciences est une base de données internet consultable 24 heures sur 24.<br> Vitrine de l'Université de Lausanne, fenêtre ouverte sur le monde, elle présente l'ensemble des unités de recherche, ainsi que les noms de tous les collaborateurs et collaboratrices scientifiques.</p>
                    <h2>Des équipes ...</h2>
                    <p>L'Université de Lausanne compte plus de 140 unités de recherche, regroupées au sein de sept Facultés. Les équipes qui les composent travaillent dans des domaines aussi divers que la numismatique grecque, le cybermarketing ou la biologie du développement. Tous ces instituts, centres spécialisés, services hospitaliers, départements et groupes de recherche sont répertoriés dans la base de données Unisciences.</p>
                    <h2>... des femmes et des hommes</h2>
                    <p>Au sein de ces instituts, laboratoires et bibliothèques, 2000 personnes, dont 500 professeur-e-s, travaillent jours après jours sur des projets de recherche de portée nationale ou internationale.<br> L'UNIL est une université humaine, riche surtout des individualités qui la composent. C'est ce potentiel extraordinaire qu'Unisciences vous présente.</p>
                    "
        ];
        if(key_exists($texteId, $texts)){
            $text = $texts[$texteId];
        }else{
            $text = $texteId;
        }
        return $text;
        // *** SIMULATED SQL QUERY ***
    }
}

