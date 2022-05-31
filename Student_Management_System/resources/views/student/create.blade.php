@extends('student.layout')

@section('content')

<style>
    p{
        color: red;
    }
</style>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                    
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Students
                            <a href="{{ url('students') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add-student') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for=""> Student Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                required/>
                               @error('name')
                               <p>{{ $message }}</p></br>
                               @enderror 
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Studnet Roll</label>
                                <input type="text" name="roll" class="form-control" value="{{ old('roll') }}"
                                required/>
                               @error('roll')
                               <p >{{ $message }}</p></br>
                               @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Class</label>
                                <input type="text" name="class" class="form-control" value="{{ old('class') }}"
                                required/>
                               @error('class')
                               <p >{{ $message }}</p></br>
                               @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Mobile</label>
                                <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}"
                                required/>
                               @error('mobile')
                               <p >{{ $message }}</p></br>
                               @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                                required/>
                               @error('email')
                               <p >{{ $message }}</p></br>
                               @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for=""> Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save Student</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection