<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Technology;

use App\Http\Controllers\Controller;
use App\Repos\TechnologyRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TechnologyController extends Controller
{
    use HttpResponses;
    protected TechnologyRepo $technologyRepo;
    protected $model;
    protected $user;

    public function __construct(TechnologyRepo $technologyRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->technologyRepo = $technologyRepo;
        $this->model = new Technology();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologys = $this->technologyRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.technologys.index', compact('technologys'));
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
            return redirect()->back()->with('error','error in create technology');
        }

        // store the technology
        $this->technologyRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.technologys.index')->with('success','technology created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        $technology = $this->technologyRepo->show($this->model, $technology->id, $this->user);
        return view('dashboard.pages.technologys.show', compact('technology'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(technology $technology)
    {
        $technologyData = $this->technologyRepo->show($this->model, $technology->id, $this->user);
        return view('dashboard.pages.technologys.edit', compact('technologyData'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create technology');
        }

        // update the technology
        $this->technologyRepo->update($this->model,$technology->id, $request->all(), $this->user);

        return redirect()->route('dashboard.technologys.index')->with('success','technology created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $deletetechnology = $this->technologyRepo->delete($this->model, $technology->id, $this->user);

        if (!$deletetechnology) {
            return $this->success(null, "technology Deleted Successfully", 200);
        }
    }
}
