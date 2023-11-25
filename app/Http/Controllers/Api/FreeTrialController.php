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
        $data['quantity'] = $request->quantity;
        $data['deliveryTime'] = $request->deliveryTime;
        $data['returnType'] = $request->returnType;
        $data['fileLink'] = $request->fileLink;

        if($data['serviceType'] == 'Free Trial'){
            Mail::send('email.free', $data, function($message) use ($data, $files) {
                $message->to('info@photoeditscenter.com','info@photoeditscenter.com')->cc(['photoeditscenter@gmail.com','info@photoeditscenter.com'])
                    ->subject($data["serviceType"]);
                if($files) {
                    foreach ($files as $file){
                        $message->attach($file);
                    }
                }

            });
        }else {
            if($data['serviceName']){
                $data['serviceName'] = explode(' ,', $data['serviceName']);
                $data['serviceName'] = implode(" ," ,$data['serviceName']);
            }

            Mail::send('email.commercial', $data, function($message) use ($data, $files) {
                $message->to('info@photoeditscenter.com','info@photoeditscenter.com')->cc(['photoeditscenter@gmail.com','info@photoeditscenter.com'])
                    ->subject($data["serviceType"]);
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
