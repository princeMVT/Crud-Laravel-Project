<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

@extends('layout')
@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">

            <x-nav-link/>
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2><span><a href="student/create">Add Student</a></span></div>
                    <div class="col-sm-4">
                 

                    <form action="{{ route('student.search')}}" method="POST" role="search">
                    @csrf
                    <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for"><span class="input-group-btn">
                    <button type="submit" class="btn btn-info">
                      Search
                    </button>
                    </span>
                    </div>
                    </form>


                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Pin Code</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($students as $student)
            <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->city}}</td>
            <td>{{$student->pincode}}</td>
            <td>{{$student->country}}</td>
            <td class="text-center">


      <form method="post" action="{{ route('student.destroy' , $student->id )}}">
                      <a href="{{ route('student.edit', $student->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
               @method('DELETE')
                @csrf
              <button type="submit"><i class="material-icons">&#xE872;</i></button>
            </td>
        </tr>
        @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{count($students->items())}}</b> out of <b>{{ $students->total()}}</b> entries</div>
<div class="">
    {!! $students->links() !!}
</div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
@endsection('content')
