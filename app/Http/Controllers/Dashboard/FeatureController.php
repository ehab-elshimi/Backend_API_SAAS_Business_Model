<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Feature;
use App\Http\Controllers\Controller;
use App\Repos\FeatureRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    use HttpResponses;
    protected FeatureRepo $featureRepo;
    protected $model;
    protected $user;

    public function __construct(FeatureRepo $featureRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->featureRepo = $featureRepo;
        $this->model = new Feature();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = $this->featureRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.features.index', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation the request
        $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create feature');
        }

        // store the feature
        $this->featureRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.features.index')->with('success','feature created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        $feature = $this->featureRepo->show($this->model, $feature->id, $this->user);
        return view('dashboard.pages.features.show', compact('feature'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(Feature $feature)
    {
        $featureData = $this->featureRepo->show($this->model, $feature->id, $this->user);
        return view('dashboard.pages.features.edit', compact('featureData'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create feature');
        }

        // update the feature
        $this->featureRepo->update($this->model,$feature->id, $request->all(), $this->user);

        return redirect()->route('dashboard.features.index')->with('success','feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $deleteFeature = $this->featureRepo->delete($this->model, $feature->id, $this->user);

        if (!$deleteFeature) {
            return $this->success(null, "Feature Deleted Successfully", 200);
        }
    }
}
