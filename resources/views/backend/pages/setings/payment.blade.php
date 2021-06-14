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
                <h3 class="card-title">Payment Settings</h3>

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
                <form role="form" method="post" action="{{ route('payment.settings.update') }}">
                @csrf
                <h4>Paypal Settings</h4>
                    <div class="form-group">
                        <label for="">Paypal Currency</label>
                        <input type="text" class="form-control" name="PAYPAL_CURRENCY" value="{{ env('PAYPAL_CURRENCY') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Paypal Mode</label>
                        <select class="form-control" name="PAYPAL_MODE">
                            <option value="sandbox" {{ (env('PAYPAL_MODE')=='sandbox')?'selected':'' }}>Sandbox</option>
                            <option value="live" {{ (env('PAYPAL_MODE')=='live')?'selected':'' }}>Live</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Paypal Sandbox Api Username</label>
                        <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_USERNAME" value="{{ env('PAYPAL_SANDBOX_API_USERNAME') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Paypal Sandbox Api Password</label>
                        <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_PASSWORD" value="{{ env('PAYPAL_SANDBOX_API_PASSWORD') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Paypal Sandbox Api Secret</label>
                        <input type="text" class="form-control" name="PAYPAL_SANDBOX_API_SECRET" value="{{ env('PAYPAL_SANDBOX_API_SECRET') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Paypal Live Api Username</label>
                        <input type="text" class="form-control" name="PAYPAL_LIVE_API_USERNAME" value="{{ env('PAYPAL_LIVE_API_USERNAME') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Paypal Live Api Password</label>
                        <input type="text" class="form-control" name="PAYPAL_LIVE_API_PASSWORD" value="{{ env('PAYPAL_LIVE_API_PASSWORD') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Paypal Live Api Secret</label>
                        <input type="text" class="form-control" name="PAYPAL_LIVE_API_SECRET" value="{{ env('PAYPAL_LIVE_API_SECRET') }}">
                    </div>
                    <br>
                    <h4>Omise Settings</h4>
                    <div class="form-group">
                        <label for="">Omise Public Key</label>
                        <input type="text" class="form-control" name="OMISE_PUBLIC_KEY" value="{{ env('OMISE_PUBLIC_KEY') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Omise Secret Key</label>
                        <input type="text" class="form-control" name="OMISE_SECRET_KEY" value="{{ env('OMISE_SECRET_KEY') }}">
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
