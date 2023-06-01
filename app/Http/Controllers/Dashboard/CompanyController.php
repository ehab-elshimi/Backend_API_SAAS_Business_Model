<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Repos\CompanyRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use HttpResponses;
    protected CompanyRepo $companyRepo;
    protected $model;
    protected $user;

    public function __construct(CompanyRepo $companyRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->companyRepo = $companyRepo;
        $this->model = new Company();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companys = $this->companyRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.companys.index', compact('companys'));
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
            return redirect()->back()->with('error','error in create Company');
        }

        // store the Company
        $this->companyRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.companys.index')->with('success','Company created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company = $this->companyRepo->show($this->model, $company->id, $this->user);
        return view('dashboard.pages.companys.show', compact('company'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(Company $company)
    {
        $companyData = $this->companyRepo->show($this->model, $company->id, $this->user);
        return view('dashboard.pages.companys.edit', compact('companyData'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create Company');
        }

        // update the Company
        $this->companyRepo->update($this->model,$company->id, $request->all(), $this->user);

        return redirect()->route('dashboard.companys.index')->with('success','Company created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $deleteCompany = $this->companyRepo->delete($this->model, $company->id, $this->user);

        if (!$deleteCompany) {
            return $this->success(null, "Company Deleted Successfully", 200);
        }
    }
}
