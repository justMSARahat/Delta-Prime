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
                <h3 class="card-title">Mail Settings</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body ">
                <form role="form" method="post" action="{{ route('mail.settings.update') }}">
                @csrf
                    <div class="form-group">
                        <label for="">MAIL MAILER</label>
                        <input type="text" class="form-control" name="MAIL_MAILER" value="{{ env('MAIL_MAILER') }}">
                    </div>
                    <div class="form-group">
                        <label for="">MAIL HOST</label>
                        <input type="text" class="form-control" name="MAIL_HOST" value="{{ env('MAIL_HOST') }}">
                    </div>
                    <div class="form-group">
                        <label for="">MAIL PORT</label>
                        <input type="text" class="form-control" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}">
                    </div>
                    <div class="form-group">
                        <label for="">MAIL USERNAME</label>
                        <input type="text" class="form-control" name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}">
                    </div>
                    <div class="form-group">
                        <label for="">MAIL PASSWORD</label>
                        <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{ env('MAIL_PASSWORD') }}">
                    </div>
                    <div class="form-group">
                        <label for="">MAIL ENCRYPTION</label>
                        <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{ env('MAIL_ENCRYPTION') }}">
                    </div>
                    <div class="form-group">
                        <label for="">MAIL FROM ADDRESS</label>
                        <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{ env('MAIL_FROM_ADDRESS') }}">
                    </div>
                    <div class="form-group">
                        <label for="">MAIL FROM NAME</label>
                        <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{ env('MAIL_FROM_NAME') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
