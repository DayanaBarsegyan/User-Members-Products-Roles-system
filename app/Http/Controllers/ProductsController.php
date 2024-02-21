<?php

namespace App\Http\Controllers;

use App\Http\Requests\products\CreateRequest;
use App\Http\Requests\products\UpdateRequest;
use App\Services\Action\products\IndexAction;
use App\Services\Action\products\UpdateAction;
use App\Services\Action\products\CreateAction;
use App\Services\Action\products\DeleteAction;
use App\Services\DTO\products\CreateRequestDTO;
use App\Services\DTO\products\UpdateRequestDTO;
use App\Http\Resources\product\ProductResourceCollection;

class ProductsController extends Controller
{
    public function __construct(
        public CreateAction  $createAction,
        public DeleteAction $deleteAction,
        public UpdateAction $updateAction,
        public IndexAction $indexAction
    ){}

    public function create(CreateRequest $createRequest):bool
    {
        $dto = CreateRequestDTO::fromRequest($createRequest);
        return $this->createAction->run($dto);
    }

    public function delete(int $id):bool
    {
        return $this->deleteAction->run($id);
    }

    public function update(UpdateRequest $updateRequest):bool
    {
        $dto = UpdateRequestDTO::fromRequest($updateRequest);
        return $this->updateAction->run($dto);
    }

    public function index():ProductResourceCollection
    {
        $data = $this->indexAction->run();

        return new ProductResourceCollection($data);
    }
}
