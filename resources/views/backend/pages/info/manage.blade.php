@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
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
                <h3 class="card-title">Contact Info</h3>

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
                @foreach ( $info as $info )
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" disabled value="{{ $info->email }}">
                    </div>

                    <div class="form-group">
                        <label for="">Phone 1</label>
                        <input type="text" class="form-control" disabled value="{{ $info->phone_one }}">
                    </div>

                    <div class="form-group">
                        <label for="">Phone 2</label>
                        <input type="text" class="form-control" disabled value="{{ $info->phone_two }}">
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="" class="form-control"  disabled id="" cols="30" rows="2">{!! $info->address !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="" class="form-control"  disabled id="" cols="30" rows="5">{!! $info->description !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Facaebook</label>
                        <input type="text" class="form-control" disabled value="{{ $info->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="">Twitter</label>
                        <input type="text" class="form-control" disabled value="{{ $info->twitter }}">
                    </div>
                    <div class="form-group">
                        <label for="">Behance</label>
                        <input type="text" class="form-control" disabled value="{{ $info->behance }}">
                    </div>
                    <div class="form-group">
                        <label for="">Dribbble</label>
                        <input type="text" class="form-control" disabled value="{{ $info->dribbble }}">
                    </div>
                    <div class="form-group">
                        <label for="">Map Api</label>
                        <input type="text" class="form-control" disabled value="{{ $info->map_api }}">
                    </div>

                    <a href="{{ route('contact.edit', $info->id) }}" class="btn btn-primary">Edit Contact Information</a>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
