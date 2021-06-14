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
                <h3 class="card-title">Mailchimp Settings</h3>

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
                <form role="form" method="post" action="{{ route('mailchimp.settings.update') }}">
                @csrf

                    <div class="form-group">
                        <label for="">MAILCHIMP API KEY</label>
                        <input type="text" class="form-control" name="MAILCHIMP_APIKEY" value="{{ env('MAILCHIMP_APIKEY') }}">
                    </div>
                    <div class="form-group">
                        <label for="">MAILCHIMP LIST ID</label>
                        <input type="text" class="form-control" name="MAILCHIMP_LIST_ID" value="{{ env('MAILCHIMP_LIST_ID') }}">
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
