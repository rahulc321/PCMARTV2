@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Basic Card')

@section('content')
<div class="alert bg-rgba-primary">
  <i class="bx bx-info-circle mr-1 align-middle"></i>
  <span class="align-middle">
    Click <a href="https://getbootstrap.com/docs/4.5/components/card/" target="_blank"><u>here</u></a>
    for more info on cards.
  </span>
</div>
<!-- Basic card section start -->
<section id="content-types">
  <div class="row">
    <div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Card With Header And Footer</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee
            sugar plum sugar plum jelly-o jujubes bonbon dessert carrot cake. Caramels liquorice biscuit ice cream
            fruitcake cotton candy tart.
          </p>
        </div>
        <img class="img-fluid" src="{{asset('images/slider/11.png')}}" alt="Card image cap">
        <div class="card-footer d-flex justify-content-between">
          <span>Card Footer</span>
          <button class="btn btn-light-primary">Read More</button>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card">
        <img src="{{asset('images/slider/10.png')}}" class="card-img-top img-fluid" alt="singleminded">
        <div class="card-header">
          <h4 class="card-title">Be Single Minded</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Chocolate sesame snaps apple pie danish cupcake sweet roll jujubes tiramisu.Gummies
            bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll.
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Carousel</h4>
          <h6 class="card-subtitle">Support card subtitle</h6>
        </div>
        <div id="carousel-example-card" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-card" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-card" data-slide-to="1"></li>
            <li data-target="#carousel-example-card" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner rounded-0" role="listbox">
            <div class="carousel-item active">
              <img src="{{asset('images/slider/01.jpg')}}" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item">
              <img src="{{asset('images/slider/02.jpg')}}" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img src="{{asset('images/slider/03.jpg')}}" class="d-block w-100" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-example-card" role="button" data-slide="prev">
            <span class="bx bx-chevron-left icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example-card" role="button" data-slide="next">
            <span class="bx bx-chevron-right icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt assumenda mollitia
            officia dolorum eius quasi.Chocolate sesame snaps apple pie danish cupcake sweet roll jujubes tiramisu.
          </p>
          <p class="card-text">
            Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee sugar plum sugar
            plum jelly-o jujubes bonbon dessert carrot cake. Sweet pie candy jelly.
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card collapse-icon accordion-icon-rotate">
        <div class="card-header">
          <h4 class="card-title">Accordion</h4>
        </div>
        <div class="card-body">
          <div class="accordion" id="cardAccordion">
            <div class="card">
              <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="false" aria-controls="collapseOne" role="button">
                <span class="collapsed collapse-title">Accordion Item 1</span>
              </div>
              <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne" data-parent="#cardAccordion">
                <div class="card-body">
                  Cheesecake muffin cupcake dragée lemon drops tiramisu cake gummies chocolate cake. Marshmallow tart
                  croissant. Tart dessert tiramisu marzipan lollipop lemon drops.
                </div>
              </div>
            </div>
            <div class="card collapse-header">
              <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="false" aria-controls="collapseTwo" role="button">
                <span class="collapsed collapse-title">Accordion Item 2</span>
              </div>
              <div id="collapseTwo" class="collapse pt-1" aria-labelledby="headingTwo" data-parent="#cardAccordion">
                <div class="card-body">
                  Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet
                  roll bonbon muffin liquorice. Wafer lollipop sesame snaps.
                </div>
              </div>
            </div>
            <div class="card open">
              <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="true" aria-controls="collapseThree" role="button">
                <span class="collapsed collapse-title">Accordion Item 3</span>
              </div>
              <div id="collapseThree" class="collapse show pt-1" aria-labelledby="headingThree"
                data-parent="#cardAccordion">
                <div class="card-body">
                  Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping fruitcake. Caramels
                  liquorice biscuit ice cream fruitcake cotton candy tart.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="false" aria-controls="collapseFour" role="button">
                <span class="collapsed  collapse-title">Accordion Item 4</span>
              </div>
              <div id="collapseFour" class="collapse pt-1" aria-labelledby="headingFour" data-parent="#cardAccordion">
                <div class="card-body">
                  Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping fruitcake. Caramels
                  liquorice biscuit ice cream fruitcake cotton candy tart.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Video Card</h4>
        </div>
        <div class="embed-responsive embed-responsive-item embed-responsive-16by9">
          <iframe src="https://www.youtube.com/embed/1La4QzGeaaQ" allowfullscreen></iframe>
        </div>
        <div class="card-body">
          <p class="card-text">
            Candy cupcake sugar plum oat cake wafer marzipan jujubes.
            Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut pastry gummies tiramisu
            chocolate bar muffin.
          </p>
          <a href="javascript:void(0);" class="card-link">Card link</a>
          <a href="javascript:void(0);" class="card-link">Another link</a>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Feedback Form</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee sugar plum sugar
            plum jelly-o jujubes bonbon dessert carrot cake.
          </p>
          <form class="form" action="javascript:void(0)">
            <div class="form-body">
              <div class="form-group">
                <label for="feedback1" class="sr-only">Name</label>
                <input type="text" id="feedback1" class="form-control" placeholder="Name" name="name">
              </div>
              <div class="form-group">
                <label for="feedback4" class="sr-only">Last Game</label>
                <input type="text" id="feedback4" class="form-control" placeholder="Last Name" name="LastName">
              </div>
              <div class="form-group">
                <label for="feedback2" class="sr-only">Email</label>
                <input type="email" id="feedback2" class="form-control" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <select name="reason" class="form-control">
                  <option value="Inquiry">Inquiry</option>
                  <option value="Complain">complaints</option>
                  <option value="Quotation">Quotation</option>
                </select>
              </div>
              <div class="form-group form-label-group">
                <textarea class="form-control" id="label-textarea" rows="3" placeholder="Suggestion"></textarea>
                <label for="label-textarea"></label>
              </div>
            </div>
            <div class="form-actions d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-1">Submit</button>
              <button type="reset" class="btn btn-light-primary">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <img class="card-img-top img-fluid" src="{{asset('images/slider/05.jpg')}}" alt="Card image cap" />
        <div class="card-header">
          <h4 class="card-title">Top Image Cap</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
            pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate bar
            chocolate tart dragée.
          </p>
          <p class="card-text">
            Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin.
          </p>
          <button class="btn btn-primary block">Update now</button>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Bottom Image Cap</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
            pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate bar
            chocolate tart dragée.
          </p>
          <p class="card-text">
            Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar
            muffin.
          </p>
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
        <img class="card-img-bottom img-fluid" src="{{asset('images/slider/06.jpg')}}" alt="Card image cap">
      </div>
    </div>
  </div>
