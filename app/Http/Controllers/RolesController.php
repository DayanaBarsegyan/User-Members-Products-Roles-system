<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\roles\CreateRequest;
use App\Services\Action\roles\IndexAction;
use App\Http\Requests\roles\UpdateRequest;
use App\Services\Action\roles\UpdateAction;
use App\Services\Action\roles\CreateAction;
use App\Services\Action\roles\DeleteAction;

class RolesController extends Controller
{
    public function __construct(
        public CreateAction  $createAction,
        public IndexAction $indexAction,
        public DeleteAction $deleteAction,
        public UpdateAction $updateAction
    ) {}

    public function create(CreateRequest $createRequest): Model
    {
        return $this->createAction->run($createRequest->getRole(), $createRequest->getParentId());
    }

    public function index(): Collection
    {
        return $this->indexAction->run();
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
