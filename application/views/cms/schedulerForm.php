
<div id="main">
<div id="message"></div>
<h2>Scheduler Form</h2>
<br/>
<form id="form-scheduler">
	<?php if($isAddRequest):?>
		<input type="hidden" id="form-id" name="id" value="0" />
		<table>
			<tr>
				<th class="field_title">Name</th> <td class=""><input type="text" name="name"  class="input_text"/></td>
			<tr/>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<th class="field_title">Description</th> <td><input type="text" name="description"  class="input_text"/></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<th class="field_title">Start Date</th> <td><input type="text" name="date" id="startDate" class="input_text"/></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="2" style="text-align:center">
					<input type="button" value="Save" class="class_button" onclick="global.save('form-scheduler','/cms/saveScheduler','/cms/listScheduler')"/>
				</td>
			</tr>
		</table>
	<?php else:?>
		<table>
			<input type="hidden" id="form-id" name="id" value="<?php echo $sched[0]->id?>" />
			<tr>
				<th class="field_title">Name</th> <td class=""><input type="text" name="name"  class="input_text"  value="<?php echo $sched[0]->name?>"/></td>
			<tr/>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<th class="field_title">Description</th> <td><input type="text" name="description"  class="input_text" value="<?php echo $sched[0]->description?>"/></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<th class="field_title">Start Date</th> <td><input type="text" name="date" id="startDate" class="input_text"  value="<?php echo $sched[0]->date?>"/></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="2" style="text-align:center">
					<input type="button" value="Save" class="class_button" onclick="global.save('form-scheduler','/cms/saveScheduler','/cms/listScheduler')"/>
				</td>
			</tr>
		</table>
	<?php endif;?>
</form>
</div>