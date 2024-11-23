<?php

namespace App\Http\Controllers;

use App\DTO\CreateDriverUserDTO;
use App\DTO\UpdateDriverUserDTO;
use App\Http\Requests\DriverUserRequest;
use App\Http\Resources\DriverUserResource;
use App\Services\DriverUserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DriverController extends Controller
{
    public function __construct(
        protected DriverUserService $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = $this->service->paginate(
            $request->get('page', 1),
            $request->get('per_page', 10),
            $request->filter
        );

        return DriverUserResource::collection($result->items())->additional([
            'total' => $result->total(),
            'current_page' => $result->currentPage()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverUserRequest $request)
    {
        return new DriverUserResource($this->service->create(CreateDriverUserDTO::makeFromRequest($request)));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$result = $this->service->findById($id)) return response()->json([], Response::HTTP_NOT_FOUND);
        return new DriverUserResource($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverUserRequest $request)
    {
        return new DriverUserResource($this->service->update(UpdateDriverUserDTO::makeFromRequest($request)));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$this->service->findById($id)) {
            return response()->json(['error' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
