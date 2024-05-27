<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Post::list();
        $products =  PostResource::collection($product);
        return response()->json([
            'data' => $products,
            'success' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        return new PostResource($post);



        // $product= Post::store($request);
        // return response()->json([
        //     'data' => $product,
        //    'success' => true,
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowPostRequest $post, $id)
    {
        // $validateDate= $post->validated();
        $post = Post::find($id);
        return new PostResource($post);

        // $product= Post::show($id);
        // $post= new PostResource($product);
        // return response()->json([
        //     'data' => $product,
        //    'success' => true,
        // ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ShowPostRequest  $request, string $id)
    {
        $prodcut = Post::store($request, $id);
        return response()->json([
            'data' => $prodcut,
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Post::destroy($id);
        return response()->json([
            'data' => $product,
            'success' => true,
        ]);
    }
}
