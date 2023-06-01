<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\socialMedia;
use App\Http\Controllers\Controller;
use App\Repos\SocialMediaRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SocialMediaIconsController extends Controller
{
    use HttpResponses;
    protected SocialMediaRepo $socialMediaRepo;
    protected $model;
    protected $user;

    public function __construct(SocialMediaRepo $socialMediaRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->socialMediaRepo = $socialMediaRepo;
        $this->model = new SocialMedia();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialmedia = $this->socialMediaRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.socialmedia.index', compact('socialmedia'));
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
            return redirect()->back()->with('error','error in create socialmedia');
        }

        // store the socialMedia
        $this->socialMediaRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.socialmedia.index')->with('success','socialmedia created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(socialMedia $socialMedia)
    {
        $socialmedia = $this->socialMediaRepo->show($this->model, $socialMedia->id, $this->user);
        return view('dashboard.pages.socialmedia.show', compact('socialmedia'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(socialMedia $socialMedia)
    {
        $socialmediaData = $this->socialMediaRepo->show($this->model, $socialMedia->id, $this->user);
        return view('dashboard.pages.socialmedia.edit', compact('socialmediaData'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, socialMedia $socialMedia)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create socialMedia');
        }

        // update the socialMedia
        $this->socialMediaRepo->update($this->model,$socialMedia->id, $request->all(), $this->user);

        return redirect()->route('dashboard.socialmedia.index')->with('success','socialmedia created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(socialMedia $socialMedia)
    {
        $deletesocialMedia = $this->socialMediaRepo->delete($this->model, $socialMedia->id, $this->user);

        if (!$deletesocialMedia) {
            return $this->success(null, "socialmedia Deleted Successfully", 200);
        }
    }
}
