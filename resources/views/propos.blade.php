@extends('layouts.master')
@section('main')
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
                                    <p style="font-size: 12px;">Découvrez les sites touristiques emblématiques du Maroc, des
                                        kasbahs aux plages exotiques.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
