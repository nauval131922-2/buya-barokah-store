@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="">{{ $data['product']->Category->name }}</a>
                        <span>{{ $data['product']->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img"
                                    src="{{ asset($data['product']->thumbnails_path) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $data['product']->name }} <span>Kategori: {{ $data['product']->Category->name }}</span></h3>

                        <div class="product__details__price">Rp {{ number_format($data['product']->price, 0, ',', '.') }}
                        </div>

                        <style>
                            .whatsapp-button {
                                display: inline-block;
                                background: linear-gradient(45deg, #25D366, #128C7E);
                                color: white;
                                /* Pastikan warna teks putih */
                                font-size: 18px;
                                font-weight: bold;
                                padding: 12px 24px;
                                text-align: center;
                                text-decoration: none;
                                border-radius: 50px;
                                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
                                transition: all 0.4s ease;
                                position: relative;
                                overflow: hidden;
                            }

                            .whatsapp-button i {
                                margin-right: 10px;
                                font-size: 24px;
                                vertical-align: middle;
                            }

                            .whatsapp-button::before {
                                content: '';
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                width: 300%;
                                height: 300%;
                                background: rgba(255, 255, 255, 0.15);
                                transition: all 0.75s ease;
                                border-radius: 50%;
                                z-index: 0;
                                transform: translate(-50%, -50%) scale(0);
                            }

                            .whatsapp-button:hover::before {
                                transform: translate(-50%, -50%) scale(1);
                            }

                            .whatsapp-button:hover {
                                box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
                                transform: translateY(-3px);
                                background: linear-gradient(45deg, #20B261, #0D7A68);
                                color: white;
                                /* Memastikan warna teks tetap putih saat di-hover */
                            }

                            .whatsapp-button:active {
                                transform: translateY(-1px);
                                box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
                            }
                        </style>

                        <a href="https://wa.me/6281227041901?text=Halo,%20saya%20ingin%20memesan%20produk%20anda%20yaitu%20{{ urlencode($data['product']->name) }}%20pada%20link%20berikut:%0A%0A{{ urlencode(url()->current()) }}"
                            class="whatsapp-button" target="_blank">
                            <i class="fab fa-whatsapp"></i> Order via WhatsApp
                        </a>

                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Berat : </span>
                                    <p>{{ $data['product']->weight }} Gram</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Deskripsi
                                    Produk</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Deskripsi Produk</h6>
                                {!! $data['product']->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>Produk Lainnya</h5>
                    </div>
                </div>
                @foreach ($data['product_related'] as $product_related)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        @component('components.frontend.product-card')
                            @slot('image', asset('storage/' . $product_related->thumbnails))
                            @slot('route', route('product.show', ['categoriSlug' => $product_related->Category->slug,
                                'productSlug' => $product_related->slug]))
                                @slot('name', $product_related->name)
                                @slot('price', $product_related->price)
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Product Details Section End -->
    @endsection
