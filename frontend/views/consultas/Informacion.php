


<div style="width: 118%; display: inline-block; margin-top: -2%; margin-left: -9%;">
	<div style="width: 90%; display: inline-flex; margin-left: 5%;">
		<div style="width: 50%;">
			<h4 style="text-align: center; margin-top: 5%; font-weight: bold;">Main_Virginia Instancias vs Instancias Respaldadas</h4>
			<table class="table table-hover table-bordered table-striped input-lg" style="text-align: center;">
				<thead class="ho">
					<th style="text-align: center;">Instancias</th>
					<th style="text-align: center;">AMIs</th>
					<th style="text-align: center;">Diferencia</th>
				</thead>
				<tbody>
					<td style="font-size: 40px;"><?php echo $inst ?></td>
					<td style="font-size: 40px;"><?php echo $amis ?></td>
					<td style="font-size: 40px;"><?php echo $dif ?></td>
					
					<!--agregar foreach
					<td>< ?= $fila['Instancias'] ?></td>
                    <td>< ?= $fila['AMIs'] ?></td> //Fila de la consulta general de ConsultasController
                    <td>< ?= $fila['Diferencia'] ?></td>-->
				</tbody>
			</table>
		</div>

		<div style="width: 50%; margin-left: 5%;">
			<h4 style="text-align: center; margin-top: 5%; font-weight: bold;">Main_Virginia Diferencia Volumenes vs Snapshots</h4>
			<table class="table table-hover table-bordered table-striped input-lg" style="text-align: center;">
				<thead class="ho">
					<th style="text-align: center;">Volumenes</th>
					<th style="text-align: center;">Snapshots</th>
					<th style="text-align: center;">Diferencia</th>
				</thead>
				<tbody style="font-size: 40px;">
					<td><?php echo $mainVolumenes ?></td>
					<td><?php echo $mainSnaps ?></td>
					<td><?php echo $mainVolVsSnapsDiferencia ?></td>
					
					<!--agregar foreach
					<td>< ?= $fila2['Volumenes'] ?></td>
                    <td>< ?= $fila2['Snapshots'] ?></td> //Fila de la consulta general de ConsultasController
                    <td>< ?= $fila2['Diferencia'] ?></td>-->
				</tbody>
			</table>
		</div>
	</div>
	<div style="width: 50%; margin: auto;">
		<h4 style="text-align: center; font-weight: bold;">Main_Oregon</h4>
		<table class="table table-hover table-bordered table-striped input-lg" style="text-align: center;">
			<thead class="ho">
				<th style="text-align: center;">Instancias</th>
				<th style="text-align: center;">Volumenes</th>
				<th style="text-align: center;">AMIs</th>
				<th style="text-align: center;">Snapshots</th>
			</thead>
			<tbody style="font-size: 40px;">
				<td><?= $total_inst_oregon ?></td>
				<td>0</td>
				<td><?= $totalAmis ?></td>
				<td><?= $totalSnaps ?></td>
			</tbody>
		</table>
	</div>

	<div style="width: 50%; margin: auto; margin-top: 3%;">
		<h4 style="text-align: center; font-weight: bold;">Backup_Oregon</h4>
		<table class="table table-hover table-bordered table-striped" style="text-align: center;">
			<thead class="ho">
				<th style="text-align: center;">Instancias</th>
				<th style="text-align: center;">Volumenes</th>
				<th style="text-align: center;">AMIs</th>
				<th style="text-align: center;">Snapshots</th>
			</thead>
			<tbody style="font-size: 40px;">
				<!--<td>< ?= $backupTotalInst ?></td>
				<td>< ?= $backupTotalVolumenes ?></td>
				<td>< ?= $backupTotalAmis ?></td>
				<td>< ?= $backupTotalSnaps ?></td>-->
			</tbody>
		</table>
	</div>
</div>