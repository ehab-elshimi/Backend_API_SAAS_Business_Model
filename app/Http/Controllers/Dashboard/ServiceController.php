<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\service;
use App\Http\Controllers\Controller;
use App\Repos\ServiceRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use HttpResponses;
    protected ServiceRepo $serviceRepo;
    protected $model;
    protected $user;

    public function __construct(ServiceRepo $serviceRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->serviceRepo = $serviceRepo;
        $this->model = new service();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->serviceRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.services.index', compact('services'));
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
            return redirect()->back()->with('error','error in create service');
        }

        // store the service
        $this->serviceRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.services.index')->with('success','service created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
        $service = $this->serviceRepo->show($this->model, $service->id, $this->user);
        return view('dashboard.pages.services.show', compact('service'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(service $service)
    {
        $serviceData = $this->serviceRepo->show($this->model, $service->id, $this->user);
        return view('dashboard.pages.services.edit', compact('serviceData'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create service');
        }

        // update the service
        $this->serviceRepo->update($this->model,$service->id, $request->all(), $this->user);

        return redirect()->route('dashboard.services.index')->with('success','service created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        $deleteservice = $this->serviceRepo->delete($this->model, $service->id, $this->user);

        if (!$deleteservice) {
            return $this->success(null, "service Deleted Successfully", 200);
        }
    }
}
