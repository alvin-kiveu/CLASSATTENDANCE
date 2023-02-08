@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ADD A LESSON </h1>
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
                    <div class="card card-danger ">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">ADD LESSON</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/addlessonprocessor" method="post">
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
                                    <label for="exampleInputEmail1">Add Lesson</label>
                                    <input type="text" name="lessonname" class="form-control" placeholder="Enter Lesson Name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Class</label>
                                    <select name="classid" class="form-control" required>
                                        @foreach ($classes as $item)
                                            <option value="{{ $item->classid }}">Year {{ $item->yearofstudy }}  {{ $item->classname }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ADD LESSON</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
