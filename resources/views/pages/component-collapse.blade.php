@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Collapse')

@section('content')
<!-- Collapse start -->
<section id="collapsible">
  <h4>Collapse</h4>
  <p>
    Just add <code>.collapsible</code>in wrapper for get Template specific style.
  </p>
  <div class="collapsible">
    <div class="card collapse-header">
      <div id="headingCollapse1" class="card-header" data-toggle="collapse" role="button" data-target="#collapse1"
        aria-expanded="false" aria-controls="collapse1">
        <span class="collapse-title">
          Collapse Item 1
        </span>
      </div>
      <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
        <div class="card-body">
          Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
          brownie brownie cotton candy.
          Tootsie roll cotton candy pudding bonbon chocolate cake lemon drops candy. Jelly marshmallow
          chocolate cake carrot cake bear claw ice cream chocolate. Fruitcake apple pie pudding jelly beans
          pie candy canes candy canes jelly-o. Tiramisu brownie gummi bears soufflé dessert cake.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="headingCollapse2" class="card-header" data-toggle="collapse" role="button" data-target="#collapse2"
        aria-expanded="false" aria-controls="collapse2">
        <span class="collapse-title">
          Collapse Item 2
        </span>
      </div>
      <div id="collapse2" role="tabpanel" aria-labelledby="headingCollapse2" class="collapse">
        <div class="card-body">
          Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
          brownie brownie cotton candy.
          Tootsie roll cotton candy pudding bonbon chocolate cake lemon drops candy. Jelly marshmallow
          chocolate cake carrot cake bear claw ice cream chocolate. Fruitcake apple pie pudding jelly beans
          pie candy canes candy canes jelly-o. Tiramisu brownie gummi bears soufflé dessert cake.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="headingCollapse3" class="card-header" data-toggle="collapse" role="button" data-target="#collapse3"
        aria-expanded="false" aria-controls="collapse3">
        <span class="collapse-title">
          Collapse Item 3
        </span>
      </div>
      <div id="collapse3" role="tabpanel" aria-labelledby="headingCollapse3" class="collapse">
        <div class="card-body">
          Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
          brownie brownie cotton candy.
          Tootsie roll cotton candy pudding bonbon chocolate cake lemon drops candy. Jelly marshmallow
          chocolate cake carrot cake bear claw ice cream chocolate. Fruitcake apple pie pudding jelly beans
          pie candy canes candy canes jelly-o. Tiramisu brownie gummi bears soufflé dessert cake.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="headingCollapse4" class="card-header" data-toggle="collapse" role="button" data-target="#collapse4"
        aria-expanded="false" aria-controls="collapse4">
        <span class="collapse-title">
          Collapse Item 4
        </span>
      </div>
      <div id="collapse4" role="tabpanel" aria-labelledby="headingCollapse4" class="collapse">
        <div class="card-body">
          Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
          brownie brownie cotton candy.
          Tootsie roll cotton candy pudding bonbon chocolate cake lemon drops candy. Jelly marshmallow
          chocolate cake carrot cake bear claw ice cream chocolate. Fruitcake apple pie pudding jelly beans
          pie candy canes candy canes jelly-o. Tiramisu brownie gummi bears soufflé dessert cake.
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Collapse end -->

