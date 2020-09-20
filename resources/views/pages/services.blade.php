@extends('layouts.main')

@section('pageTitle')
    Services
@endsection

@section('content')


    <header class="service__section__landing__page">
        <h1 class="service-section-title">We <u class="text-dark">lived</u> to serve</h1>
        <div class="service-section-img">
           <ul class="img-description">
               <li>
                   <h4> A satisfied customer is our <strong>goal</strong></h4>
                </li>
                <li>
                    <h4> A satisfied customer is what we <strong>produce</strong></h4>
                 </li>
           </ul>
        </div>
    </header>

    <div class="services__offered">
        
        <div class="services-container">

            @if ( $services ?? '')
                <ul class="services">

                    <li class="service-item">
                        <div class="service-img">
                            <img src="../../../storage/page_cover/webdesign.png" alt="">
                        </div>
                        <div class="service-title">
                            <a href="" class="service-link">
                                Web Designing 
                            </a>
                        </div>
                        <div class="service-description">
                            <p>“We don't just build websites, we build websites that SELLS”</p>
                        </div>
                        <div class="service-footer">
                            <div class="left">
                                <a href="">Know more</a>
                            </div>
                            <div class="right">
                                <a href="">Follow</a>
                            </div>
                        </div>
                    </li>
                    <li class="service-item">
                        <div class="service-img">
                            <img src="../../../storage/page_cover/webapp.png" alt="">
                        </div>
                        <div class="service-title">
                            <a href="" class="service-link">
                                Web Application 
                            </a>
                        </div>
                        <div class="service-description">
                            <p>“We have produced thousands  of high-end web application and you are next”</p>
                        </div>
                        <div class="service-footer">
                            <div class="left">
                                <a href="">Know more</a>
                            </div>
                            <div class="right">
                                <a href="">Follow</a>
                            </div>
                        </div>
                    </li>

                    <li class="service-item">
                        <div class="service-img">
                            <img src="../../../storage/page_cover/desktopapp.png" alt="">
                        </div>
                        <div class="service-title">
                            <a href="" class="service-link">
                                Desktop Applicaton 
                            </a>
                        </div>
                        <div class="service-description">
                            <p>“Cheap but quality second to none, these dekstop application we create is out of this world”</p>
                        </div>
                        <div class="service-footer">
                            <div class="left">
                                <a href="">Know more</a>
                            </div>
                            <div class="right">
                                <a href="">Follow</a>
                            </div>
                        </div>
                    </li>

                    <li class="service-item">
                        <div class="service-img">
                            <img src="../../../storage/page_cover/seo.png" alt="">
                        </div>
                        <div class="service-title">
                            <a href="" class="service-link">
                                SEO 
                            </a>
                        </div>
                        <div class="service-description">
                            <p>“Our rule of thumb is build a site for a user, not a spider”</p>
                        </div>
                        <div class="service-footer">
                            <div class="left">
                                <a href="">Know more</a>
                            </div>
                            <div class="right">
                                <a href="">Follow</a>
                            </div>
                        </div>
                    </li>

                </ul>
            @else 
                <h3 class="text text-danger">Undefined</h3>
            @endif            
        </div>
        
    </div>

@endsection