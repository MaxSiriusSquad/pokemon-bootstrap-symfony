<?php

namespace App\Model;

class PokemonModel {

    private $pokemons;

    /*
        Notre constructeur nous sert a initialiser les données nécessaires à la construction de notre classe.
        Dans notre cas nous avons des données dites en "dur" , celles-ci sont nécessaire pour le bon fonctionnement de mon model.
        Dans cette logique, j'initialiserai plutot alors mes données dans la methode construct plutot que directement dans la propriété.
    */
    public function __construct()
    {
        $this->pokemons = [
            [
                'number' => '#1',
                'name' => 'Bulbizarre',
                'type' => 'plante',
                'description' => 'Il a une étrange graine plantée sur son dos. Elle grandit avec lui depuis sa naissance. Il peut survivre plusieurs jours sans manger. Le bulbe de son dos enmagasine de l\'énergie.',
                'pokeball' => 'pokeball.png',
                'image' => 'bulbizarre.png',
                'cry' => "bulbizarre.ogg",
                'feature' => 'Ah ! Ce pokemon serait un très bon choix !',
                'chen_reaction' => 'prof-chen-satisfait.jpg'
            ],
            [
                'number' => '#4',
                'name' => 'Salamèche',
                'type' => 'feu',
                'description' => 'Il préfère les endroits chauds. En cas de pluie, de la vapeur se forme autour de sa queue. La flammèche au bout de sa queue émet un son crépitant audible seulement dans un endroit calme.',
                'pokeball' => 'pokeball.png',
                'image' => 'salameche.png',
                'cry' => "salameche.ogg",
                'feature' => 'Ah ! Ce pokemon serait un très bon choix !',
                'chen_reaction' => 'prof-chen-satisfait.jpg',
            ],
            [
                'number' => '#7',
                'name' => 'Carapuce',
                'type' => 'eau',
                'description' => 'Son dos durcit avec l\'âge et devient une super carapace. Il peut cracher des jets d\'écume. Caché sous l\'eau, il crache un jet d\'eau sur sa proie et se cache à l\'intérieur de sa coquille.',
                'pokeball' => 'pokeball.png',
                'image' => 'carapuce.png',
                'cry' => "carapuce.ogg",
                'feature' => 'Ah ! Ce pokemon serait un très bon choix !',
                'chen_reaction' => 'prof-chen-satisfait.jpg'
            ],
            [
                'number' => '#25',
                'name' => 'Pikachu',
                'type' => 'electrik',
                'description' => 'Quand plusieurs de ces Pokémon se réunissent, ils provoquent de gigantesques orages. Sa queue est dressée quand il est aux aguets. Si vous tirez dessus, il vous mordra.',
                'pokeball' => 'pokemon-mystere.png',
                'image' => 'pikachu.png',
                'cry' => "pikachu.ogg",
                'feature' => 'Ah ! Celui-ci ne fait pas partie du choix que je te propose ! Il a en quelque sorte un petit problème : il ne veut plus entrer dans sa pokeball... Cela dit, si tu le veux vraiment, il est à toi !',
                'chen_reaction' => 'prof-chen-gene.jpg'
            ]
        ];
    }

    /*
        getPokemons va me permettre de retourner la totalité des données  = equivalent au findAll()
    */
    public function getPokemons(){
        return $this->pokemons;
    }

    /*
        getPokemonByIndex va me permettre de retourner un pokemon via son id => findBy
    */
    public function getPokemonByIndex($id){
        if(!isset($this->pokemons[$id])){
            return null;
        }
        // Permet de retourner un flux de fichier == téléchargement par le navigateur soit sous forme de ressource soit lu par le navigateur
        return $this->pokemons[$id];
    }

}