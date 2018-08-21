<?php
    use app\models\Instancias;
    use yii\db\Query;
?>

<h4 style="text-align: center; margin-top: -10px; font-weight: bold;">Instancias vs Instancias Reservadas</h4>

<table class="table table-hover table-bordered table-striped" style="margin-left: -3%; text-align: center;">
    <thead class="ho">
        <tr>
    <!--1--><th rowspan="2" style="text-align: center;">#</th>
    <!--2--><th rowspan="2" style="text-align: center;">Tipo de Instancia</th>
            <th colspan="2" style="text-align: center;">Windows</th>
            <th colspan="2" style="text-align: center;">Windows with SQL</th>
            <th colspan="2" style="text-align: center;">LINUX/UNIX</th>
            <th colspan="2" style="text-align: center;">SUSE LINUX</th>
            <th colspan="3" style="text-align: center;">Totales</th>
        </tr>
        <tr align="center" valign="middle"> 
    <!--3--><th>Instancias</th>
    <!--4--><th>Reservadas</th>
    <!--5--><th>Instancias</th>
    <!--6--><th>Reservadas</th>
    <!--7--><th>Instancias</th>
    <!--8--><th>Reservadas</th>
    <!--9--><th>Instancias</th>
    <!--10--><th>Reservadas</th>
    <!--11--><th>Instancias</th>
    <!--12--><th>Reservadas</th>
    <!--13--><th>Diferencia</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $totalFilas = count($tbl3);
            $i=1;
            foreach ($tbl3 as $fila3) {
            //////Instancias Reservadas////////////////////////////////////////////
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
            ->where("platform like '%Linux/UNIX%'")
            ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

            $suse = new Query;
            $suse->select('*')
            ->from('instancia_resv')
            ->where("platform like '%SUSE Linux%'")
            ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

            //////Instancias/////////////////////////////////////////////////////

            $windows_inst = new Query;
            $windows_inst->select('*')
            ->from('instancia')
            ->where("platform = 'Windows (Amazon VPC)'")
            ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

            $windowsSQL_inst = new Query;
            $windowsSQL_inst->select('*')
            ->from('instancia')
            ->where("platform = 'Windows with SQL Server Web (Amazon VPC)'")
            ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

            $unix_inst = new Query;
            $unix_inst->select('*')
            ->from('instancia')
            ->where("platform like '%Linux/UNIX%'")
            ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

            $suse_inst = new Query;
            $suse_inst->select('*')
            ->from('instancia')
            ->where("platform like '%SUSE Linux%'")
            ->andWhere(['instance_type' => $fila3['Tipo_instancia']]);

            $winResult = $windows_inst->count();
            $winSQLResult = $windowsSQL_inst->count();
            $unixResult = $unix_inst->count();
            $suseResult = $suse_inst->count();

            if ($winResult == 0) {
                $winResult = null;
            }
            if ($winSQLResult == 0) {
                $winSQLResult = null;
            }
            if ($unixResult == 0) {
                $unixResult = null;
            }
            if ($suseResult == 0) {
                $suseResult = null;
            }
        ?>
        <tr>
    <!--1--><td>#<?= $i ?></td>
    <!--2--><td><?= $fila3["Tipo_instancia"] ?></td>
    <!--3--><td><?= $winResult ?></td>
    <!--4--><td><?= $windows->sum('instance_count') ?></td>
    <!--5--><td><?= $winSQLResult ?></td>
    <!--6--><td><?= $windowsSQL->sum('instance_count') ?></td>
    <!--7--><td><?= $unixResult ?></td>
    <!--8--><td><?= $unix->sum('instance_count') ?></td>
    <!--9--><td><?= $suseResult ?></td>
    <!--10--><td><?= $suse->sum('instance_count') ?></td>
    <!--11--><td><?= $fila3["No_instancias"] ?></td>
    <!--12--><td><?= $fila3["No_Inst_Reserv"] ?></td>
    <!--13--><td><?= $fila3["Diferencia"] ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>