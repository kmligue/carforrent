<?php

class EmailController extends BaseController {

	public function contact() {
		$rules = array(
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('/#contact')->withErrors($validator)->withInput(Input::all())->with('mail', 'mail');
		}
		else {
			$message = new Message;
			$message->name = Input::get('name');
			$message->email = Input::get('email');
			$message->message = Input::get('message');

			if($message->save()) {
				$message = '<strong>Successfully sent!</strong>You can click <a href="/">here</a> to go back home.';

				return View::make('client.success_email')->with('message', $message);
			}
			else {
				return Redirect::back()->with('error', 'Something went wrong!');
			}
		}
	}

	public function messages() {
		$messages = Message::orderBy('created_at', 'desc')
							->paginate(10);

		$msgUnreadCount = Message::where('status', '=', 0)
								->count();

		return View::make('admin.message')->with('messages', $messages)->with('msgUnreadCount', $msgUnreadCount);
	}

	public function getMessage($id) {
		$message = Message::findOrFail($id);
		$message->status = 1;
		$message->save();

		return $message;
	}

	public function sendForm($id) {

	}

}