<?php
error_reporting(0);
include("configure_db.php");
include_once("../model/db_details.php");
include_once("../model/db_users.php");
include_once("../model/db_settings.php");
include_once("../model/db_branch.php");
include_once("../model/db_category.php");

class QueryBuilder
{
	private $query; // Query string
	private $result; // Query executed result
	private $numRows; // No of rows in result
	private $start; // Pagination start
	private $maxPerPage; // No of rows per page
	private $currentPage; // Current Page
	private $pagination_query; // Pagination query
	private $prefixArray; // list of prefixes for array result
	private $suffixArray; // list of suffixes
	private $orderBy;
	private $searchBy;
	private $groupBy;
	
	function __construct($query)
	{
		$this->query = $query;
		$this->prefixArray = array();
		$this->suffixArray = array();
		$this->orderBy = ""; 
		$this->searchBy = "";
		$this->groupBy = "";
	}
	
	public function setQuery($query)
	{
		$this->query = $query;	
	}
	
	public function setResult($result)
	{
		$this->result = $result;
	}
	
	public function bind($array)
	{
		$pattern = '#\%(s|d|i)#';
		for($i = 0; $i < count($array); $i++)
		{
			$this->query = preg_replace($pattern, addslashes(stripslashes($array[$i])), $this->query, 1);
		}
		return $this->query;
	}
	
	public function getQuery()
	{
		return $this->query.$this->pagination_query;
	}
	
	public function printQuery()
	{
		echo $this->getQuery();
	}
	
	public function execute()
	{
		global $mysqli;
		$this->buildQuery();
		$query = $this->query.$this->pagination_query.";";
		$this->result = $mysqli->query($query);
		return $this->result;
	}
	
	private function buildQuery()
	{
		if($this->searchBy != "")
		{
			if (strpos($this->query, ' where '))
				$this->query = $this->query." and ".$this->searchBy;
			else
				$this->query = $this->query." where ".$this->searchBy;
		}
		
		if($this->groupBy != "")
			$this->query .= " group by $this->groupBy";
		if($this->orderBy != "")
			$this->query .= " order by $this->orderBy";
		$this->searchBy = "";
	}
	
	private function executeWithoutQuery()
	{
		global $mysqli;
		$query = $this->query;
		$this->result = $mysqli->query($query);
		$this->numRows = mysqli_num_rows($this->result);
		return $this->result;
	}
	
	public function paginate($start, $maxPerPage, $currentPage)
	{
		$this->start = $start;
		$this->maxPerPage = $maxPerPage;
		$this->currentPage = $currentPage;
		
		//if($start != "" && $maxPerPage != "")
		$this->pagination_query = " limit $start, $maxPerPage";
	}
	
	public function getArrayResult($paginate = FALSE)
	{
		global $mysqli;
		$list_array = array();
		$column_names = mysqli_fetch_fields($this->result);
		$this->numRows = mysqli_num_rows($this->result);
		while($rows = mysqli_fetch_array($this->result))
		{
			$array = array();
			for($i = 0; $i < count($column_names); $i++)
			{
				$array[$column_names[$i]->name] = $rows[$i];
			}
			array_push($list_array, $array);
		}
		if($paginate)
		{
			$pagination = $this->getPagination();
			$array = array(
				"Content" => $list_array,
				"Pagination" => $pagination
			);
			$list_array = $array;
		}
		$list_array = $this->updateResultArrayWithPrefix($list_array);
		$list_array = $this->updateResultArrayWithSuffix($list_array);
		return $list_array;
	}
	
	public function getIndexArrayResult($paginate = FALSE)
	{
		global $mysqli;
		$list_array = array();
		$column_names = mysqli_fetch_fields($this->result);
		$this->numRows = mysqli_num_rows($this->result);
		while($rows = mysqli_fetch_array($this->result))
		{
			$array = array();
			for($i = 0; $i < count($column_names); $i++)
			{
				$array[$i] = $rows[$i];
			}
			array_push($list_array, $array);
		}
		if($paginate)
		{
			$pagination = $this->getPagination();
			$array = array(
				"Content" => $list_array,
				"Pagination" => $pagination
			);
			$list_array = $array;
		}
		return $list_array;
	}
	
	public function exportToExcel($filename)
	{
    
        // Send Header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header("Content-Disposition: attachment;filename=$filename");
        header("Content-Transfer-Encoding: binary ");
        // XLS Data Cell
        $this->xlsBOF();
		
		$column_names = mysqli_fetch_fields($this->result);
		for($i = 0; $i < count($column_names); $i++)
		{
        	$this->xlsWriteLabel(0, $i, $column_names[$i]->name);
		}
        $xlsRow = 1;
        


        while($rows = mysqli_fetch_array($this->result))
		{
			$array = array();
			for($i = 0; $i < count($column_names); $i++)
			{
           		$this->xlsWriteLabel($xlsRow, $i, $rows[$i]);
			}
            $xlsRow++;
        }
        $this->xlsEOF();
        exit();
    }
    
	public function exportToPdf($filename, $details, $title)
	{
		$time = date("d-m-Y h:i");
		$html = "<br>
				<br>
				<table>
				<tr>
				<td style=\"font-size: x-small;\">
					$details
				</td>
				<td>
					<span style=\"font-size: large;width:80%;text-align:center\">
					<b>$title</b>&nbsp;</span>
				</td>
				<td>
					<span style=\"font-size: small;text-align:right;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$time</span>
				</td>
				</tr>
				</table>
				<br>
				<hr>
				<table width='100%'>
				";
		
		$column_names = mysqli_fetch_fields($this->result);
		$html .= "\n<tr>";
		for($i = 0; $i < count($column_names); $i++)
		{
        	$html .= "\n\t<td><b><span style=\"font-size: x-small;\">".$column_names[$i]->name."</span></b></td>";
		}
        $html .= "\n\t</tr>";
		$html .= "\n<tr>";
		for($i = 0; $i < count($column_names); $i++)
		{
        	$html .= "\n\t<td><hr></td>";
		}
        $html .= "\n\t</tr>";
		$alt = 0;
        while($rows = mysqli_fetch_array($this->result))
		{
			$alt = ($alt + 1) % 2;
			if($alt == 1)
				$html .= "\n<tr style=\"background-color:white;\">";
			else
				$html .= "\n<tr style=\"background-color:beige;\">";
			for($i = 0; $i < count($column_names); $i++)
			{
           		$html .= "\n\t<td><span style=\"font-size: x-small;\">".$rows[$i]."</span></td>";
			}
            $html .= "\n\t</tr>";
        }
		
        $html .= "</table>
        		";
		
		// Include the main TCPDF library (search for installation path).
		
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 10);
		
		// add a page
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');

