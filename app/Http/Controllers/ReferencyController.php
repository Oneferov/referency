<?php

namespace App\Http\Controllers;

use App\Repositories\ReferencyRepository;
use App\Http\Resources\ReferencyResource;


class ReferencyController extends Controller
{
    public function __construct(protected ReferencyRepository $referencyRepository)
    {
    }

    public function index()
    {
        $models = $this->referencyRepository->getAllParents();

        return ReferencyResource::collection($models);
    }
}
