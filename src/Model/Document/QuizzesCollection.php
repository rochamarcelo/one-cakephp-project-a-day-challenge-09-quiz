<?php


namespace App\Model\Document;


use App\Mongo\CollectionRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;
use MongoDB\BSON\ObjectId;
use MongoDB\Model\BSONDocument;

class QuizzesCollection
{
    /**
     * @param array $questions
     * @param array $answers
     */
    public function getResults($questions, array $answers)
    {
        $total = count($questions);
        $correctCount = 0;
        foreach ($answers as $id => $answer) {
            $answer = (int)$answer;
            $isCorrect = $questions[$id]['options'][$answer]['is_correct'] ?? false;
            if ($isCorrect === true) {
                $correctCount++;
            }
        }

        return [
            'correctCount' => $correctCount,
            'total' => $total,
        ];
    }

    /**
     * @return \MongoDB\Driver\Cursor
     */
    public function getAll()
    {
        return $this->getBase()->find();
    }

    /**
     * @param string $id The quiz id
     *
     * @return array|object|null
     */
    public function get(string $id)
    {
        $result = $this->getBase()->findOne([
            '_id' => new ObjectId($id)
        ]);
        if ($result !== null && $result instanceof BSONDocument) {
            return $result;
        }
        throw new RecordNotFoundException(__('Quiz not found for requested id'));
    }

    /**
     * @return \MongoDB\Collection
     */
    protected function getBase(): \MongoDB\Collection
    {
        return CollectionRegistry::get('quizzes');
    }
}