</section>
<!-- Basic Card types section end -->

<!-- Card Captions and Overlay section start -->
<section id="card-caps">
  <div class="row">
    <div class="col-xl-3 col-md-6 col-sm-12">
      <div class="card">
        <img class="card-img img-fluid" src="{{asset('images/slider/08.jpg')}}" alt="Card image">
        <div class="card-img-overlay overlay-success d-flex justify-content-between flex-column">
          <div class="overlay-content">
            <p class="card-text text-ellipsis">
              Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa
              chups.
            </p>
          </div>
          <div class="overlay-status">
            <p class="mb-25"><small>Last updated 3 mins ago</small></p>
            <a href="javascript:void(0);" class="btn btn-success">Check More </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-12">
      <div class="card">
        <img class="card-img img-fluid" src="{{asset('images/slider/07.jpg')}}" alt="Card image">
        <div class="card-img-overlay overlay-dark bg-overlay d-flex justify-content-between flex-column">
          <div class="overlay-content">
            <h4 class="card-title mb-50">Online Messages</h4>
            <p class="card-text text-ellipsis">
              Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa
              chups.
            </p>
          </div>
          <div class="overlay-status">
            <p class="mb-25"><small>Last updated 3 mins ago</small></p>
            <a href="javascript:void(0);" class="white">Check More </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-12">
      <div class="card">
        <img class="card-img img-fluid" src="{{asset('images/slider/08.jpg')}}" alt="Card image">
        <div class="card-img-overlay overlay-dark d-flex justify-content-between flex-column">
          <div class="overlay-content">
            <p class="card-text text-ellipsis">
              Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa
              chups.
            </p>
          </div>
          <div class="overlay-status">
            <p class="mb-25"><small>Last updated 3 mins ago</small></p>
            <a href="javascript:void(0);" class="btn btn-outline-info">Check More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-12">
      <div class="card">
        <img class="card-img img-fluid" src="{{asset('images/slider/07.jpg')}}" alt="Card image">
        <div class="card-img-overlay overlay-warning d-flex justify-content-between flex-column">
          <div class="overlay-content">
            <h4 class="card-title mb-50">Image Overlay</h4>
            <p class="card-text text-ellipsis">
              Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa
              chups.
            </p>
          </div>
          <div class="overlay-status">
            <p class="mb-25"><small>Last updated 3 mins ago</small></p>
            <a href="javascript:void(0);" class="white">Check More </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Card Captions and Overlay section end -->
