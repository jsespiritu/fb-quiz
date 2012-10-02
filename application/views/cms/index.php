
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
	<h2>Content</h2>
	<br/>
	<div style="text-align:right;margin-right:20px;">
		<input type="button" class="class_button" value="Add Content" onclick="global.redirect('/cms/viewContentForm')" style="margin-left:10px;"/>
	</div>
	<br/><br/>
    <div class="grid_12">
        <div id="demo" class="clearfix"> 
			<table class="display" id="members"> 
			    <thead> 
			        <tr>
				        <th>Question</th>
				        <th>Answer</th>
				        <th>Group</th>
			        </tr>
			    </thead>
			    <tbody class="row_text">
					<?php for($i=0; $i<count($content); $i++):?>
						<tr>
							<td><a href="/cms/viewContentForm?id=<?php echo $content[$i]->id?>"><?php echo $content[$i]->question?></a></td>
							<td><?php echo $content[$i]->correct_answer?></td>
							<td><?php echo $content[$i]->group_id?></td>
						</tr>
					<?php endfor;?>
			    </tbody> 
			</table> 
		</div>
	</div>


</div>
