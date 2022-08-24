<style>
    .notActive{
        filter: grayscale(75%);
    }
</style>
    <div class="row ">
        <div class="col-md-5">
            <div class="row">
                <div class="col">
                    <img class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px;" src="<?php echo base_url('')?>/public/assets/sin-foto.jpg" />
                </div>
            </div><br>            
            <div class="row text-center">
                <br>
                <div class="col">
                    <span>Calificación general</span>
                </div>
            
                <div class="col">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
        </div>
        <div class="col-md-7">            
            <div class="card bottom30 text-center">
                <div class="card-header">
                    <h4><?= session()->get('nombre') ?></h4>
                </div>                
            </div>
            <div class="card bottom30">                
                <div class="card-body"> 
                    <p class="card-text">Ingrese informacion relevante de su empresa.</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-7">
                    <h4>Ingrese redes sociales</h4>
                    <div class="form-group input-group align-items-center">            
                        <a id="rrssF" class="btn btn-outline-primary border-0 notActive " title="Facebook" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/facebook.png" class="img-fluid"></a>	
                        <a id="rrssL" class="btn btn-outline-info border-0 notActive " title="Linkedin" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/linkedin.png" class="img-fluid"></a>											
                        <a id="rrssI" class="btn btn-outline-info border-0 notActive " title="Instagram" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/instagram.png" class="img-fluid"></a>											    
                    </div>
                </div> 
            </div>
        </div>
    </div>

<script>
    

</script>