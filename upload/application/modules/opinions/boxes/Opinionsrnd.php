<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Boxes;

use Modules\Opinions\Mappers\Opinions as OpinionsMapper;

class Opinionsrnd extends \Ilch\Box
{
    public function render()
    {
        $opinionsMapper = new OpinionsMapper();

        $this->getView()->set('opinion', $opinionsMapper->getOpinionRnd());
    }
}
