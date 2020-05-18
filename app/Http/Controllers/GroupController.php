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
use DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $group = new Group;
        $groups= group::all();

        // if(count($groups)==0) {
        //   return view('headmin.group.list');
        // }
        // else {
          $groups = group::paginate(10);
          return view('headmin.group.list',compact('groups'));
        // }
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
        return view('headmin.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group;
        $data = $this->validate($request, [
            'name' => 'required|string|max:255',

            'postal' => 'required|numeric',
            'city' => 'required|string',
            'street' => 'required|string',
            'streetnum' => 'required|numeric',
        ]);
        $group->name = $data['name'];

        $group->postal_code = $data['postal'];
        $group->city = $data['city'];
        $group->street = $data['street'];
        $group->street_num = $data['streetnum'];

        $group->save();
        return redirect()->route('group.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $groupdata= group::where("id",$id)->get();
      $users=user::where('status',1)->where('group',$id)->get();
      return view('headmin.group.show',compact('groupdata','users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groupdata= group::where("id",$id)->get();
        $users=user::where('group',$id)->get();
        return view('headmin.group.edit',compact('groupdata','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $group=group::where('id',$id)->first();

      $data = $this->validate($request, [
          'name' => 'required|string|max:255',

          'postal' => 'required|numeric',
          'city' => 'required|string',
          'street' => 'required|string',
          'streetnum' => 'required|numeric',
      ]);

      $group->name = $data['name'];
      
      $group->postal_code = $data['postal'];
      $group->city = $data['city'];
      $group->street = $data['street'];
      $group->street_num = $data['streetnum'];
      $group->save();


      DB::table('users')
                ->where('group', $id)
                ->update(['status' => 0]);
      DB::table('users')
                ->where('id', $_POST['groupleader'])
                ->update(['status' => 1, 'group' => $id]);
      $groupdata= group::where("id",$id)->get();
      $users=user::all();
      return redirect()->route('group.index');
      // return view('headmin.group.edit',compact('groupdata','users'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = group::findOrFail($id);
        $blog->delete();

        return redirect()->route('group.index');
    }
}
