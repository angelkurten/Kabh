<?php

use Illuminate\Routing\Controller as BaseController;
use App\Repositories\ProjectRepository as Projects;
use Illuminate\Http\Response;

class HelloController extends BaseController{

    public function index()
    {
        return 'Hola';
    }

    public function projects(Projects $project)
    {
        $projects = $project->all();


        return Response::create($project->all());
    }

} 