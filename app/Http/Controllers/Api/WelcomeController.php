<?php

namespace App\Http\Controllers\Api;

use App\Mail\SampleMail;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{

    use HttpResponse;
    public function index(): JsonResponse
    {
        return response()->json([
            "title" => "Twelve SAAS API Starter",
            "about" => "This is a starter SAAS API with all you need to get started i building an API",
            "features" => [
                "authentication" => "",
                "emailing" => "",
                "notification" => "",
                "User Profile Management" => "",
                "User Password Management" => "",
                "User invite" => "",
                "Role and Permissions Management" => "",
            ],
            "developer" => "Obinna Ukpabi",
            "website" => "",
            "github" => "https://github.com/askphantom/twelve-api-starter",
            "license" => " MIT",
        ], 200);
    }

    
    /**
     * Send sample email
     */
    public function sampleEmail($email)
    {
       try {
           Mail::to($email)->send(new SampleMail());

           return $this->success([], 'Sample mail sent successfully');
       } catch (\Throwable $th) {
           return $this->error([
                "message"=>$th->getMessage(), 
                "line"=>$th->getLine()
            ],
                 'there was a problem');
       }
    }

}
