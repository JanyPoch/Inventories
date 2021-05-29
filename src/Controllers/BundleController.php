<?php


namespace JanyPoch\Inventories\Controllers;


use App\Http\Controllers\Controller;
use JanyPoch\Inventories\Requests\AttachToBundleRequest;
use JanyPoch\Inventories\Requests\CreateBundleRequest;
use JanyPoch\Inventories\Facades\BundleFacade;
use JanyPoch\Inventories\Models\Bundle;
use JanyPoch\Inventories\Resources\BundleResource;

class BundleController extends Controller
{
    public function index()
    {
        $bundles = Bundle::paginate(20);
        return BundleResource::collection($bundles);
    }

    public function get(Bundle $bundle)
    {
        return new BundleResource($bundle);
    }

    public function create(CreateBundleRequest $request)
    {
        $bundle = Bundle::create($request->validated());
        return new BundleResource($bundle);
    }

    public function attach(Bundle $bundle, AttachToBundleRequest $request)
    {
        $bundle = BundleFacade::attach($bundle, $request->models);
        return new BundleResource($bundle);
    }
}
