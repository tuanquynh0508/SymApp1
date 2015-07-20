<?php

namespace TuanQuynh\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhotoImage
 */
class PhotoImage
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $metaData;

    /**
     * @var string
     */
    private $note;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \TuanQuynh\BusinessBundle\Entity\PhotoAlbum
     */
    private $photoAlbum;


    /**
     * Set file
     *
     * @param string $file
     * @return PhotoImage
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set metaData
     *
     * @param string $metaData
     * @return PhotoImage
     */
    public function setMetaData($metaData)
    {
        $this->metaData = $metaData;

        return $this;
    }

    /**
     * Get metaData
     *
     * @return string 
     */
    public function getMetaData()
    {
        return $this->metaData;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return PhotoImage
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return PhotoImage
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return PhotoImage
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return PhotoImage
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set photoAlbum
     *
     * @param \TuanQuynh\BusinessBundle\Entity\PhotoAlbum $photoAlbum
     * @return PhotoImage
     */
    public function setPhotoAlbum(\TuanQuynh\BusinessBundle\Entity\PhotoAlbum $photoAlbum = null)
    {
        $this->photoAlbum = $photoAlbum;

        return $this;
    }

    /**
     * Get photoAlbum
     *
     * @return \TuanQuynh\BusinessBundle\Entity\PhotoAlbum 
     */
    public function getPhotoAlbum()
    {
        return $this->photoAlbum;
    }
}
