<?php

namespace Server\Security;

use Server\Exceptions\NullObjectException;

class Utilisateur {

	private $id;
	private $dateActivation;
	private $clientProvider;
	private $clientId;
	private $actif;

    // array
    private $minuteurs;

	public function __construct(){
		$this->dateActivation = new \DateTime();
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

    /**
     * Gets the value of dateActivation.
     *
     * @return mixed
     */
    public function getDateActivation()
    {
        return $this->dateActivation;
    }

    /**
     * Sets the value of DateActivation.
     *
     * @param mixed $date the date of activation
     *
     * @return self
     */
    public function setDateActivation($date){
		$d = new \DateTime($date);
		if($d === NULL){
			throw new NullObjectException();
		}
		else {
			$this->dateActivation = $d;
		}
	}

    /**
     * Gets the value of clientProvider.
     *
     * @return mixed
     */
    public function getClientProvider()
    {
        return $this->clientProvider;
    }

    /**
     * Sets the value of clientProvider.
     *
     * @param mixed $clientProvider the client provider
     *
     * @return self
     */
    public function setClientProvider($clientProvider)
    {
        $this->clientProvider = $clientProvider;

        return $this;
    }

    /**
     * Gets the value of clientId.
     *
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets the value of clientId.
     *
     * @param mixed $clientId the client id
     *
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Gets the value of actif.
     *
     * @return mixed
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Sets the value of actif.
     *
     * @param mixed $actif the actif
     *
     * @return self
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Gets the value of minuteurs.
     *
     * @return mixed
     */
    public function getMinuteurs()
    {
        return $this->minuteurs;
    }

    /**
     * Sets the value of minuteurs.
     *
     * @param mixed $minuteurs the minuteurs
     *
     * @return self
     */
    public function setMinuteurs($minuteurs)
    {
        $this->minuteurs = $minuteurs;

        return $this;
    }

    /**
     * Representation JSON de l'objet utilisateur
     */
    public function toArray(){
        $me = array(
            'id' => $this->getId(),
            'clientProvider' => $this->getClientProvider(),
            'clientId' => $this->getClientId(),
            'dateActivation' => $this->getDateActivation(),
            'actif' => $this->getActif()
        );

        foreach ($this->getMinuteurs() as $key => $minuteur) {
            $me['minuteurs'][] = $minuteur->toArray();
        }

        return $me;
    }
}