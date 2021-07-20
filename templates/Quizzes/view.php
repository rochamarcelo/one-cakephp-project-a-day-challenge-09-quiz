<?php
/**
 * @var \App\View\AppView $this
 * @var \MongoDB\Model\BSONDocument $quiz
 */
?>
<h1><?= h($quiz->name)?></h1>
<?= $this->Form->create()?>
<?php foreach ($quiz->questions as $key => $question):?>
<?= $this->Form->control("question.$key", [
    'label' => $question->title,
    'options' => collection($question->options)->extract('text')->toArray(),
    'type' => 'radio',
    'required' => true,
])?>
<?php endforeach;?>
<?= $this->Form->submit(__('Check Result'))?>
<?= $this->Form->end()?>
