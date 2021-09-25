<?php
include_once("connect_db.php");
include_once("db_details.php");
include_once("../model/db_settings.php");
include_once("../globals/html2pdf/html2fpdf.php");
include_once("../globals/tcpdf/tcpdf.php");
include_once("../model/db_allowance_deduction.php");

class DB_Epay
{
	public function addUserEPay($employee_no, $month, $epay_year, $basic_rate, $work_day, $day_work, $basic_pay, $compensate, $gratuity, $compensate_tax,
		$gratuity_tax, $total_monthly_over_time_pay, $director_fee, $total_allowance, $gross_pay, $other_deduction, $total_decduction, $net_pay,
		$net_pay_adjustment, $total_non_pay_leave_amount, $bonus, $commision, $extra, $tax_overtime, $tax_allowance, $tax_deduct,
		$tax_relief, $amount_over_time_1, $amount_over_time_2, $amount_over_time_3, $amount_over_time_4, $amount_over_time_5, $amount_over_time_6,
		$allowance_1, $allowance_2, $allowance_3, $allowance_4, $allowance_5, $allowance_6, $allowance_7, $allowance_8, $allowance_9, $allowance_10, $allowance_11,
		$allowance_12, $allowance_13, $allowance_14, $allowance_15, $allowance_16, $allowance_17, $deduction_1, $deduction_2, $deduction_3, $deduction_4,
		$deduction_5, $deduction_6, $deduction_7, $deduction_8, $deduction_9, $deduction_10, $deduction_11, $deduction_12, $deduction_13, $deduction_14, 
		$deduction_15, $itaxpcbb, $itaxpcb, $itaxpcbadj, $tp1zakat, $tp1levy, $total_EPF_employee, $total_EPF_employer, $epfwwext, $epfccext, $epgww, $epgcc,
		$soasoww, $soasocc, $sobsoww, $sobsocc, $total_socso_employee, $total_socso_employer, $sodsoww, $sodsocc, $soesoww, $soesocc, $unionww, $unioncc,
		$ccstat1, $pencen, $advance, $bink, $mfund, $dfund, $epf_pay, $epf_pay_a, $bonus_amount, $commision_amount, $tawcpf, $tawcpfww, $tawcpfcc, $hrd_pay, $payyes,$hr1,$hr2,$hr3,$hr4,$hr5,$hr6, $DW,$PH,$AL,$MC,$MT,$PT,$MR,$CL,$HL,$EX,$AD,$OPL,$NPL,$AB,$OOB,$workhr,$latehr,$earlyhr,$nopayhr,$EISWW,$EISCC)
	{
		$query = "insert into `user_epay`(`employee_no`,`month`,`epay_year`,`basic_rate`,`work_day`,`day_work`,`basic_pay`,`compensate`,`gratuity`,`compensate_tax`,`gratuity_tax`,`total_monthly_over_time_pay`,`director_fee`,`total_allowance`,`gross_pay`,`other_deduction`,`total_decduction`,`net_pay`,`net_paynet_pay_adjustment`,`total_non_pay_leave_amount`,`bonus`,`commision`,`extra`,`tax_overtime`,`tax_allowance`,`tax_deduct`,`tax_relief`,`amount_over_time_1`,`amount_over_time_2`,`amount_over_time_3`,`amount_over_time_4`,`amount_over_time_5`,`amount_over_time_6`,`allowance_1`,`allowance_2`,`allowance_3`,`allowance_4`,`allowance_5`,`allowance_6`,`allowance_7`,`allowance_8`,`allowance_9`,`allowance_10`,`allowance_11`,`allowance_12`,`allowance_13`,`allowance_14`,`allowance_15`,`allowance_16`,`allowance_17`,`deduction_1`,`deduction_2`,`deduction_3`,`deduction_4`,`deduction_5`,`deduction_6`,`deduction_7`,`deduction_8`,`deduction_9`,`deduction_10`,`deduction_11`,`deduction_12`,`deduction_13`,`deduction_14`,`deduction_15`,`itaxpcbb`,`itaxpcb`,`itaxpcbadj`,`tp1zakat`,`tp1levy`,`total_EPF_employee`,`total_EPF_employer`,`epfwwext`,`epfccext`,`epgww`,`epgcc`,`soasoww`,`soasocc`,`sobsoww`,`sobsocc`,`total_socso_employee`,`total_socso_employer`,`sodsoww`,`sodsocc`,`soesoww`,`soesocc`,`unionww`,`unioncc`,`ccstat1`,`pencen`,`advance`,`bink`,`mfund`,`dfund`,`epf_pay`,`epf_pay_a`,`bonus_amount`,`commision_amount`,`tawcpf`,`tawcpfww`,`tawcpfcc`,`hrd_pay`,`payyes`,`hr1`,`hr2`,`hr3`,`hr4`,`hr5`,`hr6`, `DW`,`PH`,`AL`,`MC`,`MT`,`PT`,`MR`,`CL`,`HL`,`EX`,`AD`,`OPL`,`NPL`,`AB`,`OOB`,`workhr`,`latehr`,`earlyhr`,`nopayhr`,`Eisww`,`Eiscc`) values ( '%s','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%s','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d')";
		$builder = new QueryBuilder($query);
		$builder->bind(array($employee_no, $month, $epay_year, $basic_rate, $work_day, $day_work, $basic_pay, $compensate, $gratuity, $compensate_tax,
		$gratuity_tax, $total_monthly_over_time_pay, $director_fee, $total_allowance, $gross_pay, $other_deduction, $total_decduction, $net_pay,
		$net_pay_adjustment, $total_non_pay_leave_amount, $bonus, $commision, $extra, $tax_overtime, $tax_allowance, $tax_deduct,
		$tax_relief, $amount_over_time_1, $amount_over_time_2, $amount_over_time_3, $amount_over_time_4, $amount_over_time_5, $amount_over_time_6,
		$allowance_1, $allowance_2, $allowance_3, $allowance_4, $allowance_5, $allowance_6, $allowance_7, $allowance_8, $allowance_9, $allowance_10, $allowance_11,
		$allowance_12, $allowance_13, $allowance_14, $allowance_15, $allowance_16, $allowance_17, $deduction_1, $deduction_2, $deduction_3, $deduction_4,
		$deduction_5, $deduction_6, $deduction_7, $deduction_8, $deduction_9, $deduction_10, $deduction_11, $deduction_12, $deduction_13, $deduction_14, 
		$deduction_15, $itaxpcbb, $itaxpcb, $itaxpcbadj, $tp1zakat, $tp1levy, $total_EPF_employee, $total_EPF_employer, $epfwwext, $epfccext, $epgww, $epgcc,
		$soasoww, $soasocc, $sobsoww, $sobsocc, $total_socso_employee, $total_socso_employer, $sodsoww, $sodsocc, $soesoww, $soesocc, $unionww, $unioncc,
		$ccstat1, $pencen, $advance, $bink, $mfund, $dfund, $epf_pay, $epf_pay_a, $bonus_amount, $commision_amount, $tawcpf, $tawcpfww, $tawcpfcc, $hrd_pay, $payyes,$hr1,$hr2,$hr3,$hr4,$hr5,$hr6, $DW,$PH,$AL,$MC,$MT,$PT,$MR,$CL,$HL,$EX,$AD,$OPL,$NPL,$AB,$OOB,$workhr,$latehr,$earlyhr,$nopayhr,$EISWW,$EISCC));
		echo $builder->getQuery();
		echo "---------";
		return $builder->execute();
	}
	
