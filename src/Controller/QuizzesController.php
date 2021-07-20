<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Document\QuizzesCollection;

/**
 * Quizzes Controller
 *
 */
class QuizzesController extends AppController
{
    /**
     * @param QuizzesCollection $collection
     * @param string $id Quiz id
     */
    public function view(QuizzesCollection $collection, string $id)
    {
        $quiz = $collection->get($id);
        $this->set(compact('quiz'));
        if ($this->request->is(['post', 'put'])) {
            $quizResult = $collection->getResults(
                $quiz->questions,
                $this->request->getData('question')
            );
            $this->set(compact('quizResult'));
            $this->viewBuilder()->setTemplate('result');
        }
    }
}
