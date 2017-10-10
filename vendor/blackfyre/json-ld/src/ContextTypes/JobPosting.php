<?php

namespace JsonLd\ContextTypes;


class JobPosting extends AbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'baseSalary' => null,
        'datePosted' => null,
        'educationRequirements' => null,
        'employmentType' => null,
        'experienceRequirements' => null,
        'hiringOrganization' => Organization::class,
        'incentiveCompensation' => null,
        'industry' => null,
        'jobBenefits' => null,
        'jobLocation' => Place::class,
        'occupationalCategory' => null,
        'qualifications' => null,
        'responsibilities' => null,
        'salaryCurrency' => null,
        'skills' => null,
        'specialCommitments' => null,
        'title' => null,
        'validThrough' => null,
        'workHours' => null,
    ];
}