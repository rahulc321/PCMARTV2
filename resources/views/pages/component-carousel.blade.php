@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Carousel')

@section('content')
<section id="carousel">
  <div class="row match-height">
    <!-- Basic Carousel start -->
    <div class="col-lg-6">
      <div class="card" id="basic-carousel">
        <div class="card-header">
          <h4 class="card-title">Basic Example</h4>
        </div>
        <div class="card-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="img-fluid" src="{{asset('images/slider/02.jpg')}}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="img-fluid" src="{{asset('images/slider/03.jpg')}}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="img-fluid" src="{{asset('images/slider/01.jpg')}}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Basic Carousel And Optional Carousel End -->

    <!-- Basic Carousel with Caption start -->
    <div class="col-lg-6">
      <div class="card" id="carousel-caption">
        <div class="card-header">
          <h4 class="card-title">Optional captions</h4>
        </div>
        <div class="card-body">
          <p>
            Add captions to your slides easily with the <code>.carousel-caption</code> element within any
            <code>.carousel-item</code>.
          </p>
          <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-caption" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-caption" data-slide-to="1"></li>
              <li data-target="#carousel-example-caption" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="img-fluid" src="{{asset('images/slider/04.jpg')}}" alt="First slide">
                <div class="card-img-overlay bg-overlay">
                  <div class="carousel-caption">
                    <h3>First Slide Label</h3>
                    <p>Donut jujubes I love topping I love sweet. Jujubes I love brownie gummi bears I love donut
                      sweet
                      chocolate. Tart chocolate marshmallow.Tart carrot cake muffin.</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="img-fluid" src="{{asset('images/slider/06.jpg')}}" alt="Second slide">
                <div class="card-img-overlay bg-overlay">
                  <div class="carousel-caption">
                    <h3>Second Slide Label</h3>
                    <p>Tart macaroon marzipan I love soufflé apple pie wafer. Chocolate bar jelly caramels jujubes
                      chocolate cake gummies. Cupcake cake I love cake danish carrot cake.</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="img-fluid" src="{{asset('images/slider/05.jpg')}}" alt="Third slide">
                <div class="card-img-overlay bg-overlay">
                  <div class="carousel-caption">
                    <h3>Third Slide Label</h3>
                    <p>Pudding sweet pie gummies. Chocolate bar sweet tiramisu cheesecake chocolate cotton candy
                      pastry
                      muffin. Marshmallow cake powder icing.</p>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Basic Carousel with Caption End -->
  </div>
  <div class="row match-height">
    <!-- CrossFade Carousel Start -->
    <div class="col-lg-6">
      <div class="card" id="carousel-crossfade">
        <div class="card-header">
          <h4 class="card-title">Crossfade</h4>
        </div>
        <div class="card-body">
          <p>
            Add <code>.carousel-fade</code> to your carousel to animate slides with a fade transition instead of a
            slide.
          </p>
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('images/slider/06.jpg')}}" class="img-fluid d-block w-100" alt="cf-img-1">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/slider/02.jpg')}}" class="img-fluid d-block w-100" alt="cf-img-2">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/slider/05.jpg')}}" class="img-fluid d-block w-100" alt="cf-img-3">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- CrossFade Carousel End -->

    <!-- Carousel Interval Start -->
    <div class="col-lg-6">
      <div class="card" id="carousel-interval">
        <div class="card-header">
          <h4 class="card-title">Carousel Interval</h4>
        </div>
        <div class="card-body">
          <p>
            Add <code>data-interval=""</code> to a <code>.carousel-item</code> to change the amount of time to delay
            between automatically cycling to the next item.
          </p>
          <div id="carousel-example-interval" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-interval" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-interval" data-slide-to="1"></li>
              <li data-target="#carousel-example-interval" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active" data-interval="1000">
                <img class="img-fluid" src="{{asset('images/slider/02.jpg')}}" alt="First slide">
              </div>
              <div class="carousel-item" data-interval="1000">
                <img class="img-fluid" src="{{asset('images/slider/03.jpg')}}" alt="Second slide">
              </div>
              <div class="carousel-item" data-interval="1000">
                <img class="img-fluid" src="{{asset('images/slider/01.jpg')}}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-interval" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-interval" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Carousel Interval End -->
  </div>
</section>
@endsection
