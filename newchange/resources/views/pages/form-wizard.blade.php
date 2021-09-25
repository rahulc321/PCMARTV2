@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Form Wizard')

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
@endsection

@section('content')
<!-- Form wizard with icon tabs section start -->
<section id="icon-tabs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form wizard with icons tabs</h4>
        </div>
        <div class="card-body mt-2">
          <form action="#" class="wizard-horizontal">
            <!-- Step 1 -->
            <h6>
              <i class="step-icon"></i>
              <span class="fonticon-wrap">
                <i class="livicon-evo"
                  data-options="name:morph-doc.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
              </span>
            </h6>
            <!-- Step 1 end-->
            <!-- body content step 1 -->
            <fieldset>
              <div class="row">
                <div class="col-12">
                  <h6 class="py-50">Enter Your Personal Details</h6>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstName13">First Name </label>
                    <input type="text" class="form-control" id="firstName13" placeholder="Enter Your First Name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="lastName12">Last Name</label>
                    <input type="text" class="form-control" id="lastName12" placeholder="Enter Your Last Name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="emailAddress1">Email</label>
                    <input type="email" class="form-control" id="emailAddress1" placeholder="Enter Your Email">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" placeholder="Enter Your Phone Number">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>age</label>
                    <input type="number" class="form-control" placeholder="Enter Your Age">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="d-block">Gender</label>
                    <div class="custom-control-inline">
                      <div class="radio mr-1">
                        <input type="radio" name="bsradio" id="radio1" checked="">
                        <label for="radio1">Male</label>
                      </div>
                      <div class="radio">
                        <input type="radio" name="bsradio" id="radio2" checked="">
                        <label for="radio2">Female</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- body content step 1 end-->
            <!-- Step 2 -->
            <h6>
              <i class="step-icon"></i>
              <span class="fonticon-wrap">
                <i class="livicon-evo"
                  data-options="name:truck.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
              </span>
            </h6>
            <!-- Step 2 end-->
            <!-- body content of step 2 -->
            <fieldset>
              <div class="row">
                <div class="col-12">
                  <h6 class="py-50">Enter Your Location</h6>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Address Line 1</label>
                    <input type="text" class="form-control" placeholder="Enter House no./ Flate no.">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Address Line 2</label>
                    <input type="text" class="form-control" placeholder="Enter Society name/ Area name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>LandMark</label>
                    <input type="text" class="form-control" placeholder="Enter A Landmark">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>TOWN/CITY</label>
                    <input type="text" class="form-control" placeholder="Enter Town/City">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>PINCODE</label>
                    <input type="text" class="form-control" placeholder="Enter Your Pincode">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>STATE</label>
                    <input type="text" class="form-control" placeholder="Enter Your State">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Country</label>
                    <select name="country" class="form-control">
                      <option value="">Select</option>
                      <option value="AF">Afghanistan</option>
                      <option value="AX">Åland Islands</option>
                      <option value="AL">Albania</option>
                      <option value="DZ">Algeria</option>
                      <option value="AS">American Samoa</option>
                      <option value="AD">Andorra</option>
                      <option value="AO">Angola</option>
                      <option value="AI">Anguilla</option>
                      <option value="AQ">Antarctica</option>
                      <option value="ZW">Zimbabwe</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 d-flex align-items-center">
                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox__input" id="checkbox1" checked="">
                      <label for="checkbox1">Permanent Delivery address</label>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- body content of step 2 end-->
            <!-- Step 3 -->
            <h6>
              <i class="step-icon"></i>
              <span class="fonticon-wrap">
                <i class="livicon-evo"
                  data-options="name:home.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
              </span>
            </h6>
            <!-- Step 3 end-->
            <!-- body content of Step 3 -->
            <fieldset>
              <div class="row">
                <div class="col-12">
                  <h6 class="py-50">Enter Your Payment Methods</h6>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <div class="d-flex justify-content-between flex-wrap align-items-center">
                      <div class="vs-radio-con vs-radio-primary">
                        <img src="{{asset('images/pages/bank.png')}}" alt="img-placeholder" height="40">
                        <span>Card 12XX XXXX XXXX 0000</span>
                      </div>
                      <div class="card-holder-name">
                        John Doe
                      </div>
                      <div class="card-expiration-date">
                        11/2020
                      </div>
                      <div>
                        <label>Enter CVV</label>
                        <input type="password" class="form-control" placeholder="Enter Your CVV no.">
                      </div>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <ul class="other-payment-options list-unstyled">
                      <li class="pb-1">
                        <div class="radio">
                          <input type="radio" name="pyradio" id="radio6" checked="">
                          <label for="radio6">Credit / Debit / ATM Card</label>
                        </div>
                      </li>
                      <li class="pb-1">
                        <div class="radio">
                          <input type="radio" name="pyradio" id="radio7" checked="">
                          <label for="radio7">Net Banking</label>
                        </div>
                      </li>
                      <li class="pb-1">
                        <div class="radio">
                          <input type="radio" name="pyradio" id="radio8" checked="">
                          <label for="radio8"> EMI (Easy Installment)</label>
                        </div>
                      </li>
                      <li class="pb-1">
                        <div class="radio">
                          <input type="radio" name="pyradio" id="radio9" checked="">
                          <label for="radio9"> Cash On Delivery</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <hr>
                </div>
                <div class="col-12 d-flex">
                  <div class="paypal cursor-pointer d-flex align-items-center">
                    <div class="radio">
                      <input type="radio" name="onlportal" id="paypal" checked="">
                      <label for="paypal"></label>
                    </div>
                    <img src="{{asset('images/pages/PayPal_logo.png')}}" alt="PayPal Logo">
                  </div>
                  <div class="googlepay cursor-pointer pl-1 d-flex align-items-center">
                    <div class="radio">
                      <input type="radio" name="onlportal" id="googlepay" checked="">
                      <label for="googlepay"></label>
                    </div>
                    <img src="{{asset('images/pages/google-pay.png')}}" height="30" alt="google Logo">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <hr>
                  <div class="form-group">
                    <label>Enter Your Promocode</label>
                    <input type="text" class="form-control" placeholder="Enter Your Promocode">
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- body content of Step 3 end-->
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Form wizard with number tabs section end -->