<!-- collapse with icon -->
<section id="collapsible-with-icon">
  <h4 class="mt-3">Collapse With Icon</h4>
  <p>
    For icons on the right of collapse use <code> .collapse-icon</code> class and for animation
    use<code> .accordion-icon-rotate</code> class.
  </p>
  <div class="collapsible collapse-icon accordion-icon-rotate">
    <div class="card collapse-header">
      <div id="headingCollapse5" class="card-header" data-toggle="collapse" role="button" data-target="#collapse5"
        aria-expanded="false" aria-controls="collapse5">
        <span class="collapse-title">
          <i class='bx bx-spa align-middle'></i>
          <span class="align-middle">Collapse Item 1</span>
        </span>
      </div>
      <div id="collapse5" role="tabpanel" aria-labelledby="headingCollapse5" class="collapse">
        <div class="card-body">
          Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
          brownie brownie cotton candy.
          Tootsie roll cotton candy pudding bonbon chocolate cake lemon drops candy. Jelly marshmallow
          chocolate cake carrot cake bear claw ice cream chocolate. Fruitcake apple pie pudding jelly beans
          pie candy canes candy canes jelly-o. Tiramisu brownie gummi bears soufflé dessert cake.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="headingCollapse6" class="card-header" data-toggle="collapse" role="button" data-target="#collapse6"
        aria-expanded="false" aria-controls="collapse6">
        <span class="collapse-title">
          <i class="bx bx-heart align-middle"></i>
          <span class="align-middle">Collapse Item 2</span>
        </span>
      </div>
      <div id="collapse6" role="tabpanel" aria-labelledby="headingCollapse2" class="collapse">
        <div class="card-body">
          Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
          brownie brownie cotton candy.
          Tootsie roll cotton candy pudding bonbon chocolate cake lemon drops candy. Jelly marshmallow
          chocolate cake carrot cake bear claw ice cream chocolate. Fruitcake apple pie pudding jelly beans
          pie candy canes candy canes jelly-o. Tiramisu brownie gummi bears soufflé dessert cake.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="headingCollapse7" class="card-header" data-toggle="collapse" role="button" data-target="#collapse7"
        aria-expanded="false" aria-controls="collapse7">
        <span class="collapse-title">
          <i class="bx bx-bell align-middle"></i>
          <span class="align-middle">Collapse Item 3</span>
        </span>
      </div>
      <div id="collapse7" role="tabpanel" aria-labelledby="headingCollapse7" class="collapse">
        <div class="card-body">
          Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
          brownie brownie cotton candy.
          Tootsie roll cotton candy pudding bonbon chocolate cake lemon drops candy. Jelly marshmallow
          chocolate cake carrot cake bear claw ice cream chocolate. Fruitcake apple pie pudding jelly beans
          pie candy canes candy canes jelly-o. Tiramisu brownie gummi bears soufflé dessert cake.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="headingCollapse8" class="card-header" data-toggle="collapse" role="button" data-target="#collapse8"
        aria-expanded="false" aria-controls="collapse4">
        <span class="collapse-title">
          <i class="bx bx-chalkboard align-middle"></i>
          <span class="align-middle">Collapse Item 4</span>
        </span>
      </div>
      <div id="collapse8" role="tabpanel" aria-labelledby="headingCollapse8" class="collapse">
        <div class="card-body">
          Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
          brownie brownie cotton candy.
          Tootsie roll cotton candy pudding bonbon chocolate cake lemon drops candy. Jelly marshmallow
          chocolate cake carrot cake bear claw ice cream chocolate. Fruitcake apple pie pudding jelly beans
          pie candy canes candy canes jelly-o. Tiramisu brownie gummi bears soufflé dessert cake.
        </div>
      </div>
    </div>
  </div>
</section>
<!-- collapse with icon end -->

<!-- Accordion start -->
<section id="accordionWrapa">
  <h4 class="mt-3">Accordion</h4>
  <p>
    Using the <code>card</code> component you can extend the default collapse behavior to create an
    accordion. To properly achieve the accordion style, be sure to use <code>.accordion</code> as a wrapper for get
    Template specific style..
  </p>
  <div class="accordion" id="accordionWrapa1">
    <div class="card collapse-header">
      <div id="heading1" class="card-header" role="tablist" data-toggle="collapse" data-target="#accordion1"
        aria-expanded="false" aria-controls="accordion1">
        <span class="collapse-title">Accordion Item 1</span>
      </div>
      <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
        <div class="card-body">
          Cheesecake cotton candy bonbon muffin cupcake tiramisu croissant. Tootsie roll sweet candy bear
          claw chupa chups lollipop toffee. Macaroon donut liquorice powder candy carrot cake macaroon
          fruitcake. Cookie toffee lollipop cotton candy ice cream dragée soufflé.
          Cake tiramisu lollipop wafer pie soufflé dessert tart. Biscuit ice cream pie apple pie topping
          oat cake dessert. Soufflé icing caramels. Chocolate cake icing ice cream macaroon pie cheesecake
          liquorice apple pie.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="heading2" class="card-header" data-toggle="collapse" role="button" data-target="#accordion2"
        aria-expanded="false" aria-controls="accordion2">
        <span class="collapse-title">Accordion Item 2</span>
      </div>
      <div id="accordion2" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading2" class="collapse"
        aria-expanded="false">
        <div class="card-body">
          Pie pudding candy. Oat cake jelly beans bear claw lollipop. Ice cream candy canes tootsie roll
          muffin powder donut powder. Topping candy canes chocolate bar lemon drops candy canes.
          Halvah muffin marzipan powder sugar plum donut donut cotton candy biscuit. Wafer jujubes apple
          pie sweet lemon drops jelly cupcake. Caramels dessert halvah marshmallow. Candy topping cotton
          candy oat cake croissant halvah gummi bears toffee powder.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="heading3" class="card-header" data-toggle="collapse" role="button" data-target="#accordion3"
        aria-expanded="false" aria-controls="accordion3">
        <span class="collapse-title">Accordion Item 3</span>
      </div>
      <div id="accordion3" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading3" class="collapse"
        aria-expanded="false">
        <div class="card-body">
          Gingerbread liquorice liquorice cake muffin lollipop powder chocolate cake. Gummi bears lemon
          drops toffee liquorice pastry cake caramels chocolate bar brownie. Sweet biscuit chupa chups
          sweet.
          Halvah fruitcake gingerbread croissant dessert cupcake. Chupa chups chocolate bar donut tart.
          Donut cake dessert cookie. Ice cream tootsie roll powder chupa chups pastry cupcake soufflé.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="heading4" class="card-header" data-toggle="collapse" role="button" data-target="#accordion4"
        aria-expanded="false" aria-controls="accordion4">
        <span class="collapse-title">Accordion Item 4</span>
      </div>
      <div id="accordion4" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading4" class="collapse"
        aria-expanded="false">
        <div class="card-body">
          Icing sweet roll cotton candy brownie candy canes candy canes. Pie jelly dragée pie. Ice cream
          jujubes wafer. Wafer croissant carrot cake wafer gummies gummies chupa chups halvah bonbon.
          Gummi bears cotton candy jelly-o halvah. Macaroon apple pie dragée bonbon marzipan cheesecake.
          Jelly jelly beans marshmallow.
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Accordion end -->