<!-- Navigation -->
<section id="card-navigation">
  <h5 class="mt-3 mb-2">Navigation</h5>
  <div class="row">
    <div class="col-md-6">
      <div class="card text-center">
        <div class="card-body">
          <ul class="nav nav-pills card-header-pills ml-0" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="javascript:void(0);" class="btn btn-outline-primary">Go home</a>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="javascript:void(0);" class="btn btn-outline-primary">Go profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card text-center mb-3">
        <div class="card-body">
          <ul class="nav nav-tabs" id="nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="javascript:void(0);" class="btn btn-outline-primary">Go home</a>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="javascript:void(0);" class="btn btn-outline-primary">Go profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Navigation -->

<!-- Background variants section start -->
<section id="bg-variants">
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Background variants</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-4 col-sm-6 col-12">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-md-12 col-lg-4">
            <img src="{{asset('images/banner/banner-35.jpg')}}" alt="element 01" class="h-100 w-100 rounded-left">
          </div>
          <div class="col-md-12 col-lg-8">
            <div class="card-body">
              <p class="card-text text-ellipsis">
                Tiramisu dessert gingerbread topping tiramisu tart bonbon. Powder
                cotton candy sweet roll sugar plum donut jelly-o donut chocolate.
              </p>
              <span><i class="bx bx-heart font-size-large align-middle mr-50"></i> 1 ARTICLE</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
      <div class="card bg-primary bg-lighten-1">
        <div class="row no-gutters">
          <div class="col-lg-4 col-md-12 d-flex align-items-center justify-content-center p-1">
            <img src="{{asset('images/elements/apple-lap.png')}}" class="card-img img-fluid" alt="apple-lap.png">
          </div>
          <div class="col-lg-8 col-md-12">
            <div class="card-body text-center">
              <h4 class="card-title white">New Arrival</h4>
              <p class="card-text white">Mac Book.</p>
              <button class="btn btn-secondary">Buy Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-lg-8 col-12">
            <div class="card-body">
              <p class="card-text text-ellipsis">
                Tiramisu dessert gingerbread topping tiramisu tart bonbon. Powder
                cotton candy sweet roll sugar plum donut.
              </p>
              <button class="btn btn-info">View More</button>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <img src="{{asset('images/banner/banner-30.jpg')}}" alt="element 01" class="h-100 w-100 rounded-right">
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
      <div class="card text-center bg-secondary bg-lighten-1">
        <div class="card-body text-white">
          <img src="{{asset('images/elements/amazon-speaker.png')}}" alt="element 05" class="mb-1 w-100" height="200">
          <h4 class="card-title white">Amazon Echo</h4>
          <p class="card-text">945 items</p>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
      <div class="card text-center">
        <div class="card-body">
          <img src="{{asset('images/elements/beats-headphones.png')}}" alt="element 02" class="mb-1">
          <h4 class="card-title">Beats Headphone</h4>
          <p class="card-text">456 items</p>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
      <div class="card text-center bg-danger bg-lighten-2">
        <div class="card-body">
          <img src="{{asset('images/elements/ipad-pro.png')}}" alt="element 06" height="150" class="mb-1">
          <h4 class="card-title white">New Arrival</h4>
          <p class="card-text white">Donut toffee candy brownie.</p>
          <button class="btn btn-danger white">Buy Now</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Background variants section end -->

<!-- Groups section start -->
<section id="groups">
  <div class="row match-height">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Groups</h4>
    </div>
  </div>
  <div class="row match-height">
    <div class="col-12">
      <div class="card-group">
        <div class="card">
          <img class="card-img-top img-fluid" src="{{asset('images/pages/content-img-3.jpg')}}" alt="Card image cap">
          <div class="card-header">
            <h4 class="card-title">Card title</h4>
          </div>
          <div class="card-body">
            <p class="card-text">
              This card has supporting text below as a natural lead-in to additional
              content.</p>
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top img-fluid" src="{{asset('images/pages/content-img-2.jpg')}}" alt="Card image cap" />
          <div class="card-header">
            <h4 class="card-title">Card title</h4>
          </div>
          <div class="card-body">
            <p class="card-text">
              This card has supporting text below as a natural lead-in to additional
              content.
            </p>
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top img-fluid" src="{{asset('images/pages/content-img-4.jpg')}}" alt="Card image cap">
          <div class="card-header">
            <h4 class="card-title">Card title</h4>
          </div>
          <div class="card-body">
            <p class="card-text">
              This card has supporting text below as a natural lead-in to additional
              content.
            </p>
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top img-fluid" src="{{asset('images/pages/content-img-1.jpg')}}" alt="Card image cap">
          <div class="card-header">
            <h4 class="card-title">Card title</h4>
          </div>
          <div class="card-body">
            <p class="card-text">
              This card has supporting text below as a natural lead-in to additional
              content.
            </p>
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Groups section end -->

