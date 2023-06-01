<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Repos\EmailRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    use HttpResponses;
    protected EmailRepo $emailRepo;
    protected $user;
    protected $model;

    public function __construct(EmailRepo $emailRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->emailRepo = $emailRepo;
        $this->model = new Email();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = $this->emailRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.emails.index', compact('emails'));
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
            return redirect()->back()->with('error','error in create email');
        }

        // store the email
        $this->emailRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.emails.index')->with('success','email created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Email $email)
    {
        $email = $this->emailRepo->show($this->model, $email->id, $this->user);
        return view('dashboard.pages.emails.show', compact('email'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(Email $email)
    {
        $emailData = $this->emailRepo->show($this->model, $email->id, $this->user);
        return view('dashboard.pages.emails.edit', compact('emailData'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Email $email)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create email');
        }

        // update the email
        $this->emailRepo->update($this->model,$email->id, $request->all(), $this->user);

        return redirect()->route('dashboard.emails.index')->with('success','email created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        $deleteemail = $this->emailRepo->delete($this->model, $email->id, $this->user);

        if (!$deleteemail) {
            return $this->success(null, "email Deleted Successfully", 200);
        }
    }
}
