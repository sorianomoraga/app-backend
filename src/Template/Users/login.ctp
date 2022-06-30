<div class="users form align-items-center d-flex justify-content-center">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset class="form-group">
        <legend><?= __('Login') ?></legend>
        <?= $this->Form->input('username',['label'=>false,'class'=>'form-control mb-1','placeholder'=>'Email','type'=>'email']) ?>
        <?= $this->Form->input('password',['label'=>false,'class'=>'form-control','placeholder'=>'password','type'=>'password']) ?>
    </fieldset>
<div class="align-items-center d-flex justify-content-end">
    <?= $this->Form->button(__('Login'),['class'=>'btn btn-success mr-1']); ?>
</div>
<?= $this->Form->end() ?>
</div>