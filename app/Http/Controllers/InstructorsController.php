<?php

namespace App\Http\Controllers;

use App\Models\Instructors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instructor = Instructors::all();

        return view('instructors.index', compact('instructor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('instructors.create');

        return redirect()->back()->with('status', 'Instructor Successfully Added!');
    }
    
    /* Search */
    public function search(Request $request) 
    {
        $search = $request->get('search');
        $instructor = DB::table('instructors')->where('fname','lname','like', '%'.$search. '%');
        
        return view('instructors.index', compact('instructor'));
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
            'fname' => 'required|max:100',
            'lname' => 'required',
            'position' => 'required',
            'email' => '' 
        ]);


        $instructor = new Instructors();
        $instructor->fname = $request->fname;
        $instructor->lname = $request->lname;
        $instructor->position = $request->position;
        $instructor->email = $request->email;
        $instructor->save();

        return redirect()->back()->with('status', 'Instructor Successfully Save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructors
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $instructor = Instructors::find($id);
        
        return view('instructors.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $instructor = Instructors::find($id);
       
       
        return view('instructors.edit', compact('instructor'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructors 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'fname' => 'required|max:100',
            'lname' => 'required',
            'position' => 'required',
            'email' => '' 
        ]);

        $instructor = Instructors::find($id);
        $instructor->fname = $request->fname;
        $instructor->lname = $request->lname;
        $instructor->position = $request->position;
        $instructor->save();

        return redirect()->back()->with('status', 'Instructor Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $instructor = Instructors::find($id);
        $instructor->delete();

        return redirect()->back()->with('status', 'Instructor Successfully Deleted!');
    }

    /* Permanently delete data */
    public function deleteBlank()
    {
        $delete = Instructors::where('','=','')->delete();
    
        return redirect('/instructors');
    }
}