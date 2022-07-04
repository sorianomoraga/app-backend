<h4>List users</h4>

<div class="">
	<?= $this->Form->create($users,['type'=>'get']) ?>
	    <div class="form-group">
	    	<div>
	    		<label for="">Buscar</label>
	        	<?= $this->Form->input('search',['label'=>false,'class'=>'form-control mb-1','placeholder'=>'Search for id, email, name, last name and role','type'=>'text','value'=>$q]) ?>
	    	</div>
	        <div class="d-flex">
	        	<?= $this->Form->input('reset',['label'=>false,'type'=>'reset','class'=>'btn btn-info']) ?>
	        	<?= $this->Form->button(__('Search'),['class'=>'btn btn-success ml-1']); ?>
	        </div>
	        
		    
		</div>
	<?= $this->Form->end() ?>
</div>

<table class="table table-bordered">
	<tr>
		<th>ID</th>
		<th>Email</th>
		<th>Name</th>
		<th>Last name</th>
		<th>Role</th>
		<th>Actions</th>
	</tr>
	<tbody>
		<?php if(count($users) == 0) echo '<tr><td>Sin registros</td></tr>'; ?>
		<?php foreach($users as $user): ?>
			<tr>
				<td><?= $user->id ?></td>
				<td><?= $user->username ?></td>
				<td><?= $user->first_name ?></td>
				<td><?= $user->last_name ?></td>
				<td><?= $user->role ?></td>
				<td>
					<?= 
						$this->Html->link(
						    'View',
						    array(
						        'controller' => 'users',
						        'action' => 'view/'.$user->id
						    ),
						    [
						    	'class'=>'btn btn-info'
						    ]
						);
					?>
					<?php if($Auth->user('role') == 'admin'): ?>
						<?= 
							$this->Html->link(
							    'Edit',
							    array(
							        'controller' => 'users',
							        'action' => 'edit/'.$user->id
							    ),
							    [
							    	'class'=>'btn btn-primary'
							    ]
							);
						?>
						<?= 
							$this->Form->postLink(
			                'Delete',
			                ['action' => 'delete', $user->id],
			                ['confirm' => '¿Estás seguro de eliminar este registro?','class'=>'btn btn-danger'])
						?>
						<?= 
							$this->Html->link(
							    'Update password',
							    array(
							        'controller' => 'users',
							        'action' => 'password/'.$user->id
							    ),
							    [
							    	'class'=>'btn btn-warning'
							    ]
							);
						?>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php 
    echo $this->Html->script('script-jq', ['block' => 'scriptBottom']);
?>