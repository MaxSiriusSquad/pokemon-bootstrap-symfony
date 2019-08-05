<?php

namespace App\Controller;

use App\Model\PokemonModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    public function list()
    {
        $pokemonModel = new PokemonModel();
        $pokemon = $pokemonModel->getPokemons();

        /*
            Pour retourner une response valide au format utilisé par la plupart des API, je peux utiliser la fonction this->json qui permet d'encoder et de mettre les bonnes en-têtes HTTP
        */
        return $this->json($pokemon);
    }
}
