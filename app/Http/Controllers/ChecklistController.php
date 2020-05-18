<?php

namespace MVS\Http\Controllers;

use Illuminate\Http\Request;
use MVS\Http\Controllers\Controller;
use MVS\Checklist;
use MVS\checklistCategory;
use MVS\Kunden;
use MVS\group;
use MVS\user;

class ChecklistController extends Controller
{
    public function index()
    {
      $checklists = Checklist::latest()->get();
      $groups = group::paginate(10);
      $users = user::paginate(10);
      return view('admin.checklist.index')->with(compact('checklists', 'groups', 'users'));
    }
    public function store(Request $request)
    {
      $this->validate($request, [
          'body' => 'required|max:190',
          'category' => 'required',
      ]);
      Checklist::create([
        'body'=>$request->body,
        'category_id'=>$request->category,
        'is_active'=>1,
      ]);
      return redirect()->route('checklist');
    }    
    public function checklistCategory(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|max:190',
      ]);
      checklistCategory::create([
        'name'=>$request->name,
        'is_active'=>1,
      ]);
      return redirect()->route('checklist');
    }
    public function update(Request $request)
    {
      $this->validate($request, [
          'body' => 'required|max:190',
          'category' => 'required',
      ]);
      $checklist = Checklist::find($request->data_id);
      if($checklist) {
        $checklist->update([
          'body'=>$request->body,
          'category_id'=>$request->category,
        ]);
      }
      return redirect()->route('checklist');
    }

    public function delete(Request $request)
    {
      $checklist = Checklist::find($request->data_id);
      if($checklist) {
        $checklist->delete();
        return response()->json(['success'=>true]);
      }
      return response()->json(['success'=>false]);
    }
    public function deleteCategory(Request $request)
    {
      $category = checklistCategory::find($request->data_id);
      if($category) {
        $category->delete();
        return response()->json(['success'=>true]);
      }
      return response()->json(['success'=>false]);
    }

    public function kundenChecklist(Request $request)
    {
      $checklist = Checklist::find($request->data_id);
      $kunden = Kunden::find($request->kunden_id);
      if($checklist && $kunden) {
        if($request->action == 1) {
          if($request->who == 'kunden') {
            $kunden->checklists()->detach($checklist);
          } else if($request->who == 'ehepartner') {            
            $kunden->ehepartnerChecklists()->detach($checklist);
          }
          return response()->json(['success'=>true]);
        } else {
          if($request->who == 'kunden') {
            $kunden->checklists()->attach($checklist);
          } else if($request->who == 'ehepartner') {            
            $kunden->ehepartnerChecklists()->attach($checklist);
          }
          return response()->json(['success'=>true]);
        }
      }
      return response()->json(['success'=>false]);
    }
}
