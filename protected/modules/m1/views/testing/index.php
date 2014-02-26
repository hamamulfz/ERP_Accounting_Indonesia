<script>
$(document).ready(function() {
	DataProvide();
    ManipulationHere();
	
	$('table').delegate('input[type=text].onlyDate', 'focusin', function(event) {
		$(this).datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
     		changeYear: true,
			yearRange: '1972:2020',
		});
    });
	
	$('table').delegate('input[type=text].onlyMonth', 'focusin', function(event) {
		$(this).monthpicker();
    });
	
	$(".tabelBaru").change(function(){
		var value = $(this).attr('value');
	});
	
	/*$('a#generate').click(function(e) {
		e.preventDefault();
		$('#selVal').val('');
		var data = $('#selVal').val();
		$('.mycb:checked').each(function(i, el) {
		   data += el.name + ',';
		});
		var hasil = $('#selVal').val( data );
	});*/
	
	$('.mycb').click(function(){
		var text = $('#selVal').val(); 
		var $this = $(this);
		$('#lblStatus').removeClass('label label-warning');
		$('#lblStatus').removeClass('label label-success');
		if($this.is(':checked')){
			$('#selVal').val(text + $this.attr('value')+',');
			
			$('#lblData').html($this.attr('value'));
			$('#lblStatus').html('Added');
			$('#lblStatus').addClass('label label-success');
		}else{
			$('#selVal').val(text.replace($this.attr('name')+',', ''));
			
			$('#lblData').html($this.attr('value'));
			$('#lblStatus').html('Removed');
			$('#lblStatus').addClass('label label-warning');
		}
	});

}); //Tutup Document Ready


