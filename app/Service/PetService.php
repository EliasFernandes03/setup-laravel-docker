<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Pet;
use App\Exception\ResourceNotFoundException;

class PetService
{
    public function findAll(): iterable
    {
        return Pet::all();
    }

    public function find(int $id): Pet
    {
        $pet = Pet::find($id);

        if (!$pet) {
            throw new ResourceNotFoundException();
        }

        return $pet;
    }
}