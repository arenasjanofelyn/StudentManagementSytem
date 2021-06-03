@extends('layouts.app')

@section('title', 'Instructors |')

    @section('content')

        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="/css/sidebar.css">

        <div class="container">
            <br>
            <div class="card" style="height: fit-content; margin-top:2%; width: 120%; margin-left:-10%;"> 
                <div class="card-header">
                    <strong>{{ $instructor->lname }}</strong>,{{ $instructor->fname }} {{ $instructor->mname }}
                    <a href="/instructors" class="btn btn-light" style="background-color:rgb(216, 216, 216); font-weight:bolder;
                        position: absolute; right: 20px; top: 5px; cursor: pointer;">X</a>
                </div>        
                <div class="card-body" style="line-height: 2.3rem;">

                    <div class="card-1">
                        <strong>Name:</strong> {{ $instructor->fname }} {{ $instructor->lname }}
                    </div>

                    <div class="card-2">
                        <strong>Position:</strong> {{ $instructor->position }}
                    </div>

                    <div class="card-3">
                        <strong>Email:</strong> {{ $instructor->email }}
                    </div>
                </div>
            </div>
        </div>
    @endsection