@extends('student.layout')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                    
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Edit Students
                            <a href="{{ url('students') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-student/'.$student->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for=""> Student Name</label>
                                <input type="text" value="{{ $student->name }}" name="name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Studnet Roll</label>
                                <input type="text" value="{{ $student->roll }}" name="roll" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Class</label>
                                <input type="text" value="{{ $student->class }}" name="class" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Mobile</label>
                                <input type="text" value="{{ $student->mobile }}" name="mobile" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Email</label>
                                <input type="text" value="{{ $student->email }}" name="email" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Image</label>
                                <input type="file" name="image"  class="form-control">
                                <img src="{{ asset('uploads/students/'.$student->image) }}" width ="70px" height="70px" alt="Image">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Student</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection