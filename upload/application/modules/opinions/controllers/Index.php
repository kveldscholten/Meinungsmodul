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

        $this->getView()->set('opinionsRating', round($opinionsMapper->getSumRating() / count($opinionsMapper->getOpinions()), 2));
        $this->getView()->set('opinionsStarRating1', $opinionsMapper->getStarRating(1));
        $this->getView()->set('opinionsStarRating2', $opinionsMapper->getStarRating(2));
        $this->getView()->set('opinionsStarRating3', $opinionsMapper->getStarRating(3));
        $this->getView()->set('opinionsStarRating4', $opinionsMapper->getStarRating(4));
        $this->getView()->set('opinionsStarRating5', $opinionsMapper->getStarRating(5));
        $this->getView()->set('opinionsStarRatingWidth1', $opinionsMapper->getPercent($opinionsMapper->getStarRating(1), count($opinionsMapper->getOpinions())));
        $this->getView()->set('opinionsStarRatingWidth2', $opinionsMapper->getPercent($opinionsMapper->getStarRating(2), count($opinionsMapper->getOpinions())));
        $this->getView()->set('opinionsStarRatingWidth3', $opinionsMapper->getPercent($opinionsMapper->getStarRating(3), count($opinionsMapper->getOpinions())));
        $this->getView()->set('opinionsStarRatingWidth4', $opinionsMapper->getPercent($opinionsMapper->getStarRating(4), count($opinionsMapper->getOpinions())));
        $this->getView()->set('opinionsStarRatingWidth5', $opinionsMapper->getPercent($opinionsMapper->getStarRating(5), count($opinionsMapper->getOpinions())));
        $this->getView()->set('opinionsCount', count($opinionsMapper->getOpinions()));

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
