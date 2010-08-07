
	<form method="get" action="http://www.haringkids.com/lesson_plans/advanced-search" >
		<input type="submit" class="button" value="Search Multiple Categories" /><br clear="both">
		<?php
		$taxonomy_count = 1;
		$taxonomies = array('curriculum' => 'Curriculum',
		'subject' => 'Subject', 
		'materials' => 'Materials',
		'age_grade' => 'Age/grade', 
		'duration'  =>  'Duration');
		?>
		<?php foreach ($taxonomies as $key => $value): ?>
		<div class="column">
		<h2><?php echo $value; ?></h2>
		<ul>
		<?php
		$terms = get_terms( $key ) ;
		$count = 1;
		foreach ($terms as $term): ?> 
		<li><input type="checkbox" name="rel<?php echo $count; ?>" value="<?php echo $term->term_id; ?>" /><?php echo $term->name; ?></li>
		<?php $count++; ?>
		<?php endforeach; ?>
		</ul>
		</div>
		<?php if ($taxonomy_count % 3 == 0): ?>
			<br clear="both">
		<?php endif; 
		$taxonomy_count++;
		endforeach;
		 ?>
		
		

		</form>