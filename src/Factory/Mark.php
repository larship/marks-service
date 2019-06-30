<?php

namespace App\Factory;

use DateTime;
use App\Entity\Mark as MarkEntity;
use App\Controller\RequestArgument\CreateMark as CreateMarkRequestArgument;

/**
 * Фабрика для создания меток карты
 *
 * @package App\Factory
 *
 * @author Anton Kovalenko <17798@7733.ru>
 */
class Mark
{
    /**
     * Создаёт сущность MarkEntity из данных запроса
     *
     * @param CreateMarkRequestArgument $request Данные запроса
     *
     * @return MarkEntity
     */
    function createFromRequest(CreateMarkRequestArgument $request)
    {
        $mark = new MarkEntity();
        $mark->setLatitude($request->getLatitude());
        $mark->setLongitude($request->getLongitude());
        $mark->setComment($request->getComment());
//        $mark->setPublicationDate((new DateTime())->format(DateTime::W3C));
//        $mark->setUpdatingDate((new DateTime())->format(DateTime::W3C));
        $mark->setPublicationDate(new DateTime());
        $mark->setUpdatingDate(new DateTime());

        return $mark;
    }
}
