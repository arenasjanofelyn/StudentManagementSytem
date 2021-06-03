@extends('layouts.app')
@section('title', 'Instructors |')

    @section('content')

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="/css/sidebar.css">
    
    <div class="container" style="height: fit-content; margin-top:5%; width: 120%; margin-left:-10%;"> 
        <div class="card">
            <div class="card-header"><strong>{{ $instructor->lname }}</strong>,{{ $instructor->fname }}
                <a href="/instructors" class="btn btn-light" style="background-color:rgb(216, 216, 216); font-weight:bolder;
                position: absolute; right: 20px; top: 5px; cursor: pointer;">X</a></div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }} 
                </div>
            @endif
            

         
            <div class="card-body">
                <form method="POST" action="{{ route('instructors.update', $instructor->id) }}">
                    @method('PATCH')
                    @csrf

                    <!--FIRSTNAME-->
                    <div class="form-group row" style="margin-left: -15%;">
                        <label for="fname" class="col-md-4 col-form-label text-md-right">First Name</label>

                        <div class="col-md-6">
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ $instructor->fname }}" required autocomplete="fname" autofocus>

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
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $instructor->lname }}" required autocomplete="lname" autofocus>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <!--POSITION-->
                     <div class="form-group row" style="margin-left: -15%;">
                        <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>

                        <div class="col-md-6">
                            <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $instructor->position }}" required autocomplete="position" autofocus>

                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <!--EMAIL-->
                     <div class="form-group row" style="margin-left: -15%;">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $instructor->email }}" required autocomplete="email" autofocus>

                            @error('email')
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