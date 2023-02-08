@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Class </h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">ADD ClASS</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/addclassprocessor" method="post">
                            {{-- Error Handling --}}
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Class Name</label>
                                    <input type="text" name="classname" class="form-control"
                                        placeholder="Enter Class Name" required>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Year of Student</label>
                                    <select name="yearofstudy" class="form-control">
                                        <option value="1">Year One</option>
                                        <option value="2">Year Two</option>
                                        <option value="3">Year Three</option>
                                        <option value="4">Year Four</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ADD CLASS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
