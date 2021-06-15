@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
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
                <h3 class="card-title">Category</h3>

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
                                Logo
                            </th>
                            <th style="width: 15%" class="text-center">
                                Parent
                            </th>
                            <th style="width: 15%" class="text-center">
                                Featured
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
                        @foreach ( $categorys as $category )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a> {{ $category->title }}</a>
                                    <br>
                                    <small> Created {{ $category->created_at }}</small>
                                </td>

                                <td class="project-state">
                                    <span class="fas {{ $category->logo }}"></span>
                                </td>

                                <td class="project-state">
                                    @if ( $category->parent == 0 )
                                    Parent
                                    @else
                                    {{ $category->parent_cat->title }}
                                    @endif
                                </td>

                                <td class="project-state">
                                    @if ( $category->feature == 1 )
                                    <span class="badge badge-success">Yes</span>
                                    @else
                                    <span class="badge badge-warning">No</span>
                                    @endif
                                </td>
                                <td class="project-state">
                                    @if ( $category->status == 1 )
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-warning">On-Hold</span>
                                    @endif
                                </td>

                                <td class="project-actions text-center">
                                    <a class="btn btn-info btn-sm" href="{{ route('cat.edit',$category->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                        data-target="#exampleModal{{$category->id}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    <!-- Modal -->
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog"
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
                                            I Agree to Delete the category!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <a href="{{ route('cat.delete',$category->id) }}"
                                                class="btn btn-primary">Delete</a>
                                            {{-- <form action="{{ route('cat.delete',$category->id) }}" method="Post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$category->id)->get() as $child )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a> {{ $child->title }}</a>
                                        <br>
                                        <small> Created {{ $child->created_at }}</small>
                                    </td>

                                    <td class="project-state">
                                        <span class="fas {{ $child->logo }}"></span>
                                    </td>

                                    <td class="project-state">
                                        @if ( $child->parent == 0 )
                                        Parent
                                        @else
                                        {{ $child->parent_cat->title }}
                                        @endif
                                    </td>

                                    <td class="project-state">
                                        @if ( $child->feature == 1 )
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-warning">No</span>
                                        @endif
                                    </td>

                                    <td class="project-state">
                                        @if ( $child->status == 1 )
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-warning">On-Hold</span>
                                        @endif
                                    </td>

                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm" href="{{ route('cat.edit',$child->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                            data-target="#exampleModal-{{$child->id}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        <!-- Modal -->
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal-{{$child->id}}" tabindex="-1" role="dialog"
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
                                                I Agree to Delete the category!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <a href="{{ route('cat.delete',$child->id) }}"
                                                    class="btn btn-primary">Delete</a>
                                                {{-- <form action="{{ route('cat.delete',$category->id) }}" method="Post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                                </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$child->id)->get() as $grand )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a> {{ $grand->title }}</a>
                                        <br>
                                        <small> Created {{ $grand->created_at }}</small>
                                    </td>

                                    <td class="project-state">
                                        <span class="fas {{ $grand->logo }}"></span>
                                    </td>

                                    <td class="project-state">
                                        @if ( $grand->parent == 0 )
                                        Parent
                                        @else
                                        {{ $grand->parent_cat->title }}
                                        @endif
                                    </td>

                                    <td class="project-state">
                                        @if ( $grand->feature == 1 )
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-warning">No</span>
                                        @endif
                                    </td>

                                    <td class="project-state">
                                        @if ( $grand->status == 1 )
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-warning">On-Hold</span>
                                        @endif
                                    </td>

                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm" href="{{ route('cat.edit',$grand->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                            data-target="#exampleModal-{{$grand->id}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        <!-- Modal -->
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal-{{$grand->id}}" tabindex="-1" role="dialog"
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
                                                I Agree to Delete the category!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <a href="{{ route('cat.delete',$grand->id) }}"
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

                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {!! $categorys->links('vendor.pagination.custom_2') !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <a href="{{ route('cat.create') }}" class="btn btn-primary"> ADD NEW ITEM </a>

        <div style="display: inline; float: right;">
            <a class="btn btn-success" href="{{ route('category.ie') }}">Import data</a>
            <a class="btn btn-info" href="{{ route('category.export') }}">Export data</a>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection
