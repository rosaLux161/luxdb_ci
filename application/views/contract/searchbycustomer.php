<?php echo form_open('contract/searchbycustomer_sent', 'class = "form-inline"'); ?>
	<div class="form-group">
	<?php
	echo form_label('Nachname:', 'surname');
	$data= array(
		'name' => 'surname',
		'placeholder' => 'Nachname',
		'class' => 'form-control'
	);
	echo form_input($data);
?>
	</div>
<?php
	$data = array(
		'type' => 'submit',
		'value'=> 'Aufträge suchen',
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
					<th scope="col">#</th>
					<th scope="col">Nachname</th>
					<th scope="col">Vorname</th>
					<th scope="col">Details</th>
				</tr>
			</thead>
			<tbody>
	';
	foreach ($result as $row){
		echo '
			<tr>
				<th scope="row">'.$row->customerid.'</th>
				<td>'.$row->surname.'</td>
				<td>'.$row->firstname.'</td>
				<td>'.$row->details.'</td>
			</tr>
		';
	}
	echo '
			</tbody>
		</table>
	';
	}
?>