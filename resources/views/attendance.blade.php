@extends('layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Signed Attendance</h1>
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
                                    $lessonid = $id;
                                    $i = 0;
                                    $sign = DB::table('student_sign')->where('lessonid', $lessonid)->orderBy('ID', 'desc')->limit(10)->get();
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