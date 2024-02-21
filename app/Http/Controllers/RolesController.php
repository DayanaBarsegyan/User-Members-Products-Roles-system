<?php

namespace App\Http\Controllers;

use App\Http\Resources\role\RoleResource;
use App\Http\Requests\roles\CreateRequest;
use App\Services\Action\roles\IndexAction;
use App\Http\Requests\roles\UpdateRequest;
use App\Services\Action\roles\UpdateAction;
use App\Services\Action\roles\CreateAction;
use App\Services\Action\roles\DeleteAction;
use App\Http\Resources\role\RoleResourceCollection;

class RolesController extends Controller
{
    public function __construct(
        public CreateAction  $createAction,
        public IndexAction $indexAction,
        public DeleteAction $deleteAction,
        public UpdateAction $updateAction
    ) {}

    public function create(CreateRequest $createRequest): RoleResource
    {
        $role = $this->createAction->run($createRequest->getRole(), $createRequest->getParentId());
        return new RoleResource($role);
    }

    public function index(): RoleResourceCollection
    {
        return new RoleResourceCollection($this->indexAction->run());
    }

    public function delete(int $id): bool
    {
        return $this->deleteAction->run($id);
    }

    public function update(UpdateRequest $updateRequest): bool
    {
        return $this->updateAction->run($updateRequest->getId(), $updateRequest->getRole());
    }
}
