<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crud;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;

class CrudControllers extends Controller
{
/**
     * @OA\Get(
     *     path="/v1/crud/contact",
     *     summary="Get all contacts",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function get() {
        try {
            $data = Crud::get();
            return response()->json($data, 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }
/**
     * @OA\Post(
     *     path="/v1/crud/contact",
     *     summary="Create a new contact",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nom","prenom","contact"},
     *             @OA\Property(property="nom", type="string"),
     *             @OA\Property(property="prenom", type="string"),
     *             @OA\Property(property="contact", type="string"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function create(Request $re) {
        try {
            $data['nom'] = $re['nom'];
            $data['prenom'] = $re['prenom'];
            $data['contact'] =$re['contact'];
            $res = Crud::create($data);
            return response()->json($res, 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }
  /**
     * @OA\Get(
     *     path="/v1/crud/contact/{id}",
     *     summary="Get contact by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function getById($id) {
        try {
            $data = Crud::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/v1/crud/contact/{id}",
     *     summary="Update contact by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nom","prenom","contact"},
     *             @OA\Property(property="nom", type="string"),
     *             @OA\Property(property="prenom", type="string"),
     *             @OA\Property(property="contact", type="string"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
 
    public function update(Request $re, $id) {
        try {
            $crud = Crud::find($id);

            if (!$crud) {
                return response()->json(['error' => 'Resource not found'], 404);
            }

            $crud->nom = $re['nom'];
            $crud->prenom = $re['prenom'];
            $crud->contact = $re['contact'];
            $crud->save();

            return response()->json($crud, 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }
 /**
     * @OA\Delete(
     *     path="/v1/crud/contact/{id}",
     *     summary="Delete contact by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function delete($id) {
        try {
            $res = Crud::find($id)->delete();
            return response()->json(['delete' => $res], 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }
}

