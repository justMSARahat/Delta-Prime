@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Footer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Footer</li>
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
                <h3 class="card-title">Footer</h3>

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
                @foreach ( $footer as $info )

                    <div class="form-group">
                        <label for="">Logo</label>
                        <img style="display: block;" src="{{ asset('Backend/Image/'.$info->logo) }}" alt="" width="150px">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="" class="ckeditor form-control"  disabled id="" cols="30" rows="5">{!! $info->description !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" disabled value="{{ $info->email }}">
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="" class="form-control"  disabled id="" cols="30" rows="2">{!! $info->address !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" disabled value="{{ $info->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="">1st Row Title</label>
                        <input type="text" class="form-control" disabled value="{{ $info->title_one }}">
                    </div>

                    <div class="form-group">
                        <label for="">1st Row Content</label>
                        <textarea name="" class="form-control"  disabled id="" cols="30" rows="2">{!! $info->title_one_desc !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">2nd Row Title</label>
                        <input type="text" class="form-control" disabled value="{{ $info->title_two }}">
                    </div>

                    <div class="form-group">
                        <label for="">2nd Row Content</label>
                        <textarea name="" class="form-control"  disabled id="" cols="30" rows="2">{!! $info->title_two_desc !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Facebook</label>
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
                        <label for="">Copywrite Text</label>
                        <textarea name="" class="form-control"  disabled id="" cols="30" rows="2">{!! $info->copywrite !!}</textarea>
                    </div>

                    <a href="{{ route('footer.edit', $info->id) }}" class="btn btn-primary">Edit Footer Information</a>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
