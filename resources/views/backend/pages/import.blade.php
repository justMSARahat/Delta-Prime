@extends('backend.layout.template')
@section('body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Import</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Import Export</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-10">
                    @if( Route::currentRouteNamed('category.ie') )

                        <label for="">Category Import Export</label>
                        <form action="{{ route('category.import') }}" method="POST" enctype="multipart/form-data">
                    @elseif( Route::currentRouteNamed('brand.ie') )

                        <label for="">Brand Import Export</label>
                        <form action="{{ route('brand.import') }}" method="POST" enctype="multipart/form-data">
                    @elseif( Route::currentRouteNamed('post.ie') )

                        <label for="">Post Import Export</label>
                        <form action="{{ route('post.import') }}" method="POST" enctype="multipart/form-data">
                    @elseif( Route::currentRouteNamed('product.ie') )

                        <label for="">Product Import Export</label>
                        <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
                    @elseif( Route::currentRouteNamed('order.ie') )

                        <label for="">Oder Import Export</label>
                        <form action="{{ route('order.import') }}" method="POST" enctype="multipart/form-data">
                    @elseif( Route::currentRouteNamed('customer.ie') )

                        <label for="">Customer Import Export</label>
                        <form action="{{ route('customer.import') }}" method="POST" enctype="multipart/form-data">
                    @endif

                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0;">
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Import data</button>

                        @if( Route::currentRouteNamed('category.ie') )
                            <a class="btn btn-success" href="{{ route('category.export') }}">Export data</a>
                        @elseif( Route::currentRouteNamed('brand.ie') )
                            <a class="btn btn-success" href="{{ route('brand.export') }}">Export data</a>
                        @elseif( Route::currentRouteNamed('post.ie') )
                            <a class="btn btn-success" href="{{ route('post.export') }}">Export data</a>
                        @elseif( Route::currentRouteNamed('product.ie') )
                            <a class="btn btn-success" href="{{ route('product.export') }}">Export data</a>
                        @elseif( Route::currentRouteNamed('order.ie') )
                            <a class="btn btn-success" href="{{ route('order.export') }}">Export data</a>
                        @elseif( Route::currentRouteNamed('customer.ie') )
                            <a class="btn btn-success" href="{{ route('customer.export') }}">Export data</a>
                        @endif
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection
