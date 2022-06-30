<style>
    div#p2,div#p1 {
        position: relative;
        top: -38px;
        /* right: 0px; */
        width: 48px;
        float: right;
    }
</style>
<h4>Change password</h4>

<?= $this->Form->create($user,['autocomplete'=>"off"]); ?>
      <div class="form-group">
            <label for="">Password</label>
            <?= $this->Form->input('password',['class'=>'form-control','label'=>false,'value'=>'']) ?>
            <div class="input-group-text btn" id="p1">ver</div>
      </div>

      <div class="form-group">
        
        <label for="">Repeat password</label>
            <?= $this->Form->input('password2',['class'=>'form-control','label'=>false,'type'=>'password','value'=>'']) ?>
            <div class="input-group-text btn" id="p2">ver</div>
      </div>
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary']) ?>
<?php echo $this->Form->end(); ?>


<?php 
    echo $this->Html->script('script-jq', ['block' => 'scriptBottom']);
?>