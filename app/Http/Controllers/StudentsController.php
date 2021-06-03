<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $student = Students::all();

        return view('students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');

        return redirect()->back()->with('status', 'Student Successfully Added!');
    }
    
    /* Search */
    public function search(Request $request) 
    {
        $search = $request->get('search');
        $student = DB::table('students')->where('lname','course','like', '%'.$search. '%');
        
        return view('students.index', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'studentnum' => 'required',
            'fname' => 'required|max:100',
            'lname' => 'required',
            'mname' => 'required',
            'course' => 'required',
            'year' => 'required',
            'sex' => 'required'
        ]);


        if($request->hasFile('img')) {

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension =$request->file('img')->getClientOriginalExtension();

            $filenameToStore = $filename.'.'.time().'.'.$extension;

            $path =  $request->file('img')->storeAs('public/img', $filenameToStore);

        } else {

            $filenameToStore ='';
        

        }


        $student = new Students();
        $student->studentnum = $request->studentnum;
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->mname = $request->mname;
        $student->course = $request->course;
        $student->year = $request->year;
        $student->sex = $request->sex;
        $student->img = $filenameToStore;
        $student->save();

        return redirect()->back()->with('status', 'Student Successfully Save!');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = Students::find($id);
        
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Students::find($id);
       
       
        return view('students.edit', compact('student'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'studentnum' => 'required',
            'fname' => 'required|max:100',
            'lname' => 'required',
            'mname' => 'required',
            'course' => 'required',
            'year' => 'required',
            'sex' => 'required' 
        ]);

        if($request->hasFile('img')) {

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension =$request->file('img')->getClientOriginalExtension();

            $filenameToStore = $filename.'.'.time().'.'.$extension;

            $path =  $request->file('img')->storeAs('public/img', $filenameToStore);

        } else {

            $filenameToStore ='';
        

        }

        $student = new Students();
        $student->studentnum = $request->studentnum;
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->mname = $request->mname;
        $student->course = $request->course;
        $student->year = $request->year;
        $student->sex = $request->sex;
        $student->img = $request->filenameToStore;
        $student->save();

        return redirect()->back()->with('status', 'Student Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Students::find($id);
        $student->delete();

        return redirect()->back()->with('status', 'Student Successfully Deleted!');
    }

    /* Permanently delete data */
    public function deleteBlank()
    {
        $delete = Students::where('','=','')->delete();
    
        return redirect('/students');
    }
}