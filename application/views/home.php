<form id="form-quiz">
	<input type="hidden" name="qCount" id="qCount" value="<?php echo $qCount?>" />
	<div id="message"></div>
	<?php for($i=0; $i<count($questions); $i++):?>
		<div class="question_container">
			<div class="content_title">
				<div class="content_text"><?php echo $questions[$i]->question?></div>
			</div>
			<br/>
			<div class="text"> 
				<?php $choices = json_decode($questions[$i]->choices);?>
				<?php for($j=0; $j<count($choices); $j++):?>
					<input type="radio" id="form-choice<?php echo "[$i][$j]"?>" name="<?php echo "id_".$questions[$i]->id?>" value="<?php echo $j?>" /><?php echo "{$choices[$j]}<br/>";?>
				<?php endfor;?>
			</div>
		</div>
	<?php endfor;?>
	<br/>
	<div id="gen_container">
		<a href="javascript:;" class="sButton"  onclick="global.checkAnswer('form-quiz', '/home/process')">Submit</a>
	</div>
</form>
