@extends('layouts.app')

@section('title', '$instructors |')

    @section('content')
        {{-- create a new post --}}
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="/css/dashboard.css">

       
        <div class="col-md-6">
            <h3 style="margin-left: 40%">Instructors List</h3>
            <hr>
        </div>
            
        <div class="col-md-4">

                <form action="/instructorssearch" method="GET">
                    <div class="input-group" 
                         style="float: left;
                                margin-left: 50%;
                                max-width: 80%;">
                        <input type="search" name="search" class="form-control" placeholder="Search instructor">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-success"><i class="fas fa-search" style="font-size: 18px;"></i></button>
                                        
                            <a href="/instructors" class=" mt-10">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class="fas fa-sync-alt"></span>
                                    </button>
                                </span>
                            </a>
                        </span>
                    </div>
                </form>
            </div> 

            <div class="col-md-4" style="float: right;";>
                <a class="btn button btn-primary" href="/instructors/create"><i class="fas fa-plus" style="font-size: 100%;"></i> ADD</a>
            </div>
        
        
        <div class="card" style="width: 80%; margin-left: 17.5%; margin-top: 5%;">
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="190">Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instructor as $instructors)
                        <tr>
                            <th style="color: #8ABAAE; width: 8%;" scope="row">{{ $instructors->id }}</th>
                            <td style="width: 25%;">{{ $instructors->fname }} {{ $instructors->lname}}</td>
                            <td style="width: 25%;">{{ $instructors->position}}</td>
                            <td style="width: 25%;">{{ $instructors->email}}</td>
                            <td style="width: 40%;">
                                <form method="POST" action="{{ route('instructors.destroy', $instructors->id) }}">
                                    <a  href="/instructors/{{$instructors->id}}" class="btn btn-primary"><i style="font-size: 18px;" class="fas fa-eye"></i></a> &nbsp;
                                    <a  href="/instructors/{{$instructors->id}}/edit" class="btn btn-warning"><i style="font-size: 18px;" class="fas fa-edit"></i></a> 
                                    @method('DELETE')
                                    @csrf
                                    &nbsp; <button type="submit" class="btn btn-danger"><i style="font-size: 18px;" class="fas fa-trash"></i></button>
                                </form>
                            </td> 
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        
        </div>

        <style>
            .w-5{
                display: none;
            }
        </style>


    @endsection