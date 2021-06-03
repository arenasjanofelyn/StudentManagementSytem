@extends('layouts.app')

@section('title', 'Instructors |')

    @section('content')
    
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <div class="container" style="height: fit-content; margin-top:5%; width: 120%; margin-left: 10%;"> 
            <div class="card">       
                <div class="card-header" style="font-weight: bold;">
                    Add New Instructors
                    <a href="/instructors" class="btn btn-light" style="background-color:rgb(216, 216, 216); font-weight:bolder;
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

                    <form method="POST" action="{{ route('instructors.store') }}" enctype="multipart/form-data">
                        @csrf
                            
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

                        <!--POSITION-->
                        <div class="form-group row"style="margin-left: -15%;">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" name="position" value="{{ old('position') }}" autofocus>        
                            </div>

                            @error('position')
                                <span class="invalid-feedback" role="alert"> 
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        <!--EMAIL-->
                        <div class="form-group row"style="margin-left: -15%;">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" name="email" value="{{ old('email') }}" autofocus>        
                            </div>

                            @error('email')
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