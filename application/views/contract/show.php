<?php
					if(isset($result)){
                        echo form_open('contract/update');
                        
                        echo form_label('Kundennummer:', 'kid');
						$data= array(
						'name' => 'kid',
                        'class' => 'input_box',
                        'value' => $result[0]->customerid,
                        'readonly' => TRUE
						);
						echo form_input($data);

                        
                        echo form_label('Auftragsnummer:', 'aid');
						$data= array(
						'name' => 'aid',
                        'class' => 'input_box',
                        'value' => $result[0]->contractid,
                        'readonly' => TRUE
						);
						echo form_input($data);

						echo form_label('Details:', 'details');
						$data= array(
						'name' => 'details',
						'placeholder' => 'Nachname',
                        'class' => 'input_box',
                        'value' => $result[0]->details
						);
						echo form_input($data);

						$data = array(
						'type' => 'submit',
						'value'=> 'Daten ändern',
						'class'=> 'submit'
						);
                        echo form_submit($data); 
                        echo form_close();
                        //delete cust
                        echo form_open('contract/delete');
                        echo form_hidden('aid', $result[0]->contractid);
                        $data = array(
                            'type' => 'submit',
                            'value'=> 'Löschen',
                            'class'=> 'submit',
                            );
                        echo form_submit($data); 
                        echo form_close();
                        } 
						?>

