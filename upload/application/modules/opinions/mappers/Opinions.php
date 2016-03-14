<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Mappers;

use Modules\Opinions\Models\Opinions as OpinionsModel;

class Opinions extends \Ilch\Mapper
{
    /**
     * Gets the opinions entries.
     *
     * @param $limit
     * @return OpinionsModel[]|array
     */
    public function getOpinions($limit = null)
    {
        if ($limit != null) {
            $entryArray = $this->db()->select('*')
                ->from('opinions')
                ->order(array('id' => 'DESC'))
                ->limit($limit)
                ->execute()
                ->fetchRows();
        } else {
            $entryArray = $this->db()->select('*')
                ->from('opinions')
                ->order(array('id' => 'DESC'))
                ->execute()
                ->fetchRows();
        }

        if (empty($entryArray)) {
            return null;
        }

        $entry = array();

        foreach ($entryArray as $entries) {
            $entryModel = new OpinionsModel();
            $entryModel->setId($entries['id']);
            $entryModel->setUserId($entries['user_id']);
            $entryModel->setDate($entries['date']);
            $entryModel->setRating($entries['rating']);
            $entryModel->setText($entries['text']);
            $entry[] = $entryModel;
        }

        return $entry;
    }

    /**
     * Gets the random opinions entry.
     *
     * @return OpinionsModel|null
     */
    public function getOpinionRnd()
    {
        $sql = 'SELECT *
                FROM [prefix]_opinions
                ORDER BY RAND()
                LIMIT 1';
        $entryArray = $this->db()->queryArray($sql);

        if (empty($entryArray)) {
            return null;
        }

        $entry = array();

        foreach ($entryArray as $entries) {
            $entryModel = new OpinionsModel();
            $entryModel->setId($entries['id']);
            $entryModel->setUserId($entries['user_id']);
            $entryModel->setDate($entries['date']);
            $entryModel->setRating($entries['rating']);
            $entryModel->setText($entries['text']);
            $entry[] = $entryModel;
        }

        return $entry;
    }

    /**
     * Gets the opinions entries by rating.
     *
     * @param $rating
     * @return OpinionsModel[]|array
     */
    public function getOpinionsByRating($rating)
    {
        $entryArray = $this->db()->select('*')
            ->from('opinions')
            ->where(array('rating' => $rating))
            ->order(array('id' => 'DESC'))
            ->execute()
            ->fetchRows();

        if (empty($entryArray)) {
            return null;
        }

        $entry = array();

        foreach ($entryArray as $entries) {
            $entryModel = new OpinionsModel();
            $entryModel->setId($entries['id']);
            $entryModel->setUserId($entries['user_id']);
            $entryModel->setDate($entries['date']);
            $entryModel->setRating($entries['rating']);
            $entryModel->setText($entries['text']);
            $entry[] = $entryModel;
        }

        return $entry;
    }

    public function getSumRating()
    {
        $sql = 'SELECT SUM(rating)
                FROM `[prefix]_opinions`';

        $entry = $this->db()->queryCell($sql);

        return $entry;
    }

    public function getStarRating($rating)
    {
        $sql = 'SELECT COUNT(*)
                FROM `[prefix]_opinions`
                WHERE `rating` = '.$rating;

        $entry = $this->db()->queryCell($sql);

        return $entry;
    }

    public function getPercent($count, $totalcount)
    {
        $percent = round(($count / $totalcount) * 100);

        return $percent;
    }

    /**
     * Inserts or updates opinions model.
     *
     * @param OpinionsModel $opinions
     */
    public function save(OpinionsModel $opinions)
    {
        $fields = array
        (
            'user_id' => $opinions->getUserId(),
            'rating' => $opinions->getRating(),
            'text' => $opinions->getText(),
        );

        if ($opinions->getId()) {
            $this->db()->update('opinions')
                ->values($fields)
                ->where(array('id' => $opinions->getId()))
                ->execute();
        } else {
            $this->db()->insert('opinions')
                ->values($fields)
                ->execute();
        }
    }

    /**
     * Deletes opinions with given id.
     *
     * @param integer $id
     */
    public function delete($id)
    {
        $this->db()->delete('opinions')
            ->where(array('id' => $id))
            ->execute();
    }
}
