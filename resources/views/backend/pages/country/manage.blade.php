@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Country</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Country</li>
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
                <h3 class="card-title">Country</h3>

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
                            <th style="width: 10%">
                                Priority
                            </th>
                            <th style="width: 15%" class="text-center">
                                Status
                            </th>
                            <th style="width: 30%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ( $country as $item )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a> {{ $item->name }}</a> </td>
                                <td><a> {{ $item->priority }}</a> </td>
                                <td class="project-state">
                                    @if ( $item->status == 1 )
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-warning">On-Hold</span>
                                    @endif
                                </td>

                                <td class="project-actions text-center">
                                    <a class="btn btn-info btn-sm" href="{{ route('country.edit',$item->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                        data-target="#exampleModal{{$item->id}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    <!-- Modal -->
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="text-align: left">
                                            I Agree to Delete the Country!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <a href="{{ route('country.delete',$item->id) }}"
                                                class="btn btn-primary">Delete</a>
                                            {{-- <form action="{{ route('cat.delete',$category->id) }}" method="Post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {!! $country->links('vendor.pagination.custom_2') !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <a href="{{ route('country.create') }}" class="btn btn-primary" style="margin: 10px 0"> ADD NEW COUNTRY</a>

    </section>
    <!-- /.content -->
</div>
@endsection
