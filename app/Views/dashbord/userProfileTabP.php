<style>
    .notActive{
        filter: grayscale(75%);
    }
</style>
    <div class="row ">
        <div class="col-md-5">
            <div class="row">
                <div class="col">
                    <?php include("carrucelProveedor.php");?>
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
                    <p class="card-text"><?= session()->get('textEM') ?></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-7">
                    <h4>Ingrese redes sociales</h4>
                    <div class="form-group input-group align-items-center">            
                        <a id="rrssF1" class="btn btn-outline-primary border-0 notActive " title="Facebook" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/facebook.png" class="img-fluid"></a>	
                        <a id="rrssL1" class="btn btn-outline-info border-0 notActive " title="Linkedin" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/linkedin.png" class="img-fluid"></a>											
                        <a id="rrssI1" class="btn btn-outline-info border-0 notActive " title="Instagram" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/instagram.png" class="img-fluid"></a>											    
                    </div>
                </div> 
            </div>
        </div>
    </div>

<script>
    <?php if(session()->get('isComplete') == 0 ):?>

        <?php if(session()->has('rf')):?>
            <?php if(session()->get('rf') != ''):?>
                $("#rrssF1").attr("href", "<?php echo session()->get('rf')?>");
                $("#rrssF1").removeClass("notActive");
            <?php endif;?>        
        <?php endif;?>
        <?php if(session()->has('rl')):?>
            <?php if(session()->get('rl') != ''):?>
                $("#rrssL1").attr("href", "<?php echo session()->get('rl')?>");
                $("#rrssL1").removeClass("notActive");
            <?php endif;?>        
        <?php endif;?>
        <?php if(session()->has('ri')):?>
            <?php if(session()->get('ri') != ''):?>
                $("#rrssI1").attr("href", "<?php echo session()->get('ri')?>");
                $("#rrssI1").removeClass("notActive");
            <?php endif;?>        
        <?php endif;?>
    <?php endif;?>



      
</script>