<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FreeTrialController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $files = $request->file('image');
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['country'] = $request->country;
        $data['note'] = $request->note;
        $data['serviceName'] = $request->serviceName;
        $data['serviceType'] = $request->serviceType;

        if($data['serviceType'] == 'Free Trial'){
            Mail::send('email.free', $data, function($message) use ($data, $files) {
                $message->to('ashadbappycse@gmail.com','ashadbappycse@gmail.com')->cc(['hasibulkabir06@gmail.com','hasibulkabir06@gmail.com'])
                    ->subject($data["email"]);
                if($files) {
                    foreach ($files as $file){
                        $message->attach($file);
                    }
                }

            });
        }else {
            if($data['serviceName']){
                $data['serviceName'] = implode(", " ,$data['serviceName']);
            }

            Mail::send('email.commercial', $data, function($message) use ($data, $files) {
                $message->to('ashadbappycse@gmail.com','ashadbappycse@gmail.com')->cc(['hasibulkabir06@gmail.com','hasibulkabir06@gmail.com'])
                    ->subject($data["email"]);
                if($files) {
                    foreach ($files as $file){
                        $message->attach($file);
                    }
                }
            });
        }

        return response()->json(["message" => "success", 'status' => 200]);
    }
}