<!-- Accordion with icon -->
<section id="accordion-icon-wrapper">
  <h4 class="mt-3">Accordion With Icon</h4>
  <p>
    To properly achieve the accordion style, be sure to use <code>.accordion</code> as a wrapper. for
    icons on the right of collapse use <code> .collapse-icon</code>and for rotate icon in 90 degree
    use<code> .accordion-icon-rotate </code>.
  </p>
  <div class="accordion collapse-icon accordion-icon-rotate" id="accordionWrapa2">
    <div class="card collapse-header">
      <div id="heading5" class="card-header" data-toggle="collapse" data-target="#accordion5" aria-expanded="false"
        aria-controls="accordion5" role="tablist">
        <span class="collapse-title">
          <i class="bx bx-cloud align-middle"></i>
          <span class="align-middle">Accordion Item 1</span>
        </span>
      </div>
      <div id="accordion5" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading5" class="collapse">
        <div class="card-body">
          Cheesecake cotton candy bonbon muffin cupcake tiramisu croissant. Tootsie roll sweet candy bear
          claw chupa chups lollipop toffee. Macaroon donut liquorice powder candy carrot cake macaroon
          fruitcake. Cookie toffee lollipop cotton candy ice cream dragée soufflé.
          Cake tiramisu lollipop wafer pie soufflé dessert tart. Biscuit ice cream pie apple pie topping
          oat cake dessert. Soufflé icing caramels. Chocolate cake icing ice cream macaroon pie cheesecake
          liquorice apple pie.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="heading6" class="card-header" data-toggle="collapse" role="button" data-target="#accordion6"
        aria-expanded="false" aria-controls="accordion6">
        <span class="collapse-title">
          <i class="bx bx-run align-middle"></i>
          <span class="align-middle">Accordion Item 2</span>
        </span>
      </div>
      <div id="accordion6" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading6" class="collapse"
        aria-expanded="false">
        <div class="card-body">
          Pie pudding candy. Oat cake jelly beans bear claw lollipop. Ice cream candy canes tootsie roll
          muffin powder donut powder. Topping candy canes chocolate bar lemon drops candy canes.
          Halvah muffin marzipan powder sugar plum donut donut cotton candy biscuit. Wafer jujubes apple
          pie sweet lemon drops jelly cupcake. Caramels dessert halvah marshmallow. Candy topping cotton
          candy oat cake croissant halvah gummi bears toffee powder.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="heading7" class="card-header" data-toggle="collapse" role="button" data-target="#accordion7"
        aria-expanded="false" aria-controls="accordion7">
        <span class="collapse-title">
          <i class="bx bx-bluetooth align-middle"></i>
          <span class="align-middle">Accordion Item 3</span>
        </span>
      </div>
      <div id="accordion7" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading7" class="collapse"
        aria-expanded="false">
        <div class="card-body">
          Gingerbread liquorice liquorice cake muffin lollipop powder chocolate cake. Gummi bears lemon
          drops toffee liquorice pastry cake caramels chocolate bar brownie. Sweet biscuit chupa chups
          sweet.
          Halvah fruitcake gingerbread croissant dessert cupcake. Chupa chups chocolate bar donut tart.
          Donut cake dessert cookie. Ice cream tootsie roll powder chupa chups pastry cupcake soufflé.
        </div>
      </div>
    </div>
    <div class="card collapse-header">
      <div id="heading8" class="card-header" data-toggle="collapse" role="button" data-target="#accordion8"
        aria-expanded="false" aria-controls="accordion8">
        <span class="collapse-title">
          <i class="bx bxs-yin-yang align-middle"></i>
          <span class="align-middle">Accordion Item 4</span>
        </span>
      </div>
      <div id="accordion8" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading8" class="collapse"
        aria-expanded="false">
        <div class="card-body">
          Icing sweet roll cotton candy brownie candy canes candy canes. Pie jelly dragée pie. Ice cream
          jujubes wafer. Wafer croissant carrot cake wafer gummies gummies chupa chups halvah bonbon.
          Gummi bears cotton candy jelly-o halvah. Macaroon apple pie dragée bonbon marzipan cheesecake.
          Jelly jelly beans marshmallow.
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Accordion end -->

