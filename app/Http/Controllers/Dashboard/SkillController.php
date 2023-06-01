<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Skills;
use App\Repos\SkillRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    use HttpResponses;
    protected SkillRepo $skillRepo;
    protected $model;
    protected $user;

    public function __construct(SkillRepo $skillRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->skillRepo = $skillRepo;
        $this->model = new Skill();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = $this->skillRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.skills.index', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation the request
        $validator =  Validator::make($request->all(), [
            'number' =>'required|string',
            'skill_id' =>'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create skill');
        }

        // store the skill
        $this->skillRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.skills.index')->with('success','skill created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        $skill = $this->skillRepo->show($this->model, $skill->id, $this->user);
        return view('dashboard.pages.skills.show', compact('skill'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(Skill $skill)
    {
        $skills = $this->skillRepo->show($this->model, $skill->id, $this->user);
        return view('dashboard.pages.skills.edit', compact('skills'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'skill' =>'required|string',
            'type' =>'required|string',
            'skill_id' =>'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create skill');
        }

        // update the skill
        $this->skillRepo->update($this->model,$skill->id, $request->all(), $this->user);

        return redirect()->route('dashboard.skills.index')->with('success','skill created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $deleteSkill = $this->skillRepo->delete($this->model, $skill->id, $this->user);

        if (!$deleteSkill) {
            return $this->success(null, "skill deleted successfully", 200);
        }
    }
}