	public function updateUserEPay($employee_no, $month, $epay_year, $basic_rate, $work_day, $day_work, $basic_pay, $compensate, $gratuity, $compensate_tax,
		$gratuity_tax, $total_monthly_over_time_pay, $director_fee, $total_allowance, $gross_pay, $other_deduction, $total_decduction, $net_pay,
		$net_pay_adjustment, $total_non_pay_leave_amount, $bonus, $commision, $extra, $tax_overtime, $tax_allowance, $tax_deduct,
		$tax_relief, $amount_over_time_1, $amount_over_time_2, $amount_over_time_3, $amount_over_time_4, $amount_over_time_5, $amount_over_time_6,
		$allowance_1, $allowance_2, $allowance_3, $allowance_4, $allowance_5, $allowance_6, $allowance_7, $allowance_8, $allowance_9, $allowance_10, $allowance_11,
		$allowance_12, $allowance_13, $allowance_14, $allowance_15, $allowance_16, $allowance_17, $deduction_1, $deduction_2, $deduction_3, $deduction_4,
		$deduction_5, $deduction_6, $deduction_7, $deduction_8, $deduction_9, $deduction_10, $deduction_11, $deduction_12, $deduction_13, $deduction_14, 
		$deduction_15, $itaxpcbb, $itaxpcb, $itaxpcbadj, $tp1zakat, $tp1levy, $total_EPF_employee, $total_EPF_employer, $epfwwext, $epfccext, $epgww, $epgcc,
		$soasoww, $soasocc, $sobsoww, $sobsocc, $total_socso_employee, $total_socso_employer, $sodsoww, $sodsocc, $soesoww, $soesocc, $unionww, $unioncc,
		$ccstat1, $pencen, $advance, $bink, $mfund, $dfund, $epf_pay, $epf_pay_a, $bonus_amount, $commision_amount, $tawcpf, $tawcpfww, $tawcpfcc, $hrd_pay, $payyes,$hr1,$hr2,$hr3,$hr4,$hr5,$hr6, $DW,$PH,$AL,$MC,$MT,$PT,$MR,$CL,$HL,$EX,$AD,$OPL,$NPL,$AB,$OOB,$workhr,$latehr,$earlyhr,$nopayhr,$EISWW,$EISCC)
	{
		$query = "update `user_epay` set `employee_no`='%s',`month`='%d',`epay_year`='%d',`basic_rate`='%d',`work_day`='%d',`day_work`='%d',`basic_pay`='%d',`compensate`='%d',`gratuity`='%d',`compensate_tax`='%d' ,`gratuity_tax`='%d',`total_monthly_over_time_pay`='%d',`director_fee`='%d',`total_allowance`='%d',`gross_pay`='%d',`other_deduction`='%d',`total_decduction`='%d',`net_pay`='%d',`net_paynet_pay_adjustment`='%d',`total_non_pay_leave_amount`='%d',`bonus`='%d',`commision`='%d',`extra`='%d',`tax_overtime`='%d',`tax_allowance`='%d', `tax_deduct`='%d',`tax_relief`='%d',`amount_over_time_1`='%d',`amount_over_time_2`='%d',`amount_over_time_3`='%d',`amount_over_time_4`='%d',`amount_over_time_5`='%d', `amount_over_time_6`='%d',`allowance_1`='%d',`allowance_2`='%d',`allowance_3`='%d',`allowance_4`='%d',`allowance_5`='%d',`allowance_6`='%d',`allowance_7`='%d', `allowance_8`='%d',`allowance_9`='%d',`allowance_10`='%d',`allowance_11`='%d',`allowance_12`='%d',`allowance_13`='%d',`allowance_14`='%d',`allowance_15`='%d', `allowance_16`='%d',`allowance_17`='%d',`deduction_1`='%d',`deduction_2`='%d',`deduction_3`='%d',`deduction_4`='%d',`deduction_5`='%d',`deduction_6`='%d', `deduction_7`='%d',`deduction_8`='%d',`deduction_9`='%d',`deduction_10`='%d',`deduction_11`='%d',`deduction_12`='%d',`deduction_13`='%d',`deduction_14`='%d', `deduction_15`='%d',`itaxpcbb`='%d',`itaxpcb`='%d',`itaxpcbadj`='%d',`tp1zakat`='%d',`tp1levy`='%d',`total_EPF_employee`='%d',`total_EPF_employer`='%d', `epfwwext`='%d',`epfccext`='%d',`epgww`='%d',`epgcc`='%d',`soasoww`='%d',`soasocc`='%d',`sobsoww`='%d',`sobsocc`='%d',`total_socso_employee`='%d', `total_socso_employer`='%d',`sodsoww`='%d',`sodsocc`='%d',`soesoww`='%d',`soesocc`='%d',`unionww`='%d',`unioncc`='%d',`ccstat1`='%d',`pencen`='%d',`advance`='%d', `bink`='%d',`mfund`='%d',`dfund`='%d',`epf_pay`='%d',`epf_pay_a`='%d',`bonus_amount`='%d',`commision_amount`='%d',`tawcpf`='%d',`tawcpfww`='%d', `tawcpfcc`='%d',`hrd_pay`='%d',`payyes`='%s',`hr1`='%d',`hr2`='%d',`hr3`='%d',`hr4`='%d',`hr5`='%d',`hr6`='%d',`DW`='%d',`PH`='%d',`AL`='%d',`MC`='%d', `MT`='%d',`PT`='%d',`MR`='%d',`CL`='%d',`HL`='%d',`EX`='%d',`AD`='%d',`OPL`='%d',`NPL`='%d',`AB`='%d',`OOB`='%d',`workhr`='%d',`latehr`='%d',`earlyhr`='%d', `nopayhr`='%d', `Eisww`='%d', `Eiscc`='%d' where `employee_no`='%s' and `month`='%d' and `epay_year`='%d'";
		$builder = new QueryBuilder($query);
		$builder->bind(array($employee_no, $month, $epay_year, $basic_rate, $work_day, $day_work, $basic_pay, $compensate, $gratuity, $compensate_tax,
		$gratuity_tax, $total_monthly_over_time_pay, $director_fee, $total_allowance, $gross_pay, $other_deduction, $total_decduction, $net_pay,
		$net_pay_adjustment, $total_non_pay_leave_amount, $bonus, $commision, $extra, $tax_overtime, $tax_allowance, $tax_deduct,
		$tax_relief, $amount_over_time_1, $amount_over_time_2, $amount_over_time_3, $amount_over_time_4, $amount_over_time_5, $amount_over_time_6,
		$allowance_1, $allowance_2, $allowance_3, $allowance_4, $allowance_5, $allowance_6, $allowance_7, $allowance_8, $allowance_9, $allowance_10, $allowance_11,
		$allowance_12, $allowance_13, $allowance_14, $allowance_15, $allowance_16, $allowance_17, $deduction_1, $deduction_2, $deduction_3, $deduction_4,
		$deduction_5, $deduction_6, $deduction_7, $deduction_8, $deduction_9, $deduction_10, $deduction_11, $deduction_12, $deduction_13, $deduction_14, 
		$deduction_15, $itaxpcbb, $itaxpcb, $itaxpcbadj, $tp1zakat, $tp1levy, $total_EPF_employee, $total_EPF_employer, $epfwwext, $epfccext, $epgww, $epgcc,
		$soasoww, $soasocc, $sobsoww, $sobsocc, $total_socso_employee, $total_socso_employer, $sodsoww, $sodsocc, $soesoww, $soesocc, $unionww, $unioncc,
		$ccstat1, $pencen, $advance, $bink, $mfund, $dfund, $epf_pay, $epf_pay_a, $bonus_amount, $commision_amount, $tawcpf, $tawcpfww, $tawcpfcc, $hrd_pay, $payyes,$hr1,$hr2,$hr3,$hr4,$hr5,$hr6, $DW,$PH,$AL,$MC,$MT,$PT,$MR,$CL,$HL,$EX,$AD,$OPL,$NPL,$AB,$OOB,$workhr,$latehr,$earlyhr,$nopayhr,$EISWW,$EISCC,$employee_no, $month,$epay_year));
		//echo $builder->getQuery();
		return $builder->execute();
	}
	
