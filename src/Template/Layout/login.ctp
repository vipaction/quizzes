<!doctype html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->meta('icon', 'favicon.png') ?>

    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->css([
        'base.css',
        'cake.css',
        'bootstrap.min.css',
        'animate.css',
        'style.css',
        '../font-awesome/css/font-awesome',
    ]) ?>
    <?= $this->Html->script([
        'jquery-2.1.1.js',
        'bootstrap.min.js',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body  class="gray-bg">
    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>

    <?= $this->fetch('script') ?>
</body>
</html>