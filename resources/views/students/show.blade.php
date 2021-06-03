@extends('layouts.app')

@section('title', 'Students |')

    @section('content')

        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="/css/sidebar.css">

        <div class="container">
            <br>
            <div class="card" style="height: fit-content; margin-top:2%; width: 120%; margin-left:-10%;"> 
                <div class="card-header">
                    <strong>{{ $student->lname }}</strong>,{{ $student->fname }} {{ $student->mname }}
                    <a href="/students" class="btn btn-light" style="background-color:rgb(216, 216, 216); font-weight:bolder;
                        position: absolute; right: 20px; top: 5px; cursor: pointer;">X</a>
                </div>        
                <div class="card-body" style="line-height: 2.3rem;">

                    <div class="card-1">
                        @if ($student->img)
                            <img src="{{ asset('/storage/img/'.$student->img) }} ">
                        @else
                            No Image Available
                        @endif
                    <div>

                    <div class="card-2">
                        <strong>Student Number:</strong> {{ $student->studentnum }}
                    </div>
                    
                    <div class="card-3">
                        <strong>Name:</strong> {{ $student->lname }} {{ $student->fname }} {{ $student->mname }}
                    </div>

                    <div class="card-4">
                        <strong>Course and Year:</strong> {{ $student->course }} {{ $student->year }}
                    </div>

                    <div class="card-5">
                        <strong>Sex</strong> {{ $student->sex }}
                    </div>
                    
                </div>
            </div>
        </div>
    @endsection