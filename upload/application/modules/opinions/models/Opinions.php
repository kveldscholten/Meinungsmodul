<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Opinions\Models;

class Opinions extends \Ilch\Model
{
    /**
     * The id of the opinions.
     *
     * @var int
     */
    protected $id;

    /**
     * The user id of the opinions.
     *
     * @var int
     */
    protected $userId;

    /**
     * The date of the opinions.
     *
     * @var \Ilch\Date
     */
    protected $date;

    /**
     * The rating of the opinions.
     *
     * @var int
     */
    protected $rating;

    /**
     * The text of the opinions.
     *
     * @var string
     */
    protected $text;

    /**
     * Gets the id of the opinions.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the id of the opinions.
     *
     * @param int $id
     * @return this
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Gets the user id of the opinions.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Sets the user id of the opinions.
     *
     * @param int $userId
     * @return this
     */
    public function setUserId($userId)
    {
        $this->userId = (int)$userId;

        return $this;
    }

    /**
     * Gets the date of the opinions.
     *
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date of the opinions.
     *
     * @param \Ilch\Date $date
     * @return this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Gets rating id of the opinions.
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Sets the rating of the opinions.
     *
     * @param int $userId
     * @return this
     */
    public function setRating($rating)
    {
        $this->rating = (int)$rating;

        return $this;
    }

    /**
     * Gets the text of the opinions.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the text of the opinions.
     *
     * @param string $text
     * @return this
     */
    public function setText($text)
    {
        $this->text = (string)$text;

        return $this;
    }
}