function ManipulationHere(){	
	var count = 1;
	$(".button").click(function(){
		count += 1;
		var $row = $('<tr>' 
		+ '<td>' + '</td>'
			+ '<td>' + '<select id="data3_' + count + '" name="data3_' + count + '"><option>=</option><option>&lt;</option><option>&gt;</option></select>' + '</td>'
			+ '<td>' + '<input id="data2_' + count + '" type="text" name="data2_' + count + '" class="data2" />' + '</td>'
			+ '<td>' + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden">'
			+ '<a href="javascript:void(0);" class="remCF">Remove</a>' + '</td>'
		+ '</tr>').appendTo("#customFields");
		var copyData = $("#data1_1").clone();
		var repID = copyData.attr('id', 'data1_' + count + '');
		var repName = copyData.attr('name', 'data1_' + count + '');
		
		$row.find('td:first').append(repID)
		var check = $row.find('td:first').html();
		var get = $(check).attr('id')
	});

    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
		count -= 1;
    });

    $("#customFields").on('change', '.tabelBaru', function() {
		
		/*var validator = $("#signupForm").validate();
		validator.resetForm();*/

		var $this = $(this),
		nilai = $this.val();
		
		var cariYangText = $(this).closest("tr").find(".data2").attr('id');
		var cariYangTahun = $(this).closest("tr").find(".onlyDate").attr('id');
		var cariYangBulan = $(this).closest("tr").find(".onlyMonth").attr('id');
		
		if(cariYangText==null){
			var xx1 = $this.closest("tr").find(".data2").attr('name');
			var xx2 = $this.closest("tr").find(".onlyDate").attr('name');
			var xx3 = $this.closest("tr").find(".onlyMonth").attr('name');
			if(xx1!=null){
				$this.closest("tr").find(".data2").replaceWith(
					'<input type="text" id='+xx1+' name='+xx1+' value="" class="data2"/>'
				)		
			}
			if(xx2!=null){
				$this.closest("tr").find(".onlyDate").replaceWith(
					'<input type="text" id='+xx2+' name='+xx2+' value="" class="data2"/>'
				)		
			}
			if(xx3!=null){
				$this.closest("tr").find(".onlyMonth").replaceWith(
					'<input type="text" id='+xx3+' name='+xx3+' value="" class="data2"/>'
				)		
			}
		}
		
		
		
		if(nilai=='gender'){
			$this.closest("tr").find(".data2").replaceWith(
				'<select name="data2_' + count + '" class="data2">'
					+ '<option value="man" selected >Man</option>'
					+ '<option value="woman">Woman</option>'
				+ '</select>'
			)
		}
		else if(nilai=='religion'){
			$this.closest("tr").find(".data2").replaceWith(
				'<select name="data2_' + count + '" class="data2">'
					+ '<option value="protestan" selected >Protestan</option>'
					+ '<option value="khatolik">Khatolik</option>'
					+ '<option value="islam">Islam</option>'
					+ '<option value="budha">Budha</option>'
					+ '<option value="hindu">Hindu</option>'
				+ '</select>'
			)
		}
		else if(nilai=='blood'){
			$this.closest("tr").find(".data2").replaceWith(
				'<select name="data2_' + count + '" class="data2">'
					+ '<option value="gol_a" selected >A</option>'
					+ '<option value="gol_b">B</option>'
					+ '<option value="gol_ab">AB</option>'
					+ '<option value="gol_o">O</option>'
				+ '</select>'
			)
		}
		else if(nilai=='birth_date'){
			var yyy = $this.closest("tr").find(".data2").attr('name');
			$this.closest("tr").find(".data2").replaceWith(
				'<input type="text" id='+yyy+' name='+yyy+' value="" placeholder="Date Format" class="onlyDate"/>'
			)
		}
		
		
		else if(nilai=='start_date'){
			var aaa = $this.closest("tr").find(".data2").attr('name');
			$this.closest("tr").find(".data2").replaceWith(
				'<input type="text" id='+aaa+' name='+aaa+' value="" placeholder="Date Format" class="onlyDate"/>'
			)
		}
		else if(nilai=='end_date'){
			var bbb = $this.closest("tr").find(".data2").attr('name');
			$this.closest("tr").find(".data2").replaceWith(
				'<input type="text" id='+bbb+' name='+bbb+' value="" placeholder="Date Format" class="onlyDate"/>'
			)
		}
		else if(nilai=='join_date'){
			var ccc = $this.closest("tr").find(".data2").attr('name');
			$this.closest("tr").find(".data2").replaceWith(
				'<input type="text" id='+ccc+' name='+ccc+' value="" placeholder="Date Format" class="onlyDate"/>'
			)
		}
		else if(nilai=='los_month'){
			$this.closest("tr").find(".data2").replaceWith(
				'<input type="text" id="data2_' + count + '" name="data2_' + count + '" value="" placeholder="Month Format" class="onlyMonth"/>'
			)
		}
		
		
		
    });
}

//================================================================================================================

function DataProvide(){
	$.ajax({ 
		type: 'GET', 
		url: '<?php echo Yii::app()->createAbsoluteUrl("m1/testing/ambiltrigger"); ?>', 
		dataType: 'json',
		cache: false,
		success: function (result) {
			$.each(result, function() {
				$("#data1_1").append($('<option>', { 
					value: this.strkey,
					text : this.strvalue 
				}));
			});
		},
		error: function(jqXHR, exception){
			alert('Data Provider Error');
		}
	});
}

function AmbilStep1(val){
	$.ajax({ 
		type: 'POST', 
		url: '<?php echo Yii::app()->createAbsoluteUrl("testing/ambiltipe"); ?>', 
		data: {
			data: val
		},
		dataType: 'json',
		cache: false,
		success: function(result) {
			AmbilStep2(result);
		},
		error: function(jqXHR, exception){
			alert('Step 1 Error');
		}
	});
}

function AmbilStep2(val2){
	var hasilnya;
	$.ajax({ 
		type: 'POST', 
		url: '<?php echo Yii::app()->createAbsoluteUrl("testing/ambiltipe2"); ?>', 
		data: {
			data: val2
		},
		dataType: 'json',
		cache: false,
		success: function(result) {
			$('#checking').val('');
			$('#checking').val(result);
			hasilnya = $('#checking').val(result);
			return hasilnya;
		},
		error: function(jqXHR, exception){
			alert('Step 2 Error');
		}
	});
	return hasilnya;
}

