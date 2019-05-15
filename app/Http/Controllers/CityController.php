<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Http\Transformers\CityTransformer;
use App\Repositories\City\City;
use App\Repositories\City\CityRepository;
use App\Repositories\City\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function __construct(CityRepositoryInterface $city)
    {
        $this->model = $city;
        $this->setTransformer(new CityTransformer());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = $this->model->getAll();
        return $this->successResponse($city);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try
       {
           $city = $this->model->store($request->all());
           return $this->successResponse($city);
       }catch (\Exception $e)
       {

       }//return new PostResource($post);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $city= $this->model->getById($id);
            return $this->successResponse($city);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->notFoundResponse();
        }
       // return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try
       {
           $data = $request->all();
           $city = $this->model->update($id,$data);
           return $this->successResponse($city);
       } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
           return $this->notFoundResponse();
       }
        //$data = $post->fill($request->all());
       // return new PostResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $post = $this->model->find($id);
//        $data = $post->delete($id);
//        if($data) {
//            return response()->json(['status' => true], 200);
//        }else {
//            return response()->json(['status' => false], 422);
//        }

        try {
            $this->model->delete($id);
            return $this->deleteResponse();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->notFoundResponse();
        } catch (\Exception $e) {
            throw $e;
        } catch (\Throwable $t) {
            throw $t;
        }
    }
}