<!-- Form wizard with icon tabs section start -->
<section id="info-tabs-">
  <div class="row">
    <div class="col-12">
      <div class="card icon-tab">
        <div class="card-header">
          <h4 class="card-title">Form wizard with icon and info tabs</h4>
        </div>
        <div class="card-body mt-2">
          <form action="#" class="wizard-horizontal">
            <!-- Step 1 -->
            <h6>
              <i class="step-icon"></i>
              <span class="fonticon-wrap">
                <i class="livicon-evo"
                  data-options="name:user.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
              </span>
              <span>Basic Details</span>
            </h6>
            <!-- Step 1 end-->
            <!-- body content of step 1 -->
            <fieldset>
              <div class="row">
                <div class="col-12">
                  <h6 class="py-50">Basic Details</h6>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>FIRST Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your First name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Last name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>password</label>
                    <input type="password" class="form-control" placeholder="Enter Your Password">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-12">
                  <h6 class="py-50">Contact Details</h6>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Address Line 1</label>
                    <input type="text" class="form-control" placeholder="Enter Your House no./ Flate no.">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>address line 2</label>
                    <input type="text" class="form-control" placeholder="Enter Your Society name / Area name">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Landmark</label>
                    <input type="text" class="form-control" placeholder="Enter a LandMark">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>city</label>
                    <input type="text" class="form-control" placeholder="Enter Your Ciy">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" placeholder="Enter Your State">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-">
                    <div class="form-group">
                      <label>Country</label>
                      <input type="text" class="form-control" placeholder="Enter Your Country">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control" placeholder="Enter Your Current Age">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" placeholder="+12345675">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="d-block">Gender</label>
                    <div class="custom-control-inline">
                      <div class="radio mr-1">
                        <input type="radio" name="bsradio1" id="radio5" checked="">
                        <label for="radio5">Male</label>
                      </div>
                      <div class="radio">
                        <input type="radio" name="bsradio1" id="radio888" checked="">
                        <label for="radio888">Female</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-12">
                  <h6 class="py-50">Id Proof</h6>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Passport</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>National ID </label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile02">
                      <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Birth Certificate</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile03">
                      <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Driving Licence</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile04">
                      <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- body content of step 1 end-->
            <!-- Step 2-->
            <h6>
              <i class="step-icon"></i>
              <span class="fonticon-wrap">
                <i class="livicon-evo"
                  data-options="name:briefcase.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
              </span>
              <span>Term and conditions</span>
            </h6>
            <!-- Step 2 end-->
            <!-- body content of step 2 -->
            <fieldset>
              <div class="row">
                <div class="col-12">
                  <h6 class="py-50">Terms and conditions</h6>
                </div>
                <div class="col-12">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum culpa repellendus laborum maxime
                    dignissimos dolor excepturi iusto nemo aspernatur? Qui modi inventore reprehenderit, nostrum
                    quaerat libero maiores consequuntur illo veritatis.
                  </p>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, culpa obcaecati. Qui accusantium
                    sit error, dolorem alias incidunt est. Laborum, atque ipsum debitis obcaecati dolor illo magni
                    provident harum vitae?
                  </p>
                  <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit omnis, doloribus autem,
                    non quam quibusdam harum accusamus voluptatem in perspiciatis consequuntur sint nam debitis
                    sapiente ex, optio totam delectus quis.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis placeat in quisquam dolorum
                    numquam, rerum expedita corporis eveniet quas nostrum, quia veritatis neque quos sint sit
                    exercitationem obcaecati perferendis magnam!
                  </p>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam consequatur laudantium
                    voluptatibus impedit unde. Error eius consequuntur tenetur unde molestias esse doloribus animi,
                    temporibus placeat eaque laborum, maiores, ex quo!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, suscipit placeat accusamus
                    voluptas odio est ea accusantium dignissimos et officia, cupiditate aperiam atque facilis?
                    Adipisci earum fuga illo odit reiciendis. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Asperiores nihil necessitatibus sequi placeat tenetur, perspiciatis, excepturi dolor, consectetur
                    assumenda amet accusantium velit fuga numquam tempore repellendus voluptatem vitae. Voluptatem,
                    hic.
                  </p>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde perspiciatis vero, reprehenderit
                    beatae necessitatibus dignissimos animi distinctio illo porro fuga maxime nemo voluptate
                    aspernatur tempore? Incidunt consectetur dignissimos blanditiis. Corporis. Lorem ipsum dolor sit
                    amet consectetur, adipisicing elit. At, dolore omnis! Architecto dolorem non, earum pariatur,
                    molestias voluptatem saepe voluptatibus praesentium expedita cum quae et assumenda. Voluptas
                    debitis praesentium quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque veniam
                    ipsa saepe sint necessitatibus incidunt nihil totam delectus, dolor omnis itaque libero sed
                    molestiae assumenda non repellat, rerum, eius quia. lorem
                  </p>
                  <strong>Read all term and conditions carefully.</strong>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="radio">
                      <input type="radio" name="bsradio" id="agree">
                      <label for="agree" class="text-success">I read all term and conditions and i Agree.</label>
                    </div>
                    <div class="radio">
                      <input type="radio" name="bsradio" id="disagree">
                      <label for="disagree" class="text-danger">I am not Agree with it.</label>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- body content of step 2 end-->
            <!-- Step 3-->
            <h6>
              <i class="step-icon"></i>
              <span class="fonticon-wrap">
                <i class="livicon-evo"
                  data-options="name:users.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
              </span>
              <span>Nominee</span>
            </h6>
            <!-- Step 3 end-->
            <!-- body content of step 3 -->
            <fieldset>
              <div class="row">
                <div class="col-12">
                  <h6 class="py-50">Enter Nominate Details</h6>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa ad, consectetur animi magni
                      magnam nihil error, quaerat pariatur dolores unde quod sequi modi temporibus libero eos
                      consequuntur ab maxime alias!
                    </p>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group">
                    <label>Nomination Name</label>
                    <input type="text" class="form-control" placeholder="Nomination Name">
                  </div>
                </div>
                <div class="col-md-3 col-sm-4">
                  <div class="form-group">
                    <label>Nominee's Relation</label>
                    <input type="text" class="form-control" placeholder="Relation">
                  </div>
                </div>
                <div class="col-md-2 col-sm-4">
                  <div class="form-group">
                    <label>Nominee Age</label>
                    <input type="number" class="form-control" placeholder="Age">
                  </div>
                </div>
                <div class="col-md-3 col-sm-4">
                  <div class="form-group">
                    <label>Nominee Documents</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile05">
                      <label class="custom-file-label" for="inputGroupFile05">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <h6 class="py-50">Terms and conditions for nominee</h6>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci odit sunt facilis,
                    exercitationem placeat in maiores, ullam doloribus aperiam sint culpa, quo ducimus tempore
                    perferendis ipsum laborum officia ut dignissimos!
                  </p>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. In beatae quibusdam enim neque animi
                    fugiat harum tempora ipsum excepturi, cupiditate illum hic dignissimos, quaerat dolore! Minus rem
                    sed accusamus corrupti?
                  </p>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. In beatae quibusdam enim neque animi
                    fugiat harum tempora ipsum excepturi, cupiditate illum hic dignissimos, quaerat dolore! Minus rem
                    sed accusamus corrupti?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci odit sunt
                    facilis,
                    exercitationem placeat in maiores, ullam doloribus aperiam sint culpa, quo ducimus tempore
                    perferendis ipsum laborum officia ut dignissimos!
                  </p>
                </div>
              </div>
            </fieldset>
            <!-- body content of step 3 end-->
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Form wizard with icon tabs section end -->

