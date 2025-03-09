<?= $this->Html->css(['styles']); ?>
<h4><?= $this->Html->link("Home", ['action' => 'index']) ?></h4>

<div class="box-container">
<h1>Edit <?= $movie->title ?>  Movie</h1>

<?php
    echo $this->Form->create($movie);
    echo $this->Form->control('title');
    echo $this->Form->control('release_year');
    echo  $this->Form->control('genre',['options'=>['horror'=>'horror','romance'=>'romance','action'=>'action','drama'=>'drama','fiction'=>'fiction','mystery'=>'mystery','fantasy'=>'fantasy']]);
    echo $this->Form->control('synopsis', ['rows' => '3']);
    echo $this->Form->button(__('Save Movie'));
    echo $this->Form->end();
?>
</div>