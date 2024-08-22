@extends('layouts.frontend.app')
@section('content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                        data-setbg="{{ asset('me') }}/img/gambar_home.jpg">

                        <div class="blur-bg" style="background-image: url('{{ asset('me/img/gambar_home.jpg') }}');">
                        </div>
                        <div class="categories__text">
                            <p style="color: white"><span class="highlight-black">Al-Qur’an al-Quddus adalah al-Qur’an
                                    pojok ber-Rasm ‘Uthmani yang diterbitkan oleh Pondok Tahfidh Yanbu’ul Qur’an Kudus yang
                                    dilengkapi wakaf ibtida’, keterangan ghorib, dll oleh KH. M. Ulil Albab Arwani (pengasuh
                                    Pondok Tahfidh Yanbu’ul Qur’an Kudus) yang memudahkan untuk belajar membaca al-Qur’an
                                    dengan baik dan benar.
                                    <br><br>
                                    Al-Qur’an ini pertama kali dicetak pada tahun 2005 oleh percetakan PT Buya Barokah yang
                                    merupakan salah satu perusahaan yang dirintis oleh keluarga KH. M. Arwani Amin.</span>
                            </p>
                            <a href="#new-product" style=""><span class="highlight-white">Jelajahi Sekarang</span></a>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @foreach ($data['new_categories'] as $category)
                            <div class="col-lg-6 col-md-6 col-sm-6 p-0">
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
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad" id="new-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New product</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        @foreach ($data['new_categories'] as $new_categories)
                            <li data-filter=".{{ $new_categories->slug }}">{{ $new_categories->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($data['new_categories'] as $new_categories2)
                    @foreach ($new_categories2->Products()->limit(4)->get() as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $new_categories2->slug }}">
                            @component('components.frontend.product-card')
                                @slot('image', asset('storage/' . $product->thumbnails))
                                @slot('route', route('product.show', ['categoriSlug' => $new_categories2->slug, 'productSlug' =>
                                    $product->slug]))
                                    @slot('name', $product->name)
                                    @slot('price', $product->price)
                                @endcomponent
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Product Section End -->
    @endsection
