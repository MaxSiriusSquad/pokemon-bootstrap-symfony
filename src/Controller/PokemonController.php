<?php

namespace App\Controller;

use App\Model\PokemonModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PokemonController extends AbstractController
{

    public function list()
    {
        $pokemonModel = new PokemonModel();

        /*
            Il y a 2 façons d'appeler une méthode :

            - $pokemonModel->getPokemons(); = J'appelle la méthode de mon objet instancié grace à un new(), je part avec un postulat de départ ;

            - ou $pokemonModel::getPokemons(); = J'appelle la méthode du fichier PokemonModel, je n'ai donc pas d'instance d'objet, juste un appel en direct de ce qui se trouve dans ce fichier.
        */

        $pokemons = $pokemonModel->getPokemons();

        /*
            $this->render a besoin au minimum de 2 parametres :

            - le nom de la vue à afficher

            - et un tableau qui peux contenir des parametres
        */
        return $this->render('pokemon/list.html.twig', [
            'pokemon_list' => $pokemons
        ]);
    }

    /*
        Pour recuperer l'objet qui gere la session chez Symfony , je dois injecter ma dependance (typehint) SessionInterface precedant la variable qui va recueillir l'objet

        Note: session_start est lui deja géré en interne par Symfony
    */

    public function show($id, SessionInterface $session)
    {
        $pokemonModel = new PokemonModel();

        // Je passe l'id à ma fonction pour pouvoir récupérer les données de mon pokemon
        $pokemon = $pokemonModel->getPokemonByIndex($id);

        /*
            Gestion des erreurs avec le controller : https://symfony.com/doc/current/controller.html#managing-errors-and-404-pages

            Throw permet de lancer une exception et d'interrompre le script
        */
        // throw $this->createNotFoundException('Ce pokemon n\est pas disponible...');

        // J'ajoute des données en session ( key , value)
        $session->set('pokemonname', $pokemon['name'] );

        return $this->render('pokemon/show.html.twig', [
            'pokemon' => $pokemon
        ]);
    }

    public function letsgo(SessionInterface $session)
    {
        $pokemonModel = new PokemonModel();

        $pokemons = $pokemonModel->getPokemons();

        //$lastPokemonSeen = $session->get('pokemonname'); recupere uniquement le parametre
        $lastPokemonSeen = $session->get('pokemonname', 'no pokemons consulted'); //prevoit une valeur par defaut si cette clef dans la session n'est pas encore settée
        return $this->render('pokemon/letsgo.html.twig', [
            'pokemon_list' => $pokemons,
            'lastPokemonSeen' => $lastPokemonSeen
        ]);
    }

}
