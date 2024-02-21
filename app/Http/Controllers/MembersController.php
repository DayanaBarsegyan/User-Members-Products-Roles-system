<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\members\CreateRequest;
use App\Http\Requests\members\UpdateRequest;
use App\Services\Action\members\CreateAction;
use App\Services\Action\members\DeleteAction;
use App\Services\Action\members\IndexAction;
use App\Services\Action\members\UpdateAction;
use App\Services\DTO\members\CreateRequestDTO;
use App\Services\DTO\members\UpdateRequestDTO;

class MembersController extends Controller
{
    public function __construct(
        public CreateAction  $createAction,
        public IndexAction  $indexAction,
        public UpdateAction  $updateAction,
        public DeleteAction  $deleteAction
    ) {}

    public function create(CreateRequest $createRequest): JsonResponse
    {
        $dto = CreateRequestDTO::fromRequest($createRequest);

        $data = $this->createAction->run($dto);

        return response()->json($data);
    }

    public function index(IndexRequest $indexRequest): JsonResponse
    {
        $data = $this->indexAction->run($indexRequest->getParentId());

        return response()->json($data);
    }

    public function update(UpdateRequest $updateRequest): JsonResponse
    {
        $dto = UpdateRequestDTO::fromRequest($updateRequest);

        $data = $this->updateAction->run($dto);

        return response()->json($data);
    }

    public function delete(int $id): bool
    {
        return $this->deleteAction->run($id);
    }

}
