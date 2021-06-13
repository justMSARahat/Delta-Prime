@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Website Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Contact Info</li>
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
        <form action="{{ route('edit.update',$info->id) }}" method="Post" enctype="multipart/form-data">
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
                        <div class="card-body ">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $info->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Descripion</label>
                                    <input type="text" class="form-control" name="description" value="{{ $info->description }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Site Url</label>
                                    <input type="text" class="form-control" name="site_url" value="{{ $info->site_url }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Site Currency</label>
                                    <input type="text" class="form-control" name="currency" value="{{ $info->currency }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Site Currency Icon</label>
                                    <input type="text" class="form-control" name="currency_icon" value="{{ $info->currency_icon }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" name="logo" id="" class="form-control-files" style="display: block;">
                                    <img src="{{ asset('Backend/Image/Website/'.$info->logo) }}" alt="" style="display: block; width:250px; margin:20px">
                                </div>
                                <div class="form-group">
                                    <label for="">Favicon</label>
                                    <input type="file" name="favicon" id="" class="form-control-files" style="display: block;">
                                    <img src="{{ asset('Backend/Image/Website/'.$info->favicon) }}" alt="" style="display: block; width:250px; margin:20px">
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
