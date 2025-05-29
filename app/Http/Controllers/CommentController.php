<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    protected $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    public function add(CommentRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->service->add($request);
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
