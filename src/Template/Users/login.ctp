<?php $this->assign('title', 'Login') ?>
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h3>Login</h3>
        </div>
        <?= $this->Form->create('', [
            'role' => 'form',
            'class' => 'm-t'
        ]) ?>
        <?= $this->Form->input('email', [
            'class' => 'form-control',
            'placeholder' => 'E-mail',
            'required' => true,
            'label' => false
        ]) ?>
        <?= $this->Form->input('password', [
            'class' => 'form-control',
            'placeholder' => 'Password',
            'required' => true,
            'label' => false
        ]) ?>
        <?= $this->Form->button('Login', ['class' => 'btn btn-primary block full-width m-b']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
