@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Modal')

@section('content')
<!-- Basic Modals start -->
<section id="basic-modals">
  <div class="row">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Modal</h4>
        </div>
        <div class="card-body">
          <p>
            Toggle a modal via JavaScript by clicking the button above.
            You can use modal to add dialogs to your site for lightboxes, user
            notifications, or completely custom content.
          </p>
          <!-- Button trigger for basic modal -->
          <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#default">
            Launch Modal
          </button>

          <!--Basic Modal -->
          <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Basic Modal</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0">
                    Bonbon caramels muffin. Chocolate bar oat cake cookie pastry dragée pastry. Carrot cake
                    chocolate tootsie roll chocolate bar candy canes biscuit.
                    Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee sugar
                    plum sugar plum jelly-o jujubes bonbon dessert carrot cake. Cookie dessert tart muffin topping
                    donut icing fruitcake. Sweet roll cotton candy dragée danish Candy canes chocolate bar cookie.
                    Gingerbread apple pie oat cake. Carrot cake fruitcake bear claw. Pastry gummi bears
                    marshmallow jelly-o.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">BorderLess Modal</h4>
        </div>
        <div class="card-body">
          <p>
            Toggle a Boderless via JavaScript by clicking the button above. Use <code>.modal-borderless</code>
            with <code>.modal</code>for BorderLess modal.
          </p>
          <!-- Button trigger for BorderLess Modal -->
          <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#border-less">
            Launch Modal
          </button>

          <!--BorderLess Modal Modal -->
          <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Border-Less</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0">
                    Bonbon caramels muffin. Chocolate bar oat cake cookie pastry dragée pastry. Carrot cake
                    chocolate tootsie roll chocolate bar candy canes biscuit.
                    Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee sugar
                    plum sugar plum jelly-o jujubes bonbon dessert carrot cake. Cookie dessert tart muffin topping
                    donut icing fruitcake. Sweet roll cotton candy dragée danish Candy canes chocolate bar cookie.
                    Gingerbread apple pie oat cake. Carrot cake fruitcake bear claw. Pastry gummi bears
                    marshmallow jelly-o.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-primary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            Vertically Centered
          </h4>
        </div>
        <div class="card-body">
          <p>
            Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center the modal.
          </p>
          <!-- button trigger for  Vertically Centered modal -->
          <button type="button" class="btn btn-outline-primary block" data-toggle="modal"
            data-target="#exampleModalCenter">
            Launch Modal
          </button>
          <!-- Vertically Centered modal Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0">
                    Croissant jelly-o halvah chocolate sesame snaps. Brownie caramels candy canes chocolate cake
                    marshmallow icing lollipop I love. Gummies macaroon donut caramels biscuit topping danish.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Disabled Backdrop</h4>
        </div>
        <div class="card-body">
          <p>You can disable the backdrop by using <code>data-backdrop="false"</code></p>
          <!-- Button trigger for Disabled Backdrop -->
          <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-backdrop="false"
            data-target="#backdrop">
            Launch Modal
          </button>

          <!--Disabled Backdrop Modal -->
          <div class="modal fade text-left" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel4">Disabled Backdrop</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0">
                    Candy oat cake topping topping chocolate cake. Icing pudding jelly beans I love chocolate carrot
                    cake wafer candy canes. Biscuit croissant fruitcake bonbon soufflé.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Modals end -->

