<div id="main">

	<div id="message"></div>
	
	<h2>Content Form</h2>
	<br/>
	<form id="form-content">
	<?php if($isAddRequest):?>
			<input type="hidden" id="form-id" name="id" value="0" />
			<table>
				<tr>
					<th class="field_title">Priority</th> <td class=""><input type="text" name="priority" id="form-priority"  class="input_text"/ ></td>
				<tr/>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<th class="field_title">Question</th> <td class=""><input type="text" name="question" id="form-question"  class="input_text"/></td>
				<tr/>
				<tr><td>&nbsp;</td></tr>
				<tr style="height:140px;">
					<th class="field_title">Choices</th> 
					<td>
						<div style="height:140px; border:solid 1px;overflow:auto;">
							<br/>
							<input type="text" name="option1" id="form-option1" style="width:320px;margin-left:13px;"/><br/>
							<input type="text" name="option2" id="form-option2" style="width:320px;margin-left:13px;"/><br/>
							<input type="text" name="option3" id="form-option3" style="width:320px;margin-left:13px;"/><br/>
							<input type="text" name="option4" id="form-option4" style="width:320px;margin-left:13px;"/><br/>
						</div>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<th class="field_title">Correct Answer</th> <td><input type="text" name="correct_answer" id="form-correct_answer" class="input_text"/></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<th class="field_title">Scheduled</th> 
					<td>
					<select name="group_id" id="form-group_id" class="input_text">
						<?php for($i=0; $i<count($schedule); $i++):?>
						<option value="<?php echo $schedule[$i]->id?>"><?php echo $schedule[$i]->date?></option>
						<?php endfor;?>
					</select>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align:center">
						<input type="button" value="Save" class="class_button" onclick="global.save('form-content','/cms/saveContent','')"/>
					</td>
				</tr>
			</table>
		<?php else:?>
			<?php
				$choices = json_decode($content[0]->choices);
			?>
			<input type="hidden" id="form-id" name="id" value="<?php echo $content[0]->id?>" />
			<table>
				<tr>
					<th class="field_title">Priority</th> <td class=""><input type="text" name="priority" id="form-priority"  class="input_text" value="<?php echo $content[0]->priority?>"/></td>
				<tr/>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<th class="field_title">Question</th> <td class=""><input type="text" name="question" id="form-question"  class="input_text" value="<?php echo $content[0]->question?>"/></td>
				<tr/>
				<tr><td>&nbsp;</td></tr>
				<tr style="height:140px;">
					<th class="field_title">Choices</th> 
					<td>
						<div style="height:140px; border:solid 1px;overflow:auto;">
							<br/>
							<input type="text" name="option1" id="form-option1" style="width:320px;margin-left:13px;" value="<?php echo isset($choices[0])?$choices[0]:""?>"/><br/>
							<input type="text" name="option2" id="form-option2" style="width:320px;margin-left:13px;" value="<?php echo isset($choices[1])?$choices[1]:""?>"/><br/>
							<input type="text" name="option3" id="form-option3" style="width:320px;margin-left:13px;" value="<?php echo isset($choices[2])?$choices[2]:""?>"/><br/>
							<input type="text" name="option4" id="form-option4" style="width:320px;margin-left:13px;" value="<?php echo isset($choices[3])?$choices[3]:""?>"/><br/>
						</div>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<th class="field_title">Correct Answer</th> <td><input type="text" name="correct_answer" id="form-correct_answer" class="input_text" value="<?php echo $content[0]->correct_answer?>"/></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<th class="field_title">Scheduled</th> 
					<td>
					<select name="group_id" id="form-group_id" class="input_text">
						<?php for($i=0; $i<count($schedule); $i++):?>
						<option value="<?php echo $schedule[$i]->id?>" <?php echo $content[0]->group_id==$schedule[$i]->id?"selected":""?>><?php echo $schedule[$i]->date?></option>
						<?php endfor;?>
					</select>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align:center">
						<input type="button" value="Save" class="class_button" onclick="global.save('form-content','/cms/saveContent','')"/>
					</td>
				</tr>
			</table>
		<?php endif;?>
	</form>
	
</div>