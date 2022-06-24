<?php
    include("baseLogged.php");
?>   
<div class="container cont60">
    <div class="row">
        <div class="col-sm-3 top30 bottom20">
            <h3>Perfil Cliente</h3>
        </div>
    </div>    
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="information-tab" data-bs-toggle="tab" data-bs-target="#information" type="button" role="tab" aria-controls="information" aria-selected="true">Información</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="records-tab" data-bs-toggle="tab" data-bs-target="#records" type="button" role="tab" aria-controls="records" aria-selected="false">Antecedentes</button>
				</li>				
			</ul>			
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="profile-tab">
					<?php
						include("clientInformationTab.php");
					?> 
				</div>
				<div class="tab-pane fade" id="records" role="tabpanel" aria-labelledby="records-tab">
					<?php
						include("clientRecordsTab.php");
					?> 
				</div>
			</div>
		</div>
	</div>    
</div>
        

