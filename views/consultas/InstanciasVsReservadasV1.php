<?php
    use app\models\Instancias;
    use yii\db\Query;
?>

<h4 style="text-align: center; margin-top: -10px; font-weight: bold;">Instancias vs Instancias Reservadas</h4>

    <div style="width: 118%; display: inline-flex; margin-left: -9%;">
        <div style="width: 48%;">
            <table class="table table-hover table-bordered table-striped input-sm">
                <thead class="ho">
                    <th>#</th>
                    <th>Tipo Instancia</th>
                    <th>Número Instancias</th>
                    <th>Windows</th>
                    <th>Windows SQL Server</th>
                    <th>UNIX</th>
                    <th>SUSE</th>
                    <th>Instancias Reservadas</th>
                    <th>Diferencia</th>
                </thead>
                <tbody>
                        
                    <?php 
                    $totalFilas = count($tbl3);
                    $i=1;
                    foreach ($tbl3 as $fila3) {
                        $windows = new Query;
                        $windows->select('*')
                        ->from('instancia_resv')
                        ->where("platform = 'Windows (Amazon VPC)'")
                        ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

                        $windowsSQL = new Query;
                        $windowsSQL->select('*')
                        ->from('instancia_resv')
                        ->where("platform = 'Windows with SQL Server Web (Amazon VPC)'")
                        ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

                        $unix = new Query;
                        $unix->select('*')
                        ->from('instancia_resv')
                        ->where("platform = 'Linux/UNIX (Amazon VPC)'")
                        ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

                        $suse = new Query;
                        $suse->select('*')
                        ->from('instancia_resv')
                        ->where("platform = 'SUSE Linux (Amazon VPC)'")
                        ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);
                    ?>
                    <tr>
                        <td>#<?= $i ?></td>
                        <td><?= $fila3["Tipo_instancia"] ?></td>
                        <td><?= $fila3["No_instancias"] ?></td>
                        <td><?= $windows->sum('instance_count') ?></td>
                        <td><?= $windowsSQL->sum('instance_count') ?></td>
                        <td><?= $unix->sum('instance_count') ?></td>
                        <td><?= $suse->sum('instance_count') ?></td>
                        <td><?= $fila3["No_Inst_Reserv"] ?></td>
                        <td><?= $fila3["Diferencia"] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>

        <div style="width: 48%; margin-left: 5%;">
            <table class="table table-hover table-bordered table-striped input-sm">
                <thead class="ho">
                    <th>#</th>
                    <th>Tipo Instancia</th>
                    <th>Número Instancias</th>
                    <th>Windows</th>
                    <th>Windows SQL Server</th>
                    <th>UNIX</th>
                    <th>SUSE</th>
                    <th>Instancias Reservadas</th>
                    <th>Diferencia</th>
                </thead>
                <tbody>
                    <?php $i=$totalFilas+1;
                    foreach ($tbl3_1 as $fila4) {
                        $windows = new Query;
                        $windows->select('*')
                        ->from('instancia_resv')
                        ->where("platform = 'Windows (Amazon VPC)'")
                        ->andWhere(['instance_type' => $fila4['Tipo_instancia']]);

                        $windowsSQL = new Query;
                        $windowsSQL->select('*')
                        ->from('instancia_resv')
                        ->where("platform = 'Windows with SQL Server Web (Amazon VPC)'")
                        ->andWhere(['instance_type' => $fila4['Tipo_instancia']]);

                        $unix = new Query;
                        $unix->select('*')
                        ->from('instancia_resv')
                        ->where("platform like '%Linux/UNIX%'")
                        ->andWhere(['instance_type' => $fila4['Tipo_instancia']]);

                        $suse = new Query;
                        $suse->select('*')
                        ->from('instancia_resv')
                        ->where("platform = 'SUSE Linux (Amazon VPC)'")
                        ->andWhere(['instance_type' => $fila4['Tipo_instancia']]);
                    ?>
                    <tr>
                        <td>#<?= $i ?></td>
                        <td><?= $fila4["Tipo_instancia"] ?></td>
                        <td><?= $fila4["No_instancias"] ?></td>
                        <td><?= $windows->sum('instance_count') ?></td>
                        <td><?= $windowsSQL->sum('instance_count') ?></td>
                        <td><?= $unix->sum('instance_count') ?></td>
                        <td><?= $suse->sum('instance_count') ?></td>
                        <td><?= $fila4["No_Inst_Reserv"] ?></td>
                        <td><?= $fila4["Diferencia"] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>