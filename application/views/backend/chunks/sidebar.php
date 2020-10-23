<aside class="main-sidebar"><?php $uri_array = $this->uri->segment_array(); ?>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image" style="border-radius: 16px; background: white;">
                <img src="assets/images/logos/favicon.ico" class="img-circle" alt="User Image"  style="width: 30px;">
            </div>
            <div class="pull-left info">
                <p><?= ucfirst($this->manager['user']['perfil'])?></p>
                <!-- Status -->
                <a href="manager/perfil/editar"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
		</div>
		
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MÓDULOS</li>
            
            <?php foreach($mods as $mod){
				if($mod['idmodulo'] != 1){
			?>			
				<li class="<?= (in_array($mod['url'],$this->uri->segment_array()) ? 'active' : '')?>">
					<a href="manager/<?= $mod['url'] ?>">
						<i class="<?= $mod['icono']?>"></i>
						<span><?= $mod['modulo']?></span>
					</a>
				</li> 
				<?php } else { ?>
                <li class="<?= in_array('paginas', $uri_array) ? 'active' : ''?> treeview">
                    <a href="#">
						<i class="<?= $mod['icono']?>"></i> 
						<span><?= $mod['modulo']?></span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
                    </a>
                    <ul class="treeview-menu">
						<?php foreach($pags as $pag){
							//print_r($pag['hijos']);
						?>
							<?php if ( isset($pag['hijos']) ): ?>
							
							<!-- si tiene hijos -->
							<?php 
								$key = null;
								$active = "";
								foreach ($pag['hijos'] as $key => $hijo) {
									if (in_array($hijo['idpagina'], $this->uri->segment_array()) ) {
									   $active = 'active';
									   break; 
									}
								}
							?> 
							<li class="<?= $active ?> treeview">
								<a href="#">
									<i class="glyphicon glyphicon-duplicate" aria-hidden="true"></i>
									<span><?= $pag['pagina']?></span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i> 
									</span>
								</a>
								<ul class="treeview-menu">
									<?php
									$key = null;
									foreach ($pag['hijos'] as $key => $hijo): ?>
										<li class="<?= in_array($hijo['idpagina'], $this->uri->segment_array()) ? 'active' : '' ?>">
											<a href="manager/paginas/0/0/<?= $hijo['idpagina']?>">
												<i class="glyphicon glyphicon-duplicate"></i> 
												<span><?= $hijo['pagina']?></span>
											</a>
										</li>
									<?php endforeach ?>                             
								</ul>
							</li>						
							<?php else: ?>   
							<li class="<?= in_array($pag['idpagina'], $this->uri->segment_array()) ? 'active' : '' ?>">
								<a href="manager/paginas/0/0/<?= $pag['idpagina']?>">
									<i class="glyphicon glyphicon-duplicate"></i> 
									<span><?= $pag['pagina']?></span>
								</a>
							</li>
							<?php endif ?>
						<?php } ?> 
                    </ul>
                </li>               
                <?php } } ?>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