<!-- Modal Themes start -->
<section id="modal-themes">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Modal Themes</h4>
        </div>
        <div class="card-body">
          <p class="mb-1">
            Use class <code>.bg-*</code> with your <code>.modal-header</code> to change theme of modal
          </p>
          <div class="row">
            <div class="col-12">
              <div class="modal-primary mr-1 mb-1 d-inline-block">
                <!-- Button trigger for primary themes modal -->
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#primary">
                  Primary
                </button>

                <!--primary theme Modal -->
                <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
                  aria-labelledby="myModalLabel160" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel160">Primary Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                        Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                        carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet
                        gummi
                        bears cupcake dessert.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Accept</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-success mr-1 mb-1 d-inline-block">
                <!-- Button trigger for Success theme modal -->
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#success">
                  Success
                </button>

                <!--Success theme Modal -->
                <div class="modal fade text-left" id="success" tabindex="-1" role="dialog"
                  aria-labelledby="myModalLabel110" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Success Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                        Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                        carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet
                        gummi
                        bears cupcake dessert.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                        </button>

                        <button type="button" class="btn btn-success ml-1" data-dismiss="modal">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Accept</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-danger mr-1 mb-1 d-inline-block">
                <!-- Button trigger for danger theme modal -->
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#danger">
                  Danger
                </button>

                <!--Danger theme Modal -->
                <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog"
                  aria-labelledby="myModalLabel120" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="myModalLabel120">Danger Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                        Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                        carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet
                        gummi bears cupcake dessert.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Accept</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-info mr-1 mb-1 d-inline-block">
                <!-- Button trigger for info theme modal -->
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#info">
                  Info
                </button>

                <!--info theme Modal -->
                <div class="modal fade text-left" id="info" tabindex="-1" role="dialog"
                  aria-labelledby="myModalLabel130" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header bg-info">
                        <h5 class="modal-title white" id="myModalLabel130">Info Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                        Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                        carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet
                        gummi bears cupcake dessert.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-info ml-1" data-dismiss="modal">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Accept</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-warning mr-1 mb-1 d-inline-block">
                <!-- Button trigger for warning theme modal -->
                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#warning">
                  Warning
                </button>

                <!--warning theme Modal -->
                <div class="modal fade text-left" id="warning" tabindex="-1" role="dialog"
                  aria-labelledby="myModalLabel140" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header bg-warning">
                        <h5 class="modal-title white" id="myModalLabel140">Warning Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                        Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                        carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet
                        gummi bears cupcake dessert.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                        </button>

                        <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Accept</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-dark mr-1 mb-1 d-inline-block">
                <!-- Button trigger for dark modal -->
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dark">
                  Dark
                </button>
                <!--Dark theme Modal -->
                <div class="modal fade text-left" id="dark" tabindex="-1" role="dialog"
                  aria-labelledby="myModalLabel150" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header bg-dark white">
                        <span class="modal-title" id="myModalLabel150">Dark Modal</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                        Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                        carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet
                        gummi bears cupcake dessert.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-dark ml-1" data-dismiss="modal">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Accept</span>
                        </button>
                      </div>
                    </div>
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
<!-- Modal Themes end -->

<!-- Modal Sizes start -->
<section id="modal-sizes">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Modal Sizes</h4>
    </div>
    <div class="card-body">
      <p>
        Add class <code>.modal-{sm|lg|xl|full}</code> with <code>.modal-dialog</code> to create a modal with
        different size.
      </p>
      <div class="row">
        <div class="col-12">
          <!--Modal sm size -->
          <div class="mr-1 mb-1 d-inline-block">
            <!-- Button trigger for small size modal modal -->
            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#small">
              Small Modal
            </button>

            <!--small size modal -->
            <div class="modal fade text-left" id="small" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel19">Small Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="bx bx-x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    Biscuit chocolate cake gummies. Lollipop I love macaroon bear claw caramels. I love
                    marshmallow tiramisu I love fruitcake I love gummi bears.
                    Carrot cake topping liquorice. Pudding caramels liquorice sweet I love. Donut powder cupcake
                    ice cream tootsie roll jelly.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary btn-sm" data-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-sm-block d-none">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1 btn-sm" data-dismiss="modal">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-sm-block d-none">Accept</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Modal default md size -->
          <div class="mr-1 mb-1 d-inline-block">
            <!-- Button trigger for default modal -->
            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#defaultSize">
              Default Modal
            </button>

            <!--Default size Modal -->
            <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog"
              aria-labelledby="myModalLabel18" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="bx bx-x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    I love candy candy cake powder I love icing ice cream pastry. Biscuit lemon drops sesame
                    snaps. Topping biscuit croissant gummi bears jelly beans cake cake bear claw muffin. Lemon
                    drops oat cake pastry bear claw liquorice lemon drops.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Accept</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Modal lg size -->
          <div class="mr-1 mb-1 d-inline-block">
            <!-- Button trigger for large size modal -->
            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#large">
              Large Modal
            </button>
            <!--large size Modal -->
            <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="bx bx-x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    I love tart cookie cupcake. I love chupa chups biscuit. I love marshmallow apple pie wafer
                    liquorice. Marshmallow cotton candy chocolate. Apple pie muffin tart. Marshmallow halvah pie
                    marzipan lemon drops jujubes. Macaroon sugar plum cake icing toffee.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Accept</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Modal Xl size -->
          <div class="mr-1 mb-1 d-inline-block">
            <!-- Button trigger for Extra Large  modal -->
            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#xlarge">
              Extra Large Modal
            </button>

            <!--Extra Large Modal -->
            <div class="modal fade text-left w-100" id="xlarge" tabindex="-1" role="dialog"
              aria-labelledby="myModalLabel16" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Extra Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="bx bx-x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    Cake cupcake sugar plum. Sesame snaps pudding cupcake candy canes icing cheesecake. Sweet roll
                    pudding lollipop apple pie gummies dragée. Chocolate bar cookie caramels I love lollipop ice
                    cream tiramisu lollipop sweet.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Accept</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Modal full size -->
          <div class="mr-1 mb-1 d-inline-block">
            <!-- Button trigger for full size modal -->
            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#full-scrn">
              Full Screen Modal
            </button>

            <!-- full size modal-->
            <div class="modal fade text-left w-100" id="full-scrn" tabindex="-1" role="dialog"
              aria-labelledby="myModalLabel20" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel20">Full Screen Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="bx bx-x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    Cake cupcake sugar plum. Sesame snaps pudding cupcake candy canes icing cheesecake. Sweet roll
                    pudding lollipop apple pie gummies dragée. Chocolate bar cookie caramels I love lollipop ice
                    cream tiramisu lollipop sweet.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Accept</span>
                    </button>
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
<!-- Modal Sizes end -->

