<?php
/**
 * @var \App\View\AppView $this
 * @var \MongoDB\Model\BSONDocument $quiz
 * @var array $quizResult
 */
?>
<h1><?= h($quiz->name)?></h1>
<h3><?= __(
    'You got {0} out of {1}',
    $quizResult['correctCount'],
    $quizResult['total']
)?></h3>
