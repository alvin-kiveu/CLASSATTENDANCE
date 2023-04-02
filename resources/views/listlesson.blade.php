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
                                        <th>Lesson Name</th>
                                        <th>Class Name</th>
                                        <th>Year of Study</th>
                                        <th>Lesson Code</th>
                                        <th>Qrcode</th>
                                        <th>Attendance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lesson as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <?php
                                                $class = DB::table('classes')->where('classid', $item->classid)->first();
                                            ?>
                                            <td>{{ $class->classname }}</td>
                                            <td>Year {{ $class->yearofstudy }}</td>
                                            <td>{{ $item->lesssoncode }}</td>
                                            <td>
                                                <a href="downloadqrcode/{{ $item->lesssoncode }}" class="btn btn-info">Download</a>
                                            </td>
                                            <td>
                                                <a href="/viewattendance/{{ $item->lesssoncode }}" class="btn btn-success">View</a>
                                            </td>
                                            <td>
                                                <a href="/deletelesson/{{ $item->ID }}" class="btn btn-danger text-light">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
