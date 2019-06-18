<?php echo form_open('contract/search/sent', 'class = "form-inline"'); ?>
	<div class="form-group">
<?php
	echo form_label('RMA-Nummer: ', 'aid');
	$data= array(
		'name' => 'aid',
		'placeholder' => '123',
		'class' => 'form-control'
	);
	echo form_input($data);
?>
	</div>
<?php
	$data = array(
		'type' => 'submit',
		'value'=> 'Auftrag suchen',
		'class'=> 'btn-icon-split'
	);
	echo form_submit($data);
	echo form_close();
?>
<?php if(isset($result)){
	echo'
		<table class="table">
			<thead>
				<tr>
					<th scope="col"># Auftragsnummer</th>
					<th scope="col"># Kundennummer</th>
					<th scope="col">Details</th>
					<th scope="col">Auftrag bearbeiten ändern</th>
				</tr>
			</thead>
			<tbody>
	';
	foreach ($result as $row){
		echo '
			<tr>
				<th scope="row">'.$row->contractid.'</th>
				<td>'.$row->customerid.'</td>
				<td>'.$row->details.'</td>
				<td>
				<form action="'.base_url().'index.php/contract/show" method="post">
					<button name="id" value="'.$row->contractid.'">anzeigen</button>
				</form>
				</td>
			</tr>
		';
	}
	echo '
			</tbody>
		</table>
	';
	}
?>