		$pdf->Output($filename, 'F');
		// Send Header
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
		header('Content-Transfer-Encoding: binary');
		readfile($filename);
	}
	
	public function arrayToExcel($table, $column_names, $filename, $title)
	{
		// Send Header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header("Content-Disposition: attachment;filename=$filename");
        header("Content-Transfer-Encoding: binary ");
        // XLS Data Cell
        $this->xlsBOF();
		
		/* for($i = 0; $i < count($column_names); $i++)
		{
        	$this->xlsWriteLabel(0, $i, '');
		} */
		
		for($i = 0; $i < count($column_names); $i++)
		{
        	$this->xlsWriteLabel(0, $i, $column_names[$i]);
		}
        $xlsRow = 1;
        
        //for($j = 0; $j < count($table); $j++)
		foreach($table as $row)
		{
			$rows = $row;
			$array = array();
			for($i = 0; $i < count($column_names); $i++)
			{
           		$this->xlsWriteLabel($xlsRow, $i, $rows[$column_names[$i]]);
			}
            $xlsRow++;
        }
        $this->xlsEOF();
        exit();
	}
	
	public function arrayToPdf($table, $column_names, $filename, $details, $title,$widthval=null)
	{
		$time = date("d-m-Y h:i");
		$html = "<br>
				<br>
				<table>
				<tr>
				<td style=\"font-size: x-small;\">
					$details
				</td>
				<td>
					<span style=\"font-size: large;width:80%;text-align:center\">
					<b>$title</b>&nbsp;</span>
				</td>
				<td>
					<span style=\"font-size: small;text-align:right;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$time</span>
				</td>
				</tr>
				</table>
				<br>
				<hr>
				<table width='100%'>
				";
		
		$html .= "\n<thead>";
		
		if($filename=='../files/annual_leave_entitle.pdf'){
			$html .= "\n<tr>";
			$html .="\n\t<td width=\"8%\"></td><td width=\"13%\"></td><td width=\"11%\"></td><td width=\"3%\"></td><td width=\"3%\"></td><td width=\"5%\"></td><td width=\"5%\"></td><td width=\"8%\"></td><td width=\"5%\"></td>";
			$html .="\n\t<td style=\"text-align:center;\" width=\"10%\" colspan=\"2\"><b><span style=\"font-size: x-small;text-align:center;\">Taken</span></b></td>";
			$html .="\n\t<td style=\"text-align:center;\" width=\"18%\" colspan=\"2\"><b><span style=\"font-size: x-small;\">Forfeit</span></b></td>";
			$html .="\n\t<td width=\"11%\"></td>";
			$html .= "\n\t</tr>";
			
			$html .= "\n<tr>";
			for($i = 0; $i < count($column_names); $i++)
			{
				if($i==9 || $i==10 || $i==11 || $i==12){
					if($widthval!=null){
						$html .= "\n\t<td style=\"text-align:left;\" width=\"".$widthval[$i]."\"><b><span style=\"font-size: x-small;\">".$column_names[$i]."</span></b></td>";
					}else{
						$html .= "\n\t<td style=\"text-align:left;\"><b><span style=\"font-size: x-small;\">".$column_names[$i]."</span></b></td>";
					}

				}else{
					if($widthval!=null){
						$html .= "\n\t<td width=\"".$widthval[$i]."\"><b><span style=\"font-size: x-small;\">".$column_names[$i]."</span></b></td>";
					}else{
						$html .= "\n\t<td><b><span style=\"font-size: x-small;\">".$column_names[$i]."</span></b></td>";
					}
				}
			}
			$html .= "\n\t</tr>";
			
		}else{
			$html .= "\n<tr>";
			for($i = 0; $i < count($column_names); $i++)
			{
				if($widthval!=null){
					$html .= "\n\t<td width=\"".$widthval[$i]."\"><b><span style=\"font-size: x-small;\">".$column_names[$i]."</span></b></td>";
				}else{
					$html .= "\n\t<td><b><span style=\"font-size: x-small;\">".$column_names[$i]."</span></b></td>";
				}
			}
			$html .= "\n\t</tr>";
		}
		$html .= "\n<tr>";
		for($i = 0; $i < count($column_names); $i++)
		{
        	$html .= "\n\t<td><hr></td>";
		}
        $html .= "\n\t</tr>";
		$html .= "\n\t</thead>";
        
		$alt = 0;
        //for($j = 0; $j < count($table); $j++)
		foreach($table as $row)
		{
			//$rows = $table[$j];
			$rows=$row;
			$alt = ($alt + 1) % 2;
			if($alt == 1)
				$html .= "\n<tr style=\"background-color:white;\">";
			else
				$html .= "\n<tr style=\"background-color:beige;\">";
			for($i = 0; $i < count($column_names); $i++)
			{
				if($widthval!=null){
					if($i==9 || $i==10 || $i==11 || $i==12){
						$html .= "\n\t<td width=\"".$widthval[$i]."\"><span style=\"text-align:left;font-size: x-small;\">".$rows[$column_names[$i]]."</span></td>";
					}else{
						$html .= "\n\t<td width=\"".$widthval[$i]."\"><span style=\"text-align:left;font-size: x-small;\">".$rows[$column_names[$i]]."</span></td>";
					}
				}else{
					$html .= "\n\t<td><span style=\"font-size: x-small;\">".$rows[$column_names[$i]]."</span></td>";
				}
           		
			}
            $html .= "</tr>";
        }
		
		$html .= "</table>
        		</body>
        		</html>
        		";
				//echo $html;exit;
		// Include the main TCPDF library (search for installation path).
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 10);
		
		// add a page
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');

		$pdf->Output($filename, 'F');
		// Send Header
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
		header('Content-Transfer-Encoding: binary');
		readfile($filename);
	}
        
        public function ReportArrayToExcel($table, $column_names, $filename, $title)
	{
            // Not working this function right now 
            // Send Header
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");;
            header("Content-Disposition: attachment;filename=$filename");
            header("Content-Transfer-Encoding: binary ");
            // XLS Data Cell
            $this->xlsBOF();

            
            for($i = 0; $i < count($column_names); $i++)
            {
                  $this->xlsWriteLabel(0, $i, $column_names[$i]);
            }
            //$this->xlsWriteLabel(0, $i, $column_names[$i]);
            
            $xlsRow = 1;

            for($j = 0; $j < count($table); $j++){
                $rows = $table[$j];
                $array = array();
                for($i = 0; $i < count($column_names); $i++)
                {
                    $this->xlsWriteLabel($xlsRow, $i, $rows[$column_names[$i]]);
                }
                $xlsRow++;
            }
            $this->xlsEOF();
            exit();
	}
        
        public function ReportArrayToPdf($table, $column_names, $filename, $details, $title,$widthval=null)
	{
            
		$time = date("d-m-Y h:i");
		$html = "<html><body><br>
				<br>
				<table>
				<tr>
				<td style=\"font-size: x-small;\">
					$details
				</td>
				<td>
					<span style=\"font-size: large;width:80%;text-align:center\">
					<b>$title</b>&nbsp;</span>
				</td>
				<td>
					<span style=\"font-size: small;text-align:right;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$time</span>
				</td>
				</tr>
				</table>
				<br>
				<hr>
				<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" >
				";
		
		$html .= "\n<thead>";
		$html .= "\n<tr>";
		
                
                $html .= '<td width="8%" rowspan="2" align="center"><b>No</b></td>';
                $html .= '<td width="12%" rowspan="2" align="center"><b>Name</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>MT</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>MR</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>CL</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>HL</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>EX</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>PT</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>AD</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>RL</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>LS</b></td>';
                $html .= '<td width="8%" colspan="3" align="center"><b>EL</b></td>';
                $html .= "</tr>";
                
                $html .='<tr>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">A</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                            <td width="2.67%" align="center" style="font-weight: bold">M</td>
                            <td width="2.67%" align="center" style="font-weight: bold">T</td>
                            <td width="2.67%" align="center" style="font-weight: bold">B</td>
                          </tr>';
                
                
		$html .= "\n<tr>";
		for($i = 0; $i < 32; $i++)
		{
                    $html .= "\n\t<td><hr /></td>";
		}
                $html .= "\n\t</tr>";
		$html .= "\n\t</thead>";
        
		$alt = 0;
                for($j = 0; $j < count($table['Content']); $j++)
		{
                    $rows = $table['Content'][$j];
                    $alt = ($alt + 1) % 2;
                    if($alt == 1)
                            $html .= "\n<tr style=\"background-color:white;\">";
                    else
                            $html .= "\n<tr style=\"background-color:beige;\">";
                    
                    
                    $html .="
                                <td width=\"8%\" align=\"center\">".$rows['employee_no']."</td>
                                <td width=\"12%\"> ".$rows['name']."</td>";
								if($rows['sex']==1){
								   $html .="<td width=\"2.67%\" align=\"center\">-</td>";
								   $html .="<td width=\"2.67%\" align=\"center\">-</td>";
								   $html .="<td width=\"2.67%\" align=\"center\">-</td>";
								}else{
								   $html .="<td width=\"2.67%\" align=\"center\">".$rows['MaternityMAX']."</td>";
								   $html .="<td width=\"2.67%\" align=\"center\">".$rows['MaternityLeave']."</td>";
								   $html .="<td width=\"2.67%\" align=\"center\">".($rows['MaternityMAX']-$rows['MaternityLeave'])."</td>";
								}
                       $html .="<td width=\"2.67%\" align=\"center\">".$rows['MarriageMAX']."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['MarriageLeave']."</td>
                                <td width=\"2.67%\" align=\"center\">".($rows['MarriageMAX']-$rows['MarriageLeave'])."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['CompassionateMAX']."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['CompassionateLeave']."</td>
                                <td width=\"2.67%\" align=\"center\">".($rows['CompassionateMAX']-$rows['CompassionateLeave'])."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['HospitalMAX']."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['HospitalLeave']."</td>
                                <td width=\"2.67%\" align=\"center\">".($rows['HospitalMAX']-$rows['HospitalLeave'])."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['ExaminationMAX']."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['ExaminationLeave']."</td>
                                <td width=\"2.67%\" align=\"center\">".($rows['ExaminationMAX']-$rows['ExaminationLeave'])."</td>";
								if($rows['sex']==1){
									$html.="<td width=\"2.67%\" align=\"center\">".$rows['PaternityMAX']."</td>";
									$html.="<td width=\"2.67%\" align=\"center\">".$rows['PaternityLeave']."</td>";
									$html.="<td width=\"2.67%\" align=\"center\">".($rows['PaternityMAX']-$rows['PaternityLeave'])."</td>";
								}else{
									$html.="<td width=\"2.67%\" align=\"center\">-</td>";
									$html.="<td width=\"2.67%\" align=\"center\">-</td>";
									$html.="<td width=\"2.67%\" align=\"center\">-</td>";
								}
                                $html.="<td width=\"2.67%\" align=\"center\">".$rows['AdvanceMAX']."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['Advance']."</td>
                                <td width=\"2.67%\" align=\"center\">".($rows['AdvanceMAX']-$rows['Advance'])."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['Other_payMAX']."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['ReplacementLeave']."</td>
                                <td width=\"2.67%\" align=\"center\">".($rows['Other_payMAX']-$rows['ReplacementLeave'])."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['Line_ShutMAX']."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['Line_ShutLeave']."</td>
                                <td width=\"2.67%\" align=\"center\">".($rows['Line_ShutMAX']-$rows['Line_ShutLeave'])."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['EmergencyMAX']."</td>
                                <td width=\"2.67%\" align=\"center\">".$rows['ELeave']."</td>
                                <td width=\"2.67%\" align=\"center\">".($rows['EmergencyMAX']-$rows['ELeave'])."</td>
                              ";
                    
                    $html .= "</tr>";
                }
		$html .= "</table></body></html>";
		//echo $html;exit;		
		// Include the main TCPDF library (search for installation path).
		// create new PDF document
		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 10);
		
		// add a page
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, false, false, '');

		$pdf->Output($filename, 'F');
		// Send Header
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
		header('Content-Transfer-Encoding: binary');
		readfile($filename);
	}
	
        
        
        public function ReportSummaryArrayToPdf($table, $column_names, $filename, $details, $title,$widthval=null)
	{
            
		$time = date("d-m-Y h:i");
		$html = "<html><body><br>
				<br>
				<table>
				<tr>
				<td style=\"font-size: x-small;\">
					$details
				</td>
				<td>
					<span style=\"font-size: large;width:80%;text-align:center\">
					<b>$title</b>&nbsp;</span>
				</td>
				<td>
					<span style=\"font-size: small;text-align:right;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$time</span>
				</td>
				</tr>
				</table>
				<br>
				<hr>
				<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" >
				";
		
		$html .= "\n<thead>";
		$html .= "\n<tr>";
                $html .= '<td width="6%" align="center"><b>No</b></td>';
                $html .= '<td width="15%" align="left"><b>Name</b></td>';
                $html .= '<td width="10%" align="center"><b>Join date</b></td>';
                $html .= '<td width="5%" align="center"><b>AL</b></td>';
                $html .= '<td width="5%" align="center"><b>MC</b></td>';
                $html .= '<td width="5%" align="center"><b>MT</b></td>';
                $html .= '<td width="5%" align="center"><b>MR</b></td>';
                $html .= '<td width="5%" align="center"><b>CL</b></td>';
                $html .= '<td width="5%" align="center"><b>HL</b></td>';
                $html .= '<td width="5%" align="center"><b>EX</b></td>';
                $html .= '<td width="5%" align="center"><b>PT</b></td>';
                $html .= '<td width="5%" align="center"><b>AD</b></td>';
                $html .= '<td width="5%" align="center"><b>RL</b></td>';
                $html .= '<td width="5%" align="center"><b>LS</b></td>';
                $html .= '<td width="5%" align="center"><b>AB</b></td>';
                $html .= '<td width="5%" align="center"><b>NPL</b></td>';
                $html .= '<td width="5%" align="center"><b>EL</b></td>';
                $html .= "</tr>";
                
                
		$html .= "\n\t</thead>";
        
		$alt = 0;
                for($j = 0; $j < count($table['Content']); $j++)
		{
                    $rows = $table['Content'][$j];
                    $alt = ($alt + 1) % 2;
                    if($alt == 1)
                            $html .= "\n<tr style=\"background-color:white;\">";
                    else
                            $html .= "\n<tr style=\"background-color:beige;\">";
                    
                    
                    $html .="
                                <td width=\"6%\" align=\"center\">".$rows['employee_no']."</td>
                                <td width=\"15%\" align=\"left\"> ".$rows['name']."</td>
                                <td width=\"10%\" align=\"center\"> ".$rows['date_commence']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['AnnualLeave']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['MedicalLeave']."</td>";
								if($rows['sex']==1){
									$html.="<td width=\"5%\" align=\"center\">-</td>";
								}else{
									$html.="<td width=\"5%\" align=\"center\">".$rows['MaternityLeave']."</td>";
								}
                                $html.="<td width=\"5%\" align=\"center\">".$rows['MarriageLeave']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['CompassionateLeave']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['HospitalLeave']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['ExaminationLeave']."</td>";
								if($rows['sex']==1){
									$html.="<td width=\"5%\" align=\"center\">".$rows['PaternityLeave']."</td>";
								}else{
									$html.="<td width=\"5%\" align=\"center\">-</td>";
								}
                                $html.="<td width=\"5%\" align=\"center\">".$rows['Advance']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['ReplacementLeave']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['Line_ShutLeave']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['AbsentLeave']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['NPLeave']."</td>
                                <td width=\"5%\" align=\"center\">".$rows['ELeave']."</td>
                              ";
                    
                    $html .= "</tr>";
                }
		$html .= "</table></body></html>";
		//echo $html;exit;		
		// Include the main TCPDF library (search for installation path).
		// create new PDF document
		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 10);
		
		// add a page
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, false, false, '');

		$pdf->Output($filename, 'F');
		// Send Header
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
		header('Content-Transfer-Encoding: binary');
		readfile($filename);
	}
  
  public function ReportSummaryArrayToExcel($table, $column_names, $filename, $title, $array_fields)
	{
		// Send Header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header("Content-Disposition: attachment;filename=$filename");
        header("Content-Transfer-Encoding: binary ");
        // XLS Data Cell
        $this->xlsBOF();
		
		/* for($i = 0; $i < count($column_names); $i++)
		{
        	$this->xlsWriteLabel(0, $i, '');
		} */
		
		for($i = 0; $i < count($column_names); $i++)
		{
        	$this->xlsWriteLabel(0, $i, $column_names[$i]);
		}
        $xlsRow = 1;
        
        //for($j = 0; $j < count($table); $j++)
    /*echo "<pre>";
    print_r($table);
    print_r($array_fields);exit;*/
		foreach($table['Content'] as $row)
		{
			$rows = $row;
			$array = array();
			for($i = 0; $i < count($array_fields); $i++)
			{
           		$this->xlsWriteLabel($xlsRow, $i, $rows[$array_fields[$i]]);
			}
      $xlsRow++;
    }
    $this->xlsEOF();
    exit();
	}
        
	public function EPaySlipToPdf($filename, $details, $field_result,$PDF_Templete='',$overtime)
	{
            $username = DB_Users::getUsernameFromEmployeeNo($details['employee_no']);
            
                $EplayslipSetting = DB_Settings::getEpayslipBrancOrCompanyLogo();
                if($EplayslipSetting=="branch"){
                    $branch_detail = DB_Branch::getBranchByUsername($username);
                    
                    $company['company_details'] = $branch_detail[0]['description'];
                    $uploadFolderURL = getFilesDirectoryName(true);
                    $getCompanyLogo['company_logo'] = $uploadFolderURL."".$branch_detail[0]['logo'];
                    
                }else if($EplayslipSetting=="category"){
                    $category_detail = DB_Category::getCategoryByUsername($username);
                    $company['company_details'] = $category_detail[0]['description'];
                    $uploadFolderURL = getFilesDirectoryName(true);
                    $getCompanyLogo['company_logo'] = $uploadFolderURL."".$category_detail[0]['logo'];
                    
                }else{
                    $company = DB_Details::getCompanyDetails();
		
                    $getCompanyLogo = DB_Details::getCompanyLogo();
                }
                
                
            //echo "<pre>";
            //print_r($details);exit;
		
		$user_paydetail = DB_Users::getUserPayDetails($username);
		$user_detail = DB_Users::getUserPersonalDetails($username);
		$name = DB_Users::getName($username);
		
		//$PDF_Templete = DB_Settings::getPDF_Templete();
		
		/*print_r($company);
		echo $name;
		echo "<pre>";
		print_r($details);*/
		//exit;
		$time = date("d-m-Y h:i");
		$slip_month = $details['month'];
		$slip_year = $details['epay_year'];
		$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		
		
		$net_pay = $details['gross_pay'] + $details['bonus'] + $details['extra'] + $details['commision'] - $details['total_EPF_employee'] - $details['total_socso_employee'] - $details['itaxpcb'] - $details['Eisww'] - $details['other_deduction'];
		$gross_pay = $details['gross_pay'] + $details['bonus'] + $details['extra'] + $details['commision'];
		
		//$earning_total = $details['basic_pay']+$details['director_fee']+$details['total_monthly_over_time_pay']+$details['total_allowance']+ $details['bonus']+ $details['commision']+ $details['extra']+ $details['compensate']+$details['gratuity']+$details['allowance_1']+$details['allowance_2']+$details['allowance_3']+$details['allowance_4']+$details['allowance_5']+$details['allowance_6']+$details['allowance_7']+$details['allowance_8']+$details['allowance_9']+$details['allowance_10'];
		$earning_total = $details['basic_pay']+$details['director_fee']+$details['total_monthly_over_time_pay']+$details['total_allowance']+ $details['bonus']+ $details['commision']+ $details['extra']+ $details['compensate']+$details['gratuity'];
		$deduction_total = $details['deduction_1']+$details['deduction_2']+$details['deduction_3']+$details['deduction_4']+$details['deduction_5']+$details['deduction_6']+$details['deduction_7']+$details['deduction_8']+$details['deduction_9']+$details['deduction_10']+$details['total_EPF_employee']+$details['total_socso_employee']+$details['itaxpcb'];
		//echo "<pre>";
		//print_r($details)."<br />";exit;
	if($PDF_Templete=='1'){
		$html = '<br>
				<br>
				<table border="0" cellpadding="0" cellspacing="0">
  <tr>';
	if($filename=='payslip-cat.pdf'){
		$html.='<td colspan="3" rowspan="2" valign="middle" style="border-top: 1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000;">&nbsp;<strong>'.$details['category'].'</strong></td>';
	}else{
		$html.='<td colspan="3" rowspan="2" valign="middle" style="border-top: 1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000;">&nbsp;<strong>'.$company['company_details'].'</strong></td>';
	}
    $html.='<td style="border-top:1px solid #000;">&nbsp;</td>
    <td style="border-top:1px solid #000;">&nbsp;</td>
    <td style="border-top:1px solid #000;">&nbsp;</td>
    <td style="border-top:1px solid #000;">&nbsp;</td>
    <td colspan="2" rowspan="2" style="border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">Date : '.$time.'<br /> Month : '.$months[$slip_month-1].' - '.$slip_year.' </td>
  </tr>
  <tr>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td width="15%" style="border-left:1px solid #000;">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td style=" border-right:1px solid #000;" width="15%">&nbsp;</td>
    <td style="border-bottom:1px solid #000;" width="10%">&nbsp;<strong>ALLOWANCE</strong></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000;" width="10%">&nbsp;</td>
    <td style="border-bottom:1px solid #000;" width="15%">&nbsp;<strong>DEDUCTION</strong></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000;" width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-left:1px solid #000;">&nbsp;Name</td>
    <td>:</td>
    <td colspan="3" style=" border-right:1px solid #000;">&nbsp;'.$name.'</td>
    <td colspan="2" rowspan="11" valign="top" style="border-right:1px solid #000;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
        	$i=1;
            if($details['allowance_1']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_1'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_1'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_2']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_2'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_2'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_3']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_3'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_3'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_4']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_4'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_4'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_5']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_5'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_5'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_6']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_6'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_6'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_7']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_7'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_7'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_8']!='0'){
            $html .= '<tr>
            	<td>&nbsp;'.$field_result['allowance_8'].'</td>
                <td align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_8'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_9']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_9'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_9'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_10']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_10'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_10'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_11']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_11'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_11'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_12']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_12'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_12'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_13']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_13'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_13'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_14']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_14'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_14'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_15']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_15'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_15'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_16']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_16'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_16'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_17']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_17'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_17'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            
            for($j=0;$j<$i;$j++){
            $html .= '<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>';
            }
            
        $html .= '</table>
    </td>
    <td colspan="2" rowspan="11" valign="top" style="border-right:1px solid #000;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
       		$d = 1;
            
            if($details['deduction_1']!='0'){
        	$html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_1'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_1'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_2']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_2'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_2'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_3']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_3'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_3'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_4']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_4'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_4'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_5']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_5'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_5'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_6']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_6'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_6'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_7']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_7'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_7'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_8']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_8'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_8'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_9']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_9'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_9'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_10']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_10'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_10'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_11']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_11'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_11'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_12']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_12'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_12'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_13']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_13'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_13'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_14']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_14'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_14'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_15']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_15'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_15'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            for($f=0;$f<$d;$f++){
            $html .= '<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>';
            }
            
        $html .= '</table>
    </td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000;">&nbsp;I/C No</td>
    <td>:</td>
    <td colspan="2">&nbsp;'.$details['ic_no_new'].'</td>
    <td style=" border-right:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000;">&nbsp;Employee No</td>
    <td>:</td>
    <td colspan="2">&nbsp;'.$details['employee_no'].'</td>
    <td style=" border-right:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>';
	if($filename=='payslip-cat.pdf'){
		$html.='<td style="border-left:1px solid #000;">&nbsp;Designation / Branch</td>
		<td>:</td>
		<td colspan="2">&nbsp;'.$details['designation'].' / '.$details['branch'].'</td>
		';
	}else{
		$html.='<td style="border-left:1px solid #000;">&nbsp;Category</td>
		<td>:</td>
		<td>&nbsp;'.$details['category'].'</td>
		<td></td>';  
	}
    $html.='<td style="border-right:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000; border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000; border-right:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000; border-bottom:1px solid #000;">&nbsp;<strong>PAYMENT</strong></td>
    <td style=" border-bottom:1px solid #000;">&nbsp;</td>
    <td style=" border-bottom:1px solid #000;">&nbsp;</td>
    <td style=" border-bottom:1px solid #000;">&nbsp;</td>
    <td style=" border-right:1px solid #000; border-bottom:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4" rowspan="23" style="border-left:1px solid #000;border-bottom:1px solid #000;" valign="top">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="45%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="40%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;BASIC RATE</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['basic_rate'],2).'</td>
      </tr>
      <tr>
        <td>&nbsp;Day Work</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.$details['day_work'].'</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;BASIC PAY</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['basic_pay'],2).'</td>
      </tr>';
      
      $n = 1;
      if($details['director_fee']!='0'){
      $html .= '<tr>
        <td>&nbsp;DIRECTOR FEE</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['director_fee'],2).'</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>';
      }else{
         $n++;
      }
      
      if($details['total_monthly_over_time_pay']!='0'){  
      $html .= '<tr>
        <td>&nbsp;OVERTIME</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['total_monthly_over_time_pay'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['total_allowance']!='0'){ 
      $html .= '<tr>
        <td>&nbsp;ALLOWANCE</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['total_allowance'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['bonus']!='0'){ 
      $html .= '<tr>
        <td>&nbsp;BONUS</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['bonus'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['commision']!='0'){ 
      $html .= '<tr>
        <td>&nbsp;COMMISSION</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['commision'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['extra']!='0'){ 
      $html .= '<tr>
        <td>&nbsp;EXTRA</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['extra'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if(($details['compensate']+$details['gratuity'])!='0'){ 
      $html .= '<tr>
        <td>&nbsp;COMPENSATE</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format(($details['compensate']+$details['gratuity']),2).'&nbsp;</td>
      </tr>';
      }else{
         $n++;
      }
      $html .= '<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right" style="border-top:1px solid #000;border-bottom:1px solid #000;">'.number_format(($details['basic_pay'] + $details['total_monthly_over_time_pay'] +
$details['total_allowance'] + $details['director_fee'] + $details['bonus'] + $details['commision'] + $details['extra'] + $details['compensate'] + $details['gratuity']),2).'</td>
      </tr>';
      
      if($details['other_deduction']!='0'){
      $html .= '<tr>
        <td>&nbsp;DEDUCTION</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['other_deduction'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['total_EPF_employee']!='0'){
      $html .= '<tr>
        <td>&nbsp;EPF</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['total_EPF_employee'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      
      if($details['total_socso_employee']!='0'){
      $html .= '<tr>
        <td>&nbsp;SOCSO</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['total_socso_employee'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      
      if($details['itaxpcb']!='0'){
      $html .= '<tr>
        <td>&nbsp;TAX</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['itaxpcb'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
	  if($details['Eisww']!='0'){
      $html .= '<tr>
        <td>&nbsp;EIS</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['Eisww'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      for($f=0;$f<$n;$f++){
      $html .= '<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>';
      }
      
      $html .= '<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;NET PAY</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right" style="border-top:1px solid #000;border-bottom:1px solid #000;">'.number_format($net_pay,2).'</td>
      </tr>
    </table></td>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td style="border-bottom:1px solid #000; ">&nbsp;</td>
    <td style="border-bottom:1px solid #000; border-right:1px solid #000; ">&nbsp;</td>
    <td style="border-bottom:1px solid #000; ">&nbsp;</td>
    <td style="border-bottom:1px solid #000; border-right:1px solid #000; ">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td colspan="2" rowspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;<strong>OVERTIME</strong></td>
    <td colspan="2" rowspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;<strong>OTHER</strong></td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td colspan="2" rowspan="7" valign="top" style="border-right:1px solid #000;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
        	$ov = 1;
            if($details['hr1']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;1.0 Time</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr1'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr2']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;1.5 Time</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr2'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr3']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;2.0 Time</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr3'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr4']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;3.0 Time</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr4'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr5']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;Rest Day</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr5'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr6']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;Pub. Holiday</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr6'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            for($f=0;$f<$ov;$f++){
            $html .= '<tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>';
            }
            $html .= '<tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>
        </table>
    </td>
    <td colspan="2" rowspan="7" valign="top" style="border-right:1px solid #000;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
        	$oth = 1;
            
            if($details['gross_pay']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;MONTHLY GROSS</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($gross_pay,2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            if($details['total_EPF_employer']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;EPF\' YER</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['total_EPF_employer'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            if($details['total_socso_employer']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;SOCSO\' YER</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['total_socso_employer'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
			//number_format($details['Eisww'],2)
			if($details['Eisww']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;EIS</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['Eisww'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            if($details['AL']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;YTD AL</td>
                <td width="50%" style="border-left:1px solid #000;border-bottom:1px solid #000;" align="right">'.$details['AL'].'&nbsp; Days&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            if($details['MC']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;YTD MC</td>
                <td width="50%" style="border-left:1px solid #000;border-bottom:1px solid #000;" align="right">'.$details['MC'].'&nbsp; Days&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            for($f=0;$f<$oth;$f++){
            $html .= '<tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>';
            }
            
            $html .= '<tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>
        </table>
    </td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>

  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td colspan="2" style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td colspan="2" style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-bottom:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;">EMPLOYEE\'S SIGNATURE</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-right:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000;">&nbsp;</td>
  </tr>
</table>';
		}
		else if($PDF_Templete=='4'){
		//JAC One
			$html = '<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
    	<td>
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
            		<td colspan=3 height=2>&nbsp;</td>
            	</tr>
            	<tr>
                	<td width="25%" align="left" style="font-weight:bold;"><img src="'.$getCompanyLogo['company_logo'].'" width="180" style="margin-top: 10px;" /></td>
                    <td width="50%" align="center" style="font-weight:bold;">2ND HALF PAYROLL - '.$months[$slip_month-1].' '.$slip_year.'<br />'.$company['company_details'].'</td>
                    <td width="25%" align="right" style="font-weight:bold;">MONTHLY / BANK</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
    </tr>
    <tr width="100%">
    	<td width="100%">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
                	<td width="18%">EMPLOYEE NAME.</td>
                    <td width="2%">:</td>
                    <td width="15%">'.$name.'</td>
                    <td width="3%">&nbsp;</td>
                    <td width="10%" align="right">Department &nbsp;&nbsp;:</td>
                    <td width="14%" style="padding-right:8px;" align="right">'.$user_paydetail['department'].'</td>
                    <td width="9%">&nbsp;</td>
                    <td width="19%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9" style="border-top:1px solid #000; height:5px;">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">BASIC PAY</td>
                    <td align="center">:</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">RM</td>
                    <td align="right">'.number_format($details['basic_pay'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYEE\'S EPF</td>
                    <td align="right">'.number_format($details['total_EPF_employee'],2).'</td>
                </tr>
                <tr>
                	<td align="left">OVERTIME</td>
                    <td align="center">:</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYER\'S EPF</td>
                    <td align="right">'.number_format($details['total_EPF_employer'],2).'</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">TOTAL CONTRIBUTION</td>
                    <td align="right">'.number_format(($details['total_EPF_employee']+$details['total_EPF_employer']),2).'</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left" valign="top">ALLOWANCE</td>
                    <td align="center">:</td>
                    <td colspan="4" align="left">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
        	
            if($details['allowance_1']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_1'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_1'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_2']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_2'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_2'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_3']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_3'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_3'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_4']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_4'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_4'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_5']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_5'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_5'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_6']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_6'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_6'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_7']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_7'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_7'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_8']!='0'){
            $html .= '<tr>
            	<td>'.$field_result['allowance_8'].'</td>
                <td align="right">'.number_format($details['allowance_8'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_9']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_9'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_9'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_10']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_10'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_10'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_11']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_11'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_11'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_12']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_12'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_12'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_13']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_13'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_13'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_14']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_14'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_14'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_15']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_15'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_15'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_16']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_16'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_16'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['allowance_17']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['allowance_17'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_17'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            
            $html .= '<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>';
            
            
        $html .= '</table>
                    
                    </td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYEE\'S SOCSO</td>
                    <td align="right">'.number_format($details['total_socso_employee'],2).'</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYER\'S SOCSO</td>
                    <td align="right">'.number_format($details['total_socso_employer'],2).'</td>
                </tr>
                <tr>
                	<td align="left" valign="top">DEDUCTIONS</td>
                    <td align="center">:</td>
                    <td colspan="4" align="left">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
       		if($details['deduction_1']!='0'){
        	$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_1'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_1'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_2']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_2'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_2'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_3']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_3'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_3'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_4']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_4'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_4'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_5']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_5'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_5'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_6']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_6'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_6'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_7']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_7'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_7'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_8']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_8'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_8'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_9']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_9'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_9'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_10']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_10'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_10'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_11']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_11'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_11'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            if($details['deduction_12']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_12'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_12'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_13']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_13'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_13'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_14']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_14'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_14'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            if($details['deduction_15']!='0'){
            $html .= '<tr>
            	<td width="50%">'.$field_result['deduction_15'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_15'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }
            
            $html .= '<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>';
            
        $html .= '</table>
                    
                    </td>
                    <td>&nbsp;</td>
                    <td align="left">TOTAL CONTRIBUTION</td>
                    <td align="right">'.number_format(($details['total_socso_employee']+$details['total_socso_employer']),2).'</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td align="right" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">GROSS INCOME</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">RM</td>
                    <td align="right">'.number_format($earning_total,2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">LESS</td>
                    <td align="center">:</td>
                    <td align="left">EPF</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">'.number_format($details['total_EPF_employee'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">Socso</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">'.number_format($details['total_socso_employee'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">PCB</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">'.number_format($details['itaxpcb'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td align="right" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" >&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">NET PAY</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">RM</td>
                    <td align="right">'.number_format($net_pay,2).'</td>
                    <td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td align="right" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
        	</table>
        </td>
    </tr>
</table>';
		}
                else if($PDF_Templete=='3'){
                    //Axis Client
		$html = '<br>
				<br>
				<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" rowspan="2" valign="middle" style="border-top: 1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000;">&nbsp;<strong>'.$company['company_details'].'</strong></td>
    <td style="border-top:1px solid #000;">&nbsp;</td>
    <td style="border-top:1px solid #000;">&nbsp;</td>
    <td style="border-top:1px solid #000;">&nbsp;</td>
    <td style="border-top:1px solid #000;">&nbsp;</td>
    <td colspan="2" rowspan="2" style="border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">Date : '.$time.'<br /> Month : '.$months[$slip_month-1].' - '.$slip_year.' </td>
  </tr>
  <tr>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td width="15%" style="border-left:1px solid #000;">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td style=" border-right:1px solid #000;" width="15%">&nbsp;</td>
    <td style="border-bottom:1px solid #000;" width="10%">&nbsp;<strong>ALLOWANCE</strong></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000;" width="10%">&nbsp;</td>
    <td style="border-bottom:1px solid #000;" width="15%">&nbsp;<strong>DEDUCTION</strong></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000;" width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-left:1px solid #000;">&nbsp;Name</td>
    <td>:</td>
    <td colspan="3" style=" border-right:1px solid #000;">&nbsp;'.$name.'</td>
    <td colspan="2" rowspan="11" valign="top" style="border-right:1px solid #000;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
        	$i=1;
            if($details['allowance_1']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_1'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_1'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_2']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_2'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_2'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_3']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_3'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_3'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_4']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_4'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_4'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_5']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_5'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_5'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_6']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_6'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_6'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_7']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_7'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_7'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_8']!='0'){
            $html .= '<tr>
            	<td>&nbsp;'.$field_result['allowance_8'].'</td>
                <td align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_8'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_9']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_9'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_9'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_10']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_10'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_10'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_11']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_11'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_11'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_12']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_12'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_12'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_13']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_13'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_13'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_14']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_14'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_14'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_15']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_15'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_15'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_16']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_16'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_16'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            if($details['allowance_17']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['allowance_17'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['allowance_17'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$i++;
            }
            
            for($j=0;$j<$i;$j++){
            $html .= '<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>';
            }
            
        $html .= '</table>
    </td>
    <td colspan="2" rowspan="11" valign="top" style="border-right:1px solid #000;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
       		$d = 1;
            
            if($details['deduction_1']!='0'){
        	$html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_1'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_1'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_2']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_2'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_2'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_3']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_3'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_3'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_4']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_4'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_4'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_5']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_5'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_5'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_6']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_6'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_6'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_7']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_7'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_7'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_8']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_8'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_8'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_9']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_9'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_9'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_10']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_10'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_10'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_11']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_11'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_11'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_12']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_12'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_12'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_13']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_13'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_13'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_14']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_14'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_14'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            if($details['deduction_15']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;'.$field_result['deduction_15'].'</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['deduction_15'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
            	$d++;
            }
            
            for($f=0;$f<$d;$f++){
            $html .= '<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>';
            }
            
        $html .= '</table>
    </td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000;">&nbsp;I/C No</td>
    <td>:</td>
    <td colspan="2">&nbsp;'.$details['ic_no_new'].'</td>
    <td style=" border-right:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000;">&nbsp;Employee No</td>
    <td>:</td>
    <td colspan="2">&nbsp;'.$details['employee_no'].'</td>
    <td style=" border-right:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000;">&nbsp;Category</td>
    <td>:</td>
    <td>&nbsp;'.$details['category'].'</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000; border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000; border-right:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1px solid #000; border-bottom:1px solid #000;">&nbsp;<strong>PAYMENT</strong></td>
    <td style=" border-bottom:1px solid #000;">&nbsp;</td>
    <td style=" border-bottom:1px solid #000;">&nbsp;</td>
    <td style=" border-bottom:1px solid #000;">&nbsp;</td>
    <td style=" border-right:1px solid #000; border-bottom:1px solid #000;">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4" rowspan="23" style="border-left:1px solid #000;border-bottom:1px solid #000;" valign="top">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="45%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="40%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;BASIC RATE</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['basic_rate'],2).'</td>
      </tr>
      <tr>
        <td>&nbsp;Day Work</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.$details['day_work'].'</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;BASIC PAY</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['basic_pay'],2).'</td>
      </tr>';
      
      $n = 1;
      if($details['director_fee']!='0'){
      $html .= '<tr>
        <td>&nbsp;DIRECTOR FEE</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['director_fee'],2).'</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>';
      }else{
         $n++;
      }
      
      if($details['total_monthly_over_time_pay']!='0'){  
      $html .= '<tr>
        <td>&nbsp;OVERTIME</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['total_monthly_over_time_pay'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['total_allowance']!='0'){ 
      $html .= '<tr>
        <td>&nbsp;ALLOWANCE</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['total_allowance'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['bonus']!='0'){ 
      $html .= '<tr>
        <td>&nbsp;BONUS</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['bonus'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['commision']!='0'){ 
      $html .= '<tr>
        <td>&nbsp;COMMISSION</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['commision'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['extra']!='0'){ 
      $html .= '<tr>
        <td>&nbsp;EXTRA</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['extra'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if(($details['compensate']+$details['gratuity'])!='0'){ 
      $html .= '<tr>
        <td>&nbsp;COMPENSATE</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format(($details['compensate']+$details['gratuity']),2).'&nbsp;</td>
      </tr>';
      }else{
         $n++;
      }
      $html .= '<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right" style="border-top:1px solid #000;border-bottom:1px solid #000;">'.number_format(($details['basic_pay'] + $details['total_monthly_over_time_pay'] +
$details['total_allowance'] + $details['director_fee'] + $details['bonus'] + $details['commision'] + $details['extra'] + $details['compensate'] + $details['gratuity']),2).'</td>
      </tr>';
      
      if($details['other_deduction']!='0'){
      $html .= '<tr>
        <td>&nbsp;DEDUCTION</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['other_deduction'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      if($details['total_EPF_employee']!='0'){
      $html .= '<tr>
        <td>&nbsp;EPF</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['total_EPF_employee'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      
      if($details['total_socso_employee']!='0'){
      $html .= '<tr>
        <td>&nbsp;SOCSO</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['total_socso_employee'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      
      if($details['itaxpcb']!='0'){
      $html .= '<tr>
        <td>&nbsp;TAX</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right">'.number_format($details['itaxpcb'],2).'</td>
      </tr>';
      }else{
         $n++;
      }
      for($f=0;$f<$n;$f++){
      $html .= '<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>';
      }
      
      $html .= '<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;NET PAY</td>
        <td>&nbsp;</td>
        <td>:</td>
        <td align="right" style="border-top:1px solid #000;border-bottom:1px solid #000;">'.number_format($net_pay,2).'</td>
      </tr>
    </table></td>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td style="border-bottom:1px solid #000; ">&nbsp;</td>
    <td style="border-bottom:1px solid #000; border-right:1px solid #000; ">&nbsp;</td>
    <td style="border-bottom:1px solid #000; ">&nbsp;</td>
    <td style="border-bottom:1px solid #000; border-right:1px solid #000; ">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td colspan="2" rowspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;<strong>OVERTIME</strong></td>
    <td colspan="2" rowspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;<strong>OTHER</strong></td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td colspan="2" rowspan="7" valign="top" style="border-right:1px solid #000;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
        	$ov = 1;
            if($details['hr1']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;1.0 Time</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr1'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr2']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;1.5 Time</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr2'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr3']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;2.0 Time</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr3'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr4']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;3.0 Time</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr4'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr5']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;Rest Day</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr5'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            if($details['hr6']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;Pub. Holiday</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.$details['hr6'].'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $ov++;
            }
            for($f=0;$f<$ov;$f++){
            $html .= '<tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>';
            }
            $html .= '<tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>
        </table>
    </td>
    <td colspan="2" rowspan="7" valign="top" style="border-right:1px solid #000;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
        	$oth = 1;
            
            if($details['gross_pay']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;MONTHLY GROSS</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($gross_pay,2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            if($details['total_EPF_employer']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;EPF\' YER</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['total_EPF_employer'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            if($details['total_socso_employer']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;SOCSO\' YER</td>
                <td width="50%" align="right" style="border-left:1px solid #000;border-bottom:1px solid #000;">'.number_format($details['total_socso_employer'],2).'&nbsp;&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            if($details['AL']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;YTD AL</td>
                <td width="50%" style="border-left:1px solid #000;border-bottom:1px solid #000;" align="right">'.$details['AL'].'&nbsp; Days&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            if($details['MC']!='0'){
            $html .= '<tr>
            	<td width="50%">&nbsp;YTD MC</td>
                <td width="50%" style="border-left:1px solid #000;border-bottom:1px solid #000;" align="right">'.$details['MC'].'&nbsp; Days&nbsp;</td>
            </tr>';
            }else{
               $oth++;
            }
            
            for($f=0;$f<$oth;$f++){
            $html .= '<tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>';
            }
            
            $html .= '<tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>
        </table>
    </td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>

  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td>&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000; ">&nbsp;</td>
    <td colspan="2" style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td colspan="2" style="border-right:1px solid #000;">&nbsp;</td>
    <td></td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-bottom:1px solid #000; border-right:1px solid #000;"></td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-right:1px solid #000;border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-bottom:1px solid #000;">&nbsp;</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000;">&nbsp;</td>
  </tr>
</table><br />THIS IS COMPUTER GENERATED. NO SIGNATURE REQUIRED';
		}else if($PDF_Templete=="2"){
			
			//Ssprintzdesigns One
			//echo $getCompanyLogo['company_logo'];exit;
			$companylogo=($getCompanyLogo['company_logo']!='')?$getCompanyLogo['company_logo']:'';
			if($companylogo!=''){
				$logoimg='<img src="'.$companylogo.'" height="50" style="margin-top: 10px;" />';
			}else{
				$logoimg='';
			}
			
			$html = '<table cellpadding="0" cellspacing="0" border="0" width="98%">
	<tr>
    	<td>
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<th width="33%">'.$logoimg.'</th>
					<th width="33%" style="text-align:center;">2ND HALF PAYROLL - '.$months[$slip_month-1].' - '.$slip_year.'</th>
					<th width="33%" style="text-align:right;">MONTHLY BANK</th>
				</tr>
			</table>';
        	/*$html .='<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
            		<td colspan=3 height=2>&nbsp;</td>
            	</tr>
            	<tr>
					<td width="25%" align="left" style="font-weight:bold;"><img src="'.$getCompanyLogo['company_logo'].'" width="180" style="margin-top: 10px;" /></td>
                    <td width="50%" align="center" style="font-weight:bold;">&nbsp;</td>
                    <td width="25%" align="right" style="font-weight:bold;">&nbsp; '.$months[$slip_month-1].' - '.$slip_year.'</td>
                </tr>
            </table>';*/
			
        $html .='</td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
    </tr>
    <tr width="100%">
    	<td width="100%">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
                	<td width="18%">EMPLOYEE / LINE NO.</td>
                    <td width="2%">:</td>
                    <td width="15%"> '.$details['ic_no_new'].' / '.$details['category'].'</td>
                    <th colspan="4" width="38%">&nbsp;'.$name.'</th>
                    <td width="19%">&nbsp;</td>
                    <td width="10%">&nbsp;</td>
                </tr>';
				/*$html .='<tr>
                	<td width="15%">IC NO.</td>
                    <td width="2%">:</td>
                    <td width="18%">'.$details['ic_no_new'].'</td>
                    <td width="3%">&nbsp;</td>
                    <td width="10%">Staff Number : </td>
                    <td width="14%">'.$details['employee_no'].'</td>
                    <td width="9%">&nbsp;</td>
                    <td width="19%">Category :</td>
                    <td width="10%">'.$details['category'].'</td>
                </tr>';*/
                $html .='<tr>
                	<td colspan="9" >&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9" style="border-top:1px solid #000; height:5px;">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">BASIC PAY</td>
                    <td align="center">:</td>
                    <td align="left">&nbsp;</td>
                    <td>Rate&nbsp;</td>
                    <td align="left"></td>
                    <td align="right">RM &nbsp; '.number_format($details['basic_pay'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYEE\'S EPF</td>
                    <td align="right">'.number_format($details['total_EPF_employee'],2).'</td>
                </tr>
                <tr>
                	<td align="left">OVERTIME</td>
                    <td align="center">:</td>
                    <td align="left">&nbsp;</td><td></td><td></td><td></td>';
					
                    $html.='<td>&nbsp;</td>
                    <td align="left">EMPLOYER\'S EPF</td>
                    <td align="right">'.number_format($details['total_EPF_employer'],2).'</td>
                </tr>';
				
				if($details['amount_over_time_1']!='0' && $details['hr1']!='0'){
				$html.='<tr>
                	<td align="left">'.$overtime['overtime_1'].'</td>
                    <td align="center"></td>
                    <td align="left">&nbsp;</td>
                    <td>'.($details['amount_over_time_1']/$details['hr1']).'</td>
                    <td align="left">'.$details['hr1'].'</td>
                    <td align="right">'.$details['amount_over_time_1'].'</td>
                    <td>&nbsp;</td>
                    <td align="left"></td>
                    <td align="right"></td>
                </tr>';
				}
				
				if($details['amount_over_time_2']!='0' && $details['hr2']!='0'){
				$html.='<tr>
                	<td align="left">'.$overtime['overtime_2'].'</td>
                    <td align="center"></td>
                    <td align="left">&nbsp;</td>
                    <td>'.($details['amount_over_time_2']/$details['hr2']).'</td>
                    <td align="left">'.$details['hr2'].'</td>
                    <td align="right">'.$details['amount_over_time_2'].'</td>
                    <td>&nbsp;</td>
                    <td align="left"></td>
                    <td align="right"></td>
                </tr>';
				}
				if($details['amount_over_time_3']!='0' && $details['hr3']!='0'){
				$html.='<tr>
                	<td align="left">'.$overtime['overtime_3'].'</td>
                    <td align="center"></td>
                    <td align="left">&nbsp;</td>
                    <td>'.($details['amount_over_time_3']/$details['hr3']).'</td>
                    <td align="left">'.$details['hr3'].'</td>
                    <td align="right">'.$details['amount_over_time_3'].'</td>
                    <td>&nbsp;</td>
                    <td align="left"></td>
                    <td align="right"></td>
                </tr>';
				}
				if($details['amount_over_time_4']!='0' && $details['hr4']!='0'){
				$html.='<tr>
                	<td align="left">'.$overtime['overtime_4'].'</td>
                    <td align="center"></td>
                    <td align="left">&nbsp;</td>
                    <td>'.($details['amount_over_time_4']/$details['hr4']).'</td>
                    <td align="left">'.$details['hr4'].'</td>
                    <td align="right">'.$details['amount_over_time_4'].'</td>
                    <td>&nbsp;</td>
                    <td align="left"></td>
                    <td align="right"></td>
                </tr>';
				}
				if($details['amount_over_time_5']!='0' && $details['hr5']!='0'){
				$html.='<tr>
                	<td align="left">'.$overtime['overtime_5'].'</td>
                    <td align="center"></td>
                    <td align="left">&nbsp;</td>
                    <td>'.($details['amount_over_time_5']/$details['hr5']).'</td>
                    <td align="left">'.$details['hr5'].'</td>
                    <td align="right">'.$details['amount_over_time_5'].'</td>
                    <td>&nbsp;</td>
                    <td align="left"></td>
                    <td align="right"></td>
                </tr>';
				}
				if($details['amount_over_time_6']!='0' && $details['hr6']!='0'){
				$html.='<tr>
                	<td align="left">'.$overtime['overtime_6'].'</td>
                    <td align="center"></td>
                    <td align="left">&nbsp;</td>
                    <td>'.($details['amount_over_time_6']/$details['hr6']).'</td>
                    <td align="left">'.$details['hr6'].'</td>
                    <td align="right">'.$details['amount_over_time_6'].'</td>
                    <td>&nbsp;</td>
                    <td align="left"></td>
                    <td align="right"></td>
                </tr>';
				}
                $html.='<tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">TOTAL CONTRIBUTION</td>
                    <td align="right">'.number_format(($details['total_EPF_employee']+$details['total_EPF_employer']),2).'</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left" valign="top">ALLOWANCE</td>
                    <td align="center">:</td>
                    <td colspan="4" align="left">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
			
			if($details['allowance_1']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_1'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_1'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_2']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_2'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_2'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_3']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_3'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_3'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_4']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_4'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_4'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_5']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_5'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_5'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_6']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_6'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_6'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_7']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_7'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_7'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_8']!='0'){
				$html .= '<tr>
            	<td>'.$field_result['allowance_8'].'</td>
                <td align="right">'.number_format($details['allowance_8'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_9']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_9'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_9'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_10']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_10'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_10'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_11']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_11'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_11'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_12']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_12'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_12'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_13']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_13'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_13'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_14']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_14'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_14'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_15']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_15'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_15'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_16']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_16'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_16'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['allowance_17']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['allowance_17'].'</td>
                <td width="50%" align="right">'.number_format($details['allowance_17'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			
			$html .= '<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>';
			
			
			$html .= '</table>
					
                    </td>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                </tr>
				 <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYEE\'S SOCSO</td>
                    <td align="right">'.number_format($details['total_socso_employee'],2).'</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYER\'S SOCSO</td>
                    <td align="right">'.number_format($details['total_socso_employer'],2).'</td>
                </tr>
                <tr>
                	<td align="left" valign="top">DEDUCTIONS</td>
                    <td align="center">:</td>
                    <td colspan="4" align="left">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">';
			if($details['deduction_1']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_1'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_1'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_2']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_2'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_2'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_3']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_3'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_3'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_4']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_4'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_4'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_5']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_5'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_5'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_6']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_6'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_6'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_7']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_7'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_7'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_8']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_8'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_8'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_9']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_9'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_9'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_10']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_10'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_10'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_11']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_11'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_11'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			if($details['deduction_12']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_12'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_12'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_13']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_13'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_13'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_14']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_14'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_14'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			if($details['deduction_15']!='0'){
				$html .= '<tr>
            	<td width="50%">'.$field_result['deduction_15'].'</td>
                <td width="50%" align="right">'.number_format($details['deduction_15'],2).'&nbsp;&nbsp;</td>
            </tr>';
			}
			
			$html .= '<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>';
			
			$html .= '</table>
					
                    </td>
                    <td>&nbsp;</td>
                    <td align="left">TOTAL CONTRIBUTION</td>
                    <td align="right">'.number_format(($details['total_socso_employee']+$details['total_socso_employer']),2).'</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td align="right" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">GROSS INCOME</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">RM '.number_format($earning_total,2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYEE\'S EIS</td>
                    <td align="right">'.number_format($details['Eisww'],2).'</td>
                </tr>
                <tr>
                	<td align="left">LESS</td>
                    <td align="center">:</td>
                    <td align="left">EPF</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">'.number_format($details['total_EPF_employee'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">EMPLOYER\'S EIS</td>
                    <td align="right">'.number_format($details['Eiscc'],2).'</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">Socso</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">'.number_format($details['total_socso_employee'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">TOTAL EIS</td>
                    <td align="right">'.number_format(($details['Eisww']+$details['Eiscc']),2).'</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">PCB</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">'.number_format($details['itaxpcb'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
				<tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">EIS</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">'.number_format($details['Eisww'],2).'</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="9">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td align="right" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" >&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">NET PAY</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right"><strong>RM '.number_format($net_pay,2).'</strong></td>
                    <td>&nbsp;</td>
                    <td align="center" style="border-top:1px solid #000;">EMPLOYEE\'S SIGNATURE</td>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                	<td align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td align="right" style="border-bottom:1px solid #000;">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                </tr>
        	</table>
        </td>
    </tr>
</table>';
			
			//echo $html;exit;
		} if($PDF_Templete=="4"){
      
			//Ssprintzdesigns One
			//echo $getCompanyLogo['company_logo'];exit;
			$companylogo=($getCompanyLogo['company_logo']!='')?$getCompanyLogo['company_logo']:'';
			if($companylogo!=''){
				$logoimg='<img src="'.$companylogo.'" height="50" style="margin-top: 10px;" />';
			}else{
				$logoimg='';
            }
            $html = "<table>";
            $html .= "<thead><tr>";
            $html .= "<th></th>
                      <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>";
            $html .= "</tr></thead></table>";

			
			echo $html;exit;
		
    }else{

$html = '<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" style="border-top:1px solid #000;border-bottom:1px solid #000;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="70%">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            	<tr>
                    <td colspan="3" style="font-weight:bold;" align="center">'.$company['company_details'].'</td>
                </tr>
                <tr>
                    <td width="30%">NAME</td>
                    <td width="5%">:</td>
                    <td width="65%">&nbsp;'.$name.'</td>
                </tr>
                <tr>
                    <td>STAFF NO.</td>
                    <td>:</td>
                    <td>&nbsp;'.$user_detail['employee_no'].'</td>
                </tr>
                <tr>
                    <td>DEPT</td>
                    <td>:</td>
                    <td>&nbsp;'.$user_paydetail['department'].'</td>
                </tr>
                <tr>
                    <td>I / C NO. / PASSPORT NO</td>
                    <td>:</td>
                    <td>&nbsp;'.$user_detail['ic_no_new'].' / &nbsp;'.$user_paydetail['passport_no'].'</td>
                </tr>
                <tr>
                    <td width="30%">PAY PERIOD</td>
                    <td width="5%">:</td>
                    <td width="65%">&nbsp;'.$months[$slip_month-1].' - '.$slip_year.'</td>
                </tr>
            </table>
        	
        </td>
        <td width="30%" align="right"><img src="'.$getCompanyLogo['company_logo'].'" width="100" /></td>
        
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="25%" align="center" style="border-right:1px solid #000;">--- EARNING ---</td>
    <td width="22%" align="center" style="border-right:1px solid #000;">--- RM ---</td>
    <td width="28%" align="center" style="border-right:1px solid #000;">--- DEDUCTIONS ---</td>
    <td width="25%" align="center">--- RM ---</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;BASIC PAY</td>';
			if($details['basic_pay']!=0){ 
			$html .= '
			<td align="right" style="border-right:1px solid #000;">'.number_format($details['basic_pay'],2).'&nbsp;&nbsp;</td>';

			}
			if($field_result['deduction_1']!=0){ 
			$html .= '

			<td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_1'].'</td>
			';
			}
			if($details['deduction_1']!=0){ 
			$html .= '
			<td align="right">'.number_format($details['deduction_1'],2).'&nbsp;&nbsp;</td>

			';
			}

			if(number_format($details['deduction_2'],2)==0){
				$deduction_2 = '';
			}else{
				$deduction_2 = number_format($details['deduction_2'],2);
			}

  $html .= '</tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;DIRECTOR FEE</td>
    
    <td align="right" style="border-right:1px solid #000;">'.number_format($details['director_fee'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_2'].'</td>
    <td align="right">'.$deduction_2.'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;OVERTIME</td>
    <td align="right" style="border-right:1px solid #000;">'.number_format($details['total_monthly_over_time_pay'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_3'].'</td>
    <td align="right">'.number_format($details['deduction_3'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;ALLOWANCE</td>
    <td align="right" style="border-right:1px solid #000;">'.number_format($details['total_allowance'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_4'].'</td>
    <td align="right">'.number_format($details['deduction_4'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;BONUS</td>
    <td align="right" style="border-right:1px solid #000;">'.number_format($details['bonus'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_5'].'</td>
    <td align="right">'.number_format($details['deduction_5'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;COMMISSION</td>
    <td align="right" style="border-right:1px solid #000;">'.number_format($details['commision'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_6'].'</td>
    <td align="right">'.number_format($details['deduction_6'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;EXTRA</td>
    <td align="right" style="border-right:1px solid #000;">'.number_format($details['extra'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_7'].'</td>
    <td align="right">'.number_format($details['deduction_7'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;COMPENSATE</td>
    <td align="right" style="border-right:1px solid #000;">'.number_format(($details['compensate']+$details['gratuity']),2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_8'].'</td>
    <td align="right">'.number_format($details['deduction_8'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_1'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_1'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_9'].'</td>
    <td align="right">'.number_format($details['deduction_9'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_2'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_2'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_10'].'</td>
    <td align="right">'.number_format($details['deduction_10'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_3'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_3'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_11'].'</td>
    <td align="right">'.number_format($details['deduction_11'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_4'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_4'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_12'].'</td>
    <td align="right">'.number_format($details['deduction_12'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_5'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_5'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_13'].'</td>
    <td align="right">'.number_format($details['deduction_13'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_6'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_6'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_14'].'</td>
    <td align="right">'.number_format($details['deduction_14'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_7'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_7'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;'.$field_result['deduction_15'].'</td>
    <td align="right">'.number_format($details['deduction_15'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_8'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_8'],2).'&nbsp;&nbsp;</td>
    <td  style="border-right:1px solid #000;">&nbsp;EPF</td>
    <td align="right">'.number_format($details['total_EPF_employee'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_9'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_9'],2).'&nbsp;&nbsp;</td>
    <td  style="border-right:1px solid #000;">&nbsp;SOCSO</td>
    <td align="right">'.number_format($details['total_socso_employee'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_10'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_10'],2).'&nbsp;&nbsp;</td>
    <td  style="border-right:1px solid #000;">&nbsp;TAX</td>
    <td align="right">'.number_format($details['itaxpcb'],2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_11'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_11'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_12'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_12'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_12'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_12'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_13'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_13'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_14'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_14'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_15'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_15'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_16'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_16'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;'.$field_result['allowance_17'].'</td>
    <td align="right" style="border-right:1px solid #000;border-left:1px solid #000;">'.number_format($details['allowance_17'],2).'&nbsp;&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" style="border-right:1px solid #000;border-bottom:1px solid #000;">Total &nbsp;</td>
    <td align="right" style="border-right:1px solid #000;border-bottom:1px solid #000;">'.number_format($earning_total,2).'&nbsp;&nbsp;</td>
    <td align="right" style="border-right:1px solid #000;border-bottom:1px solid #000;">Total &nbsp;</td>
    <td align="right" style="border-bottom:1px solid #000;">'.number_format($deduction_total,2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td align="right">NET PAY  &nbsp;</td>
    <td style="border-bottom:1px double #000;border-left:1px solid #000;" align="right">&nbsp;'.number_format($net_pay,2).'&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td colspan="2" rowspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15%">&nbsp;EPF :</td>
        <td width="35%">2007924</td>
        <td width="15%">TAX :</td>
        <td width="35%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;SOSCO :</td>
        <td>7365365386538746</td>
        <td>BANK :</td>
        <td>27628374628462648</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="border-right:1px solid #000;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" style="border-right:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;" align="center">CURRENT MONTH</td>
    <td colspan="2" style="border-top:1px solid #000;border-bottom:1px solid #000;" align="center">YEAR-TO-DATE</td>
  </tr>
  <tr>
    <td colspan="2" style="border-right:1px solid #000;border-bottom:1px solid #000;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td>E.P.F</td>
        <td>SOCSO</td>
        <td>TAX</td>
      </tr>
      <tr>
        <td>Employee :</td>
        <td>'.number_format($details['total_EPF_employee'],2).'</td>
        <td>'.number_format($details['total_socso_employee'],2).'</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Employer :</td>
        <td>'.number_format($details['total_EPF_employer'],2).'</td>
        <td>'.number_format($details['total_socso_employer'],2).'</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Total :</td>
        <td>'.number_format(($details['total_EPF_employee']+$details['total_EPF_employer']),2).'</td>
        <td>'.number_format(($details['total_socso_employee']+$details['total_socso_employer']),2).'</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td colspan="2" style="border-bottom:1px solid #000;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td>E.P.F</td>
        <td>SOCSO</td>
        <td>TAX</td>
      </tr>
      <tr>
        <td>&nbsp;Employee :</td>
        <td>'.number_format($details['total_EPF_employee'],2).'</td>
        <td>'.number_format($details['total_socso_employee'],2).'</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;Employer :</td>
        <td>'.number_format($details['total_EPF_employer'],2).'</td>
        <td>'.number_format($details['total_socso_employer'],2).'</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;Total :</td>
        <td>'.number_format(($details['total_EPF_employee']+$details['total_EPF_employer']),2).'</td>
        <td>'.number_format(($details['total_socso_employee']+$details['total_socso_employer']),2).'</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>';

        }
        echo $PDF_Templete." -- ";
		echo $html;exit;
		// Include the main TCPDF library (search for installation path).
		
		// create new PDF document
		//PDF_PAGE_ORIENTATION
		//PDF_PAGE_FORMAT
		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 9);
		
		// add a page
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');

		$pdf->Output($filename, 'F');
		// Send Header
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
		header('Content-Transfer-Encoding: binary');
		readfile($filename);
	}
	
	
    private function xlsBOF()
    {
        echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
        return;
    }
    
    private function xlsEOF()
    {
        echo pack("ss", 0x0A, 0x00);
        return;
    }
    private function xlsWriteNumber($Row, $Col, $Value)
    {
        echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
        echo pack("d", $Value);
        return;
    }
    private function xlsWriteLabel($Row, $Col, $Value )
    {
        $L = strlen($Value);
        echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
        echo $Value;
        return;
    }
	
	public function getRowResult()
	{
		$rows = mysqli_fetch_array($this->result);
		$column_names = mysqli_fetch_fields($this->result);
		$array = array();
		for($i = 0; $i < count($column_names); $i++)
		{
			$array[$column_names[$i]->name] = $rows[$i];
		}
		$array = $this->updateResultWithPrefix($array);
		$array = $this->updateResultWithSuffix($array);
		return $array;
	}
	
	public function getIndexRowResult($paginate = FALSE)
	{
		$list_array = array();
		$this->numRows = mysqli_num_rows($this->result);
		$rows = mysqli_fetch_array($this->result);
		for($i = 0; $i < count($column_names); $i++)
		{
			$list_array[$i] = $rows[$i];
		}
		return $list_array;
	}
	
	public function getValue()
	{
		$row = mysqli_fetch_array($this->result);
		if(isset($row[0]))
			return $row[0];
		else
			return "";
	}
	
	public function addQuery($query)
	{
		if($this->query != "")
			$this->query = $this->query.";".$query;
		else
			$this->query = $query;
	}
	
	private function getPagination()
    {
      //echo 'ok';exit;
    	$this->executeWithoutQuery();
        $count = $this->numRows;
        //echo " Start = ".$this->start. " - maxPerPage = ".$this->maxPerPage;exit;
        if($this->maxPerPage==""){
          $this->maxPerPage = 100;
        }
//echo "(".$count ."/". $this->maxPerPage.") + ((".$count ."%". $this->maxPerPage ."> 0)? 1: 0)";exit;
		/*if($this->start == "" || $this->maxPerPage == "")
			return array();*/
        $noPages = (int)($count / $this->maxPerPage) + (($count % $this->maxPerPage > 0)? 1: 0);
        $currentPage = ($this->currentPage > $noPages)? $noPages: $this->currentPage;
        $this->start = ($this->start < $count)? $this->start: 0;
		$this->currentPage = (($this->currentPage)? $this->currentPage: 1);
		$array = array(
			"PageStart" => intval($this->start),
			"NoPages" => intval($noPages),
			"CurrentPage" =>  intval($this->currentPage)
		);
     	return $array;
    }
	
	public function addSearchItem($column, $value, $searchType="contains", $connector="and")
	{
		if($value != "")
		{
			$searchType = strtoupper($searchType);
			$compareString = " like '%$value%' ";
			switch ($searchType)
			{
				case 'CONTAINS'				: $compareString = " like '%$value%' "; break;
				case 'STARTS WITH'			: $compareString = " like '$value%' "; break;
				case 'ENDS WITH'			: $compareString = " like '%$value' "; break;
				case 'EQUALS'				: $compareString = " = '$value' "; break;
				case 'GREATER THAN'			: $compareString = " > '$value' "; break;
				case 'LESS THAN'			: $compareString = " < '$value' "; break;
				case 'GREATER THAN OR EQUAL': $compareString = " >= '$value' "; break;
				case 'LESS THAN OR EQUAL'	: $compareString = " <= '$value' "; break;
				default						: $compareString = " like '%$value%' ";
			}
			if($this->searchBy != "")
				$this->searchBy = $this->searchBy." $connector ".$column.$compareString;
			else
				$this->searchBy = $column.$compareString;
		}
	}
	public function addPrefix($index, $prefix)
	{
		array_push($this->prefixArray, array("index" => $index, "prefix" => $prefix));
	}
	
	public function addSuffix($index, $suffix)
	{
		array_push($this->suffixArray, array("index" => $index, "suffix" => $suffix));
	}
	
	private function updateResultWithPrefix($result)
	{
		for($j = 0; $j < count($this->prefixArray); $j++)
		{
			$result[$this->prefixArray[$j]["index"]] =  $this->prefixArray[$j]["prefix"].$result[$this->prefixArray[$j]["index"]];
		}
		return $result;
	}
	
	private function updateResultWithSuffix($result)
	{
		for($j = 0; $j < count($this->suffixArray); $j++)
		{
			$result[$this->suffixArray[$j]["index"]] =  $result[$this->suffixArray[$j]["index"]].$this->suffixArray[$j]["suffix"];
		}
		return $result;
	}
	
	private function updateResultArrayWithPrefix($result)
	{
		for($i = 0; $i < count($result); $i++)
		{
			for($j = 0; $j < count($this->prefixArray); $j++)
			{
				if($result[$i][$this->prefixArray[$j]["index"]] != "")
					$result[$i][$this->prefixArray[$j]["index"]] =  $this->prefixArray[$j]["prefix"].$result[$i][$this->prefixArray[$j]["index"]];
			}
		}
		return $result;
	}
	
	private function updateResultArrayWithSuffix($result)
	{
		for($i = 0; $i < count($result); $i++)
		{
			for($j = 0; $j < count($this->suffixArray); $j++)
			{
				if($result[$i][$this->suffixArray[$j]["index"]] != "")
					$result[$i][$this->suffixArray[$j]["index"]] =  $result[$i][$this->suffixArray[$j]["index"]].$this->suffixArray[$j]["suffix"];
			}
		}
		return $result;
	}
	
	public function addOrderBy($column)
	{
		if($this->orderBy != "")
			$this->orderBy .= ",".$column;
		else
			$this->orderBy = $column;
	}
	
	public function addGroupBy($column)
	{
		if($this->groupBy != "")
			$this->groupBy .= ",".$column;
		else
			$this->groupBy = $column;
	}
	public function searchlisttoPdf($info,$filename, $title)
	{
		$time = date("d-m-Y h:i");
    $html='';
		//Staff information
		$html.='<table><tbody><tr><td colspan="12"><h2 align="center">User Leave Information</h2></td></tr><tr></tbody></table><br>
				<br><table border="1" width="100%"> 
					<tbody><tr><td colspan="12"><h3>Staff Information</h3></td></tr><tr>
						<th style="width:5%;text-align:left;font-size:small;font-weight:bold;">Emp</th>
						<th style="width:8%;text-align:left;font-size:small;font-weight:bold;">Name</th>
						<th style="text-align:center;width:10%;font-size:small;font-weight:bold;">Commence</th>
						<th style="text-align:center;width:8%;font-size:small;font-weight:bold;">Confirm</th>
						<th style="text-align:center;width:10%;font-size:small;font-weight:bold;">Category</th>
						<th style="text-align:center;width:9%;font-size:small;font-weight:bold;">Rest day</th>
						<th style="text-align:center;width:8%;font-size:small;font-weight:bold;">Phone</th>
						<th style="text-align:center;width:7%;font-size:small;font-weight:bold;">Branch</th>
						<th style="text-align:center;width:9%;font-size:small;font-weight:bold;">Dept</th>
						<th style="text-align:center;width:8%;font-size:small;font-weight:bold;">Category</th>
						<th style="text-align:center;width:9%;font-size:small;font-weight:bold;">Role</th>
						<th style="text-align:center;width:9%;font-size:small;font-weight:bold;">State</th>
					</tr>';
		$html.='<tr>
						<td style="font-size:small;">'.$info['staff_info']['employee_no'].'</td>
						<td style="font-size:small;">'.$info['staff_info']['name'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['date_commence'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['date_confirmed'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['entitle_category'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['rest_day_group'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['phone_no'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['branch'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['department'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['category'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['group_name'].'</td>
						<td style="text-align:center;font-size:small;">'.$info['staff_info']['state'].'</td>
					</tr></tbody></table><br>';
		//Staff information
    
		//Supervisor  information
		$html.='<br>
				<br><table border="1" width="100%"> 
					<tbody><tr><td colspan="12"><h3>Supervisor Information</h3></td></tr><tr>
						<th style="width:9%;text-align:left;font-size:small;font-weight:bold;">Emp</th>
						<th style="width:11%;text-align:left;font-size:small;font-weight:bold;">Name</th>
						<th style="width:12%;text-align:center;font-size:small;font-weight:bold;">Commence</th>
						<th style="width:11%;text-align:center;font-size:small;font-weight:bold;">Phone</th>
						<th style="width:10%;text-align:center;font-size:small;font-weight:bold;">Branch</th>
						<th style="width:12%;text-align:center;font-size:small;font-weight:bold;">Dept</th>
						<th style="width:12%;text-align:center;font-size:small;font-weight:bold;">Category</th>
						<th style="width:12%;text-align:center;font-size:small;font-weight:bold;">Role</th>
						<th style="width:11%;text-align:center;font-size:small;font-weight:bold;">State</th>
          </tr>';
          for($i=0;$i<count($info['supervisor_info']);$i++){
            $html.='<tr>
              <td style="font-size:small;">'.$info['supervisor_info'][$i]['approver_id'].'</td>
              <td style="font-size:small;">'.$info['supervisor_info'][$i]['name'].'</td>
              <td style="text-align:center;font-size:small;">'.$info['supervisor_info'][$i]['date_joined'].'</td>
              <td style="text-align:center;font-size:small;">'.$info['supervisor_info'][$i]['phone_no'].'</td>
              <td style="text-align:center;font-size:small;">'.$info['supervisor_info'][$i]['branch'].'</td>
              <td style="text-align:center;font-size:small;">'.$info['supervisor_info'][$i]['department'].'</td>
              <td style="text-align:center;font-size:small;">'.$info['supervisor_info'][$i]['category'].'</td>
              <td style="text-align:center;font-size:small;">'.$info['supervisor_info'][$i]['Role'].'</td>
              <td style="text-align:center;font-size:small;">'.$info['supervisor_info'][$i]['state'].'</td>
              </tr>';
          }
          $html .= "</tbody></table><br>";
		
          
		//Supervisor  information
		
		//Leave summary
		$html.='<br>
				<br><table border="1" width="100%"> 
					<tbody><tr>
						<th style="width:20%;text-align:left;font-weight:bold;">Leave Type	</th>
						<th style="width:5%;font-size:small;font-weight:bold;text-align:center;">BF	</th>
						<th style="width:7%;font-size:small;font-weight:bold;text-align:center;">BF Adj	</th>
						<th style="width:8%;font-size:small;font-weight:bold;text-align:center;">Entitle	</th>
						<th style="width:7%;font-size:small;font-weight:bold;text-align:center;">Earn</th>
						<th style="width:10%;font-size:small;font-weight:bold;text-align:center;">Claimable</th>
						<th style="width:7%;font-size:small;font-weight:bold;text-align:center;">NPL</th>
						<th colspan="2" style="width:14%;font-size:small;font-weight:bold;text-align:center;">Taken</th>
                        <th colspan="2" style="width:14%;font-size:small;font-weight:bold;text-align:center;">Forfeit</th>
						<th style="width:8%;font-size:small;font-weight:bold;text-align:center;">Balance	</th>
					</tr>
					<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th style="text-align:center;">EL</th>
					<th style="text-align:center;">AL</th>
					<th style="text-align:center;">BF</th>
					<th style="text-align:center;">Adj</th>
					<th></th>
					</tr>
					<tr class="firsttr">
                        <th style="text-align:left;"><b id="annual_title">Annual:</b></th>
						<td style="text-align:center;font-size:small;" id="anbf">'.$info['annual_leave']['BF'].'</td>
						<td style="text-align:center;font-size:small;" id="anbfadj">'.$info['annual_leave']['BF_adj'].'</td>
						<td style="text-align:center;font-size:small;"><span id="aent">'.$info['annual_leave']['Entitle'].'</span></td>
						<td style="text-align:center;font-size:small;"><span id="aear">'.$info['annual_leave']['Earn'].'</span></td>
						<td style="text-align:center;font-size:small;"><span id="aclai">'.$info['annual_leave']['Claimable'].'</span></td>
						<td style="text-align:center;font-size:small;" id="anpl">'.$info['annual_leave']['npl'].'</td>
						<td  style="text-align:center;font-size:small;">'.$info['annual_leave']['Taken_el'].'</td>
						<td  style="text-align:center;font-size:small;">'.$info['annual_leave']['Taken_al'].'</td>
                        <td  style="text-align:center;font-size:small;">'.$info['annual_leave']['Forfeit_bf'].'</td>
						<td  style="text-align:center;font-size:small;">'.$info['annual_leave']['Forfeit_bfadj'].'</td>
						<td style="text-align:center;font-size:small;"><span id="abal">'.$info['annual_leave']['balance'].'</span></td>
					</tr>
					<tr class="firsttr">
                                            <th style="text-align:left;"><b id="medical_title">Medical:</b></th>
						<td style="text-align:center;font-size:small;" id="mebf">'.$info['medical_leave']['BF'].'</td>
						<td style="text-align:center;font-size:small;" id="mebfadj">'.$info['medical_leave']['BF_adj'].'</td>
						<td style="text-align:center;font-size:small;"><span id="ment">'.$info['medical_leave']['Entitle'].'</span></td>
						<td style="text-align:center;font-size:small;"><span id="mear">-</span></td>
						<td style="text-align:center;font-size:small;"><span id="mclai">'.$info['medical_leave']['Claimable'].'</span></td>
						<td style="text-align:center;font-size:small;"><span id="mnpl">'.$info['medical_leave']['npl'].'</span></td>
						<td colspan="2" style="text-align:center;font-size:small;"><span id="mtak">'.$info['medical_leave']['Taken'].'</span></td>
                        <td colspan="2" style="text-align:center;font-size:small;"><span id="mtak">'.$info['medical_leave']['Forfeit'].'</span></td>
						<td style="text-align:center;font-size:small;"><span id="mbal">'.$info['medical_leave']['balance'].'</span></td>
					</tr>
					<tr class="firsttr">
						<th style="text-align:left;" class="type"><b>Replacement:</b></th>
						<td style="text-align:center;font-size:small;" id="rl_bf">'.$info['replacement_leave']['BF'].'</td>
						<td style="text-align:center;font-size:small;" id="rl_adj">'.$info['replacement_leave']['BF_adj'].'</td>
						<td style="text-align:center;font-size:small;">-</td>
						<td style="text-align:center;font-size:small;" id="granted">'.$info['replacement_leave']['Earn'].'</td>
						<td style="text-align:center;font-size:small;">-</td>
						<td style="text-align:center;font-size:small;">-</td>
						<td colspan="2" style="text-align:center;font-size:small;" id="rltaken">'.$info['replacement_leave']['Taken'].'</td>
						<td colspan="2" style="text-align:center;font-size:small;" id="rlforfeit">'.$info['replacement_leave']['Forfeit'].'</td>
						<td style="text-align:center;font-size:small;" id="rlbalance">'.$info['replacement_leave']['balance'].'</td>
					</tr>
				</tbody></table><br>';
		//Leave summary
		//All Leave summary 
			$html.='<br><br><table border="1" width="100%"><tbody>
				<tr><td colspan="10"><h3>All Leave Summary </h3></td></tr>
				<tr><th style="font-weight:bold;text-align:center;width:37%;">User</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">MT</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">MR</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">CL</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">HL</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">EX</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">PT</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">AD</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">LS</th>
					<th style="font-weight:bold;text-align:center;font-size:small;width:7%;">AB</th>
				</tr>
				<tr>
				<td style="text-align:center;">'.$info['all_leave_summary']['username'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['MT'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['MR'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['CL'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['HL'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['EX'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['PT'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['AD'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['LS'].'</td>
				<td style="text-align:center;font-size:small;">'.$info['all_leave_summary']['AB'].'</td>
				</tr>
			</tbody></table>';
		//All Leave summary 
    $RelieveAllow = DB_Settings::getIsRelieveAllow();
    
		//Leave Info
		if(count($info['leave_info'])>0){
      $html.='<br><br><table width="100%" border="1"><tbody>';
        if($RelieveAllow){
          $html.='<tr><td colspan="7"><h3>Leave Information</h3> </td></tr>';
        }else{
          $html.='<tr><td colspan="6"><h3>Leave Information</h3> </td></tr>';
        }
					
          $html.='<tr><td style="text-align:center;">Date Applied</td>';
          if($RelieveAllow){
            $html .= '<td style="text-align:center;">Relieve</td>';
          }
          $html .= '<td style="text-align:center;">Leave Type</td><td style="text-align:center;">Leave Date</td><td style="text-align:center;">Days</td><td style="text-align:center;">Status</td><td style="text-align:center;">Reason</td></tr>';
			$status='';
			foreach($info['leave_info'] as $row){
				if($row['status']==0){
					$status='<td class="status" style="background-color:grey;text-align:center;">Pending</td>';
				}else if($row['status']==1){
					$status='<td class="status" style="background-color:green;text-align:center;">Approved</td>';
				}else if($row['status']==2){
					$status='<td class="status" style="background-color:red;text-align:center;">Rejected</td>';
				}else if($row['status']==5){
					$status='<td class="status" style="background-color:orange;text-align:center;">Cancellation Pending</td>';
				}else if($row['status']==4){
					$status='<td class="status" style="background-color:#5A5AF4;text-align:center;">Cancelled</td>';
				}else{
					$status='<td class="status" style="background-color:#fffdbd;text-align:center;">Recommended</td>';
				}
				
        $html.='<tr><td style="text-align:center;">'.$row['date_applied'].'</td>';
        if($RelieveAllow){
          $html .= '<td style="text-align:center;">'.$row['r_name'].'</td>';
        }
        $html .= '<td style="text-align:center;">'.$row['type'].'</td><td style="text-align:center;">'.$row['start_date'].'</td><td style="text-align:center;">'.$row['no_days'].'</td>'.$status.'<td style="text-align:center;">'.$row['reason'].'</td></tr>';
			}
			$html.='</tbody></table>';
    }
    /*echo $html;
      exit;*/
		//Leave Info
		
		//echo $html;exit;
		// Include the main TCPDF library (search for installation path).
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('dejavusans', '', 10);
		
		// add a page
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');

		$pdf->Output($filename, 'F');
		// Send Header
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
		header('Content-Transfer-Encoding: binary');
		readfile($filename);
	}
	public function searchlisttoExcel($info, $filename, $title)
	{
		// Send Header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header("Content-Disposition: attachment;filename=$filename");
        header("Content-Transfer-Encoding: binary ");
        // XLS Data Cell
        $this->xlsBOF();
		
		/* for($i = 0; $i < count($column_names); $i++)
		{
        	$this->xlsWriteLabel(0, $i, '');
		} */
		
		//Staff Information 
		$this->xlsWriteLabel(0, 0, 'Staff Information');
		$this->xlsWriteLabel(1, 0, 'Emp No');
		$this->xlsWriteLabel(1, 1, 'Name');
		$this->xlsWriteLabel(1, 2, 'Date of Join');
		$this->xlsWriteLabel(1, 3, 'Date confirm');
		$this->xlsWriteLabel(1, 4, 'Entitle category');
		$this->xlsWriteLabel(1, 5, 'Rest day group');
		$this->xlsWriteLabel(1, 6, 'Phone No');
		$this->xlsWriteLabel(1, 7, 'Branch');
		$this->xlsWriteLabel(1, 8, 'Department');
		$this->xlsWriteLabel(1, 9, 'Category');
		$this->xlsWriteLabel(1, 10, 'Employee Role');
		$this->xlsWriteLabel(1, 11, 'State');
		
		$this->xlsWriteLabel(2, 0, $info['staff_info']['employee_no']);
		$this->xlsWriteLabel(2, 1, $info['staff_info']['name']);
		$this->xlsWriteLabel(2, 2, $info['staff_info']['date_commence']);
		$this->xlsWriteLabel(2, 3, $info['staff_info']['date_confirmed']);
		$this->xlsWriteLabel(2, 4, $info['staff_info']['entitle_category']);
		$this->xlsWriteLabel(2, 5, $info['staff_info']['rest_day_group']);
		$this->xlsWriteLabel(2, 6, $info['staff_info']['phone_no']);
		$this->xlsWriteLabel(2, 7, $info['staff_info']['branch']);
		$this->xlsWriteLabel(2, 8, $info['staff_info']['department']);
		$this->xlsWriteLabel(2, 9, $info['staff_info']['category']);
		$this->xlsWriteLabel(2, 10, $info['staff_info']['group_name']);
		$this->xlsWriteLabel(2, 11, $info['staff_info']['state']);
		//Staff Information 
		
		//Supervisor  information
		$this->xlsWriteLabel(5, 0, 'Supervisor Information');
		$this->xlsWriteLabel(6, 0, 'Emp No');
		$this->xlsWriteLabel(6, 1, 'Name');
		$this->xlsWriteLabel(6, 2, 'Date of Join');
		$this->xlsWriteLabel(6, 3, 'Phone No');
		$this->xlsWriteLabel(6, 4, 'Branch');
		$this->xlsWriteLabel(6, 5, 'Department');
		$this->xlsWriteLabel(6, 6, 'Category');
		$this->xlsWriteLabel(6, 7, 'Employee Role');
		$this->xlsWriteLabel(6, 8, 'State');
    
    $row_count = 6;
    for($i=0;$i<count($info['supervisor_info']);$i++){
      $row_count++;
      $this->xlsWriteLabel($row_count, 0, $info['supervisor_info'][$i]['approver_id']);
      $this->xlsWriteLabel($row_count, 1, $info['supervisor_info'][$i]['name']);
      $this->xlsWriteLabel($row_count, 2, $info['supervisor_info'][$i]['date_joined']);
      $this->xlsWriteLabel($row_count, 3, $info['supervisor_info'][$i]['phone_no']);
      $this->xlsWriteLabel($row_count, 4, $info['supervisor_info'][$i]['branch']);
      $this->xlsWriteLabel($row_count, 5, $info['supervisor_info'][$i]['department']);
      $this->xlsWriteLabel($row_count, 6, $info['supervisor_info'][$i]['category']);
      $this->xlsWriteLabel($row_count, 7, $info['supervisor_info'][$i]['Role']);
      $this->xlsWriteLabel($row_count, 8, $info['supervisor_info'][$i]['state']);
    }

    $row_count = $row_count + 3;
		
		//Supervisor  information
		
		//Leave summary
		$this->xlsWriteLabel($row_count, 0, 'Leave Summary ');
		$this->xlsWriteLabel(($row_count+1), 0, 'Leave Type');
		$this->xlsWriteLabel(($row_count+1), 1, 'BF');
		$this->xlsWriteLabel(($row_count+1), 2, 'BF Adj');
		$this->xlsWriteLabel(($row_count+1), 3, 'Entitle');
		$this->xlsWriteLabel(($row_count+1), 4, 'Earn');
		$this->xlsWriteLabel(($row_count+1), 5, 'Claimable');
		$this->xlsWriteLabel(($row_count+1), 6, 'NPL');
		$this->xlsWriteLabel(($row_count+1), 7, 'Taken EL');
		$this->xlsWriteLabel(($row_count+1), 8, 'Taken Al');
		$this->xlsWriteLabel(($row_count+1), 9, 'Forfeit BF');
		$this->xlsWriteLabel(($row_count+1), 10, 'Forfeit Adj');
		$this->xlsWriteLabel(($row_count+1), 11, 'Balance');
		
		$this->xlsWriteLabel(($row_count+2), 0, 'Annual Leave');
		$this->xlsWriteLabel(($row_count+2), 1, $info['annual_leave']['BF']);
		$this->xlsWriteLabel(($row_count+2), 2, $info['annual_leave']['BF_adj']);
		$this->xlsWriteLabel(($row_count+2), 3, $info['annual_leave']['Entitle']);
		$this->xlsWriteLabel(($row_count+2), 4, $info['annual_leave']['Earn']);
		$this->xlsWriteLabel(($row_count+2), 5, $info['annual_leave']['Claimable']);
		$this->xlsWriteLabel(($row_count+2), 6, $info['annual_leave']['npl']);
		$this->xlsWriteLabel(($row_count+2), 7, $info['annual_leave']['Taken_el']);
		$this->xlsWriteLabel(($row_count+2), 8, $info['annual_leave']['Taken_al']);
		$this->xlsWriteLabel(($row_count+2), 9, $info['annual_leave']['Forfeit_bf']);
		$this->xlsWriteLabel(($row_count+2), 10, $info['annual_leave']['Forfeit_bfadj']);
		$this->xlsWriteLabel(($row_count+2), 11, $info['annual_leave']['balance']);
		
		$this->xlsWriteLabel(($row_count+3), 0, 'Medical Leave');
		$this->xlsWriteLabel(($row_count+3), 1, $info['medical_leave']['BF']);
		$this->xlsWriteLabel(($row_count+3), 2, $info['medical_leave']['BF_adj']);
		$this->xlsWriteLabel(($row_count+3), 3, $info['medical_leave']['Entitle']);
		$this->xlsWriteLabel(($row_count+3), 4, '-');
		$this->xlsWriteLabel(($row_count+3), 5, $info['medical_leave']['Claimable']);
		$this->xlsWriteLabel(($row_count+3), 6, $info['medical_leave']['npl']);
		$this->xlsWriteLabel(($row_count+3), 7, $info['medical_leave']['Taken']);
		$this->xlsWriteLabel(($row_count+3), 8, '');
		$this->xlsWriteLabel(($row_count+3), 9, $info['medical_leave']['Forfeit']);
		$this->xlsWriteLabel(($row_count+3), 10, '');
		$this->xlsWriteLabel(($row_count+3), 11, $info['medical_leave']['balance']);
		
		$this->xlsWriteLabel(($row_count+4), 0, 'Replacement Leave');
		$this->xlsWriteLabel(($row_count+4), 1, $info['replacement_leave']['BF']);
		$this->xlsWriteLabel(($row_count+4), 2, $info['replacement_leave']['BF_adj']);
		$this->xlsWriteLabel(($row_count+4), 3, '-');
		$this->xlsWriteLabel(($row_count+4), 4, $info['replacement_leave']['Earn']);
		$this->xlsWriteLabel(($row_count+4), 5, '-');
		$this->xlsWriteLabel(($row_count+4), 6, '-');
		$this->xlsWriteLabel(($row_count+4), 7, $info['replacement_leave']['Taken']);
		$this->xlsWriteLabel(($row_count+4), 8, '');
		$this->xlsWriteLabel(($row_count+4), 9, $info['replacement_leave']['Forfeit']);
		$this->xlsWriteLabel(($row_count+4), 10, '');
		$this->xlsWriteLabel(($row_count+4), 11, $info['replacement_leave']['balance']);
		//Leave summary
		
		//All Leave Summary 
		$this->xlsWriteLabel(($row_count+7), 0, 'All Leave Summary ');
		$this->xlsWriteLabel(($row_count+8), 0, 'User');
		$this->xlsWriteLabel(($row_count+8), 1, 'MT');
		$this->xlsWriteLabel(($row_count+8), 2, 'MR');
		$this->xlsWriteLabel(($row_count+8), 3, 'CL');
		$this->xlsWriteLabel(($row_count+8), 4, 'HL');
		$this->xlsWriteLabel(($row_count+8), 5, 'EX');
		$this->xlsWriteLabel(($row_count+8), 6, 'PT');
		$this->xlsWriteLabel(($row_count+8), 7, 'AD');
		$this->xlsWriteLabel(($row_count+8), 8, 'LS');
		$this->xlsWriteLabel(($row_count+8), 9,'AB');
		
		$this->xlsWriteLabel(($row_count+9), 0, $info['all_leave_summary']['username']);
		$this->xlsWriteLabel(($row_count+9), 1, $info['all_leave_summary']['MT']);
		$this->xlsWriteLabel(($row_count+9), 2, $info['all_leave_summary']['MR']);
		$this->xlsWriteLabel(($row_count+9), 3, $info['all_leave_summary']['CL']);
		$this->xlsWriteLabel(($row_count+9), 4, $info['all_leave_summary']['HL']);
		$this->xlsWriteLabel(($row_count+9), 5, $info['all_leave_summary']['EX']);
		$this->xlsWriteLabel(($row_count+9), 6, $info['all_leave_summary']['PT']);
		$this->xlsWriteLabel(($row_count+9), 7, $info['all_leave_summary']['AD']);
		$this->xlsWriteLabel(($row_count+9), 8, $info['all_leave_summary']['LS']);
		$this->xlsWriteLabel(($row_count+9), 9, $info['all_leave_summary']['AB']);
		//All Leave Summary 
		
		//Leave Info
		if(count($info['leave_info'])>0){
			$this->xlsWriteLabel(($row_count+12), 0, 'Leave Information');
			$this->xlsWriteLabel(($row_count+13), 0, 'Date Applied');
			$this->xlsWriteLabel(($row_count+13), 1, 'Relieve');
			$this->xlsWriteLabel(($row_count+13), 2, 'Leave Type');
			$this->xlsWriteLabel(($row_count+13), 3, 'Leave Date');
			$this->xlsWriteLabel(($row_count+13), 4, 'Days');
			$this->xlsWriteLabel(($row_count+13), 5, 'Status');
			$this->xlsWriteLabel(($row_count+13), 6, 'Reason');
			$status='';
			$i=($row_count+14);
			foreach($info['leave_info'] as $row){
				if($row['status']==0){
					$status='Pending';
				}else if($row['status']==1){
					$status='Approved';
				}else if($row['status']==2){
					$status='Rejected';
				}else if($row['status']==5){
					$status='Cancellation Pending';
				}else if($row['status']==4){
					$status='Cancelled';
				}else{
					$status='Recommended';
				}
				
				$this->xlsWriteLabel($i, 0, $row['date_applied']);
				$this->xlsWriteLabel($i, 1, $row['r_name']);
				$this->xlsWriteLabel($i, 2, $row['type']);
				$this->xlsWriteLabel($i, 3, $row['start_date']);
				$this->xlsWriteLabel($i, 4, $row['no_days']);
				$this->xlsWriteLabel($i, 5, $status);
				$this->xlsWriteLabel($i, 6, $row['reason']);
			
				$i++;
			}
		}
		//Leave Info
		
        $this->xlsEOF();
        exit();
	}
}

?>