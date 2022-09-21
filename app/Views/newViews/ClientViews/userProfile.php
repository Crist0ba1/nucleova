
	<div class="container cont60">
    <div class="row">
        <div class="col-sm-3 top30 bottom20">
            <h3>Mi perfil</h3>
        </div>
    </div>    
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Perfil</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="records-tab" data-toggle="tab" data-target="#records" type="button" role="tab" aria-controls="records" aria-selected="false">Antecedentes</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="information-tab" data-toggle="tab" data-target="#information" type="button" role="tab" aria-controls="information" aria-selected="false">Información Empresa</button>
				</li>
			</ul>			
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<?php
						include("userProfileTab.php");
					?> 
				</div>
				<div class="tab-pane fade" id="records" role="tabpanel" aria-labelledby="records-tab">
					<?php
						include("userRecordsTab.php");
					?> 
				</div>
				<div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
					<?php
						include("userInformationTab.php");
					?> 
				</div>
			</div>
		</div>
	</div>    
</div>
        

