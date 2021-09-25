<style>
body {
    margin: 20px;
    /* background: #569e14; */
    background-image: linear-gradient(to right, #63b7ff85, #FFA971) !important;
}
   .open-btn {
    border: 2px solid #189d0e;
    border-radius: 32px;
    color: #189d0e !important;
    display: inline-block;
    margin: 10px 0 0;
    padding: 9px 16px;
    text-decoration: none !important;
    text-transform: uppercase;
}        
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }
            body{ margin: 20px; }
            h1 { font-size: 1.5em; margin: 10px; }

            .rating { 
                border: none;
                float: left;
            }

            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before { 
                content: "\f089";
                position: absolute;
            }

            .rating > label { 
                color: #ddd; 
                float: right; 
            }

            .rating > input:checked ~ label, 
            .rating:not(:checked) > label:hover,  
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating > input:checked + label:hover, 
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, 
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     
        </style>
        	<title>Customer Service </title>
        <link rel="shortcut icon" href="assets/img/favicon.ico">
        	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
            	<!-- jQuery -->
	<script src="/assets/js/jquery-3.1.1.min.js"></script>
	
	<!-- Mainly scripts -->
    <script src="/assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="container">
        <div class="row" style="    margin-top: 30px;">
            <div class="col-md-6 col-md-offset-3" style="text-align: center !important;">
            
                    	<h2 style="/* color: rgb(24, 157, 14); */">  Customer  Feedback</h2>
        <h4 style="font-size: 24px;line-height: 22px;">Please Rate Our Services below</h4>
        
        	<div class="ibox-content col-sm-12" style="
    text-align: center !important;
    margin-left: 455px;
    padding: 20px;
">
						<form class="form-horizontal" method="post" action="{{url('/app/feedback-submit')}}/{{$id}}">
                            @csrf
                            <input type="hidden" name="actions" value="edit">
                            <input type="hidden" name="ratting_data" id="ratting_id"/>  
                            <div class="form-group" align="center">
                            
									<fieldset id="demo1" class="rating" align="center" style="font-size: 55px; margin-left:-45px;">
                                    <span style="font-size: 16px;float: right;margin-top:41px;">Excellent</span>
                                    <span style="font-size: 16px;float: left;margin-top:41px;">Poor</span>
                                    <input class="stars" type="radio" id="star5" name="rating" value="5">
                                    <label class="full" for="star5" title="5 stars"></label>
                                    <input class="stars" type="radio" id="star4" name="rating" value="4">
                                    <label class="full" for="star4" title="4 stars"></label>
                                    <input class="stars" type="radio" id="star3" name="rating" value="3">
                                    <label class="full" for="star3" title=" 3 stars"></label>
                                    <input class="stars" type="radio" id="star2" name="rating" value="2">
                                    <label class="full" for="star2" title="2 stars"></label>
                                    <input class="stars" type="radio" id="star1" name="rating" value="1">
                                    <label class="full" for="star1" title="1 star"></label>
				 
									</fieldset>	
                                    
                            </div>
							   <div class="form-group">
							  
                              
  
  <div class="round hollow text-center" style=" width: 50%; margin-left: -22px; ">
        <button  type="submit" class="open-btn" name="feedbacks" id="addClass" style=" width: 71%; "> Submit</button>
        </div></div>
						  </form>
					
					</div>
        
            </div>
        </div>
    </div>
  <script>
	$(document).ready(function () {
		$("#demo1 .stars").click(function () {
	   
      // alert($(this).val());
         $('#ratting_id').val($(this).val());              
		/*	$.post('feedback.php',{rate:c,id:$('#id').val()},function(d){
			    if(d == 0)
				{
                    alert('Thanks For Rating');

				}else{
                    alert('You Already Rated');
				}
			});
			$(this).attr("checked");*/
		});
	});
</script>