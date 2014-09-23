
<?php echo $this->element('applicant_menu'); 
echo "<script>var dateObject = " . json_encode($dates) . ';</script>';
?>
<div class="date-selector">
	<form id="mapForm"> 
		<div class="select-date"> 
			<select id="selectpicker" onchange="onSelectChange()">
			</select>
		</div> <!-- end of select -->
		<div class="map"> 
			<div id="map-canvas"></div>
			<h4>Cliquez sur le Markeur pour avoir l'adresse !</h4>
			<button type="submit" class="btn btn-primary">Valider</button>
		</div> <!-- end of map -->
	</form> 
</div> <!-- end of date-selector -->
<?php echo $this->Html->script(array('map')); ?>