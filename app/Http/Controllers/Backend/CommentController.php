<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\comment;
use Illuminate\Support\Str;
use File;
use Image;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = comment::orderBy('id', 'desc')->paginate(15);
        return view('backend.pages.comment.manage',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name'     => 'required',
                'email'     => 'required',
                'comment'     => 'required',
            ],
            [
                'name.required'        => 'Please Insert Name',
                'email.required'       => 'Please Insert Email Address ',
                'comment.required'     => 'Please Write your comment ',
            ],

        );

        $comment =  new comment();

        $comment->name           = $request->name;
        $comment->email          = $request->email;
        $comment->post_id        = $request->post_id;
        $comment->subject        = $request->subject;
        $comment->comment        = $request->comment;


        $comment->save();

        $notification = array(
            'message' => 'Comment Published',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = comment::find($id);
        if( !is_null($comment) ){
            $comment->delete();
            return redirect()->route('comment.manage');
        }
        else{
            return redirect()->route('comment.manage');
        }
    }
}
