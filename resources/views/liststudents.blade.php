@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Of Lesson</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">View Lesson</h3>
                        </div>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Reg ID</th>
                                        <th>Student Name</th>
                                        <th>Student Email</th>
                                        <th>Course Name</th>
                                        <th>Course Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //GET ALL STUDENTS
                                    $students = DB::table('students')->get();
                                    //END GET ALL STUDENTS
                                    $no = 0;
                                    foreach($students as $student){
                                        $no++;
                                        $course = DB::table('classes')->where('classid', $student->courseid)->first();
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $student->studentid; ?></td>
                                        <td><?php echo $student->studentname; ?></td>
                                        <td><?php echo $student->studentemail; ?></td>
                                        <td><?php
                                        if ($course == null) {
                                            echo 'No Course';
                                        } else {
                                                echo $course->classname;
                                        }
                                        
                                        ?></td>
                                        <td>
                                            <a href="/deletestudent/<?php echo $student->ID; ?>" class="btn btn-danger text-light">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
