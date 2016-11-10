<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <h3>Login</h3>
    </div>
    <div>
        <?= $this->Form->create('', ['role' => 'form', 'class' => 'm-t']) ?>
        <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'E-mail', 'label' => false]) ?>
        <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Password', 'label' => false]) ?>
        <?= $this->Form->button('Login', ['class' => 'btn btn-primary block full-width m-b']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
