<?php

namespace App\Http\Controllers;

use App\Http\Resources\VoucherResource;
use App\Http\Transformers\VoucherTransformer;
use App\Repositories\Voucher\Voucher;
use App\Repositories\Voucher\VoucherRepository;
use App\Repositories\Voucher\VoucherRepositoryInterface;
use Illuminate\Http\Request;

class VoucherController extends Controller
{

    public function __construct(VoucherRepositoryInterface $voucher)
    {
        $this->model = $voucher;
        $this->setTransformer(new VoucherTransformer());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = $this->model->getAll();
       // $post = $this->model->getAll();
        return $this->successResponse($voucher);
        //return PostResource::collection($post);
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
           $voucher = $this->model->store($request->all());
           return $this->successResponse($voucher);
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
            $voucher= $this->model->getById($id);
            return $this->successResponse($voucher);
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
           $voucher = $this->model->update($id,$data);
           return $this->successResponse($voucher);
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
