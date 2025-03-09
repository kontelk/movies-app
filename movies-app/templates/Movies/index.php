<?= $this->Html->css(['styles']); ?>
<h1>Movies</h1>
<h3><?= $this->Html->link('Add a New Movie', ['action' => 'add']) ?></h3>

<div class="filter-form"><?= $this->Form->create(null, ['type' => 'get']); ?>
    <?= $this->Form->control('title', ['value' => $this->request->getQuery('title'), 'label' => '', 'placeholder' => 'Enter Movie']); ?>
    <?= $this->Form->control('genre', [
        'value' => $this->request->getQuery('genre'),
        'options' => ['Horror' => 'Horror', 'Romance' => 'Romance', 'Action' => 'Action', 'Drama' => 'Drama', 'Fiction' => 'Fiction', 'Mystery' => 'Mystery', 'Fantasy' => 'Fantasy'],
        'empty' => 'Genre',
        'label' => ''
    ]); ?>
    <div class="center"><?= $this->Form->submit("Filter"); ?></div>
    <?= $this->Form->end() ?>
</div>
<div class="table-responsive">

    <table>
        <tr class="thead">
            <th class="add-padding">ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th class="text-center">Release Year</th>
            <th class="text-center"></th>
        </tr>

        <?php foreach ($movies as $movie): ?>
        <tr>
            <td class="add-padding">
                <?= $movie->id ?>
            </td>

            <td class="view">
                <?= $this->Html->link($movie->title, ['action' => 'view', $movie->slug]) ?>
                <span class="tooltiptext">View Synopsis</span>
            </td>
            <td>
                <?= $movie->genre ?>
            </td>
            <td class="text-center">
                <?= $movie->release_year ?>
            </td>
            <td class="text-center">
                <button
                    class="normal-button"><?= $this->Html->link('Edit', ['action' => 'edit', $movie->slug]) ?></button>
                <button class="delete-button"><?= $this->Form->postLink(
                                                        'Delete',
                                                        ['action' => 'delete', $movie->slug],
                                                        ['confirm' => 'Are you sure?']
                                                    )
                                                    ?></button>

            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('First')) ?>
        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('Next') . ' >') ?>
        <?= $this->Paginator->last(__('Last') . ' >>') ?>
    </ul>
</div>