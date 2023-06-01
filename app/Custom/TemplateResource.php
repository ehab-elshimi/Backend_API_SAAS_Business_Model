<?php

namespace App\Custom;

use App\Contracts\Template;
use App\Models\Feature;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Technology;
use App\Repos\CompanyRepo;
use App\Repos\DeveloperRepo;
use App\Repos\EmailRepo;
use App\Repos\ExperiencePeriodRepo;
use App\Repos\FeatureRepo;
use App\Repos\PhoneRepo;
use App\Repos\ProjectRepo;
use App\Repos\ServiceRepo;
use App\Repos\SkillRepo;
use App\Repos\SocialMediaRepo;
use App\Repos\TechnologyRepo;
use App\Traits\HttpResponses;


abstract class TemplateResource implements Template
{
    use HttpResponses;

    protected $user;

    protected DeveloperRepo $developerRepo;
    protected CompanyRepo $companyRepo;
    protected EmailRepo $emailRepo;
    protected ExperiencePeriodRepo $experiencePeriodRepo;
    protected FeatureRepo $featureRepo;
    protected PhoneRepo $phoneRepo;
    protected ProjectRepo $projectRepo;
    protected ServiceRepo $serviceRepo;
    protected SkillRepo $skillRepo;
    protected SocialMediaRepo $socialMediaRepo;
    protected TechnologyRepo $technologyRepo;

    public function __construct(
        DeveloperRepo $developerRepo,
        CompanyRepo $companyRepo,
        EmailRepo $emailRepo,
        ExperiencePeriodRepo $experiencePeriodRepo,
        FeatureRepo $featureRepo,
        PhoneRepo $phoneRepo,
        ProjectRepo $projectRepo,
        ServiceRepo $serviceRepo,
        SkillRepo $skillRepo,
        SocialMediaRepo $socialMediaRepo,
        TechnologyRepo $technologyRepo
    ) {
        $this->developerRepo = $developerRepo;
        $this->companyRepo = $companyRepo;
        $this->emailRepo = $emailRepo;
        $this->experiencePeriodRepo = $experiencePeriodRepo;
        $this->featureRepo = $featureRepo;
        $this->phoneRepo = $phoneRepo;
        $this->serviceRepo = $serviceRepo;
        $this->skillRepo = $skillRepo;
        $this->socialMediaRepo = $socialMediaRepo;
        $this->technologyRepo = $technologyRepo;
    }
    public function personalData($user_id)
    {
        //logic
        $personalData = 1;
        return $personalData;
    }
    public function skills($user_id)
    {
        //logic
        return $this->skillRepo->retrieve(new Skill(), $user_id);
    }
    public function technologies($user_id)
    {
        //logic
        return $this->technologyRepo->retrieve(new Technology(), $user_id);
    }
    public function features($user_id)
    {
        //logic
        return  $this->featureRepo->retrieve(new Feature(), $user_id);
    }

    public function services($user_id)
    {
        //logic
        return $this->serviceRepo->retrieve(new Service(), $user_id);
    }
    public function projects($user_id)
    {
        //logic
        $projects = 1;
        return $projects;
    }
    public function experience($user_id)
    {
        //logic
        $experience = 1;
        return $experience;
    }
    public function websiteSettings($user_id)
    {
        //logic
        $website_settings = 1;
        return $website_settings;
    }
}
