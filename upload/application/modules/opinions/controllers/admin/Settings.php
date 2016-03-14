<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Controllers\Admin;

class Settings extends \Ilch\Controller\Admin
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
                    'active' => false,
                    'icon' => 'fa fa-th-list',
                    'url' => $this->getLayout()->getUrl(array('controller' => 'index', 'action' => 'index'))
                ),
                array
                (
                    'name' => 'settings',
                    'active' => true,
                    'icon' => 'fa fa-cogs',
                    'url' => $this->getLayout()->getUrl(array('controller' => 'settings', 'action' => 'index'))
                ),
            )
        );
    }

    public function indexAction() 
    {
        $this->getLayout()->getAdminHmenu()
                ->add($this->getTranslator()->trans('menuOpinions'), array('action' => 'index'))
                ->add($this->getTranslator()->trans('settings'), array('action' => 'index'));

        if ($this->getRequest()->isPost()) {
            $this->getConfig()->set('opinions_box_count', $this->getRequest()->getPost('opinions_box_count'));
            $this->getConfig()->set('opinions_slider_interval', $this->getRequest()->getPost('opinions_slider_interval'));

            $this->addMessage('saveSuccess');
        }

        $this->getView()->set('opinions_box_count', $this->getConfig()->get('opinions_box_count'));
        $this->getView()->set('opinions_slider_interval', $this->getConfig()->get('opinions_slider_interval'));
    }
}
