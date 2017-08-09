<html>
<head></head>
<body>
        
<?php $input = 7 ?>

<?php $special_number = round($input/2); ?>

<table border=1 cellspacing="11" cellpadding="11">
    <?php for($i=1; $i<=$input; $i++){ ?>
    <tr>
        <?php for($j=1; $j<=$input; $j++){ ?>
        <?php $eliminasi_atas_kanan = $special_number+$i  ?>
        <?php $eliminasi_atas_kiri = $special_number-$i  ?>
        <?php $eliminasi_bawah_kanan = ($input+$special_number+1)-$i  ?>
        <?php $eliminasi_bawah_kiri = $i-$special_number  ?>
            <?php if(
            			$j 	> 	$eliminasi_atas_kiri && 
            			$j 	< 	$eliminasi_atas_kanan && 
            			$j 	>	$eliminasi_bawah_kiri && 
            			$j	<	$eliminasi_bawah_kanan ){?>
                <td>
                    <?php echo $i ?>
                </td>
            <?php }else{ ?>
                <td>&nbsp;</td>
            <?php } ?>
        <?php } ?>
    </tr>
    <?php } ?>
</table>

</body>
</html>