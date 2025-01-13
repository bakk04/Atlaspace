@extends('layouts.master')
@section('main')
    <div id="home" class="hero-wrap js-fullheight" style="background-image: url('frontend/images/morocco-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading">Bienvenue sur Atlaspace</span>
                    <h1 class="mb-4">Découvrez les merveilles du Maroc avec nous</h1>
                    <p class="caps">Explorez les montagnes de l'Atlas, les dunes dorées du Sahara et la richesse
                        culturelle unique du Maroc.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftco-search d-flex justify-content-center" id="Recherche">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill"
                                        href="#v-pills-1" role="tab" aria-controls="v-pills-1"
                                        aria-selected="true">Recherche d'Activités</a>
                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- Recherche d'activités -->
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-1-tab">
                                        <form method="POST" action="{{ route('destination.activite') }}"
                                            class="search-property-1">
                                            @csrf
                                            <div class="row no-gutters">
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="#">Ville</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-map-marker"></span></div>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Rechercher une ville" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="#">Type d'Activité</label>
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span class="fa fa-chevron-down"></span>
                                                                </div>
                                                                <select name="activity_type" id="activity_type"
                                                                    class="form-control">
                                                                    <option value="randonnée">Randonnée</option>
                                                                    <option value="visite_culturelle">Visite Culturelle
                                                                    </option>
                                                                    <option value="sports">Sports</option>
                                                                    <option value="détente">Détente</option>
                                                                    <option value="autre">Autres</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Ajout du champ Prix -->
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="#">Prix</label>
                                                        <div class="form-field">
                                                            <input type="text" name="prix" class="form-control"
                                                                placeholder="Indiquer le prix">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Ajout du champ Date -->
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="#">Date</label>
                                                        <div class="form-field">
                                                            <input type="date" name="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group d-flex w-100 border-0">
                                                        <div class="form-field w-100 align-items-center d-flex">
                                                            <button type="submit"
                                                                class="align-self-stretch form-control btn btn-primary">Rechercher</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section services-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100">
                        <span class="subheading">Bienvenue sur Atlaspace</span>
                        <h2 class="mb-4">Commencez votre aventure au Maroc</h2>
                        <p>Atlaspace est votre guide pour explorer les trésors cachés du Maroc. Découvrez des activités
                            immersives et des visites guidées par des experts locaux qui vous feront vivre une expérience
                            inoubliable à travers le pays. Que vous soyez à la recherche d'aventures en plein air ou de
                            découvertes culturelles, nous avons tout ce dont vous avez besoin.</p>
                        <p>Explorez les montagnes de l'Atlas, les villes impériales, les plages exotiques et les dunes du
                            Sahara avec nos guides locaux passionnés, et plongez dans l'histoire et la culture fascinantes
                            du Maroc.</p>
                        <p><a href="/destination" class="btn btn-primary py-3 px-4">Rechercher une destination</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <!-- Option Activités -->
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-1 d-block img"
                                style="background-image: url(frontend/images/services-1.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-paragliding"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="font-size: 16px;">Activités</h3>
                                    <p style="font-size: 12px;">Des randonnées dans l'Atlas, des excursions dans le désert,
                                        et des visites culturelles des médinas marocaines.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Option Guide Privé -->
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img"
                                style="background-image: url(frontend/images/services-2.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-tour-guide"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="font-size: 16px;">Guide Privé</h3>
                                    <p style="font-size: 12px;">Explorez le Maroc avec un guide local expert pour une
                                        expérience personnalisée et enrichissante.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Option Loisirs -->
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-3 d-block img"
                                style="background-image: url(frontend/images/services-3.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-paragliding"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="font-size: 16px;">Loisirs</h3>
                                    <p style="font-size: 12px;">Détendez-vous avec des activités ludiques adaptées à toute
                                        la famille, des sports nautiques aux festivals locaux.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Option Touristique -->
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-4 d-block img"
                                style="background-image: url(frontend/images/services-4.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-map"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="font-size: 16px;">Touristique</h3>
                                    <p style="font-size: 12px;">Découvrez les sites touristiques emblématiques du Maroc,
                                        des kasbahs aux plages exotiques.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section bg-bottom"
        style="background-image: url('{{ asset('frontend/images/Bg2.jpg') }}');">
        <div id="communaute" class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading">Témoignages</span>
                    <h2 class="mb-4">Avis des touristes</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">J'ai passé des vacances incroyables au Maroc ! Le désert du Sahara
                                        était magique, et la médina de Marrakech offre une expérience unique. Je reviendrai
                                        certainement !</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url('{{ asset('frontend/images/faysal.jpg') }}')">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Fayssal </p>
                                            <span class="position">Youtouber</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">J'ai adoré mon séjour à Chefchaouen, la ville bleue. C'est un endroit
                                        magnifique et paisible. J'ai également visité les montagnes de l'Atlas et c'était
                                        absolument incroyable.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url('{{ asset('frontend/images/younes.jpg') }}')">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Younes </p>
                                            <span class="position">Youtouber</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Visiter le Maroc a été une expérience inoubliable. J'ai adoré la
                                        cuisine, les souks colorés, et l'hospitalité chaleureuse des locaux. C'est un pays
                                        que je recommande à tous !</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url('{{ asset('frontend/images/misaha.jpg') }}')">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Youssef </p>
                                            <span class="position">Youtouber</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
