<h1>Login</h1>

<?php
echo $this->Form->create();
echo $this->Form->control('email', ['label' => 'Email', 'type' => 'email']);
echo $this->Form->control('password', ['label' => 'Password', 'type' => 'password']);
echo $this->Form->button('Login');
echo $this->Form->end();

if ($this->Flash->render('error')) {
    echo $this->Flash->render('error');
}
?>
