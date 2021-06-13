@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
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
        <form action="{{ route('cat.update',$category->id) }}" method="Post" enctype="multipart/form-data">
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
                                <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $category->title }}">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Parent Category</label>
                                <select id="inputStatus" class="form-control custom-select" name="parent">
                                    @if ( $category->parent == 0 )
                                        <option @if( $category->parent == 0 ) selected @endif value="0">Parent</option>
                                    @else
                                        @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',0)->get() as $parent )
                                            <option @if( $category->id == $parent->id  ) selected @endif value="{{ $parent->id }}">{{ $parent->title }}</option>

                                            @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$parent->id)->get() as $child_one )
                                                <option @if( $category->id == $child_one->id ) selected @endif value="{{ $child_one->id }}">-{{ $child_one->title }}</option>

                                                @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$child_one->id)->get() as $chile_two )
                                                    <option @if( $category->id == $chile_two->id ) selected @endif value="{{ $chile_two->id }}">--{{ $chile_two->title }}</option>

                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('status') is-invalid @enderror" "
                                    name="status">
                                    <option @if( $category->status == 1 ) selected @endif value="1">Published</option>
                                    <option @if( $category->status == 2 ) selected @endif value="2">On Hold</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Featured</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('feature') is-invalid @enderror" "
                                    name="feature">
                                    <option @if( $category->feature == 1 ) selected @endif value="1">Yes | Show on Menu</option>
                                    <option @if( $category->feature == 2 ) selected @endif value="2">No</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="inputName">Logo (Font-Awesome)</label>
                                <input type="text" id="inputName" class="form-control " name="logo" value="{{ $category->logo }}">
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom:20px">
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
