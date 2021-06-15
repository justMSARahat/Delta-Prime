@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pb-20">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blog</h3>

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
                                Title
                            </th>
                            <th style="width: 10%">
                                Image
                            </th>
                            <th style="width: 10%">
                                Brand
                            </th>
                            <th style="width: 10%" class="text-center">
                                Category
                            </th>
                            <th style="width: 10%" class="text-center">
                                Comment
                            </th>
                            <th style="width: 10%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ( $posts as $post )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><a> {{ $post->title }}</a>
                                <br>
                                <small> Created {{ $post->created_at }}</small>
                            </td>

                            <td class="project-state">
                                <img src="{{ asset('Backend/Image/Post') }}/{{ $post->image }}" alt="" width="40px">
                            </td>
                            <td class="project-state">{{ $post->brand }}</td>
                            <td class="project-state">{{ $post->category }}</td>
                            <td class="project-state">
                                @if ( $post->status == 1 )
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-warning">Inactive</span>
                                @endif
                            </td>
                            <td class="project-state">
                                @if ( $post->comment_opt == 1 )
                                <span class="badge badge-success">Enabled</span>
                                @else
                                <span class="badge badge-warning">Disabled</span>
                                @endif
                            </td>

                            <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('post.edit',$post->id) }}" >
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog"
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
                                                I Agree to Delete the post!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <form action="{{ route('post.delete',$post->id) }}" method="Post">
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
                {!! $posts->links('vendor.pagination.custom_2') !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <a href="{{ route('post.create') }}" class="btn btn-primary"> ADD NEW ITEM </a>

        <div style="display: inline; float: right;">
            <a class="btn btn-success" href="{{ route('post.ie') }}">Import data</a>
            <a class="btn btn-info" href="{{ route('post.export') }}">Export data</a>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection
