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
                <h3 class="card-title">Website Optimization</h3>

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
                    <label for="" style="display: block">Clear All Cache</label>
                    <a href="{{ route('cache') }}" class="btn btn-primary">Clear Cache</a>
                </div>
                <div class="form-group">
                    <label for="" style="display: block">Clear All Event</label>
                    <a href="{{ route('event') }}" class="btn btn-primary">Clear Event</a>
                </div>
                <div class="form-group">
                    <label for="" style="display: block">Clear All Route</label>
                    <a href="{{ route('route') }}" class="btn btn-primary">Clear Route</a>
                </div>
                <div class="form-group">
                    <label for="" style="display: block">Clear All View</label>
                    <a href="{{ route('view') }}" class="btn btn-primary">Clear View</a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
