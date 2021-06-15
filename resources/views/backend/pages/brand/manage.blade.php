@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brands</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Brands</li>
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
                <h3 class="card-title">Brands</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 30%">
                                Name
                            </th>
                            <th style="width: 20%">
                                Logo
                            </th>
                            <th style="width: 20%" class="text-center">
                                Status
                            </th>
                            <th style="width: 30%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ( $brands as $brand )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><a> {{ $brand->title }}</a>
                                <br>
                                <small> Created {{ $brand->created_at }}</small>
                            </td>

                            <td class="project-state">
                                <img src="{{ asset('Backend/Image/Brand') }}/{{ $brand->logo }}" alt="" width="40px">
                            </td>

                            <td class="project-state">
                                @if ( $brand->status == 1 )
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-warning">On-Hold</span>
                                @endif
                            </td>

                            <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('brand.edit',$brand->id) }}" >
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#exampleModal{{ $brand->id }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $brand->id }}" tabindex="-1" role="dialog"
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
                                                I Agree to Delete the brand!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <form action="{{ route('brand.delete',$brand->id) }}" method="Post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card-footer clearfix">
                {!! $brands->links('vendor.pagination.custom_2') !!}
            </div>
            <!-- /.card-body -->
        </div>
        <a href="{{ route('brand.create') }}" class="btn btn-primary"> ADD NEW ITEM </a>

        <div style="display: inline; float: right;">
            <a class="btn btn-success" href="{{ route('brand.ie') }}">Import data</a>
            <a class="btn btn-info" href="{{ route('brand.export') }}">Export data</a>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
