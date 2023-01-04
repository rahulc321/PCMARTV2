 
 <table width="95%" cellpadding="0" cellspacing="0" border="0">
			<tr>
			 
			<td align="left"><span style="font-size:20px; font-family:Calibri, Verdana; color:#6C96A2"><strong>{{ucwords($info->company_name)}} ({{$info->company_number}}) {{$info->tax_number}}</strong></span></td>
			<td align="right" style="font-size:20px; font-family:Calibri, Verdana;; color:#6C96A2"><strong>Quotation</strong></td>
			</tr>
			<tr>
			<td colspan="2"><hr color="#3999dd" /></td>
			</tr>
			<tr>
			<td align="left" style="font-family:Calibri, Verdana;">{{strtoupper(strtolower($ictran['Organization_Name']))}}</td>
			<td align="right" style="font-family:Calibri, Verdana;"><?=date("d-M-y")?></td>
			</tr>
			</table>
			<?php
			$cust= App\Models\Cust::where('Organization_Number',$ictran['CUSTNO'])->first();
			//echo '<pre>';print_r($ictran['Due_date']);
			?>
			<p style='font-family:Calibri, Verdana;'>Dear {{ucwords(strtolower($cust->Attention))}}</p>
			<p style='font-family:Calibri, Verdana;'>Warmest Greeting from {{ucwords($info->company_name)}}!</p>

			<p style="font-family:Calibri, Verdana; width:95%">

			@if($sendtype==0)
			We would like to thank you for giving us the opportunity to serve you. The service contract for your system is expiring. I am pleased to quote you the best price as below:-
			@else
			We would like to thank you for giving us the opportunity to serve you. Your yearly software subscription is expiring. I am pleased to quote you the best price as below:-
			@endif
			</p>

			<table border="1" cellspacing="0" cellpadding="0" summary="Invoice Table" width="95%" style="border-color:#3999dd">
			  <thead>
			    <tr>
			      <td width="10%" style="padding:8px 8px 8px 8px; background-color:#DEEAF6; min-height:30px;font-family:Calibri, Verdana;" valign="middle"><strong>No</strong></td>
			      <td width="55%" style="padding:8px 8px 8px 8px; background-color:#DEEAF6; font-family:Calibri, Verdana;"><strong>Description</strong></td>
			      <td width="20%" style="padding:8px 8px 8px 8px; background-color:#DEEAF6; font-family:Calibri, Verdana;" align="center"><strong>Due Date</strong></td>
			      <td width="15%" align="right" style="padding:8px 8px 8px 8px; background-color:#DEEAF6; font-family:Calibri, Verdana;"><strong>Unit Price</strong></td>
			    </tr>
			  </thead>
			  <tbody>
 						<?php

 						$pp=  $priceType;
 						error_reporting(0);
 						//echo $ictran['CUSTNO'];die;
 						$firstArray=[];
 						$secondArray=[];
 						$sum=0;
 						if($sendtype==0){
 						$records = App\Models\Ictran::where('CUSTNO',$ictran['CUSTNO'])
 						->whereYear('Due_date', $year)
        				->whereMonth('Due_date', $month)->get();
        				}

        				$records1 = App\Models\Transaction::where('customer_id',$ictran['CUSTNO'])
 						->whereYear('expire', $year)
        				->whereMonth('expire', $month)->where('status',0)->get();
        				$firstArray=[];
        				foreach ($records1 as $keyyy => $rec) {
        				 
        				$SubscriptionSetting= App\Models\SubscriptionSetting::where('code',@$rec->code)->first();
        				

        			
        				/**********************************************************/
        				$priceType1=1;
        				$realPrice1='';
 							if($priceType1==1){	
 							$userCount = App\Models\CustomerSubscription::where('sno_number',$rec->sno_number)->first();	

 							//echo '<pre>';print_r($userCount->user);die;
 							$price=$SubscriptionSetting->first_user;
 							$add_user=$SubscriptionSetting->add_user;
 							$tax=$SubscriptionSetting->tax;

 							$custUser= $rec->user;
 							$actUsr=$userCount->user-1;
 							$actPrice=0;
 							if($actUsr > 0){
 								$actPrice=$actUsr*$add_user;
 							} 

 							$realPrice1= $actPrice+$price;

 							if($tax==1){
 								$tax=($realPrice1*$info->tax)/100;
 								$realPrice1=$tax+$realPrice1;
 							}

 							}else{
 								$realPrice1=$rec->total_price;
 								$tax=$SubscriptionSetting->tax;
 								//echo $tax;die;
 								if($tax==1){
	 								$tax1=($realPrice1*$info->tax)/100;
	 								$realPrice1=$tax1+$realPrice1;
 								}
 							}


 							$firstArray[]['description']=  $SubscriptionSetting->description_second;
 							$firstArray[$keyyy]['exp_date']= ($rec['expire'] !="") ? date('d-m-Y',strtotime($rec['expire'])) : '';
 							$firstArray[$keyyy]['realPrice']=  $realPrice1;
 							$firstArray[$keyyy]['sno_number']=  $rec->sno_number;

 							$firstArray[$keyyy]['type']=  'subs';

 							}

 							//y$combineArray=array_combine($firstArray,$secondArray);
 							

        				/*********************************************************/






        				if($sendtype==0){
        				$serviceContractPrice='';
        				foreach ($records as $key1 => $val) {

        					$serviceContractPrice=  $val['Price_RM'];
        				 
 							$Product= App\Models\Product::whereIn('id',explode(',',$val['product']))->get();
 							$custInfo= App\Models\CustomerInfo::where('customer_id',$val['CUSTNO'])->whereIn('setting_id',explode(',',$val['product']))->get();
 						
 						?>

 						@foreach($Product as $key=>$prod)
 							<?php 
 							$getMonth= date('m',strtotime($custInfo[$key]['exp_date']));
 							$getYear= date('Y',strtotime($custInfo[$key]['exp_date']));
 							//if($month==$getMonth && $year==$getYear){
 							$priceType=1;
 							if($priceType==1){	
 							$price=$prod->first_user;
 							$add_user=$prod->add_user;
 							$tax=$prod->tax;

 							$custUser= $custInfo[$key]->user;
 							$actUsr=$custUser-1;
 							$actPrice=0;
 							if($actUsr > 0){
 								$actPrice=$actUsr*$add_user;
 							} 

 							$realPrice= $actPrice+$price;

 							if($tax==1){
 								$tax=($realPrice*$info->tax)/100;
 								$realPrice=$tax+$realPrice;
 							}

 							}


 							//echo $realPrice;

 							// $currentPrice=$val['Price_RM'];
 							// 	$tax1=$prod->tax;
 							// 	if($tax1==1){
	 						// 		$tax1=($currentPrice*$info->tax)/100;
	 						// 		$currentPrice=$tax1+$currentPrice;
 							// 	}
 							// //echo $currentPrice;


 							// if($currentPrice > $realPrice){
 							// 	$realPrice = $currentPrice;
 							// }

 							//die;
 							// else{
 								// $realPrice=$val['Price_RM'];
 								// $tax=$prod->tax;
 								// if($tax==1){
	 							// 	$tax=($realPrice*$info->tax)/100;
	 							// 	$realPrice=$tax+$realPrice;
 								// }
 							// }


 							$sum+=$realPrice;



 							$firstArray[$key+5]['description']=  $prod->description;
 							$firstArray[$key+5]['exp_date']=  date('d-m-Y',strtotime($custInfo[$key]['exp_date']));
 							$firstArray[$key+5]['realPrice']=  $realPrice;
 							$firstArray[$key+5]['[sno_number]']=  '';
 							$firstArray[$key+5]['type']=  'sup';

 							?>
						   <!--  <tr>
						      <td align="center" style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;">{{$key1+1}}</td>
						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;">{{$prod->description }} ({{$custInfo[$key]['info_type']}})</td>
						 
						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;" align="center">{{date('d-m-Y',strtotime($custInfo[$key]['exp_date']))}}</td>
						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;" align="right">{{$realPrice}}</td>
						    </tr> -->
						    <?php //} ?>
						   @endforeach
						   <?php }
						   }

						 //echo '<pre>';print_r($firstArray);die;


						   $arraySum=0;
						   $ke=1;
						   $aa= array_filter($firstArray);
						   $subsSum=0;
						    ?>
					 	@foreach ($aa as $arrayVal)
					 	<?php



					 	 $arraySum+=$arrayVal['realPrice'];

					 		if($arrayVal['description'] != ""){
					 			//echo $ke;

					 			if($arrayVal['type']=='subs'){
					 				$subsSum+=$arrayVal['realPrice'];
					 			}

					 	 ?>
					 	<tr>
						      <td align="center" style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;">
						      {{$ke}}
						      </td>
						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;">{{$arrayVal['description'] }}

						      @if($arrayVal['sno_number'] !="")
						      	<span style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;">({{$arrayVal['sno_number']}})</span>

						      @endif

						      </td>
						 
						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;" align="center">{{$arrayVal['exp_date']}}</td>
						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;" align="right">{{$arrayVal['realPrice']}}</td>
						    </tr>

						    <?php $ke++; } ?>
					 	@endforeach
