<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Repos\DeveloperRepo;
use App\Repos\SkillRepo;
use Illuminate\Support\Facades\Response;

class DeveloperController extends Controller
{
    use HttpResponses;
    protected SkillRepo $skillRepo;
    protected $model;
    protected $user;

    public function __construct(SkillRepo $skillRepo)
    {
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
        $developers = $this->skillRepo->retrieve(new Skill(), $this->user->id);
        return Response::json($developers);
    }
}

