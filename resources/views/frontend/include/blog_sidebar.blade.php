<div class="sidebar__wrapper">
    <div class="sidebar__widget mb-55">
        <div class="widget__search p-relative">
            <form action="{{ route('search') }}" method="get">
                @csrf
                <input type="text" placeholder="Search..." name="search">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="sidebar__widget mb-55">
        <div class="sidebar__widget-title mb-25">
            <h3>Product Categories</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="categories">
                <div id="accordion">
                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',0)->get() as $parent )
                        <div class="card">
                            <div class="card-header white-bg" id="accessories">
                            <h5 class="mb-0">
                                <button class="shop-accordion-btn" data-toggle="collapse" data-target="#{{ $parent->slug }}" aria-expanded="true" aria-controls="{{ $parent->slug }}">
                                    {{ $parent->title }}
                                </button>
                            </h5>
                            </div>

                            @php
                                $child = App\Models\Backend\category::orderBy('title','asc')->where('parent',$parent->id)->get();
                                $count = $child->count();
                            @endphp
                            @if ($count!=0)
                                <div id="{{ $parent->slug }}" class="collapse hide" aria-labelledby="accessories" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="categories__list">
                                                <ul>
                                                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',$parent->id)->get() as $child )
                                                        <form action="{{ route('category_search') }}" method="get">
                                                            <li>
                                                                <input type="hidden" name="category" value="{{ $child->slug }}">
                                                                <button type="submit" style="background: none">{{ $child->title }}</button>
                                                            <li>
                                                        </form>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar__widget mb-55">
        <div class="sidebar__widget-title mb-25">
            <h3>Latest Posts</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="rc__post-wrapper">
                <ul>
                    @foreach ( App\Models\Backend\post::orderBy('id','desc')->where('status',1)->limit(3)->get() as $post)


                        <li class="d-flex">
                            <div class="rc__post-thumb mr-20 ">
                                <a href="{{ route('blog.details', $post->slug) }}"><img src="{{ asset('Backend/Image/post/'.$post->image) }}" alt="blog-1" width="70px "></a>
                            </div>
                            <div class="rc__post-content">
                                <h6>
                                    <a href="{{ route('blog.details', $post->slug) }}">{!! Str::limit($post->title, 18, ' ...') !!}</a>
                                </h6>
                                <div class="rc__meta">
                                    <span> {{ $post->created_at->format('j F Y') }}</span>
                                </div>
                            </div>
                        </li>
					@endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar__widget mb-55">
        <div class="sidebar__widget-title mb-25">
            <h3>Recent Comments</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="rc__comments">
                <ul>

                    @foreach ( App\Models\Backend\comment::orderBy('id','desc')->where('status',1)->limit(3)->get() as $comment)
                        <li class="d-flex mb-20">
                            <div class="rc__comments-avater mr-15">
                                <img src="{{ asset('Backend/Image/avatar.png') }}" alt="" height="74px" width="74px">
                            </div>
                            <div class="rc__comments-content">
                                <h6>{{ $comment->name }}</h6>
                                <p>{!! Str::limit($comment->comment, 10, ' ...') !!}</p>
                                <span>on <span class="highlight comment">{!! Str::limit($comment->post->title, 10, ' ...') !!}</span></span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    {{-- <div class="sidebar__widget mb-55">
        <div class="sidebar__widget-title mb-25">
            <h3>Archives</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="sidebar__links">
                <ul>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#"> November 2013</a></li>
                    <li><a href="#"> September 2013</a></li>
                    <li><a href="#">November 2012</a></li>
                </ul>
            </div>
        </div>
    </div> --}}
    {{-- <div class="sidebar__widget mb-55">
        <div class="sidebar__widget-title mb-25">
            <h3>Meta</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="sidebar__links">
                <ul>
                    <li><a href="#">Log in</a></li>
                    <li><a href="#"> Entries RSS</a></li>
                    <li><a href="#"> Comments RSS</a></li>
                    <li><a href="#">WordPress.org</a></li>
                </ul>
            </div>
        </div>
    </div> --}}
</div>
