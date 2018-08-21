

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        	<?php
    $week = 1;
    for($i=1;$i<=date('t');$i++) {
        $day_week = date('N', strtotime(date('Y-m').'-'.$i));
        $calendar[$week][$day_week] = $i;
        if ($day_week == 7) { $week++; };
    }
  
?>
        <table border="1">
            <tr>
        
           
            	    <?php foreach ($calendar as $days) : ?>
   
                <td>Lun</td>
                <td>Mar</td>   
                <td>Mie</td>   
                <td>Jue</td>   
                <td>Vie</td>   
                <td>Sáb</td>   
                <td>Dom</td>   
          
             <?php endforeach ?>
        
        </tr>
        <tr>
        
            <?php foreach ($calendar as $days) : ?>
                
                    <?php for ($i=1;$i<=7;$i++) : ?>
                        <td>
                            <?php echo isset($days[$i]) ? $days[$i] : ''; ?>
                        </td>
                    <?php endfor; ?>
                
            <?php endforeach ?>
        </tr>
        </table> 
    </body>
</html>
