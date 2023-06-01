<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Repos\PhoneRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PhoneController extends Controller
{
    use HttpResponses;
    protected PhoneRepo $phoneRepo;
    protected $model;
    protected $user;

    public function __construct(PhoneRepo $phoneRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->phoneRepo = $phoneRepo;
        $this->model = new Phone();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phones = $this->phoneRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.phones.index', compact('phones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation the request
        $validator =  Validator::make($request->all(), [
            'number' =>'required|string',
            'phone_id' =>'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create phone');
        }

        // store the phone
        $this->phoneRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.phones.index')->with('success','phone created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Phone $phone)
    {
        $phone = $this->phoneRepo->show($this->model, $phone->id, $this->user);
        return view('dashboard.pages.phones.show', compact('phone'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(Phone $phone)
    {
        $phones = $this->phoneRepo->show($this->model, $phone->id, $this->user);
        return view('dashboard.pages.phones.edit', compact('phones'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phone $phone)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'number' =>'required|string',
            'phone_id' =>'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create phone');
        }

        // update the phone
        $this->phoneRepo->update($this->model,$phone->id, $request->all(), $this->user);

        return redirect()->route('dashboard.phones.index')->with('success','phone created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        $deletePhone = $this->phoneRepo->delete($this->model, $phone->id, $this->user);

        if (!$deletePhone) {
            return $this->success(null, "phone deleted successfully", 200);
        }
    }
}
