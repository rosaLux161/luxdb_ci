<?php echo form_open('customer/search/sent', 'class = "form-inline"'); ?>
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
		'value'=> 'Kunde suchen',
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
					<th scope="col">Kunde ändern</th>
					<th scope="col">Aufträge anzeigen</th>
					<th scope="col">Auftrsg erstellen</th>
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
				<td>
				<form action="'.base_url().'index.php/customer/show" method="post">
					<button name="id" value="'.$row->customerid.'">anzeigen</button>
				</form>
				</td>
				<td>
				<form action="'.base_url().'index.php/contract/show/id" method="post">
					<button name="id" value="'.$row->customerid.'">anzeigen</button>
				</form>
				</td>
				<td>
				<form action="'.base_url().'index.php/customer/show" method="post">
					<button name="id" value="'.$row->customerid.'">anzeigen</button>
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