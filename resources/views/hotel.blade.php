@extends('layouts.master')
@section('main')
    @if (session('success'))
        <x-alert :message="session('success')" type="success" />
    @endif
    @if (session('error'))
        <x-alert :message="session('error')" type="danger" />
    @endif
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('frontend/images/bk6.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/Acceuil">Acceuil <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Hotel <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Hotel</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <!-- Hôtel 1 -->
                @foreach ($hotelDatas as $hotelData)
                    <div class="col-md-4 ftco-animate">
                        <form method="POST" action="{{ route('hotel.details') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $hotelData['id'] }}">
                            <div class="project-wrap hotel">
                                <a href="#" class="img"
                                    style="background-image: url({{ asset($hotelData['background']) }});">
                                    <span class="price">{{ $hotelData['price'] }}</span>
                                </a>
                                <div class="text p-4">
                                    <p class="star mb-2">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <span class="days">{{ $hotelData['days'] }}</span>
                                    <h3><a href="#">{{ $hotelData['name'] }}</a></h3>
                                    <p class="location"><span class="fa fa-map-marker"></span> {{ $hotelData['location'] }}
                                    </p>
                                    <ul>
                                        <li><span class="flaticon-shower"></span>{{ $hotelData['propriete1'] }}</li>
                                        <li><span class="flaticon-king-size"></span>{{ $hotelData['propriete2'] }}</li>
                                        <li><span class="flaticon-sun-umbrella"></span>{{ $hotelData['propriete3'] }}</li>
                                    </ul>
                                    <button type="submit" class="btn btn-primary mt-3">Voir plus</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
