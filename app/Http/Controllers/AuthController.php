<?php

namespace App\Http\Controllers;

use App\Mail\SubmitMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class AuthController extends Controller
{
	public function show() {
		Mail::to("amrelabsy55@gmail.com")->send(new SubmitMail("Absy", "0123654", "Hello, World!"));

		return view("form");
	}

	protected function create( Request $request)
	{
		$data = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'phone' => ['required', 'numeric'],
		]);
		/* Get credentials from .env */
		$token = getenv("TWILIO_AUTH_TOKEN");
		$twilio_sid = getenv("TWILIO_SID");
		$twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
		$twilio = new Client($twilio_sid, $token);
		$twilio->verify->v2->services($twilio_verify_sid)
			->verifications
			->create($data['phone'], "sms");


//		User::create([
//			'name' => $data['name'],
//			'phone_number' => $data['phone_number'],
//			'password' => Hash::make($data['password']),
//		]);
		return redirect()->route('verify')->with(['phone' => $data['phone']]);
	}

	public function verify() {
		return view("verify");
	}

	public function sverify(Request $request) {
		$data = $request->validate([
			'verification_code' => ['required', 'numeric'],
			'phone' => ['required', 'string'],
		]);
		/* Get credentials from .env */
		$token = getenv("TWILIO_AUTH_TOKEN");
		$twilio_sid = getenv("TWILIO_SID");
		$twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
		$twilio = new Client($twilio_sid, $token);
		$verification = $twilio->verify->v2->services($twilio_verify_sid)
			->verificationChecks
			->create([ "Code" => $data['verification_code'], 'To' => $data['phone']]);
		Mail::to("amrelabsy55@gmail.com")->send(new SubmitMail("Absy", "0123654", "Hello, World!"));
		if ($verification->valid) {
			// dd("verified");

			return redirect()->route('home')->with(['message' => 'Phone number verified']);
		}
		return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);

	}
}
