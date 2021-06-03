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

                    <!--COURSE NAME-->
                    <div class="form-group row" style="margin-left: -15%;">
                        <label for="coursename" class="col-md-4 col-form-label text-md-right">Course Name</label>

                        <div class="col-md-6">
                            <input id="coursename" type="text" class="form-control @error('coursename') is-invalid @enderror" name="coursename" value="{{ $student->coursename }}" required autocomplete="coursename" autofocus>

                            @error('coursename')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--UNITS-->
                    <div class="form-group row" style="margin-left: -15%;">
                        <label for="units" class="col-md-4 col-form-label text-md-right">Units</label>

                        <div class="col-md-6">
                            <input id="units" type="text" class="form-control @error('units') is-invalid @enderror" name="units" value="{{ $student->units }}" required autocomplete="units" autofocus>

                            @error('units')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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