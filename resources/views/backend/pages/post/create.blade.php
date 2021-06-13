@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Publish Post</li>
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
        <form action="{{ route('post.store') }}" method="Post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-9">
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
                                <label for="inputName">Title</label>
                                <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea id="inputDescription"
                                    class="ckeditor form-control @error('desc') is-invalid @enderror" rows="4"
                                    name="desc">{{ old('desc') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Category</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('category') is-invalid @enderror" name="category">
                                    <option selected="" disabled="">Select Category</option>

                                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',0)->get() as $parent )
                                        <option @if( old('category') == $parent->id  ) selected @endif value="{{ $parent->id }}">{{ $parent->title }}</option>

                                        @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$parent->id)->get() as $child_one )
                                            <option @if( old('category') == $child_one->id  ) selected @endif value="{{ $child_one->id }}">-{{ $child_one->title }}</option>

                                            @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$child_one->id)->get() as $chile_two )
                                                <option @if( old('category') == $chile_two->id  ) selected @endif value="{{ $chile_two->id }}">--{{ $chile_two->title }}</option>

                                            @endforeach
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Brand</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('brand') is-invalid @enderror" name="brand">
                                    <option selected="" disabled="">Select Brand</option>

                                    @foreach ( $brand as $brand )
                                        <option @if( old('brand') == $brand->id ) selected @endif value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Options</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image') is-invalid @enderror"
                                            id="exampleInputFile" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tags</label>
                                <input type="text" id="inputName" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('status') is-invalid @enderror" value="{{ old('status') }}"
                                    name="status">
                                    <option selected="" disabled="">Select one</option>
                                    <option @if( old('status') == 1 ) selected @endif value="1">Published</option>
                                    <option @if( old('status') == 2 ) selected @endif value="2">On Hold</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Comment</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('comment_opt') is-invalid @enderror" value="{{ old('comment_opt') }}"
                                    name="comment_opt">
                                    <option selected="" disabled="">Select one</option>
                                    <option @if( old('comment_opt') == 1 ) selected @endif value="1">Enabled</option>
                                    <option @if( old('comment_opt') == 2 ) selected @endif value="2">Disabled</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom:20px">
                    <input type="submit" value="Publish Post" class="btn btn-success float-right">
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
                            <a href="{{ route('post.manage') }}">
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
