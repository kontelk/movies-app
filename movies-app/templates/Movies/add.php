<h4><?= $this->Html->link("Home", ['action' => 'index']) ?></h4>
<div class="box-container">
<h1>Add Movie</h1>

<?php
    echo $this->Form->create($movie);
    // Hard code the user for now.
    echo $this->Form->control('title');
    echo $this->Form->control('release_year');
    echo  $this->Form->control('genre',['options'=>['Horror'=>'Horror','Romance'=>'Romance','Action'=>'Action','Drama'=>'Drama','Fiction'=>'Fiction','Mystery'=>'Mystery','Fantasy'=>'Fantasy'],'empty' => 'Genre']);
    echo $this->Form->control('synopsis', ['rows' => '3']);
    echo $this->Form->button(__('Save Movie'));
    echo $this->Form->end();
?>
</div>