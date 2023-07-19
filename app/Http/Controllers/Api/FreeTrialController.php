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

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        $data['email'] = 'Free Trial';
        Mail::send('welcome', $data, function($message) use ($data, $files) {
            $message->to('ashadbappycse@gmail.com','ashadbappycse@gmail.com')->cc(['hasibulkabir06@gmail.com','hasibulkabir06@gmail.com'])
                ->subject($data["email"]);

            foreach ($files as $file){
                $message->attach($file);
            }
        });

        return response()->json(["message" => "success", 'status' => 200]);
    }
}