<!-- Accordion with hover start -->
<section id="accordion-hover-wrapper">
  <h4 class="mt-3">Hover</h4>
  <p>
    To create a collapse which opens on hover use <code>.card-hover</code> class as wrapper.
  </p>
  <div id="accordionExample3" data-toggle-hover="true">
    <div class="accordion card-hover collapse-icon accordion-icon-rotate">
      <div class="card collapse-header open">
        <div class="card-header" id="heading300" data-toggle="collapse" role="button" data-target="#collapse300"
          aria-expanded="true" aria-controls="collapse300">
          <span class="collapse-title">Accordion Item 1</span>
        </div>
        <div id="collapse300" class="collapse show" aria-labelledby="heading300" data-parent="#accordionExample3">
          <div class="card-body">
            Pastry bear claw caramels ice cream pudding candy candy canes wafer ice cream. Topping sesame
            snaps
            cookie pastry ice cream toffee jujubes ice cream. Bear claw bonbon cotton candy candy jujubes.

            Jelly beans candy canes ice cream gummies gingerbread dragée sweet cookie croissant. Chocolate
            cake
            macaroon donut candy. Soufflé chocolate bar liquorice lemon drops sweet cookie.
          </div>
        </div>
      </div>
      <div class="card collapse-header">
        <div class="card-header" id="heading310" data-toggle="collapse" role="button" data-target="#collapse310"
          aria-expanded="false" aria-controls="collapse310">
          <span class="collapse-title">Accordion Item 2</span>
        </div>
        <div id="collapse310" class="collapse" aria-labelledby="heading310" data-parent="#accordionExample3">
          <div class="card-body">
            Cake lollipop bonbon icing. Candy canes cookie caramels cookie bonbon liquorice. Jelly-o carrot
            cake
            carrot cake carrot cake danish powder. Caramels candy tootsie roll tart chocolate bar candy canes
            muffin gummies.

            Liquorice dragée jujubes chocolate bar jelly-o topping. Cotton candy dragée candy pudding tart
            sweet
            roll. Chocolate cupcake chocolate jelly-o pastry candy canes cupcake chupa chups.
          </div>
        </div>
      </div>
      <div class="card collapse-header">
        <div class="card-header" id="heading350" data-toggle="collapse" role="button" data-target="#collapse350"
          aria-expanded="false" aria-controls="collapse350">
          <span class="collapse-title">Accordion Item 3</span>
        </div>
        <div id="collapse350" class="collapse" aria-labelledby="heading350" data-parent="#accordionExample3">
          <div class="card-body">
            Cake danish apple pie. Tart pastry sweet roll oat cake marzipan muffin jelly gummies. Carrot cake
            wafer topping sweet roll cupcake pastry.
            Biscuit pastry bonbon. Cupcake lollipop topping caramels jelly beans bear claw. Toffee candy canes
            dessert pastry cheesecake chocolate bar. Candy croissant pastry.
          </div>
        </div>
      </div>
      <div class="card collapse-header">
        <div class="card-header" id="heading330" data-toggle="collapse" role="button" data-target="#collapse330"
          aria-expanded="false" aria-controls="collapse330">
          <span class="collapse-title">Accordion Item 4</span>
        </div>
        <div id="collapse330" class="collapse" aria-labelledby="heading330" data-parent="#accordionExample3">
          <div class="card-body">
            Cake danish apple pie. Tart pastry sweet roll oat cake marzipan muffin jelly gummies. Carrot cake
            wafer topping sweet roll cupcake pastry.
            Biscuit pastry bonbon. Cupcake lollipop topping caramels jelly beans bear claw. Toffee candy canes
            dessert pastry cheesecake chocolate bar. Candy croissant pastry.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Accordion with hover end -->
@endsection
