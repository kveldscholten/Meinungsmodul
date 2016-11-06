<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Controllers;

use Modules\Opinions\Mappers\Opinions as OpinionsMapper;
use Modules\Opinions\Models\Opinions as OpinionsModel;
use Modules\User\Mappers\User as UserMapper;
use Ilch\Validation;

class Index extends \Ilch\Controller\Frontend
{
    public function indexAction()
    {
        $opinionsMapper = new OpinionsMapper();
        $userMapper = new UserMapper();

        $this->getLayout()->getHmenu()
                ->add($this->getTranslator()->trans('menuOpinions'), ['action' => 'index']);

        if ($this->getRequest()->getPost('saveOpinions')) {
            Validation::setCustomFieldAliases([
                'text' => 'comment',
            ]);

            $validation = Validation::create($this->getRequest()->getPost(), [
                'rating' => 'numeric|integer|min:1',
                'text' => 'required'
            ]);

            if ($validation->isValid()) {
                $model = new OpinionsModel();
                $model->setUserId($this->getUser()->getId())
                    ->setRating($this->getRequest()->getPost('rating'))
                    ->setText($this->getRequest()->getPost('text'));
                $opinionsMapper->save($model);

                $this->redirect()
                    ->withMessage('saveSuccess')
                    ->to(['action' => 'index']);
            }

            $this->redirect()
                ->withInput()
                ->withErrors($validation->getErrorBag())
                ->to(['action' => 'index', 'add' => 1]);
        }

        $progressBarColor = ['1' => 'danger', '2' => 'warning', '3' => 'info', '4' => 'primary', '5' => 'success'];
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

        $this->getView()->set('userMapper', $userMapper);
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
