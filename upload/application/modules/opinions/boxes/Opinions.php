<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Boxes;

use Modules\Opinions\Mappers\Opinions as OpinionsMapper;
use Modules\User\Mappers\User as UserMapper;

class Opinions extends \Ilch\Box
{
    public function render()
    {
        $opinionsMapper = new OpinionsMapper();
        $userMapper = new UserMapper();

        $this->getView()->set('userMapper', $userMapper);
        $this->getView()->set('opinions', $opinionsMapper->getOpinions($this->getConfig()->get('opinions_box_count')));
    }
}