<!-- Form wizard with step validation section start -->
<section id="validation">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <h4 class="card-title">Validation Example</h4>
        </div>
        <div class="card-body">
          <form action="#" class="wizard-validation">
            <!-- Step 1 -->
            <h6>
              <i class="step-icon"></i>
              <span>Baisc Information</span>
            </h6>
            <!-- Step 1 -->
            <!-- body content of step 1 -->
            <fieldset>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="firstName3">First Name </label>
                    <input type="text" class="form-control required" id="firstName3" name="firstName"
                      placeholder="Enter Your First Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lastName3">Last Name</label>
                    <input type="text" class="form-control required" id="lastName3" name="lastName"
                      placeholder="Enter Your Last Name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="emailAddress5">Email</label>
                    <input type="email" class="form-control required" id="emailAddress5" name="emailAddress"
                      placeholder="Enter Your Email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="location">City</label>
                    <select class="custom-select form-control" id="location" name="location">
                      <option value="">New York</option>
                      <option value="Amsterdam">Chicago</option>
                      <option value="Berlin">San Francisco</option>
                      <option value="Frankfurt">Boston</option>
                    </select>
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- body content of step 1 end -->
            <!-- Step 2 -->
            <h6>
              <i class="step-icon"></i>
              <span>Job Details</span>
            </h6>
            <!-- step 2 -->
            <!-- body content of step 2 end -->
            <fieldset>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="proposalTitle3">
                      Proposal Title
                    </label>
                    <input type="text" class="form-control required" id="proposalTitle3" name="proposalTitle"
                      placeholder="Enter Your Proposel Title">
                  </div>
                  <div class="form-group">
                    <label for="jobTitle5">
                      Job Title
                    </label>
                    <input type="text" class="form-control required" id="jobTitle5" name="jobTitle5"
                      placeholder="Enter Your Job Title">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="shortDescription3">Short Description</label>
                    <textarea name="shortDescription" id="shortDescription3" rows="4" class="form-control"
                      placeholder="Please Enter short Description"></textarea>
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- body content of step 2 end -->
            <!-- Step 3 -->
            <h6>
              <i class="step-icon"></i>
              <span>Event Details</span>
            </h6>
            <!-- step 3 end -->
            <!-- step 3 content -->
            <fieldset>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="eventName3">
                      Event Name
                    </label>
                    <input type="text" class="form-control required" id="eventName3" name="eventName"
                      placeholder="Enter Event Name">
                  </div>
                  <div class="form-group">
                    <label for="eventStatus3">Event Statuss</label>
                    <select class="custom-select form-control required" id="eventStatus3" name="eventStatus">
                      <option value="Planning">Planning</option>
                      <option value="In Progress">In Progress</option>
                      <option value="Finished">Finished</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="eventLocation3">Event Location </label>
                    <select class="custom-select form-control required" id="eventLocation3" name="eventStatus">
                      <option value="Planning">New York</option>
                      <option value="In Progress">Chicago</option>
                      <option value="Finished">San Francisco</option>
                      <option value="Finished">Boston</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="mr-2">Requirements :</label>
                    <div class="c-inputs-stacked">
                      <div class="d-inline-block mr-2">
                        <fieldset>
                          <div class="checkbox">
                            <input type="checkbox" class="checkbox__input" id="checkbox6">
                            <label for="checkbox6">Staffing</label>
                          </div>
                        </fieldset>
                      </div>
                      <div class="d-inline-block">
                        <fieldset>
                          <div class="checkbox">
                            <input type="checkbox" class="checkbox__input" id="checkbox5">
                            <label for="checkbox5">Catering</label>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <!-- step 3 content end-->
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Form wizard with step validation section end -->