function AmbilParrent(id){
	$.ajax({ 
		type: 'POST', 
		url: '<?php echo Yii::app()->createAbsoluteUrl("testing/ambilid"); ?>', 
		data: {
			data: id
		},
		dataType: 'json',
		cache: false,
		success: function(result) {
			$('#strID').val('');
			$('#strID').val(result);
			AmbilDetail(result);
		},
		error: function(jqXHR, exception){
			alert('Ambil Parrent Error');
		}
	});
}

function AmbilDetail(id){
	$.ajax({ 
		type: 'POST', 
		url: '<?php echo Yii::app()->createAbsoluteUrl("testing/ambildetail"); ?>', 
		data: {
			data: id
		},
		dataType: 'json',
		cache: false,
		success: function(result) {
			$.each(result, function() {
				$("#coba").append($('<option>', { 
					value: this.id_parent,
					text : this.data 
				}));
			});
		},
		error: function(jqXHR, exception){
			alert('Koneksi Error');
		}
	});
}


</script>

<?php 
echo CHtml::beginForm('testing/proses','post',array('id'=>'signupForm'));
?>
<input type="hidden" class="input-mini" id="strID" name="strID" />
<input type="hidden" class="input-mini" id="checking" name="checking" />

<h4>SELECT</h4>
<p>Select which field that you want to show on result page....</p>

				<?php        	
			        $label = gBiPerson::model()->attributeLabels();
					foreach (gBiPerson::model()->tableSchema->columns as $val) {
						echo CHtml::openTag('label',array('class'=>'checkbox pull-left'));
						echo CHtml::checkbox($label[$val->name],false,array('class'=>'mycb','name'=>$val->name,'value'=>$val->name));
						echo CHtml::label($label[$val->name],$label[$val->name],array('style'=>'margin-right:20px;'));
						//echo CHtml::checkboxList('Test');
						echo CHtml::closeTag('label');
					}
				?>        	
<input type="hidden" class="input-xxlarge" id="selVal" name="selVal" readonly="readonly" />

<?php /*
<style>
.done {
	background-color:#A8F0B6;
}
.removed {
	background-color:#FFB7B3;
}

</style>
<!--<a href="#" id="generate" name="generate">Generate Select</a>-->
<div>
	<span id="lblData"></span>
    &nbsp;
    <span id="lblStatus"></span>
</div>

*/ ?>
<div style="clear:both">
</div>

<h4>FILTER</h4>
<p>Reduce the result by input the field parameter. Tips: You can use %word_to_filter% in the value ...</p>

<table id="customFields" class="table">
<thead>
    <tr>
        <th>Field</th>
        <th>Comparison</th>
        <th>Value</th>
    </tr>
</thead>

<tbody>
    <tr>
        <td style="width:50px;"><select class="tabelBaru" id="data1_1" name="data1_1"></select></td>
        <td style="width:50px;">
        <select class="tabelBaru" id="data3_1" name="data3_1">
        	<option>=</option>
            <option>&lt;</option>
            <option>&gt;</option>
            <option>&lt;=</option>
            <option>&gt;=</option>
        </select>
        </td>
        <td style="width:50px;"><input type="text" id="data2_1" class="data2" name="data2_1" value="" /></td>
        <td></td>
    </tr>
</tbody>

</table>

<?php
	echo CHtml::openTag('label',array('class'=>'checkbox'));
	echo CHtml::checkbox('Export',false,array('class'=>'mycb','name'=>'export','value'=>'export'));
	echo CHtml::label('Export','Export');
	echo CHtml::closeTag('label');
?>

<input id="rows_1" name="rows[]" value="1" type="hidden">
<a href="javascript:void(0);" class="button btn btn-info">Tambah Data</a>

<?php echo CHtml::button('Proses Query', 
	array(
		'class' => 'buttonQuery btn btn-primary',
		'submit' => array('testing/proses',
	)
)); ?>

<?php echo CHtml::endForm(); ?>   