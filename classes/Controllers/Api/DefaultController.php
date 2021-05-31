<?php

namespace Controllers\Api;

/**
 * @Route /api
 */
class DefaultController
{
    /**
     * @Get /
     */
    public function info()
    {
        return "Vous êtes bien sur l'API";
    }

    /**
     * @Get /#string
     */
    public function list(string $entityName)
    {
        return "Vous avez demandé tous les $entityName";
    }

    /**
     * @Get /#string/#int
     */
    public function detail(string $entityName, int $id)
    {
        return "Vous avez demandé le/la $entityName n°$id";
    }

    /**
     * @Post /#string
     */
    public function insert(string $entityName)
    {
        return "Vous avez demandé à créer un(e) $entityName";
    }

    /**
     * @Patch /#string/#int
     */
    public function update(string $entityName, int $id)
    {
        return "Vous avez demandé à modifier le/la $entityName n°$id";
    }

    /**
     * @Delete /#string/#int
     */
    public function delete(string $entityName, int $id)
    {
        return "Vous avez demandé à supprimer le/la $entityName n°$id";
    }
}