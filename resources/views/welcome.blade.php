<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>HRIS | KAI Wisata</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="icon" sizes="180x180" href="{{ asset('images/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('welcome/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('welcome/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('welcome/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="{{ asset('welcome/style.css') }}" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Arsha - v4.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div
                class="
                col-lg-6
                d-flex
                flex-column
                justify-content-center
                pt-4 pt-lg-0
                order-2 order-lg-1
                "
                data-aos="fade-up"
                data-aos-delay="200"
                >
                <h1>Welcome to <span>HRIS</span></h1>
                <h2>
                Human Resource Information System <br />
                <span> PT Kereta Api Pariwisata</span>
                </h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary bg-white btn-lg px-4 ms-2">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-dark btn-lg px-4 gap-3 ms-2">Log in</a>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-4 ms-2">Register</a>
                                @endif --}}
                            @endauth
                    @endif
                </div>
            </div>

          <div
            class="col-lg-6 order-1 order-lg-2 hero-img"
            data-aos="zoom-in"
            data-aos-delay="200"
          >
            <img
              src="{{ asset('images/hero-img.png') }}"
              class="img-fluid animated"
              alt=""
            />
          </div>
        </div>
      </div>
    </section>

    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('welcome/aos/aos.js') }}"></script>
    <script src="{{ asset('welcome/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('welcome/swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('welcome/main.js') }}"></script>
  </body>
</html>
