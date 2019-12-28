<?php

namespace Controllers\Api;

/**
 * @Route /api
 */
class DefaultController
{
    /**
     * @Route /
     */
    public function info()
    {
        return "Vous êtes bien sur l'API";
    }

    /**
     * @Route /#string
     */
    public function list(string $entityName)
    {
        return "Vous avez demandé tous les : $entityName";
    }

    /**
     * @Route /#string/#int
     */
    public function detail(string $entityName, int $id)
    {
        return "Vous avez demandé le/la $entityName n°$id";
    }

    /**
     * @Route /#string/create
     */
    public function insert(string $entityName)
    {
        return "Vous avez demandé à créer un(e) $entityName";
    }

    /**
     * @Route /#string/update/#int
     */
    public function update(string $entityName, int $id)
    {
        return "Vous avez demandé à modifier le/la $entityName n°$id";
    }

    /**
     * @Route /#string/delete/#int
     */
    public function delete(string $entityName, int $id)
    {
        return "Vous avez demandé à supprimer le/la $entityName n°$id";
    }
}