@extends('student.layout')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Management System


                            <div class="btn btn-warning btn-lg" title="Logout">
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout_form').submit();">
                                            {{ __('Logout') }}
                                            <i class='fa fa-plus' aria-hidden="true"> </i>
                                        </a>
                                        <form id="logout_form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                            </div>
                            
                            <a href="{{ url('add-student') }}" class="btn btn-primary float-end">Add New Student</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Student Roll</th>
                                    <th>Class</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $item)
                                    
                                
                                <tr>
                                    <td>{{ $item-> id }}</td>
                                    <td>{{ $item-> name }}</td>
                                    <td>{{ $item-> roll }}</td>
                                    <td>{{ $item-> class }}</td>
                                    <td>{{ $item-> mobile }}</td>
                                    <td>{{ $item-> email}}</td>
                                    <td>
                                        <img src="{{ asset('uploads/students/'.$item->image) }}" width ="70px" height="70px" alt="Image">
                                    </td>
                                    <td>
                                        <a href="{{ url('edit-student/'.$item->id) }}" class="btn btn-primary btn-m">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-m">Delete</a>
                                    </td>
                                    

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection