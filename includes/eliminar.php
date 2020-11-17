<?php 
            
            
            $usuarioP="jeltex";

          
                class EliminarClass extends DB{
                            public function eliminar(){
                                global $placaE;
                                global $usuarioP;
                                $query = $this->connect()->prepare('DELETE FROM revisiones WHERE placa= :placaI AND empresa = :empresaI');
                                    $query->execute(['placaI' => $placaE, 'empresaI' => $usuarioP]);
                                   $clientes = $query->rowCount();
                                 if (!empty($clientes)) {
                                     
                                    echo "Registro Eliminado Satisfactoriamente";
                                    
                                    } else {
                                      
                                echo "Error eliminando registro: ";
                                print $query->errorCode();
                                    } 
          
                                     
                                   
                            }
                            
                            
                        }
            
                
?>