@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Menu </h1>
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
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">ADD SUB MENU</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/addsubmenuprocessor" method="post">
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
                                    <label for="exampleInputEmail1">Sub Menu Name</label>
                                    <input type="text" name="submenuname" class="form-control" placeholder="Sub Menu Name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Menu Name</label>
                                    <select name="menuid" class="form-control" required>
                                        <option value="">Select Menu</option>
                                        @foreach ($menus as $item)
                                            <option value="{{ $item->menuid }}">{{ $item->menuname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger">ADD SUB MENU</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
