<div class="section">
    <div class="row justify-content-center">
        <div class="col-10">    
            <h4>Eliminar usuarios</h4>
            <div id="verUSuarios">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo de usuario</th>
                        <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ussers as $row):?>
                            <?php if($row['tipo'] != 0):?>
                            <tr>
                                <td><?php echo $row['firstname']?></td>
                                <?php if($row['tipo'] == 1):?>
                                    <td>Cliente</td>
                                <?php elseif($row['tipo'] == 2):?>
                                    <td>Persona natural</td>
                                <?php elseif($row['tipo'] == 3):?>
                                    <td>Empresa</td>
                                <?php endif;?>                            
                                <td><button class="btn btn-danger" onclick="deletefunction(<?php echo $row['idUssers']?>)">Eliminar</button></td>
                            </tr>
                            <?php endif;?>            
                        <?php endforeach;?>
                    </tbody>
                </table>
              
            </div>
        </div>
    </div>
</div>



<script>
    function deletefunction($id){
        alert("Desea elimnar"+ $id);
        var id = $id;
        $.ajax({
            url:"<?php echo base_url('/deleteUsser')?>",
            type: "POST",                        
            data:{id:$id},
            done:function(){
                alert("Lo hizo");
            },
            success:function(data){
                alert("llego bien");
                                
            },
            error : function(xhr) {
                alert('Error en la llamada AJAX');
            }
        });
    }
    <?php if(session()->getFlashdata('status')):?>
            <?php if(session()->getFlashdata('status')== true):?>
                alert("Usuario eliminado con exito");
            <?php else:?>
                alert("Error, Intente crear al usuario otra vez");
            <?php endif;?>
        <?php endif;?>
</script>