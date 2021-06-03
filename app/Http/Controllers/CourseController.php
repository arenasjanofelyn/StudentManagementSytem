<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $course = Course::all();

        return view('course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('course.create');

        return redirect()->back()->with('status', 'Course Successfully Added!');
    }
    
    /* Search */
    public function search(Request $request) 
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
        //
        $request->validate([
            'coursename' => 'required',
            'units' => 'required',
        ]);

        $course = new Course();
        $course->coursename = $request->coursename
        $course->units = $request->units;
        $course->save();

        return redirect()->back()->with('status', 'Course Successfully Save!');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $course = Course::find($id);
        
        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $course = Course::find($id);
       
       
        return view('course.edit', compact('course'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'coursename' => 'required',
            'units' => 'required',
        ]);

        $course = new Course();
        $course->coursename = $request->coursename
        $course->units = $request->units;
        $course->save();

        return redirect()->back()->with('status', 'Course Successfully Save!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $course = Course::find($id);
        $course->delete();

        return redirect()->back()->with('status', 'Course Successfully Deleted!');
    }

    /* Permanently delete data */
    public function deleteBlank()
    {
        $delete = Course::where('','=','')->delete();
    
        return redirect('/course');
    }
}