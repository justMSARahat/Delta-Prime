@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create User</li>
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
        <form action="{{ route('admin.store') }}" method="Post" enctype="multipart/form-data">
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
                                <label for="inputName">First Name</label>
                                <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Last Name</label>
                                <input type="text" id="inputName" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="email" id="inputName" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input type="password" id="inputName" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Phone</label>
                                <input type="text" id="inputName" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Address 1</label>
                                <input type="text" id="inputName" class="form-control @error('address_one') is-invalid @enderror" name="address_one" value="{{ old('address_one') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Address 2</label>
                                <input type="text" id="inputName" class="form-control @error('address_two') is-invalid @enderror" name="address_two" value="{{ old('address_two') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Post Code</label>
                                <input type="text" id="inputName" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Country</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('country') is-invalid @enderror" value="{{ old('country') }}"
                                    name="country">
                                    <option selected="" disabled="">Select one</option>
                                    @foreach ( $countrys as $country )
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">State</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('state') is-invalid @enderror" value="{{ old('state') }}"
                                    name="state">
                                    <option selected="" disabled="">Select one</option>
                                    @foreach ( $states as $state )
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">City</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('state') is-invalid @enderror" value="{{ old('state') }}"
                                    name="city">
                                    <option selected="" disabled="">Select one</option>
                                    @foreach ( $citys as $city )
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('status') is-invalid @enderror" value="{{ old('status') }}"
                                    name="status">
                                    <option selected="" disabled="">Select one</option>
                                    <option value="1">Enabled</option>
                                    <option value="2">Disabled</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="image" id="" class="form-control-files">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom:20px">
                    <input type="submit" value="Add New User" class="btn btn-success float-right">
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="text-align: left">
                            I Agree, Leave the Page!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                            <a href="{{ route('brand.manage') }}">
                                <button type="Button" class="btn btn-primary">Confirm</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
