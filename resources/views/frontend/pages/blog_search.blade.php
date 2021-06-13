@extends('frontend.layout.template_2')
@section('meta')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','blog-search')->get() as $header )
        <title>{{ $header->tab }}</title>
        <meta name="title" content="{{ $header->meta_title }}">
        <meta name="description" content="{{ $header->description }}">
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach
@endsection
@section('body')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','blog-search')->get() as $header )
        @if ( $header->visibility == 1 )
            <section class="page__title p-relative d-flex align-items-center" style="background-image: url('{{ asset('Backend/Image/Pageheader/'.$header->image) }}')" width="1920px" height="530">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page__title-inner text-center">
                                <h1>Search Result for "{{ $search }}"</h1>
                                <div class="page__title-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{ $header->breadcrumbs }}</li>
                                    </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    <!-- page title area end -->

    <!-- blog area start -->
    <section class="blog__area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog__wrapper">
                        @if( $result_Num!=0 )
                            @foreach ($result as $blog)
                                <div class="blog__item blog__border-bottom mb-60 pb-60">
                                    <div class="blog__thumb fix">
                                        <a href="{{ route('blog.details', $blog->slug) }}" class="w-img"><img src="{{ asset('Backend/Image/Post/'.$blog->image) }}" alt="blog"></a>
                                    </div>
                                    <div class="blog__content">
                                        <h4 class="blog__title"><a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a></h4>
                                        <div class="blog__meta">
                                            <span>By <a href="#">{{ $blog->author_name->name }} }}</a></span>
                                            <span>/ {{ $blog->created_at->format('F j, Y') }}</span>
                                        </div>
                                        <p>{!! Str::limit($blog->desc, 200, '...') !!}</p>
                                        <a href="{{ route('blog.details', $blog->slug) }}" class="os-btn" style="display: inline-block">read more</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <span class="alert alert-danger" style="display: block">Opps!!! No Post Found.</span>
                        @endif


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="shop-pagination-wrapper">
                                    <div class="basic-pagination">
                                        {!! $result->links('vendor.pagination.custom') !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 offset-xl-1">
                    @include('frontend.include.blog_sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
