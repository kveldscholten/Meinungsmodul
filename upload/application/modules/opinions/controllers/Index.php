<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Controllers;

use Modules\Opinions\Mappers\Opinions as OpinionsMapper;
use Modules\Opinions\Models\Opinions as OpinionsModel;

class Index extends \Ilch\Controller\Frontend
{
    public function indexAction()
    {
        $opinionsMapper = new OpinionsMapper();
        $opinionsModel = new OpinionsModel();

        $this->getLayout()->getHmenu()
                ->add($this->getTranslator()->trans('menuOpinions'), array('action' => 'index'));

        if ($this->getRequest()->getPost('saveOpinions')) {
            $rating = $this->getRequest()->getPost('rating');
            $text = trim($this->getRequest()->getPost('text'));

            if (empty($rating)) {
                $this->addMessage('missingRating', 'danger');
            } elseif (empty($text)) {
                $this->addMessage('missingComment', 'danger');
            } else {
                $opinionsModel->setUserId($this->getUser()->getId());
                $opinionsModel->setRating($rating);
                $opinionsModel->setText($text);
                $opinionsMapper->save($opinionsModel);

                $this->addMessage('saveSuccess');

                $this->redirect(array('controller' => 'index', 'action' => 'index'));
            }
        }

        $progressBarColor = array('1' => 'danger', '2' => 'warning', '3' => 'info', '4' => 'primary', '5' => 'success');
        if (count($opinionsMapper->getOpinions()) != 0) {
            $roundRating = round($opinionsMapper->getSumRating() / count($opinionsMapper->getOpinions()), 2);
        } else {
            $roundRating = 0;
        }

        $this->getView()->set('opinionsProgressBarColor', $progressBarColor);
        $this->getView()->set('opinionsRating', $roundRating);
        $this->getView()->set('opinionsCount', count($opinionsMapper->getOpinions()));

        for ($i = 1; $i <= 5; $i++) {
            $this->getView()->set('opinionsStarRating'.$i, $opinionsMapper->getStarRating($i));
            $this->getView()->set('opinionsStarRatingWidth'.$i, $opinionsMapper->getPercent($opinionsMapper->getStarRating($i), count($opinionsMapper->getOpinions())));
        }

        if ($this->getRequest()->getParam('rating') == 1) {
            $this->getView()->set('opinions', $opinionsMapper->getOpinionsByRating(1));
        } elseif ($this->getRequest()->getParam('rating') == 2) {
            $this->getView()->set('opinions', $opinionsMapper->getOpinionsByRating(2));
        } elseif ($this->getRequest()->getParam('rating') == 3) {
            $this->getView()->set('opinions', $opinionsMapper->getOpinionsByRating(3));
        } elseif ($this->getRequest()->getParam('rating') == 4) {
            $this->getView()->set('opinions', $opinionsMapper->getOpinionsByRating(4));
        } elseif ($this->getRequest()->getParam('rating') == 5) {
            $this->getView()->set('opinions', $opinionsMapper->getOpinionsByRating(5));
        } else {
            $this->getView()->set('opinions', $opinionsMapper->getOpinions());
        }
    }
}
