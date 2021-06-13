@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Contact Info</h1>
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
        <form action="{{ route('contact.update',$info->id) }}" method="Post" enctype="multipart/form-data">
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
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $info->email }}">
                            </div>

                            <div class="form-group">
                                <label for="">Phone 1</label>
                                <input type="text" class="form-control" name="phone_one" value="{{ $info->phone_one }}">
                            </div>

                            <div class="form-group">
                                <label for="">Phone 2</label>
                                <input type="text" class="form-control" name="phone_two" value="{{ $info->phone_two }}">
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control"  name="address" id="" cols="30" rows="2">{{ $info->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="ckeditor form-control"  name="description" id="" cols="30" rows="5">{{ $info->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Facaebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{ $info->facebook }}">
                            </div>
                            <div class="form-group">
                                <label for="">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="{{ $info->twitter }}">
                            </div>
                            <div class="form-group">
                                <label for="">Behance</label>
                                <input type="text" class="form-control" name="behance" value="{{ $info->behance }}">
                            </div>
                            <div class="form-group">
                                <label for="">Dribbble</label>
                                <input type="text" class="form-control" name="dribbble" value="{{ $info->dribbble }}">
                            </div>
                            <div class="form-group">
                                <label for="">Map Api</label>
                                <input type="text" class="form-control" name="map_api" value="{{ $info->map_api }}">
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