<!-- Decks section start -->
<section id="decks">
  <div class="row match-height">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Decks</h4>
    </div>
  </div>
  <div class="row match-height">
    <div class="col-12">
      <div class="card-deck-wrapper">
        <div class="card-deck">
          <div class="row no-gutters">
            <div class="col-md-3 col-sm-6 mb-sm-1">
              <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('images/slider/01.jpg')}}" alt="Card image cap" />
                <div class="card-header">
                  <h4 class="card-title">Card title</h4>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    This card has supporting text below as a natural lead-in to
                    additional content.
                  </p>
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-sm-1">
              <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('images/slider/04.jpg')}}" alt="Card image cap" />
                <div class="card-header">
                  <h4 class="card-title">Card title</h4>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    This card has supporting text below as a natural lead-in to
                    additional content.
                  </p>
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('images/slider/05.jpg')}}" alt="Card image cap" />
                <div class="card-header">
                  <h4 class="card-title">Card title</h4>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    This card has supporting text below as a natural lead-in to
                    additional content.</p>
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('images/slider/06.jpg')}}" alt="Card image cap" />
                <div class="card-header">
                  <h4 class="card-title">Card title</h4>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    This card has supporting text below as a natural lead-in to
                    additional content.</p>
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Decks section end -->

<!-- Columns section start -->
<section id="columns">
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Columns</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-1">
      <div class="card-columns">
        <div class="card">
          <img class="card-img-top img-fluid" src="{{asset('images/slider/09.png')}}" alt="Card image cap">
          <div class="card-header">
            <h4 class="card-title">Card title</h4>
          </div>
          <div class="card-body">
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk
              of the card's content.
            </p>
            <a href="javascript:void(0);" class="btn btn-outline-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card bg-primary text-center">
          <div class="card-body">
            <img src="{{asset('images/elements/iphone-x.png')}}" alt="element 05" width="150" class="mb-1 img-fluid">
            <h4 class="card-title text-white">iPhone 11</h4>
            <p class="card-text text-white">945 items</p>
          </div>
        </div>
        <div class="card position-static text-white bg-danger bg-lighten-1 text-center">
          <div class="card-body">
            <img src="{{asset('images/elements/ipad-pro.png')}}" alt="element 02" width="120" class="mb-1 img-fluid">
            <h4 class="card-title text-white">iPad Mini</h4>
            <p class="card-text">456 items</p>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Bottom Image Cap</h4>
          </div>
          <div class="card-body">
            <p class="card-text">
              Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon
              donut pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie
              chocolate bar chocolate tart dragée.
            </p>
            <p class="card-text">
              Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar
              muffin.
            </p>
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
          <img class="card-img-bottom img-fluid" src="{{asset('images/slider/04.jpg')}}" alt="Card image cap">
        </div>
        <div class="card text-white">
          <img class="card-img img-fluid position-sticky" src="{{asset('images/slider/03.jpg')}}" alt="Card image">
          <div class="card-img-overlay overlay-warning">
            <h4 class="card-title white mb-50">Overlay Card</h4>
            <p class="card-text text-ellipsis">
              Sugar plum tiramisu sweet. Cake jelly marshmallow cotton candy chupa
              chups carrot cake topping chupa chups.
            </p>
            <small>Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card border-info text-center bg-transparent">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-sm-12 mb-50 d-flex justify-content-center">
                <img src="{{asset('images/elements/macbook-pro.png')}}" alt="element 04" width="150"
                  class="float-left mt-1 img-fluid">
              </div>
              <div class="col-md-6 col-sm-12 d-flex justify-content-center flex-column">
                <h4>
                  <span class="badge badge-light-info">New Arrival</span>
                </h4>
                <p class="card-text">Mac Book.</p>
              </div>
            </div>
            <button class="btn btn-info mt-50">Buy Now</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Columns section end -->
@endsection
