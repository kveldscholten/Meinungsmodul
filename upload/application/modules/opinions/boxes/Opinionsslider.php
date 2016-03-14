<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Boxes;

use Modules\Opinions\Mappers\Opinions as OpinionsMapper;

class Opinionsslider extends \Ilch\Box
{
    public function render()
    {
        $opinionsMapper = new OpinionsMapper();

        $this->getView()->set('opinions', $opinionsMapper->getOpinions());
        $this->getView()->set('opinionsInterval', $this->getConfig()->get('opinions_slider_interval'));
    }
}
