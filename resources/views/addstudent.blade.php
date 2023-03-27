@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Course </h1>
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
                            <h3 class="card-title text-uppercase">ADD STUDENTS</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/addstudent" method="post">
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
                                    <label for="exampleInputEmail1">Student's Name</label>
                                    <input type="text" name="studentname" class="form-control"
                                        placeholder="Enter Full Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course</label>
                                    <select name="courseid" class="form-control" required>
                                        <?php
                                         //GET ALL COURSE
                                         $course = DB::table('classes')->get();
                                         //LOOP THROUGH COURSE
                                            foreach ($course as $item) {
                                                echo "<option value='$item->classid'>$item->classname</option>";
                                            }

                                        ?>
                                    </select>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Type password" required>
                                    </div>
                            
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ADD STUDENT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
