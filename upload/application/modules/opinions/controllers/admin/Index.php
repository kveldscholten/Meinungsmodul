<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Controllers\Admin;

use Modules\Opinions\Mappers\Opinions as OpinionsMapper;
use Modules\Opinions\Models\Opinions as OpinionsModel;

class Index extends \Ilch\Controller\Admin
{
    public function init()
    {
        $this->getLayout()->addMenu
        (
            'menuOpinions',
            array
            (
                array
                (
                    'name' => 'manage',
                    'active' => true,
                    'icon' => 'fa fa-th-list',
                    'url' => $this->getLayout()->getUrl(array('controller' => 'index', 'action' => 'index'))
                ),
                array
                (
                    'name' => 'settings',
                    'active' => false,
                    'icon' => 'fa fa-cogs',
                    'url' => $this->getLayout()->getUrl(array('controller' => 'settings', 'action' => 'index'))
                ),
            )
        );
    }

    public function indexAction()
    {
        $opinionsMapper = new OpinionsMapper();

        $this->getLayout()->getAdminHmenu()
                ->add($this->getTranslator()->trans('menuOpinions'), array('action' => 'index'));

        if ($this->getRequest()->getPost('check_entries')) {
            if ($this->getRequest()->getPost('action') == 'delete') {
                foreach($this->getRequest()->getPost('check_entries') as $opinionsId) {
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

        $this->redirect(array('action' => 'index'));
    }
}
