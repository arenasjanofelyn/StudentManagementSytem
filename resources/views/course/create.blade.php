@extends('layouts.app')

@section('title', 'Course |')

    @section('content')
    
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <div class="container" style="height: fit-content; margin-top:5%; width: 120%; margin-left:10%;"> 
            <div class="card">       
                <div class="card-header" style="font-weight: bold;">
                    Add New Course
                    <a href="/course" class="btn btn-light" style="background-color:rgb(216, 216, 216); font-weight:bolder;
                    position: absolute; right: 20px; top: 5px; cursor: pointer;">X</a>
                </div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
                    @endif

                    <form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!--COURSENAME-->
                        <div class="form-group row" style="margin-left: -15%;">
                            <label for="coursename" class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                <input id="coursename" type="text" class="form-control @error('coursename') is-invalid @enderror" name="coursename" name="coursename" value="{{ old('coursename') }}" autofocus>        
                            </div>

                            @error('coursename')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                            
                        <!--UNITS-->
                        <div class="form-group row" style="margin-left: -15%;">
                            <label for="units" class="col-md-4 col-form-label text-md-right">{{ __('Units') }}</label>

                            <div class="col-md-6">
                                <input id="units" type="text" class="form-control @error('fname') is-invalid @enderror" name="units" name="units" value="{{ old('units') }}" autofocus>        
                            </div>

                            @error('units')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
        
                        <br>
                        <!--BUTTON-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="width:50%; margin-left:0%;" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection