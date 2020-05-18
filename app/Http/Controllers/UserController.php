<?php

namespace MVS\Http\Controllers;

use Illuminate\Http\Request;
use MVS\User;
use MVS\Group;
use Auth;
use View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = group::all();
        $users = user::paginate(10);
        return view('headmin.user.list',compact('users', 'groups'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=group::all();
        return view('headmin.user.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
          'name' => 'required|string|max:255',
          'surname' => 'nullable|string|max:255',
          'email' => ['required', 'string', 'email', 'max:255',
                                    Rule::unique('users')->ignore(Auth::user()->id),
                                ],
          'phone' => 'nullable|numeric',
          'group' => 'string|max:255',
          'mail_address' => 'nullable|string|max:255',
          'password' => 'required|string|min:6|confirmed',
        ]);

        $user=new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->surname = $data['surname'];

        $user->phone = $data['phone'];
        if($request->mail_address)
            $user->mail_address = $data['mail_address'];
        if(isset($data['group'])) $user->group = $data['group'];
        $user->status =0;
        $user->password =Hash::make($data['password']);
        // $user->admin = ($request->admin == 'on') ? 1 : 0;

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = user::where("id",$id)->get();
        return view('headmin.user.show',compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups=group::all();
        $user = user::where("id",$id)->get();
        return view('headmin.user.edit',compact('user','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
      $user = user::where('id',$id)->first();
      $data = $this->validate($request, [
        'name' => 'required|string|max:255',
        'surname' => 'nullable|string|max:255',
        'phone' => 'nullable|numeric',
        'group' => 'string|max:255',
        'mail_address' => 'nullable|string',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6'
      ]);

      $user->name = $data['name'];
      $user->surname = $data['surname'];
      $user->phone = $data['phone'];
      if($request->mail_address)
        $user->mail_address = $data['mail_address'];
      $user->group = $data['group'];
      $user->status =0;
      $user->password = Hash::make($request->password);
      $user->admin = ($request->admin == 'on') ? 1 : 0;
      $user->save();

      return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = User::findOrFail($id);
        $blog->delete();

        return redirect()->route('user.index');
    }
}
