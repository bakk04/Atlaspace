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
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-wrap-1 ftco-animate">
                        <form method="POST" action="{{ route('RechercheHotel') }}" class="search-property-1">
                            @csrf
                            <div class="row no-gutters">
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4 border-0">
                                        <label for="#">Hôtel</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-search"></span></div>
                                            <input type="text" name="name" class="form-control" placeholder="Ville"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Date début</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" class="form-control checkin_date"
                                                placeholder="Date début">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Date fin</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" class="form-control checkout_date" placeholder="Date fin">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Prix limité</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="500">500 MAD</option>
                                                    <option value="1000">1000 MAD</option>
                                                    <option value="2000">2000 MAD</option>
                                                    <option value="3000">3000 MAD</option>
                                                    <option value="4000">4000 MAD</option>
                                                    <option value="5000">5000 MAD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group d-flex w-100 border-0">
                                        <div class="form-field w-100 align-items-center d-flex">
                                            <input type="submit" value="Search"
                                                class="align-self-stretch form-control btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Atlaspace vous propose des hôtels</span>
                    <h2 class="mb-4">Sélectionnez votre hôtel</h2>
                </div>
            </div>
            <div class="row">
                <!-- Hôtel 1 -->
                @foreach ($hotelDatas as $hotelData)
                    <div class="col-md-4 ftco-animate">
                        <form method="POST" action="{{ route('hotel.details') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $hotelData->id }}">
                            <div class="project-wrap hotel">
                                <a href="#" class="img"
                                    style="background-image: url({{ asset($hotelData->background) }});">
                                    <span class="price">{{ $hotelData->price }}</span>
                                </a>
                                <div class="text p-4">
                                    <p class="star mb-2">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <span class="days">{{ $hotelData->days }}</span>
                                    <h3><a href="#">{{ $hotelData->name }}</a></h3>
                                    <p class="location"><span class="fa fa-map-marker"></span>
                                        {{ $hotelData->location }}
                                    </p>
                                    <ul>
                                        <li><span class="flaticon-shower"></span>{{ $hotelData->propriete1 }}</li>
                                        <li><span class="flaticon-king-size"></span>{{ $hotelData->propriete2 }}</li>
                                        <li><span class="flaticon-sun-umbrella"></span>{{ $hotelData->propriete3 }}</li>
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
