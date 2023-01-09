<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //
    public function getIndex(){
        $postObject = Post::orderBy('created_at','desc')->limit(3)->get();
        return view('landingpage.welcome')->with('posts',$postObject);
    }

    public function getAbout(){
        $first = 'Segun';
        $last = 'Fakuade';
        $full = $first . " " . $last;
        return view('landingpage.about')->withFullname($full);
    }

    public function getContact(){
        return view('landingpage.contact');
    }

    public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'body' => $request->message
			);

            mail($data['email'],
            $data['subject'],
            $data['body']);

		session()->flash('success', 'Your Email was Sent!');

		return redirect('/');
	}
}
