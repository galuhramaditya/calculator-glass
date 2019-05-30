<?php

namespace App\Services;

use App\Models\Material;
use App\Traits\DataLayer;

class MaterialService
{
    use DataLayer;

    public function get(array $data)
    {
        return Material::where($data)->get();
    }

    public function create(array $data)
    {
        $create = $this->passingData(["name", "valor_per_ton"], $data);
        return Material::create($create);
    }

    public function update(array $data)
    {
        $update = $this->passingData(["name", "valor_per_ton"], $data);
        return Material::find($data["id"])->update($update);
    }

    public function delete(array $data)
    {
        $delete = $this->passingData(["name", "id"], $data);
        return Material::where($delete)->delete();
    }
}
