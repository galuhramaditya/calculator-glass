<?php

namespace App\Http\Controllers;

use App\Services\MaterialService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    private $materialService;
    use ApiResponse;

    public function __construct(MaterialService $materialService)
    {
        $this->materialService = $materialService;
    }

    public function data(Request $request)
    {
        try {
            $get = $this->materialService->get($request->all());
            return $get;
        } catch (\Throwable $e) {
            return $this->sendErrorResponse("failed to get material datas", ["error" => "something error"]);
        }
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:material,name",
            "valor_per_ton" => "required|numeric"
        ]);

        try {
            $create = $this->materialService->create($request->all());
            return $this->sendSuccessResponse("create material successfully", $create);
        } catch (\Throwable $e) {
            return $this->sendErrorResponse("create material failed", ["error" => "something error"]);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "id" => "required",
            "name" => "required|unique:material,name," . $request->id,
            "valor_per_ton" => "required|numeric"
        ]);

        try {
            $update = $this->materialService->update($request->all());
            return $this->sendSuccessResponse("update material successfully", $update);
        } catch (\Throwable $e) {
            return $this->sendErrorResponse("update material failed", ["error" => "something error"]);
        }
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            "id" => "required",
            "name" => "required"
        ]);

        try {
            $delete = $this->materialService->delete($request->all());
            return $this->sendSuccessResponse("delete material successfully", $delete);
        } catch (\Throwable $e) {
            return $this->sendErrorResponse("delete material failed", ["error" => "something error"]);
        }
    }
}
