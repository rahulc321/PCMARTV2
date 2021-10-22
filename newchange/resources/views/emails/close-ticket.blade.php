<table width="95%" cellpadding="0" cellspacing="0" border="0" style="margin-top:10px !important">
		<tr>
		<td align="left"><span style="font-size:20px; font-family:Calibri, Verdana;"><strong>{{$webInfo->company_name}}</strong></span> ({{$webInfo->company_number}}) &nbsp;&nbsp; </td>
		
		<td align="right" style="font-size:20px; font-family:Calibri, Verdana;; color:#6C96A2"><strong>Ticket Closed</strong></td>
		</tr>
		<tr>
		 <td colspan="2"><hr color="#3999dd" /></td>
		 </tr>
		 <tr>
		<td align="left" style="font-family:Calibri, Verdana;">{{$ictran->Organization_Name}}</td>
		<td align="right" style="font-family:Calibri, Verdana;"><?=date("d-M-y")?></td>
	 </tr>
	</table>
		
		 <p style='font-family:Calibri, Verdana;'>Dear {{ucwords(strtolower($cust->Attention))}},</p>	
		
		 <p style="font-family:Calibri, Verdana; width:95%">Your Online Support Ticket ID # {{$ticket_number}} has been closed.</p>
		 <p style="font-family:Calibri, Verdana; width:95%">Please Provide Your feedback on below link. </p><br>
		 <b style="font-family:Calibri, Verdana; width:95%"><a href="{{url('/app/feedback')}}/{{base64_encode($ictran->CUSTNO.'_'.$ticket_number)}}" style="border-radius: 3px;background-color: #1ab394;border-color: #1ab394;color: #FFFFFF;">Feedback</a></p>