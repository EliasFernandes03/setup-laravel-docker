<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\PetService;
use App\Models\Pet;
use App\Exception\ResourceNotFoundException;
use App\Http\Response\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PetsApiController extends Controller
{
    public function __construct(
        private PetService $service
    ) {}

    public function getList(): JsonResponse
    {
        return new JsonResponse(
            $this->service->findAll()
        );
    }

    public function add(Request $request): JsonResponse
    {
        $pet = new Pet();
        $pet->name = $request->get('name');
        $pet->type = $request->get('type');
        $pet->weight = $request->get('weight');

        $pet->save();

        return new JsonResponse($pet, Response::HTTP_CREATED);
    }

    public function getOne(string $id): JsonResponse
    {
        try {
            return new JsonResponse(
                $this->service->find((int) $id)
            );
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
        
    }
}
