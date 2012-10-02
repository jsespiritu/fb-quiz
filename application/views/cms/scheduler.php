
<!-- DATATABLES CSS -->
<link rel="stylesheet" media="screen" href="/lib/datatables/css/datatable.css" />
<script type="text/javascript" src="/lib/datatables/js/jquery.dataTables.js"></script> 
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#members').dataTable( {
            "sPaginationType": "full_numbers"
        } );
    } );
</script> 
<!-- DATATABLES CSS END -->

<div id="main">
	<h2>Scheduler</h2>
	<br/>
	<div style="text-align:right;margin-right:20px;">
		<input type="button" class="class_button" value="Add Scheduler" onclick="global.redirect('/cms/schedulerForm')" style="margin-left:10px;"/>
	</div>
	<br/><br/>
    <div class="grid_12">
        <div id="demo" class="clearfix"> 
			<table class="display" id="members"> 
			    <thead> 
			        <tr>
				        <th>Name</th>
				        <th>Description</th>
				        <th>Date</th>
			        </tr>
			    </thead>
			    <tbody class="row_text">
					<?php for($i=0; $i<count($content); $i++):?>
						<tr>
							<td><a href="/cms/schedulerForm?id=<?php echo $content[$i]->id?>"><?php echo $content[$i]->name?></a></td>
							<td><?php echo $content[$i]->description?></td>
							<td><?php echo $content[$i]->date?></td>
						</tr>
					<?php endfor;?>
			    </tbody> 
			</table> 
		</div>
	</div>


</div>
