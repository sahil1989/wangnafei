
<h5 style="font-weight: 400;border-bottom: 2px solid #0067AB;padding-bottom: 8px;">Passenger Details</h5>
<table class="table table-striped table-booking-history">
	<tr >         
		<th>S. No</th>
		<th>Name</th>
		<th>Phone No.</th>
		<th>Date of Birth</th>
		
	</tr>
	<?php
	$sno = 1;
	if(is_array($CustomerInfo)) {
		foreach ($CustomerInfo as $CustomerDetails) {
			$Customer = $CustomerDetails->Customer;
			$GivenName = $Customer->PersonName->GivenName;
			$Surname = $Customer->PersonName->Surname;
			$Telephone = $Customer->Telephone->PhoneNumber;
		
			if(isset($Customer->BirthDate)) {
				$BirthDate = $Customer->BirthDate;
			}
			else {
				$BirthDate=$_POST['adt_dob'][$sno-1];
				$BirthDate = date("Y-m-d", strtotime(str_replace("-","/",$BirthDate)));
			}
			
			
			?>
			<tr>

				<td><?php echo $sno; ?>  </td>
				<td><?php echo $GivenName.' '.$Surname; ?>  </td>
				<td><?php echo $Telephone; ?></td>
				<td><?php echo $BirthDate; ?></td>
				
			</tr>
			<?php
			$sno++;
		}
	}
	else {
		$Customer = $CustomerInfo->Customer;
		$GivenName = $Customer->PersonName->GivenName;
		$Surname = $Customer->PersonName->Surname;
		$Telephone = $Customer->Telephone->PhoneNumber;
		$BirthDate = $_POST['adt_dob'][$sno-1];
		$BirthDate = date("Y-m-d", strtotime(str_replace("-","/",$BirthDate)));
		?>
		<tr>
			<td><?php echo $sno; ?>  </td>
			<td><?php echo $GivenName.' '.$Surname; ?>  </td>
			<td><?php echo $Telephone; ?></td>
			<td><?php echo $BirthDate; ?></td>
			
		</tr>
		<?php
	}
	?>
	
</table>
	
</div>