	public function getAllUserEPay($start, $maxPerPage, $currentPage){
		$query = "select * from `user_epay`";
		$builder = new QueryBuilder($query);
		$builder->paginate($start, $maxPerPage, $currentPage);
		$builder->execute();
		$result = $builder->getArrayResult(TRUE);
		return $result;
		
	}
	
	public function getLoginUserEPay($empno,$year=''){
		
		//$query = "select * from `user_epay` where employee_no='%s'";
		$query = "select a.*,c.name from `user_epay` a left join user_personal c on a.employee_no=c.employee_no where a.employee_no='%s' ";
		if($year!=''){
			$query .= " and epay_year='".$year."' ";
		}
		$query .=' order by a.month ASC';
		$builder = new QueryBuilder($query);
		$builder->bind(array($empno));
		$builder->execute();
		//echo $builder->getQuery();exit;
		$result = $builder->getArrayResult(TRUE);
		return $result;
		
	}
	
	public function getEPaySLipDownload($id){
		$ad = new DB_Allowance_Deduction();
		$field_result = $ad->getFieldValues();
		
		$username=Authentication::getCurrentUsername();
		$groupQuery="select permission_group_id from map_employee_permission where employee_id='".$username."'";
		$builder = new QueryBuilder($groupQuery);
		$builder->execute();
		$group_result = $builder->getArrayResult();
		$group_id=$group_result[0]['permission_group_id'];

		$query = "select epay_download from permission_group where id='".$group_id."'";
		$builder = new QueryBuilder($query);
		$builder->execute();
		$permission_result = $builder->getArrayResult();
		$download_permission=$permission_result[0]['epay_download'];
		$field_values = array();
		for($i=0;$i<count($field_result);$i++){
			$field_values[$field_result[$i]['field_name']] = $field_result[$i]['field_value'];
		} 
		
		if($download_permission==1){
			$filename_format='payslip-t.pdf';
			$PDF_Templete=1;
		}else if($download_permission==2){
			$filename_format='payslip-w.pdf';
			$PDF_Templete=2;
		}else if($download_permission==3){
			$filename_format='payslip-cat.pdf';
			$PDF_Templete=1;
		}else{
			$filename_format='payslip-t.pdf';
			$PDF_Templete=1;
		}
		
		
		$result = $this->getUserEPayDetail($id);
		
		$overtime = $this->getOvertimeDetail();
		$builder = new QueryBuilder('');
		$builder->EPaySlipToPdf($filename_format,$result,$field_values,$PDF_Templete,$overtime);
		//EPaySlipToPdf
	}
	
