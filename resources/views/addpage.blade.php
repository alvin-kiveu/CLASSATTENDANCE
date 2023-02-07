@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add PAGE </h1>
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
                            <h3 class="card-title">ADD PAGE</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/addpageprocessor" method="post">
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
                                    <label for="exampleInputEmail1">Page Name</label>
                                    <input type="text" name="pagename" class="form-control" placeholder="Page Name"
                                        required>
                                </div>
                                <div class="form-group" >
                                    <label for="exampleInputEmail1">Menu Type</label>
                                    <select onChange="selectMenuType()" name='menutype' id='menuType' class="form-control">
                                        <option value="none">Select Menu Type</option>
                                        <option value="menu">Menu</option>
                                        <option value="submenu">Sub Menu</option>
                                    </select>
                                </div>

                                <div class="form-group" id="menu" style="display:none;">
                                    <label for="exampleInputEmail1">Menu Name</label>
                                    <select name="menutypeid" class="form-control">
                                        <option value="none">Select Menu</option>
                                        @foreach ($menus as $item)
                                            <option value="{{ $item->menuid }}">{{ $item->menuname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="submenu" style="display:none;">
                                    <label for="exampleInputEmail1">Sub Menu Name</label>
                                    <select name="submenutypeid" class="form-control" >
                                        <option value="none">Select Sub Menu</option>
                                        @foreach ($submenus as $item)
                                            <option value="{{ $item->submenuid }}">{{ $item->SubmenuName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Content</label>
                                    <textarea name="content" class="form-control" placeholder="Content" id="editor"></textarea>
                                </div>


                                <div class="card-footer">
                                    <button type="sbmit" id="submit" class="btn btn-danger">ADD PAGE</button>
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function selectMenuType() {
            var menuType = document.getElementById("menuType").value;
            if (menuType == "menu") {
                document.getElementById("menu").style.display = "block";
                document.getElementById("submenu").style.display = "none";
            } else if (menuType == "submenu") {
                document.getElementById("menu").style.display = "none";
                document.getElementById("submenu").style.display = "block";
            } else {
                document.getElementById("menu").style.display = "none";
                document.getElementById("submenu").style.display = "none";
            }
        }
    </script>
@endsection
