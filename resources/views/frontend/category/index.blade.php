@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Category</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                @foreach ($data['category'] as $category)
                    <div class="col-lg-4 col-md-4 col-sm-4 p-0 ">

                        <div class="categories__item">
                            <div class="blur-bg"
                                style="background-image: url('{{ asset('storage/' . $category->thumbnails) }}');">
                            </div>
                            <div class="categories__text">
                                <h4 style="color: white" class="highlight-black">{{ $category->name }}</h4>
                                <p><span class="highlight-white" style="color: black">
                                        {{ $category->Products()->count() }} item</span></p>
                                <a href="{{ route('category.show', $category->slug) }}"><span
                                        class="highlight-white">Jelajahi</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
