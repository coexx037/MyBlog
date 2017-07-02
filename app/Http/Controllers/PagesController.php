<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Post;
use Session;
use Mail;

class PagesController extends Controller {

    public function getIndex() {

        $posts = Post::orderBy('created_at', 'desc')->limit(10)->get();

        return view('pages/welcome')->with('posts', $posts);
    }

    public function getAbout() {
        $first = 'David';
        $last = 'Coe';
        $fullname = $first." ".$last;
        $email = 'david@gmail.com';

        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;

        return view('pages/about')->withData($data);
    }

    public function getContact() {
        return view('pages/contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
            );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('coexx037@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was sent');

        return redirect('/');

    }


}

?>
