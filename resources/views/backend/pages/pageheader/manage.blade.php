@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Page Headers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Page Header</li>
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
                <h3 class="card-title">Page Header</h3>

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
                                Breadcrumb
                            </th>
                            <th style="width: 20%">
                                Page
                            </th>
                            <th style="width: 20%" class="text-center">
                                Visibility
                            </th>
                            <th style="width: 30%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ( $pageheaders as $pageheader )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><a> {{ $pageheader->title }}</a></td>
                            <td><a> {{ $pageheader->breadcrumbs }}</a></td>
                            <td><a> {{ $pageheader->page }}</a></td>

                            <td class="project-state">
                                @if ( $pageheader->visibility == 1 )
                                <span class="badge badge-success">Public</span>
                                @else
                                <span class="badge badge-warning">Hidden</span>
                                @endif
                            </td>

                            <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('header.edit',$pageheader->id) }}" >
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {!! $pageheaders->links('vendor.pagination.custom_2') !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
