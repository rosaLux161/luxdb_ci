<?php
					if(isset($result)){
                        echo base_url().'index.php/customer/show/'.$result[0]->customerid;
						echo form_open('customer/update');
                        
                        echo form_label('Kundennummer:', 'id');
						$data= array(
						'name' => 'id',
                        'class' => 'input_box',
                        'value' => $result[0]->customerid,
                        'readonly' => TRUE
						);
						echo form_input($data);

						echo form_label('Nachname:', 'surname');
						$data= array(
						'name' => 'surname',
						'placeholder' => 'Nachname',
                        'class' => 'input_box',
                        'value' => $result[0]->surname
						);
						echo form_input($data);

						echo form_label('Vorname:', 'firstname');
						$data= array(
						'name' => 'firstname',
						'placeholder' => 'Vorname',
                        'class' => 'input_box',
                        'value' => $result[0]->firstname
						);
						echo form_input($data);
						echo '<br>';

                        echo form_label('Geschlecht:', 'gender');
                            if($result[0]->gender == 'w'){
                                $data = array(
                                    'name'          => 'gender',
                                    'id'            => 'gender',
                                    'value'         => 'w',
                                    'checked'       => TRUE,
                                    'style'         => 'margin:10px'
                                );
                            }else{
                                $data = array(
                                    'name'          => 'gender',
                                    'id'            => 'gender',
                                    'value'         => 'w',
                                    'checked'       => FALSE,
                                    'style'         => 'margin:10px'
                                );
                            }
                            echo form_radio($data).'weiblich';
                            if($result[0]->gender == 'm'){
                                $data = array(
                                    'name'          => 'gender',
                                    'id'            => 'gender',
                                    'value'         => 'm',
                                    'checked'       => TRUE,
                                    'style'         => 'margin:10px'
                                );
                            }else{
                                $data = array(
                                    'name'          => 'gender',
                                    'id'            => 'gender',
                                    'value'         => 'm',
                                    'checked'       => FALSE,
                                    'style'         => 'margin:10px'
                                );
                            }
                            echo form_radio($data).'männlich';                            
                            if($result[0]->gender == 'd'){
                                $data = array(
                                    'name'          => 'gender',
                                    'id'            => 'gender',
                                    'value'         => 'd',
                                    'checked'       => TRUE,
                                    'style'         => 'margin:10px'
                                );
                            }else{
                                $data = array(
                                    'name'          => 'gender',
                                    'id'            => 'gender',
                                    'value'         => 'd',
                                    'checked'       => FALSE,
                                    'style'         => 'margin:10px'
                                );
                            }
                            echo form_radio($data).'divers';


						$data = array(
						'type' => 'submit',
						'value'=> 'Daten ändern',
						'class'=> 'submit'
						);
                        echo form_submit($data); 
                        echo form_close();
                        //delete cust
                        echo form_open('customer/delete');
                        echo form_hidden('id', $result[0]->customerid);
                        $data = array(
                            'type' => 'submit',
                            'value'=> 'Löschen',
                            'class'=> 'submit',
                            );
                        echo form_submit($data); 
                        echo form_close();
                        } 
						?>

