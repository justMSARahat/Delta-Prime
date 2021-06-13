@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
        <form action="{{ route('header.update',$pageheader->id) }}" method="POST" enctype="multipart/form-data">
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
                                <label for="inputName">Title</label>
                                <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $pageheader->title }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Breadcrumb</label>
                                <input type="text" id="inputName" class="form-control @error('breadcrumbs') is-invalid @enderror" name="breadcrumbs" value="{{ $pageheader->breadcrumbs }}">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Page</label>
                                <input type="text" id="inputName" class="form-control" disabled name="page" value="{{ $pageheader->page }}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Visibility</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('visibility') is-invalid @enderror" value="{{ old('visibility') }}"
                                    name="visibility">
                                    <option @if( $pageheader->visibility == 1 ) selected @endif value="1">Public</option>
                                    <option @if( $pageheader->visibility == 2 ) selected @endif value="2">Hidden</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image') is-invalid @enderror"
                                            id="exampleInputFile" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">{{ $pageheader->image }}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Tab Title</label>
                                <input type="text" class="form-control" name="tab" value="{{ $pageheader->tab }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $pageheader->meta_title }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="2">{{ $pageheader->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Meta Tags</label>
                                <input type="text" class="form-control" name="tag" value="{{ $pageheader->tag }}">
                            </div>
                            <hr>
                            <hr>

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
