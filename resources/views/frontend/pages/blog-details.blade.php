@extends('frontend.layout.template_2')
@section('meta')
    <title>{{ $value->title }}</title>
    <meta name="title" content="{{ $value->title }}">
    <meta name="description" content="{{ $value->title }}">
    <meta name="tag" content="{{ $value->tag }}">
@endsection
@section('body')
            <section class="blog__area pt-120">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="postbox__title mb-55">
                                <h1><a href="blog.html">{{ $value->title }}</a></h1>
                                <div class="blog__meta">
                                    <span>By <a href="#">{{ $value->author_name->name }}</a></span>
                                    <span>/ {{ $value->created_at->format('F j, Y') }}</span>
                                </div>
                            </div>
                            <div class="postbox__thumb w-img">
                                <img src="{{ asset('Backend/Image/Post/'.$value->image) }}" alt="">
                            </div>
                            <div class="postbox__wrapper mb-70">
                                {!! $value->desc !!}
                            </div>

                            {{-- <div class="postbox__share mb-95">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="postbox__social">
                                            <span>Share to friends:</span>
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="postbox__tag f-right">
                                            <span>Tags :</span>
                                            <a href="#">Furniture,</a>
                                            <a href="#">Erentheme,</a>
                                            <a href="#">Chair, </a>
                                            <a href="#">Decor</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="postbox__related-title">
                                <h3>You Might Also Like</h3>
                            </div>

                            <div class="postbox__related-item">
                                <div class="row">
                                    @foreach ($blogs as $blog)
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="blog__item mb-30">
                                                <div class="blog__thumb fix">
                                                    <a href="{{ route('blog.details', $blog->slug) }}" class="w-img"><img src="{{ asset('Backend/Image/Post/'.$blog->image) }}" alt="blog"></a>
                                                </div>
                                                <div class="blog__content">
                                                    <h4><a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a></h4>
                                                    <div class="blog__meta">
                                                        <span>By <a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->author_name->name }}</a></span>
                                                        <span>/ {{ $blog->created_at->format('F j, Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="postbox__line mt-65"></div>
                            <div class="postbox__comments pt-90">
                                <div class="postbox__comment-title mb-30">
                                    <h3>Comments ({{ $comment_num }})</h3>
                                </div>
                                <div class="latest-comments mb-30">
                                    <ul>
                                        @foreach ($comments as $comment)
                                            <li>
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                        <img src="{{ asset('Backend/Image/avatar.png') }}" alt="" height="74px" width="74px">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h5>{{ $comment->name }}</h5>
                                                            <span> - {{ $blog->created_at->format('F j, Y') }} </span>
                                                            {{-- <a class="reply" href="#">Leave Reply</a> --}}
                                                        </div>
                                                        <p>{{ $comment->comment }}.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="postbox__line mb-95"></div>
                            <div class="post-comments-form mb-100">
                                <div class="post-comments-title mb-30">
                                    <h3>Leave A Reply</h3>
                                </div>

                                <form action="{{ route('comment.store') }}" method="POST"  id="contacts-form" class="conatct-post-form">
                                    @csrf
                                    @if ( Auth::guard('customer')->check() )
                                    <div class="row">
                                        <input type="hidden" name="name" value="{{ Auth::guard('customer')->user()->name }}">
                                        <input type="hidden" name="email" value="{{ Auth::guard('customer')->user()->email }}">

                                        <div class="col-xl-12">
                                            <div class="contact-icon p-relative contacts-email">
                                                <input type="text" placeholder="Subject" name="subject" class="@error('subject') is-invalid @enderror">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="contact-icon p-relative contacts-message">
                                                <textarea name="comment" id="comments" cols="30" rows="10"
                                                    placeholder="Comments"  class="@error('comment') is-invalid @enderror"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="post_id" value="{{ $value->id }}">
                                        <div class="col-xl-12">
                                            <button class="os-btn os-btn-black" type="submit">Post comment</button>
                                        </div>
                                    </div>

                                    @else
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="contact-icon p-relative contacts-name">
                                                    <input type="text" placeholder="Name" name="name" class="@error('name') is-invalid @enderror">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="contact-icon p-relative contacts-name">
                                                    <input type="email" placeholder="Email" name="email" class="@error('email') is-invalid @enderror">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="contact-icon p-relative contacts-email">
                                                    <input type="text" placeholder="Subject" name="subject" class="@error('subject') is-invalid @enderror">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="contact-icon p-relative contacts-message">
                                                    <textarea name="comment" id="comments" cols="30" rows="10"
                                                        placeholder="Comments"  class="@error('comment') is-invalid @enderror"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="post_id" value="{{ $value->id }}">
                                            <div class="col-xl-12">
                                                <button class="os-btn os-btn-black" type="submit">Post comment</button>
                                            </div>
                                        </div>
                                    @endif
                                </form>

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            @include('frontend.include.blog_sidebar')
                        </div>
                    </div>
                </div>
            </section>
@endsection
