@extends('layout')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">


                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Account Users</span>
                            <span class="info-box-number">
                                <?php
                                //COUNT NUM OF USERS
                                $users = DB::table('members')->count();
                                echo $users;
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Register Students</span>
                            <span class="info-box-number">
                                <?php
                                //COUNT NUM OF MENUS
                                $registerstudents = DB::table('students')->count();
                                echo $registerstudents;
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Class</span>
                            <span class="info-box-number">
                                <?php
                                //COUNT NUM OF SUB MENUS
                                $classes = DB::table('classes')->count();
                                echo $classes;
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Lessons</span>
                            <span class="info-box-number">
                                <?php
                                //COUNT NUM OF PAGES
                                $lesson = DB::table('lesson')->count();
                                echo $lesson;
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->




            </div>
            <!-- /.row -->


            <!-- Main row -->

        </div>
        <!--/. container-fluid -->


        {{-- GET RESENT SIGN --}}
    </section>
    <!-- /.content -->

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Resent Signed Attendance</h1>
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
                                <h3 class="card-title">sign</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student Name</th>
                                            <th>Year of Study</th>
                                            <th>Course</th>
                                            <th>Lesson</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        $sign = DB::table('student_sign')->orderBy('ID', 'desc')->limit(10)->get();
                                        foreach($sign as $studentsign){
                                            $i++;
                                            $studentid = $studentsign->studentid;
                                            $lessonid = $studentsign->lessonid;
                                            $student = DB::table('students')->where('studentid', $studentid)->first();
                                            $lesson = DB::table('lesson')->where('lesssoncode', $lessonid)->first();
                                            $course = DB::table('classes')->where('classid', $student->courseid)->first();
                                            echo '
                                            <tr>
                                                <td>'.$i.'</td>
                                                <td>'.$student->studentname.'</td>
                                                <td>Year '.$course->yearofstudy.'</td>
                                                <td>'.$course->classname.'</td>
                                                <td>'.$lesson->name.'</td>
                                            </tr>
                                            ';
                                        }
                                        ?>
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
