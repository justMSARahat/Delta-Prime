@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
        <form action="{{ route('product.update',$product->id) }}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6" style="  display: inline-block;  float: left;  ">
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
                                        <label for="inputName">Product Title</label>
                                        <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $product->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Product Short Description</label>
                                        <textarea id=" inputDescription"
                                            class="ckeditor form-control @error('short') is-invalid @enderror" rows="2"
                                            name="short">{{ $product->short_desc }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Product Main Description</label>
                                        <textarea id="inputDescription"
                                            class="ckeditor form-control @error('desc') is-invalid @enderror" rows="4"
                                            name="desc">{{ $product->desc }}</textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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
                                            <option value="1" @if( in_array('1',$size) ) selected @endif >S</option>
                                            <option value="2" @if( in_array('2',$size) ) selected @endif >M</option>
                                            <option value="3" @if( in_array('3',$size) ) selected @endif >L</option>
                                            <option value="4" @if( in_array('4',$size) ) selected @endif >XL</option>
                                            <option value="5" @if( in_array('5',$size) ) selected @endif >XXL</option>
                                            <option value="6" @if( in_array('6',$size) ) selected @endif >XXXL</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Color</label>
                                    <select class="select2bs4 select2-hidden-accessible" autocomplete="off" multiple="" data-placeholder="Select Color" style="width: 100%;" tabindex="-1" aria-hidden="true" name="color[]">
                                        @foreach ( App\Models\Backend\color::orderBy('title','asc')->get() as $color)
                                            <option value="{{ $color->id }}" @if( in_array($color->id,$color_s) ) selected @endif>{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Weight</label>
                                    <input type="text" id="inputEstimatedBudget"
                                        class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ $product->weight }}" >
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Dimention</label>
                                    <input type="text" id="inputEstimatedBudget"
                                        class="form-control @error('dimention') is-invalid @enderror" name="dimention" value="{{ $product->dimention }}" >
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6" style="  display: inline-block;  float: left;  ">
                        <div class="col-md-12">
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
                                            class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Product Offer Price</label>
                                        <input type="number" id="inputEstimatedBudget" class="form-control" name="offer" value="{{ $product->offer_price }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSpentBudget">Total Quantity</label>
                                        <input type="number" id="inputSpentBudget"
                                            class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $product->quantity }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Sku Code</label>
                                        <input type="text" id="inputEstimatedDuration" class="form-control" name="sku" value="{{ $product->sku }}" >
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-md-12">
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
                                            <option @if( $product->status == 1 ) selected @endif value="1">Published</option>
                                            <option @if( $product->status == 2 ) selected @endif value="2">On Hold</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Brand</label>
                                        <select id="inputStatus"
                                            class="form-control @error('brand') is-invalid @enderror" name="brand">

                                            @foreach ( $brands as $brand )
                                                <option @if( $product->brand == $brand->id ) selected @endif value="{{ $brand->id }}">{{ $brand->title }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Category</label>
                                        <select id="inputStatus"
                                            class="form-control @error('category') is-invalid @enderror" name="category">

                                            @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',0)->get() as $parent )
                                                <option @if( $product->category == $parent->id  ) selected @endif value="{{ $parent->id }}">{{ $parent->title }}</option>

                                                @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$parent->id)->get() as $child_one )
                                                    <option @if( $product->category == $child_one->id  ) selected @endif value="{{ $child_one->id }}">-{{ $child_one->title }}</option>

                                                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',$child_one->id)->get() as $chile_two )
                                                        <option @if( $product->category == $chile_two->id  ) selected @endif value="{{ $chile_two->id }}">--{{ $chile_two->title }}</option>

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

                        <div class="col-md-12">
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
                                                <label class="custom-file-label" for="exampleInputFile">{{ $product->primary }}</label>
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
                                                <label class="custom-file-label" for="exampleInputFile">{{ $product->second_image }}</label>
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
                                                <label class="custom-file-label" for="exampleInputFile">{{ $product->third_image }}</label>
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
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