	public function getUserEPayDetailByEmp($empNo,$month,$epay_year){
		$query = "select * from `user_epay` where `employee_no`='%s' and `month`='%s' and epay_year='%d'";
		$builder = new QueryBuilder($query);
		$builder->bind(array($empNo,$month,$epay_year));
		$builder->execute();
		
		$result = $builder->getArrayResult();
		return $result;
		
	}
	
	public function getUserEPayDetail($id){
		//$query = "select a.*,c.name,c.ic_no_new from `user_epay` a left join user_personal c on a.employee_no=c.employee_no where id='%d' ";
		$query = "select a.*,c.name,c.ic_no_new,c.designation,c.passport_no,cat.name as category,br.name as branch from `user_epay` a ";
		$query .= "left join user_personal c on a.employee_no=c.employee_no ";
		$query .= "left join user_pay up on c.username=up.username ";
		$query .= "left join category cat on up.category_id=cat.id ";
		$query .= "left join branch br on up.branch_id=br.id ";
		$query .= "where a.id='%d' ";
		$builder = new QueryBuilder($query);
		$builder->bind(array($id));
		$builder->execute();
		//echo $builder->getQuery();exit;
		$result = $builder->getRowResult();
		return $result;
		
	}
	public function getOvertimeDetail(){
		//$query = "select a.*,c.name,c.ic_no_new from `user_epay` a left join user_personal c on a.employee_no=c.employee_no where id='%d' ";
		$query = "select * from allowance_deduction where field_name like '%overtime%'";
		$builder = new QueryBuilder($query);
		$builder->execute();
		//echo $builder->getQuery();exit;
		$result = $builder->getArrayResult();
		$result_2 = array();
		if(count($result)>0){
			foreach($result as $row){
				$result_2[$row['field_name']]=$row['field_value'];
			}
		}else{
			$result_2 = array();
		}
		return $result_2;
		
	}
}
?>