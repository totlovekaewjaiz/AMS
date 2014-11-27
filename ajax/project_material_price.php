<?php
	require_once("../config/constant.php");
	require_once("../library/login_check.php");

	$action = $_POST["action"];
	
	/*if($action == "loadMaterialPrice") {
		include("../tools/material_price_info.php");
	}
*/

	if($action == "changePage") {
		$ProjectID	=	$_POST['ProjectID'];
		$Project 	= 	new materialP( $ProjectID , $db );
		include("../tools/project_material_price_info.php");
		
	}

	
	
/*	if($action == "loadMaterialInfo") {
		
		$ProjectID = $_POST["ProjectID"];
		
		$Result =  $Loader->loadAllProjectMaterialTotal($ProjectID);
		
		?>
		<table border = '1' style = "border-collapse:collapse;width:100%">
		<tr>
		<th style = "width:30px;">No</th>
		<th style = "width:80px;">Material Name</th>
		<th style = "width:80px;">Total</th>
		<th style = "width:80px;">Estimate Total</th>
		<th style = "width:80px;">Price / Unit</th>
		<th style = "width:80px;">Total Price</th>
		<th style = "width:80px;">Estimate Price</th>
		<th style = "width:80px;">Updated by</th>
		<th style = "width:80px;">Updated date</th>
		</tr>
		<?
			if(count($Result) == 0) {
				?>
				<tr>
				<td colspan = '9' class = "noAbility" >No Material Info</td>
				</tr>
				<?
			} else {
				$rowNo = 0;
				foreach($Result as $MaterialID => $MaterialValue ) {
					
					if($rowNo%2 == 0) {
						/*changePage( '<? echo $MaterialID; ?>' )*/
			/*			?>
						<tr class = "tableRow" onclick = "loadMaterialPrice( '<? echo $MaterialID; ?>')">
						<?
					} else {
						/*changePage( '<? echo $MaterialID; ?>' )*/
		/*				?>
						<tr onclick = "loadMaterialPrice( '<? echo $MaterialID; ?>')">
						<?
					}
					
					$rowNo++;
					
					$Material = new Material($MaterialID , $db );
					?>
					<td class = "tableDataCenter"><? echo $rowNo;?></td>
					<td class = "tableDataCenter"><? echo $Material->MaterialName; ?></td>
					<td class = "tableDataCenter">
					<?
						if($Material->MaterialType == "Finish") {
							echo ceil($MaterialValue/ ($Material->MaterialWidth	* $Material->MaterialHeight) );
						} else {
							echo $MaterialValue;
						}
					?>
					</td>
					<td class = "tableDataCenter"></td>
					<td class = "tableDataCenter"></td>
					<td class = "tableDataCenter"></td>
					<td class = "tableDataCenter"></td>
					<td class = "tableDataCenter"></td>
					<td class = "tableDataCenter"></td>
					</tr>
					<?
				}
			}
		?>
		</table>
		<?
	}*/
	
	
?>
