<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\members\CreateRequest;
use App\Http\Requests\members\UpdateRequest;
use App\Services\Action\members\IndexAction;
use App\Http\Resources\member\MemberResource;
use App\Services\Action\members\CreateAction;
use App\Services\Action\members\DeleteAction;
use App\Services\Action\members\UpdateAction;
use App\Services\DTO\members\CreateRequestDTO;
use App\Services\DTO\members\UpdateRequestDTO;
use App\Http\Resources\member\MemberResourceCollection;

class MembersController extends Controller
{
    public function __construct(
        public CreateAction  $createAction,
        public IndexAction  $indexAction,
        public UpdateAction  $updateAction,
        public DeleteAction  $deleteAction
    ) {}

    public function create(CreateRequest $createRequest): MemberResource
    {
        $dto = CreateRequestDTO::fromRequest($createRequest);

        $data = $this->createAction->run($dto);

        return new MemberResource($data);
    }

    public function index(IndexRequest $indexRequest): MemberResourceCollection
    {
        $data = $this->indexAction->run($indexRequest->getParentId());

        return new MemberResourceCollection($data);
    }

    public function update(UpdateRequest $updateRequest): bool
    {
        $dto = UpdateRequestDTO::fromRequest($updateRequest);

        return $this->updateAction->run($dto);
    }

    public function delete(int $id): bool
    {
        return $this->deleteAction->run($id);
    }

}
