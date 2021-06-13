@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Website</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Website</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Website Info</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body ">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" disabled value="{{ $infos->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">Descripion</label>
                        <input type="text" class="form-control" disabled value="{{ $infos->description }}">
                    </div>
                    <div class="form-group">
                        <label for="">Site Url</label>
                        <input type="text" class="form-control" disabled value="{{ $infos->site_url }}">
                    </div>
                    <div class="form-group">
                        <label for="">Site Currency</label>
                        <input type="text" class="form-control" disabled value="{{ $infos->currency }}">
                    </div>
                    <div class="form-group">
                        <label for="">Site Currency Icon</label>
                        <input type="text" class="form-control" disabled value="{{ $infos->currency_icon }}">
                    </div>
                    <div class="form-group">
                        <label for="">Logo</label>
                        <img src="{{ asset('Backend/Image/Website/'.$infos->logo) }}" alt=""  style="display: block; width:250px; margin:20px">
                    </div>
                    <div class="form-group">
                        <label for="">Favicon</label>
                        <img src="{{ asset('Backend/Image/Website/'.$infos->favicon) }}" alt=""  style="display: block; width:250px; margin:20px">
                    </div>

                    <a href="{{ route('edit', $infos->id) }}" class="btn btn-primary">Edit Info</a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
