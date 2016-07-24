<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Controllers\Admin;

use Modules\Opinions\Mappers\Opinions as OpinionsMapper;

class Index extends \Ilch\Controller\Admin
{
    public function init()
    {
        $items = [
            [
                'name' => 'manage',
                'active' => true,
                'icon' => 'fa fa-th-list',
                'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'index'])
            ],
            [
                'name' => 'settings',
                'active' => false,
                'icon' => 'fa fa-cogs',
                'url' => $this->getLayout()->getUrl(['controller' => 'settings', 'action' => 'index'])
            ]
        ];

        $this->getLayout()->addMenu
        (
            'menuOpinions',
            $items
        );
    }

    public function indexAction()
    {
        $opinionsMapper = new OpinionsMapper();

        $this->getLayout()->getAdminHmenu()
                ->add($this->getTranslator()->trans('menuOpinions'), ['action' => 'index']);

        if ($this->getRequest()->getPost('check_entries')) {
            if ($this->getRequest()->getPost('action') == 'delete') {
                foreach ($this->getRequest()->getPost('check_entries') as $opinionsId) {
                    $opinionsMapper->delete($opinionsId);
                }
            }
        }

        $this->getView()->set('opinions', $opinionsMapper->getOpinions());
    }

    public function delAction()
    {
        $opinionsMapper = new OpinionsMapper();

        if ($this->getRequest()->isSecure()) {
            $opinionsMapper->delete($this->getRequest()->getParam('id'));

            $this->addMessage('deleteSuccess');
        }

        $this->redirect(['action' => 'index']);
    }
}
