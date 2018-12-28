<?php

namespace App\Http\Controllers;


class ApiController extends Controller
{
    /**
     * Exclude middleware routing
     *
     * @var array
     */
    protected $exceptApiAuthUri = [];
    
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        // $this->middleware('auth:admin_api', ['except' => $this->exceptApiAuthUri]);
    }
}
