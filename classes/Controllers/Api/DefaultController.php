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
        return "Vous êtes bien sur l'API"; // EN: You are on the API.
    }

    /**
     * @Get /#string
     */
    public function list(string $entityName)
    {
        return json_encode([$entityName => []]);
    }

    /**
     * @Get /#string/#int
     */
    public function detail(string $entityName, int $id)
    {
        return json_encode(['type' => $entityName, 'id' => $id]);
    }

    /**
     * @Post /#string
     */
    public function insert(string $entityName)
    {
        return "Vous avez demandé à créer un(e) $entityName"; // EN: You asked to create a $entityName.
    }

    /**
     * @Patch /#string/#int
     */
    public function update(string $entityName, int $id)
    {
        return "Vous avez demandé à modifier le/la $entityName n°$id"; // EN: You asked to update the $entityName with ID $id.
    }

    /**
     * @Delete /#string/#int
     */
    public function delete(string $entityName, int $id)
    {
        return "Vous avez demandé à supprimer le/la $entityName n°$id"; // EN: You asked to delete the $entityName with ID $id.
    }
}