<!-- Form and scrolling Components start -->
<section id="form-and-scrolling-components">
  <div class="row">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <h4 class="card-title">Modal with Login Form</h4>
            <p> Created Simple Login Form.</p>
            <!-- Button trigger for login form modal -->
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#inlineForm">
              Launch Modal
            </button>

            <!--login form Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
              aria-labelledby="myModalLabel33" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="bx bx-x"></i>
                    </button>
                  </div>
                  <form action="#">
                    <div class="modal-body">
                      <label>Email: </label>
                      <div class="form-group">
                        <input type="text" placeholder="Email Address" class="form-control">
                      </div>
                      <label>Password: </label>
                      <div class="form-group mb-0">
                        <input type="password" placeholder="Password" class="form-control">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                      </button>
                      <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">login</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Scrolling long Content</h4>
        </div>
        <div class="card-body">
          <p>If your content is longer you the page will autmatically adopt a scrollbar</p>
          <!-- Button trigger for scrollbar modal -->
          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalLong">
            Launch demo modal
          </button>

          <!--scrollbar Modal -->
          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Scrolling Modal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p>
                    Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake
                    powder pudding pastry.
                  </p>
                  <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                    candy
                    gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love
                    caramels powder.
                  </p>
                  <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                    dragée
                    dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                  </p>
                  <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                    tootsie
                    roll carrot cake soufflé halvah.
                    Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake
                    powder pudding pastry.
                  </p>
                  <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                    candy
                    gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love
                    caramels powder
                  </p>
                  <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                    dragée
                    dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                  </p>
                  <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                    tootsie
                    roll carrot cake soufflé halvah.
                    Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake
                    powder pudding pastry.
                  </p>
                  <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                    candy
                    gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love
                    caramels powder.
                  </p>
                  <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                    dragée
                    dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                  </p>
                  <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                    tootsie
                    roll carrot cake soufflé halvah.
                    Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake
                    powder pudding pastry.
                  </p>
                  <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                    candy
                    gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love
                    caramels powder.
                  </p>
                  <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                    dragée
                    dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                  </p>
                  <p class="mb-0">
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                    tootsie
                    roll carrot cake soufflé halvah.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>

                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Scrolling long Content Inside Modal</h4>
        </div>
        <div class="card-body">
          <p>You can also create a scrollable modal that allows scroll the modal body by adding
            <code>.modal-dialog-scrollable</code> to <code>.modal-dialog</code>.</p>
          <!-- Button trigger for scrolling content modal -->
          <button type="button" class="btn btn-outline-success" data-toggle="modal"
            data-target="#exampleModalScrollable">
            Launch demo modal
          </button>

          <!--scrolling content Modal -->
          <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Scrolling long Content</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p>
                    Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake
                    powder pudding pastry
                  </p>
                  <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                    candy
                    gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love
                    caramels powder
                  </p>
                  <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                    dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                  </p>
                  <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                    tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                    croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                  </p>
                  <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                    candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                    love caramels powder.
                  </p>
                  <p>
                    dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                  </p>
                  <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                    tootsie roll carrot cake soufflé halvah.Biscuit powder jelly beans. Lollipop candy canes croissant
                    icing chocolate cake. Cake fruitcake powder pudding pastry.
                  </p>
                  <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                    candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                    love caramels powder.
                  </p>
                  <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                    dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                  </p>
                  <p>
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                    tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                    croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                  </p>
                  <p>
                    Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                    candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                    love caramels powder.
                  </p>
                  <p>
                    Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                    dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                    chocolate marzipan muffin pie liquorice.
                  </p>
                  <p class="mb-0">
                    Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                    Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                    tootsie roll carrot cake soufflé halvah.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Disabled Animation</h4>
        </div>
        <div class="card-body">
          <p>
            For modals that simply appear rather than fade in to view, remove the <code>.fade</code> class from your
            modal markup.
          </p>
          <!-- Button trigger for disabled animation modal -->
          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#animation">
            Launch demo modal
          </button>

          <!-- disabled animation Modal -->
          <div class="modal text-left" id="animation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel6">Disabled Animation</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p>
                    Chocolate bar jelly dragée cupcake chocolate bar I love donut liquorice. Powder I love marzipan
                    donut candy canes jelly-o. Dragée liquorice apple pie candy biscuit danish lemon drops sugar plum.
                  </p>
                  <div class="alert bg-rgba-success mb-0" role="alert">
                    <span class="text-bold-600">Well done!</span>
                    You successfully read this important alert
                    message.
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Form and scrolling Components end -->

