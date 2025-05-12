@extends('front.layouts.layout')
@section('content')
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item">Blog</li>
                    <li class="breadcrumb-item active">{{$blog->title}}</li>
                </ul>
            </div>
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title">Blog Details</h2>
            </div>
        </div>
    </div>
</div>
@php use Illuminate\Support\Str; @endphp
<div class="blog-section section-padding-01">
    <div class="container custom-container">
        <div class="row gy-10">
            <div class="col-lg-12">
                <div class="blog-details">
                    <div class="blog-details__image">
                        <img src="{{ asset($blog->blog_image) }}" alt="Blog" width="770" height="418">
                        
                    </div>
                    <div class="blog-details__content">
                        <div class="blog-details__meta">
                            <span class="meta-action"><i class="fas fa-calendar"></i> <span class="meta-action__value">{{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</span></span>
                        </div>
                        <h3 class="blog-details__title">{{$blog->title}}</h3>
                        <p>{!! $blog->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection