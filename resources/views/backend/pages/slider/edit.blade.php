@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Slider Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Update Slider</li>
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
        <form action="{{ route('slider.update',$slider->id) }}" method="Post" enctype="multipart/form-data">
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
                                <label for="inputName">Slider Title</label>
                                <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $slider->title }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Slider Description</label>
                                <textarea name="desc" cols="30" rows="3" class="ckeditor form-control @error('desc') is-invalid @enderror" >{{ $slider->desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Button Text</label>
                                <input type="text" id="inputName" class="form-control @error('btn_text') is-invalid @enderror" name="btn_text" value="{{ $slider->btn_text }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Button URL</label>
                                <input type="text" id="inputName" class="form-control @error('btn_link') is-invalid @enderror" name="btn_link" value="{{ $slider->btn_link }}" >
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('status') is-invalid @enderror" value="{{ old('status') }}"
                                    name="status">
                                    <option @if( $slider->status == 1 ) selected @endif value="1">Published</option>
                                    <option @if( $slider->status == 2 ) selected @endif value="2">On Hold</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('image') is-invalid @enderror"
                                            id="exampleInputFile" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">{{ $slider->image }}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <img src="{{ asset('Backend/Image/Slider/' . $slider->image) }}" alt="" width="30%" style="border: 1px solid black; padding: 20px; margin-top:20px" >
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom:20px">
                    <input type="submit" value="Update Slider" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