<!-- vertical Wizard start-->
<section id="vertical-wizard">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Vertical Wizard</h4>
    </div>
    <div class="card-body">
      <form action="#" class="wizard-vertical">
        <!-- step 1 -->
        <h3>
          <span class="fonticon-wrap mr-1">
            <i class="livicon-evo" data-options="name:gear.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
          </span>
          <span class="icon-title">
            <span class="d-block">Users Details</span>
            <small class="text-muted">Setup your account details here.</small>
          </span>
        </h3>
        <!-- step 1 end-->
        <!-- step 1 content -->
        <fieldset class="pt-0">
          <h6 class="pb-50">Enter your Account Details</h6>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="firstName12">First Name </label>
                <input type="text" class="form-control" id="firstName12" placeholder="Enter Your First Name">
                <small class="text-muted form-text">Please enter your first name.</small>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="lastName1">Last Name</label>
                <input type="text" class="form-control" id="lastName1" placeholder="Enter Your Last Name">
                <small class="text-muted form-text">Please enter your last name.</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="emailAddress12">Email</label>
                <input type="email" class="form-control" id="emailAddress12" placeholder="Enter Your Email">
                <small class="text-muted form-text">Please enter your email address.</small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control" placeholder="+91586386368">
                <small class="text-muted form-text">Please enter your phone number.</small>
              </div>
            </div>
          </div>
        </fieldset>
        <!-- step 1 content end-->
        <!-- step 2 -->
        <h3>
          <span class="fonticon-wrap mr-1">
            <i class="livicon-evo"
              data-options="name:location.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
          </span>
          <span class="icon-title">
            <span class="d-block">setup location</span>
            <small class="text-muted">Choose your location here.</small>
          </span>
        </h3>
        <!-- step 2 end-->
        <!-- step 2 content -->
        <fieldset class="pt-0">
          <h6 class="py-50">Setup Your Current Location</h6>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="proposalTitle1">Address Line 1</label>
                <input type="text" class="form-control" id="proposalTitle1"
                  placeholder="Enter Your House no./ Flate No.">
              </div>
              <div class="form-group">
                <label>Postcode</label>
                <input type="text" class="form-control" placeholder="Enter Your Postcode">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="jobtitle">Address Line 2</label>
                <input type="text" class="form-control" id="jobtitle" placeholder="Enter Your Area Name/ Landmark">
              </div>
              <div class="form-group">
                <label>City</label>
                <select class="custom-select form-control" id="eventLocation12" name="location">
                  <option value="new-york">New York</option>
                  <option value="chicago">Chicago</option>
                  <option value="san-francisco">San Francisco</option>
                  <option value="boston">Boston</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>State</label>
                <input type="text" class="form-control" placeholder="VIC">
                <small class="form-text text-muted">Please enter your Postcode.</small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Country</label>
                <select name="country" class="form-control">
                  <option value="">Select</option>
                  <option value="AF">Afghanistan</option>
                  <option value="AX">Åland Islands</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="KY">Cayman Islands</option>
                  <option value="CF">Central African Republic</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (Keeling) Islands</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros</option>
                  <option value="ZW">Zimbabwe</option>
                </select>
                <small class="form-text text-muted">Select your Country</small>
              </div>
            </div>
          </div>
        </fieldset>
        <!-- step 2 content end-->
        <!-- section 3 -->
        <h3>
          <span class="fonticon-wrap mr-1">
            <i class="livicon-evo"
              data-options="name:headphones.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
          </span>
          <span class="icon-title">
            <span class="d-block">Support channel</span>
            <small class="text-muted">add your support agents.</small>
          </span>
        </h3>
        <!-- section 3 end-->
        <!-- step 3 content -->
        <fieldset class="pt-0">
          <h6 class="py-50">Select your Services</h6>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Delivery Type</label>
                <select name="delivery" class="form-control">
                  <option value="">Select a Service Type Option</option>
                  <option value="overnight" selected="">Overnight Delivery (within 48 hours)</option>
                  <option value="express">Express Delivery (within 5 working days)</option>
                  <option value="basic">Basic Delivery (within 5 - 10 working days)</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="eventLocation12">Preferred Delivery Window</label>
                <select name="preferreddelivery" class="form-control">
                  <option value="">Select a Preferred Delivery Option</option>
                  <option value="morning" selected="">Morning Delivery (8:00AM - 11:00AM)</option>
                  <option value="afternoon">Afternoon Delivery (11:00AM - 3:00PM)</option>
                  <option value="evening">Evening Delivery (3:00PM - 7:00PM)</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Packing Type</label>
                <select name="packaging" class="form-control">
                  <option value="">Select a Packaging Type Option</option>
                  <option value="regular" selected="">Regular Packaging</option>
                  <option value="oversized">Oversized Packaging</option>
                  <option value="fragile">Fragile Packaging</option>
                  <option value="frozen">Frozen Packaging</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="mr-2">Requirements :</label>
                <div class="c-inputs-stacked">
                  <div class="d-inline-block mr-2">
                    <fieldset>
                      <div class="checkbox pb-1">
                        <input type="checkbox" class="checkbox__input" id="checkbox114">
                        <label for="checkbox114">Ordanary</label>
                      </div>
                    </fieldset>
                  </div>
                  <div class="d-inline-block">
                    <fieldset>
                      <div class="checkbox pb-1">
                        <input type="checkbox" class="checkbox__input" id="checkbox12">
                        <label for="checkbox12">Express</label>
                      </div>
                    </fieldset>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </fieldset>
        <!-- step 3 content end-->
        <!-- step 4 -->
        <h3>
          <span class="fonticon-wrap mr-1">
            <i class="livicon-evo" data-options="name:truck.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
          </span>
          <span class="icon-title">
            <span class="d-block">delivered</span>
            <small class="text-muted">Delivered to you.</small>
          </span>
        </h3>
        <!-- step 4 end-->
        <!-- step 4 content -->
        <fieldset class="pt-0">
          <h6 class="py-50">Enter your Payment Details</h6>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="eventName13">Name on Card</label>
                <input type="text" class="form-control" id="eventName13" placeholder="Enter Name On Card">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Card Number</label>
                <input type="text" class="form-control" placeholder="Enter Card No.">
                <small class="form-text text-muted">Credit / Debit / ATM Card/Master Card</small>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Card Expiry Month</label>
                <input type="number" class="form-control" name="ccmonth" placeholder="Card Expiry Month" value="01">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Card Expiry Year</label>
                <input type="number" class="form-control" name="ccyear" placeholder="Card Expire Year" value="21">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Card CVV Number</label>
                <input type="password" class="form-control" name="ccyear" placeholder="Card CVV Number" value="212">
              </div>
            </div>
          </div>
        </fieldset>
        <!-- step 4 content end-->
      </form>
    </div>
  </div>
</section>
<!-- vertical Wizard end-->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/wizard-steps.js')}}"></script>
@endsection
