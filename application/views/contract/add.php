
		<div class="main">
			<div id="content">
				<h3 id='form_head'>Auftrag hinzufügen</h3>
				<br/>
				<div id="form_input">
					<?php
						echo form_open('contract/add_sent');
						
						echo form_label('Kundennummer:', 'kid');
						$data= array(
						'name' => 'kid',
						'placeholder' => '123',
						'class' => 'input_box'
						);
						echo form_input($data);

						echo form_label('Details:', 'details');
						$data= array(
						'name' => 'details',
						'placeholder' => 'Lorem Ipsum....',
						'class' => 'input_box'
						);
						echo form_input($data);
						echo '<br>';
					?>
						
				</div>
				
				<div id="form_button">
					<?php
						$data = array(
						'type' => 'submit',
						'value'=> 'Auftrag hinzufügen',
						'class'=> 'submit'
						);
						echo form_submit($data); ?>
				</div>
				
				<?php echo form_close();?>
				
				<?php if(isset($details) && isset($customerid)){
					echo 
					'<div>
					<h3>Ihre Eingabe:</h3><br/>
					Nachname: '.$customerid.'<br>
					Vorname: '.$details.'
					</div>';
					} ?>
			</div>
		</div>