<?php

if($sendtype==0){
$tax1=($serviceContractPrice*$info->tax)/100;
 $totalDiscount=  abs($serviceContractPrice+$tax1-$arraySum)-$subsSum; 

  
if($pp==0 && $totalDiscount > 0){
 ?>
			    <tr>
						      <td align="center" style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;">
						       
						      </td>
						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;">Loyalty Discount

						      

						      </td>
						 
						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;" align="center"></td>

						      <td style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;" align="right">({{$totalDiscount}})</td>
						    </tr>

					<tr style="background-color:#5B9BD5">
					<td colspan="4" align="right"  style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;"> <strong>Total (MYR)</strong> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <strong>{{$serviceContractPrice+$tax1+$subsSum}}</strong>  </td>
					</tr>
<?php

}else{ ?>

<tr style="background-color:#5B9BD5">
					<td colspan="4" align="right"  style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;"> <strong>Total (MYR)</strong> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <strong>{{$arraySum}}</strong>  </td>
					</tr>

<?php }




 }else{ ?>
			    <tr style="background-color:#5B9BD5">
			      <td colspan="4" align="right"  style="padding:8px 8px 8px 8px; min-height:30px; font-family:Calibri, Verdana;"> <strong>Total (MYR)</strong> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <strong>{{$arraySum}}</strong>  </td>
			    </tr>

			    <?php } ?>
			  </tbody>
			</table>
			@if($sendtype==0)
			<p style="font-family:Calibri, Verdana;">Remarks: -<br /><br />
			  a) Support limited to the system only<br />
			  b) Exclude training and report customization<br />
			  c) Office hour: Mon to Fri 9am to 6pm, Sat 9am to 1pm<br />
			  d) 4 hours response time<br />
			  e) Payment: Cash or Current Cheque<br /><br /></p>

			@else
			 
			<p style="font-family:Calibri, Verdana;">Remarks: -<br /><br />
			  a) Software Subscription entitle user to enjoy free updates and version upgrade.<br />
			  b) Public Bank Account : 311 700 1931<br />
			  c) Payment: Online Bank-In<br />
			  <br /><br /></p>

			@endif

			 <p style="width:95%;font-family:Calibri, Verdana;">We believe that you will find our price favorable and look very much forward to provide our best service to you.</p><br />
			   <span style="width:95%;font-family:Calibri, Verdana;">Thank you</span><br /> 
			 <br /> 
			 <table width="95%" cellpadding="0" cellspacing="0" border="0"> 
			 <tr>
			 <td width="50%" style="font-family:Calibri, Verdana;">Prepared on behalf of:-</td> 
			 <td style="font-family:Calibri, Verdana;">I / We confirm having read the contents of the quotation and agreed to the pricing, terms as well as conditions contain therein.</td> 
			 </tr> 

			 
				 <tr style="height:100px;font-family:Calibri, Verdana;">
				 <td colspan="2" valign="middle"><span style="font-size:20px;font-family:forte, Calibri, Verdana;">Goh</span></td> 
				 </tr> 
			 

			 
				<tr>
				<td style="font-family:Calibri, Verdana;">{{$info->attention}}</td>
				 
				<td style="font-family:Calibri, Verdana;">Name : </td>
				</tr>

				<tr>
				<td style="font-family:Calibri, Verdana;">H/P: 012-203 7670</td>
				<td style="font-family:Calibri, Verdana;">Date : </td>
				</tr>


			 </table><br />

 
				  <p style="width:95%;font-family:Calibri, Verdana;">{{$info->address}}<br />
				Tel: {{$info->phone}}<br />

				 <a href="https://{{$info->website}}" target="_blank">{{$info->website}}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 <?php $url= 'skype:'.$info->skype.'?call';?>
				  Skype: <a href="<?=$url?>" target="_blank">{{$info->skype}}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FB:
				 
					 <a href="https://www.facebook.com/{{$info->fb}}" target="_blank">{{$info->fb}}</a></p></p> 
				 
			 