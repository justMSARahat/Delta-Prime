@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('cat.store') }}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Category Title</label>
                                <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Parent Category</label>
                                <select id="inputStatus"
                                    class="form-control custom-select" name="parent">
                                    <option selected="" disabled="">Select one</option>
                                    <option value="0">Parent</option>

                                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',0)->get() as $parent )
                                        <option value="{{ $parent->id }}">{{ $parent->title }}</option>

                                        @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$parent->id)->get() as $child_one )
                                            <option value="{{ $child_one->id }}">-{{ $child_one->title }}</option>

                                            @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$child_one->id)->get() as $chile_two )
                                                <option value="{{ $chile_two->id }}">--{{ $chile_two->title }}</option>

                                            @endforeach
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('status') is-invalid @enderror" value="{{ old('status') }}"
                                    name="status">
                                    <option selected="" disabled="">Select one</option>
                                    <option value="1">Published</option>
                                    <option value="2">On Hold</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Featured</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('feature') is-invalid @enderror" value="{{ old('feature') }}" name="feature">
                                    <option selected="" disabled="">Select one</option>
                                    <option value="1">Yes | Show on Menu</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Logo (Font-Awesome)</label>
                                <input type="text" id="inputName" class="form-control " name="logo" value="{{ old('logo') }}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom:20px">
                    <input type="submit" value="Add New Category" class="btn btn-success float-right">
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="text-align: left">
                            I Agree, Leave the Page!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                            <a href="{{ route('cat.manage') }}">
                                <button type="Button" class="btn btn-primary">Confirm</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
