
		<div class="main">
			<div id="content">
				<h3 id='form_head'>Kunde hinzufügen</h3>
				<br/>
				<div id="form_input">
					<?php
						echo form_open('customer/add/sent');
						
						echo form_label('Nachname:', 'surname');
						$data= array(
						'name' => 'surname',
						'placeholder' => 'Nachname',
						);
						echo form_input($data);

						echo form_label('Vorname:', 'firstname');
						$data= array(
						'name' => 'firstname',
						'placeholder' => 'Vorname',
						);
						echo form_input($data);
						echo '<br>';

						echo form_label('Geschlecht:', 'gender');
                        $data = array(
                            'name'          => 'gender',
                            'id'            => 'gender',
                            'value'         => 'm',
                            'checked'       => FALSE,
                            'style'         => 'margin:10px'
                        );
						echo form_radio($data).'weiblich';
						$data = array(
                            'name'          => 'gender',
                            'id'            => 'gender',
                            'value'         => 'w',
                            'checked'       => FALSE,
                            'style'         => 'margin:10px'
                        );
						echo form_radio($data).'männlich';
						$data = array(
                            'name'          => 'gender',
                            'id'            => 'gender',
                            'value'         => 'd',
                            'checked'       => FALSE,
                            'style'         => 'margin:10px'
                        );
                        echo form_radio($data).'divers';
						?>
				</div>
				
				<div id="form_button">
					<?php
						$data = array(
						'type' => 'submit',
						'value'=> 'Kunde hinzufügen',
						'class'=> 'submit'
						);
						echo form_submit($data); ?>
				</div>
				
				<?php echo form_close();?>
				
				<?php if(isset($surname) && isset($firstname)){
					echo 
					'<div>
					<h3>Ihre Eingabe:</h3><br/>
					Nachname: '.$surname.'<br>
					Vorname: '.$firstname.'<br>
					Geschlecht: '.$gender.'
					</div>';
					} ?>
			</div>
		</div>
