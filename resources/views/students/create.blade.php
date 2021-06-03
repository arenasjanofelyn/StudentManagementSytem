@extends('layouts.app')

@section('title', 'Students |')

    @section('content')
    
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <div class="container" style="height: fit-content; margin-top:5%; width: 120%; margin-left:10%;"> 
            <div class="card">       
                <div class="card-header" style="font-weight: bold;">
                    Add New Students
                    <a href="/students" class="btn btn-light" style="background-color:rgb(216, 216, 216); font-weight:bolder;
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

                    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!--STUDENTNUMBER-->
                        <div class="form-group row" style="margin-left: -15%;">
                            <label for="studentnum" class="col-md-4 col-form-label text-md-right">{{ __('Student Number') }}</label>

                            <div class="col-md-6">
                                <input id="studentnum" type="number" class="form-control @error('studentnum') is-invalid @enderror" name="studentnum" name="studentnum" value="{{ old('studentnum') }}" autofocus>        
                            </div>

                            @error('studentnum')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                            
                        <!--FIRSTNAME-->
                        <div class="form-group row" style="margin-left: -15%;">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" name="fname" value="{{ old('fname') }}" autofocus>        
                            </div>

                            @error('fname')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        <!--LASTNAME-->
                        <div class="form-group row"style="margin-left: -15%;">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" name="lname" value="{{ old('lname') }}" autofocus>        
                            </div>

                            @error('lname')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        <!--MIDDLENAME-->
                        <div class="form-group row"style="margin-left: -15%;">
                            <label for="mname" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" name="mname" value="{{ old('mname') }}" autofocus>        
                            </div>

                            @error('mname')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        <!--COURSE-->
                        <div class="form-group row"style="margin-left: -15%; width: 40%;">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>
                        
                            <div class="col-md-6">
                                <select name="course" id="course" class="form-control @error('course') is-invalid @enderror" value="{{ old('course') }}" autofocus>
                                    <option value="volvo">BSIT</option>
                                    <option value="saab">BSCS</option>
                                    <option value="opel">BSEMC</option>
                                    <option value="audi">ACT</option>
                                </select>      
                            </div>

                            @error('course')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        <!--YEAR-->
                        <div class="form-group row"style="margin-left: -15%;">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" name="year" value="{{ old('year') }}" autofocus>        
                            </div>

                            @error('year')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        <!--SEX-->
                        <div class="form-group row"style="margin-left: -15%;">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>

                            <div class="col-md-6">
                                <input id="sex" type="text" class="form-control @error('year') is-invalid @enderror" name="sex" name="sex" value="{{ old('sex') }}" autofocus>        
                            </div>

                            @error('sex')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        <!--IMAGE UPLOAD-->
                        <div class="form-group row" style="margin-left:2%;">
                            <label for="img">{{ __('Upload Image') }}</label>
                            <div class="col-md-6">
                                <input type = "file" class="form-control-file @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" autocomplete="img">
                                
                            </div>

                            @error('img')
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