<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FreeTrialInfoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $service_names = $request->serviceName;
        $service_type = $request->serviceType;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['title'] = 'Free Trial';
        $data['phone'] = $request->phone;
        $data['messages'] = $request->message;
        $data['country'] = $request->country;
        $data['service_name'] = implode(", " ,$service_names);
        $data['service_type'] = $request->serviceType;


        if($service_type == 'Free Trial'){
            Mail::send('email.free', $data, function($message)use($data) {
                $message->to('ashadbappycse@gmail.com','ashadbappycse@gmail.com')->cc(['info@photoeditscenter.com','info@photoeditscenter.com'])
                    ->subject($data["service_type"]);
            });
        }else {
            Mail::send('email.commercial', $data, function($message)use($data) {
                $message->to($data["email"], $data["email"])->cc(['photoeditscenter@gmail.com','photoeditscenter@gmail.com'])
                    ->subject($data["service_type"]);
            });
        }
        return response()->json(["message" => "success", 'status' => 200]);
    }
}
