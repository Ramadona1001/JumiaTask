<?php

namespace Stations\Repositories;

interface StationsRepositoryInterface
{
    public function allData();

    public function getDataId($id);

    public function saveData($request, $id = null);

    public function deleteData($id);
}
