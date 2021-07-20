<?php
/**
 * @var \App\View\AppView $this
 * @var \MongoDB\Model\BSONDocument $quiz
 */
?>
<style>
    .list-group-item:hover, .list-group-item:active {
        z-index: 2;
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>
<h1><?= h($quiz->name)?></h1>
<?= $this->Form->create()?>
<?php foreach ($quiz->questions as $key => $question):?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= h($question->title)?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= __('Question {0}', $key + 1)?></h6>
            <?= $this->Form->control("question.$key", [
                'label' => false,
                'options' => collection($question->options)->extract('text')->toArray(),
                'type' => 'radio',
                'required' => true,
                'class' => 'form-check-input',
            ])?>
        </div>
    </div>
<h4></h4>

<?php endforeach;?>
<?= $this->Form->submit(__('Check Result'), [
    'class' => 'btn btn-primary',
])?>
<?= $this->Form->end()?>
