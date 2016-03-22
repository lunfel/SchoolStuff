<?php

namespace Server\Core\Messaging;

use Server\Exceptions\NullObjectException;

abstract class Contact {
    protected $id;
	protected $dateEnvoi;
	protected $statusEnvoi;

    /**
     * Gets the value of dateEnvoi.
     *
     * @return mixed
     */
    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }

    /**
     * Sets the value of dateEnvoi.
     *
     * @param mixed $dateEnvoi the date envoi
     *
     * @return self
     */
    public function setDateEnvoi($dateEnvoi)
    {
        $d = new \DateTime($dateEnvoi);

        if(!$d){
        	throw new NullObjectException();
        }

        $this->dateEnvoi = $d;
        return $this;
    }

    /**
     * Gets the value of statusEnvoi.
     *
     * @return mixed
     */
    public function getStatusEnvoi()
    {
        return $this->statusEnvoi;
    }

    /**
     * Sets the value of statusEnvoi.
     *
     * @param mixed $statusEnvoi the status envoi
     *
     * @return self
     */
    public function setStatusEnvoi($statusEnvoi)
    {
        $this->statusEnvoi = $statusEnvoi;

        return $this;
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function toArray(){
        return array(
            'id' => $this->getId(),
            'dateEnvoi' => $this->getDateEnvoi(),
            'statusEnvoi' => $this->getStatusEnvoi()
        );
    }
}