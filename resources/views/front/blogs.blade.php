@extends('front.layouts.layout')
@section('content')
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item">Blogs</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="blog-section section-padding-01">
    <div class="container ">
        @php use Illuminate\Support\Str; @endphp
        <div class="row gy-6 grid">
            @foreach ($blogs as $blog)
                <div class="col-xl-4 col-md-6 grid-item">
                    <div class="blog-item-02" data-aos="fade-up" data-aos-duration="1000">
                        <div class="blog-item-02__image">
                            <a href="{{ route('blog.details', $blog->id) }}"><img src="{{ asset($blog->blog_image) }}" alt="Blog" width="370" height="201"></a>
                        </div>
                        <div class="blog-item-02__content">
                            <div class="blog-item-02__meta">
                                <span class="meta-action"><i class="fas fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}
                                </span>
                            </div>
                            <h3 class="blog-item-02__title"><a href="#">{{ $blog->title }}</a></h3>
                            <p>{!! Str::words(strip_tags($blog->description), 20, '...') !!}</p>
                            <a class="blog-item-02__more btn btn-light btn-hover-white" href="{{ route('blog.details', $blog->id) }}">
                                Read More <i class="fas fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection