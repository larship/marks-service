<?php

namespace App\Controller;

use App\Factory\Mark as MarkFactory;
use App\Service\Mark as MarkService;
use App\Controller\RequestArgument\CreateMark as CreateMarkRequestArgument;
use App\Controller\RequestArgument\GetMarkById as GetMarkByIdRequestArgument;
use App\Controller\RequestArgument\UpdateMark as UpdateMarkRequestArgument;
use App\Controller\RequestArgument\DeleteMark as DeleteMarkRequestArgument;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MarksController
{
    use ValidatableControllerTrait;

    protected SerializerInterface $serializer;

    private MarkService $markService;

    private MarkFactory $markFactory;

    public function __construct(SerializerInterface $serializer, MarkService $markService, MarkFactory $markFactory)
    {
        $this->serializer = $serializer;
        $this->markService = $markService;
        $this->markFactory = $markFactory;
    }

    #[Route("/create", "mark_create")]
    public function create(CreateMarkRequestArgument $request): JsonResponse
    {
        $this->validate($request);

        $markDto = $this->markFactory->createDTO(
            null,
            $request->getLatitude(),
            $request->getLongitude(),
            $request->getComment(),
            new \DateTimeImmutable(),
            new \DateTimeImmutable()
        );
        $this->markService->saveMark($markDto);

        return $this->jsonResponse($markDto);
    }

    #[Route("/get-by-id", "mark_get_by_id")]
    public function getById(GetMarkByIdRequestArgument $request): JsonResponse
    {
        $this->validate($request);

        $markDto = $this->markService->findMark($request->getId());

        return $this->jsonResponse($markDto);
    }

    #[Route("/get-list", "mark_get_list")]
    public function getList(): JsonResponse
    {
        return $this->jsonResponse($this->markService->findAll());
    }

    #[Route("/update", "mark_update")]
    public function update(UpdateMarkRequestArgument $request): JsonResponse
    {
        $this->validate($request);

        $markDto = $this->markFactory->createDTO(
            $request->getId(),
            $request->getLatitude(),
            $request->getLongitude(),
            $request->getComment()
        );

        $this->markService->updateMark($markDto);

        return $this->jsonResponse($markDto);
    }

    #[Route("/delete", "mark_delete")]
    public function delete(DeleteMarkRequestArgument $request): JsonResponse
    {
        $this->validate($request);

        $status = $this->markService->deleteMark($request->getId());

        return $this->jsonResponse($status);
    }

    private function jsonResponse($data): JsonResponse
    {
        return new JsonResponse($this->serializer->serialize($data, 'json'), 200, [], true);
    }
}
