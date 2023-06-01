<?php

namespace App\Http\Controllers\API\Template;

use App\Custom\TemplateFlow;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\HttpResponses;

Trait SharedSecure{
    private function secureUser($user)
    {
        try {
            $userData = User::where('id', $user)->first();
            if(!$userData){
                return $this->error('error user is not found','error user is not found', 404);
            }
            return $userData;
        }catch(\Exception $e) {
            return $this->error($e->getMessage(),'error', 404);
        }
    }
}
class TemplateController extends Controller
{
    use HttpResponses, SharedSecure;

    protected TemplateFlow $resource;

    public function __construct(TemplateFlow $templateFlow)
    {
        $this->resource = $templateFlow;
    }
    /**
     * Display a listing of the resource.
     */
    public function personalData($user)
    {
        $userData = $this->secureUser($user);
        $response = $this->resource->personalData($userData->id);
        return $response;
    }
    public function skills($user)
    {
        $userData = $this->secureUser($user);
        $response = $this->resource->skills($userData->id);
        return $response;
    }
    public function technologies($user)
    {
        $userData = $this->secureUser($user);
        $response = $this->resource->technologies($userData->id);
        return $response;
    }
    public function features($user)
    {
        $userData = $this->secureUser($user);
        $response = $this->resource->features($userData->id);
        return $response;
    }
    public function services($user)
    {
        $userData = $this->secureUser($user);
        $response = $this->resource->services($userData->id);
        return $response;
    }
    public function projects($user)
    {
        $userData = $this->secureUser($user);
        $response = $this->resource->projects($userData->id);
        return $response;
    }
    public function experience($user)
    {
        $userData = $this->secureUser($user);
        $response = $this->resource->experience($userData->id);
        return $response;
    }
    public function websiteSettings($user)
    {
        $userData = $this->secureUser($user);
        $response = $this->resource->websiteSettings($userData->id);
        return $response;
    }
    // public function userSettings($user)
    // {
    //     $userData = $this->secureUser($user);
    //     $response = $this->resource->userSettings($userData->id);
    //     return $response;
    // }
}