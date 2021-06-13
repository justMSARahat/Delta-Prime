@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
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
        <form action="{{ route('product.store') }}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6" style="  display: inline-block;  float: left;  ">
                        <div class="">
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
                                        <label for="inputName">Product Title</label>
                                        <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Product Short Description</label>
                                        <textarea id="inputDescription"
                                            class="ckeditor form-control @error('short') is-invalid @enderror" rows="2"
                                            name="short">{{ old('short') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Product Main Description</label>
                                        <textarea id="inputDescription"
                                            class="ckeditor form-control @error('desc') is-invalid @enderror" rows="10" id="summary-ckeditor"
                                            name="desc">{{ old('desc') }}</textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Measurement</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Size</label>
                                        <select class="select2bs4 select2-hidden-accessible" multiple="" data-placeholder="Select Size" style="width: 100%;"  tabindex="-1" aria-hidden="true" name="size[]">
                                                <option value="1" >S</option>
                                                <option value="2" >M</option>
                                                <option value="3" >L</option>
                                                <option value="4" >XL</option>
                                                <option value="5" >XXL</option>
                                                <option value="6" >XXXL</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Color</label>
                                        <select class="select2bs4 select2-hidden-accessible" autocomplete="off" multiple="" data-placeholder="Select Color" style="width: 100%;" tabindex="-1" aria-hidden="true" name="color[]">
                                            @foreach ( App\Models\Backend\color::orderBy('title','asc')->get() as $color)
                                                <option value="{{ $color->id }}" >{{ $color->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Weight</label>
                                        <input type="text" id="inputEstimatedBudget"
                                            class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Dimention</label>
                                        <input type="text" id="inputEstimatedBudget"
                                            class="form-control @error('dimention') is-invalid @enderror" name="dimention" value="{{ old('dimention') }}" >
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="display: inline-block;">
                        <div class="">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Budget</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Product Price</label>
                                        <input type="number" id="inputEstimatedBudget"
                                            class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Product Offer Price</label>
                                        <input type="number" id="inputEstimatedBudget" class="form-control" name="offer" value="{{ old('offer') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSpentBudget">Total Quantity</label>
                                        <input type="number" id="inputSpentBudget"
                                            class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Sku Code</label>
                                        <input type="text" id="inputEstimatedDuration" class="form-control" name="sku" value="{{ old('sku') }}" >
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Status</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select id="inputStatus"
                                            class="form-control custom-select @error('status') is-invalid @enderror" value="{{ old('status') }}"
                                            name="status">
                                            <option selected="" disabled="">Select one</option>
                                            <option value="1">Published</option>
                                            <option value="2">On Hold</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Brand</label>
                                        <select id="inputStatus"
                                            class="form-control @error('brand') is-invalid @enderror" name="brand">
                                            <option selected="" disabled="">Select Category</option>

                                            @foreach ( $brands as $brand )
                                                <option @if( old('brand') == $brand->id ) selected @endif value="{{ $brand->id }}">{{ $brand->title }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Category</label>
                                        <select id="inputStatus"
                                            class="form-control @error('category') is-invalid @enderror" name="category">
                                            <option selected="" disabled="">Select Category</option>

                                            @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',0)->get() as $parent )
                                                <option @if( old('category') == $parent->id  ) selected @endif value="{{ $parent->id }}">{{ $parent->title }}</option>

                                                @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$parent->id)->get() as $child_one )
                                                    <option @if( old('category') == $child_one->id  ) selected @endif value="{{ $child_one->id }}">-{{ $child_one->title }}</option>

                                                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$child_one->id)->get() as $chile_two )
                                                        <option @if( old('category') == $chile_two->id  ) selected @endif value="{{ $chile_two->id }}">--{{ $chile_two->title }}</option>

                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Gallery</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Primary Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('primary') is-invalid @enderror"
                                                    id="exampleInputFile" name="primary">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Gallery Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="second_image">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Gallery Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="third_image">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom:20px">
                    <input type="submit" value="Add New Product" class="btn btn-success float-right">
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
                            <a href="{{ route('product.manage') }}">
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
