@extends('layouts.app')
@section('title', 'Students |')

    @section('content')

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="/css/sidebar.css">
    
    <div class="container" style="height: fit-content; margin-top:5%; width: 120%; margin-left:-10%;"> 
        <div class="card">
            <div class="card-header"><strong>{{ $student->lname }}</strong>,{{ $student->fname }}
                <a href="/students" class="btn btn-light" style="background-color:rgb(216, 216, 216); font-weight:bolder;
                position: absolute; right: 20px; top: 5px; cursor: pointer;">X</a></div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }} 
                </div>
            @endif
            

         
            <div class="card-body">
                <form method="POST" action="{{ route('students.update', $student->id) }}">
                    @method('PATCH')
                    @csrf

                    <!--STUDENT NUMBER-->
                    <div class="form-group row" style="margin-left: -15%;">
                        <label for="studentnum" class="col-md-4 col-form-label text-md-right">Student Number</label>

                        <div class="col-md-6">
                            <input id="studentnum" type="number" class="form-control @error('studentnum') is-invalid @enderror" name="studentnum" value="{{ $student->studentnum }}" required autocomplete="studentnum" autofocus>

                            @error('studentnum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--FIRST NAME-->
                    <div class="form-group row" style="margin-left: -15%;">
                        <label for="fname" class="col-md-4 col-form-label text-md-right">First Name</label>

                        <div class="col-md-6">
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ $student->fname }}" required autocomplete="fname" autofocus>

                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--LAST NAME-->
                    <div class="form-group row" style="margin-left: -15%;">
                        <label for="lname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                        <div class="col-md-6">
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $student->lname }}" required autocomplete="lname" autofocus>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--MIDDLE NAME-->
                    <div class="form-group row" style="margin-left: -15%;">
                        <label for="lname" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                        <div class="col-md-6">
                            <input id="mnamee" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ $student->mname }}" required autocomplete="mname" autofocus>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <!--COURSE-->
                     <div class="form-group row" style="margin-left: -15%;">
                        <label for="course" class="col-md-4 col-form-label text-md-right">Course</label>

                        <div class="col-md-6">
                            <input id="course" type="text" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ $student->course }}" required autocomplete="course" autofocus>

                            @error('course')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <!--YEAR-->
                     <div class="form-group row" style="margin-left: -15%;">
                        <label for="year" class="col-md-4 col-form-label text-md-right">Year</label>

                        <div class="col-md-6">
                            <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $student->year }}" required autocomplete="year" autofocus>

                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--SEX-->
                    <div class="form-group row" style="margin-left: -15%;">
                        <label for="sex" class="col-md-4 col-form-label text-md-right">Sex</label>

                        <div class="col-md-6">
                            <input id="sex" type="text" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ $student->sex }}" required autocomplete="sex" autofocus>

                            @error('sex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" style="width:37%; margin-left:0%;" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection