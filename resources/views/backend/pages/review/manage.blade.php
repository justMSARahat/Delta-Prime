@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Review</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Review</li>
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
                <h3 class="card-title">Approved</h3>

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
                                Product Name
                            </th>
                            <th style="width: 10%">
                                Ratings
                            </th>
                            <th style="width: 15%" class="text-center">
                                Message
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ( $reviews as $item )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->product_name->title}}</td>
                                <td>{{ $item->rating }} Stars</td>
                                <td>{{ $item->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {!! $reviews->links('vendor.pagination.custom') !!} --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {!! $reviews->links('vendor.pagination.custom_2') !!}
            </div>
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pending to Approve</h3>

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
                                Product Name
                            </th>
                            <th style="width: 10%">
                                Ratings
                            </th>
                            <th style="width: 15%" class="text-center">
                                Message
                            </th>
                            <th style="width: 30%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ( $under_reviews as $item )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->product_name->title}}</td>
                                <td>{{ $item->rating }} Stars</td>
                                <td>{{ $item->message }}</td>

                                <td class="project-actions text-center">
                                    <form action="{{ route('review.update',$item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {!! $under_reviews->links('vendor.pagination.custom_2') !!}
            </div>
        </div>
        <!-- /.card -->


    </section>
    <!-- /.content -->
</div>
@endsection
