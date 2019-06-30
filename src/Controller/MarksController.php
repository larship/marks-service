<?php

namespace App\Controller;

use DateTime;
use Exception;
use App\Dto\Mark as MarkDto;
use App\Entity\Mark as MarkEntity;
use App\Factory\Mark as MarkFactory;
use App\Repository\Mark as MarkRepository;
use App\Controller\RequestArgument\CreateMark as CreateMarkRequestArgument;
use App\Controller\RequestArgument\GetMarkById as GetMarkByIdRequestArgument;
use App\Controller\RequestArgument\UpdateMark as UpdateMarkRequestArgument;
use App\Controller\RequestArgument\DeleteMark as DeleteMarkRequestArgument;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Контроллер метод карты
 *
 * @Route("/")
 *
 * @author Anton Kovalenko <CaribbeanLegend@mail.ru>
 */
class MarksController extends ValidatableController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var MarkFactory
     */
    private $factory;

    /**
     * @var MarkRepository
     */
    private $repository;

    public function __construct(EntityManagerInterface $em, ValidatorInterface $validator, MarkFactory $factory, MarkRepository $repository)
    {
        $this->em        = $em;
        $this->validator  = $validator;
        $this->factory    = $factory;
        $this->repository = $repository;
    }

    /**
     * @Route("/create", name="mark_create")
     */
    public function create(CreateMarkRequestArgument $request)
    {
        $this->validate($request);

        $mark = $this->factory->createFromRequest($request);

        $this->em->persist($mark);
        $this->em->flush();

        return new MarkDto(
            $mark->getId(),
            $mark->getLatitude(),
            $mark->getLongitude(),
            $mark->getComment(),
            $mark->getPublicationDate(),
            $mark->getUpdatignDate()
        );
    }

    /**
     * @Route("/get-by-id", name="mark_get_by_id")
     */
    public function getById(GetMarkByIdRequestArgument $request)
    {
        $this->validate($request);

        $mark = $this->repository->find($request->getId());

        if (empty($mark)) {
            return null;
        }

        return new MarkDto(
            $mark->getId(),
            $mark->getLatitude(),
            $mark->getLongitude(),
            $mark->getComment(),
            $mark->getPublicationDate(),
            $mark->getUpdatignDate()
        );
    }

    /**
     * @Route("/get-list", name="mark_get_list")
     */
    public function getList()
    {
        return new JsonResponse($this->repository->findAll());
    }

    /**
     * @Route("/update", name="mark_update")
     */
    public function update(UpdateMarkRequestArgument $request)
    {
        $this->validate($request);

        if (null === $mark = $this->repository->find($request->getId())) {
            throw new Exception('Can\'t find mark with uid="' . $request->getId() . '"');
        }

        $mark->setLatitude($request->getLatitude());
        $mark->setLatitude($request->getLongitude());
        $mark->setLatitude($request->getComment());
        $mark->setUpdatingDate((new DateTime())->format(DateTime::W3C));

        $this->em->persist($mark);
        $this->em->flush();

        return new MarkDto(
            $mark->getId(),
            $mark->getLatitude(),
            $mark->getLongitude(),
            $mark->getComment(),
            $mark->getPublicationDate(),
            $mark->getUpdatignDate()
        );
    }

    /**
     * @Route("/delete", name="mark_delete")
     */
    public function delete(DeleteMarkRequestArgument $request)
    {
        $this->validate($request);

        $mark = $this->repository->find($request->getId());

        if (!$mark) {
            return false;
        }

        $this->em->remove($mark);
        $this->em->flush();

        return true;
    }
}
