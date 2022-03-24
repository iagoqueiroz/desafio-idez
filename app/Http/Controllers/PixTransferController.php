<?php

namespace App\Http\Controllers;

use App\Models\PixTransfer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePixTransferRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class PixTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pixTransfers = PixTransfer::where('user_id', Auth::id())->get();

        return new JsonResponse($pixTransfers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePixTransferRequest $request
     */
    public function store(StorePixTransferRequest $request)
    {
        $validated = $request->validated();

        $pixTransfer = PixTransfer::create([
            ...$validated,
            'user_id' => Auth::id()
        ]);

        return new JsonResponse($pixTransfer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param PixTransfer $pixTransfer
     */
    public function show(PixTransfer $pixTransfer)
    {
        $response = Gate::inspect('show', $pixTransfer);

        if ($response->allowed()) {
            return new JsonResponse($pixTransfer);
        }

        return new JsonResponse(['message' => 'Not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PixTransfer $pixTransfer
     */
    public function destroy(PixTransfer $pixTransfer)
    {
        //
    }
}