<!-- Modal Events start -->
<section id="modal-events">
  <div class="row match-height">
    <div class="col-12 mb-1 mt-3">
      <h4>Modal Events</h4>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">On Show Event</h4>
        </div>
        <div class="card-body">
          <p>
            This event fires immediately when the show instance method is called. If caused by a click, the
            clicked element is available as the relatedTarget property of the event.
          </p>
          <!-- Button trigger for On Show Event modal -->
          <button type="button" class="btn btn-outline-danger block" data-toggle="modal" id="onshowbtn"
            data-target="#onshow">
            Launch Modal
          </button>

          <!--On Show Event Modal -->
          <div class="modal fade text-left" id="onshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel21">On Show Event Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  Donut chocolate halvah I love caramels. Dessert croissant I love icing I love dragée candy canes
                  chocolate bar. Oat cake lollipop I love cake chocolate bar jelly sweet. I love cotton candy oat cake
                  jelly.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            On Shown Event
          </h4>
        </div>
        <div class="card-body">
          <p>
            This event is fired when the modal has been made visible to the user (will wait for CSS transitions to
            complete).
          </p>
          <!-- Button trigger for On Shown Event modal -->
          <button type="button" class="btn btn-outline-danger block" data-toggle="modal" id="onshownbtn"
            data-target="#onshown">
            Launch Modal
          </button>

          <!--On Shown Event Modal -->
          <div class="modal fade text-left" id="onshown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel22"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel22">On Shown Event</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  Jujubes chocolate bar topping sweet caramels chocolate cake. Fruitcake pie wafer toffee sweet roll
                  I love. Chocolate pastry halvah bear claw jelly beans sesame snaps candy canes cotton candy. Jelly
                  macaroon pie toffee cupcake soufflé cotton candy.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            On Hide Event
          </h4>
        </div>
        <div class="card-body">
          <p>This event is fired immediately when the hide instance method has been called.</p>
          <!-- Button trigger for  On Hide Event modal -->
          <button type="button" class="btn btn-outline-danger block" data-toggle="modal" id="onhidebtn"
            data-target="#onhide">
            Launch Modal
          </button>

          <!-- On Hide Event Modal -->
          <div class="modal fade text-left" id="onhide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel23"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel23"> On Hide Event Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  Sweet roll I love pudding sweet roll jujubes donut I love cookie tart. Chocolate cake I love bear
                  claw bonbon dragée. Jujubes carrot cake jujubes I love lemon drops cookie. Jelly beans jujubes
                  cotton candy tootsie roll.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            On Hidden Event
          </h4>
        </div>
        <div class="card-body">
          <p>
            This event is fired when the modal has finished being hidden from the user (will wait for CSS
            transitions to complete).
          </p>
          <!-- Button trigger for  On Hide Event modal -->
          <button type="button" class="btn btn-outline-danger block" data-toggle="modal" id="onhiddenbtn"
            data-target="#onhidden">
            Launch Modal
          </button>

          <!-- On Hide Event Modal -->
          <div class="modal fade text-left" id="onhidden" tabindex="-1" role="dialog" aria-labelledby="myModalLabel24"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel24"> On Hide Event Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  Cookie cupcake dessert cotton candy donut cupcake marshmallow pie marzipan. Tootsie roll wafer
                  sesame snaps gummi bears cake. Cake icing cupcake I love gummi bears. Halvah I love chupa chups I
                  love bonbon I love.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal Events end -->
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/modal/components-modal.js')}}"></script>
@endsection
