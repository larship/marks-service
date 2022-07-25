<?php

namespace App\Controller\ArgumentResolver;

use App\Controller\RequestArgument\CreateMark as CreateMarkRequestArgument;
use App\Controller\RequestArgument\GetMarkById as GetMarkByIdRequestArgument;
use App\Controller\RequestArgument\UpdateMark as UpdateMarkRequestArgument;
use App\Controller\RequestArgument\DeleteMark as DeleteMarkRequestArgument;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Generator;

class CommonResolver implements ArgumentValueResolverInterface
{
    private $serializer;

    private $supports = [
        CreateMarkRequestArgument::class,
        GetMarkByIdRequestArgument::class,
        UpdateMarkRequestArgument::class,
        DeleteMarkRequestArgument::class,
    ];

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        if (!in_array($argument->getType(), $this->supports)) {
            return false;
        }

        return true;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): Generator
    {
        yield $this->serializer->deserialize($request->getContent(), $argument->getType(), 'json');
    }
}
