<?php

namespace App\Models\MachineLearning;

use App\Http\Requests;
use  App\Models\MachineLearning\MLService;
use App\Http\Controllers\Controller;

class SmartMatchController extends Controller
{
    public function __construct(MLService $mlService)
    {
        $this->svc = $mlService;
        $this->middleware('auth');
    }
    public function index()
    {
        return view('layouts.index_smart_match');
    }

    public function matchDescriptionWithPotentialJobs()
    {
        $file = request()->file('resume');
        $path = base_path()."/public/storage/";
        $file->move($path, $file->getClientOriginalName());
        $original_name = $file->getClientOriginalName();
        $interest = explode(',', request()->get('interest'));
        $jobDesc = $this->svc->extract_keywords(request()->get('job_description'));
        $skills =  $this->svc->extract_keywords(request()->get('skills'));
        $additionalQuery = array_merge($interest, array_merge($skills, $jobDesc));
        unlink(realpath($_SERVER["DOCUMENT_ROOT"])."/storage/".$original_name);
        $results = $this->svc->matchResumeWithSampleData($original_name, $additionalQuery, 1);
        return view('layouts.results_smart_match', compact('results'));
    }
}
