<?php

namespace Trips\Repositories;

interface TripsRepositoryInterface
{
    public function allData();

    public function getDataId($id);

    public function saveData($request, $id = null);

    public function deleteData($id);
}
