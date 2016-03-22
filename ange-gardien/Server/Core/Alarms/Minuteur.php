<?php

namespace Server\Core\Alarms;

class Minuteur{
	protected $id;
    protected $alerteTimestamp;
    protected $alerteNb;
	protected $dateDebut;
	protected $dateDeclenchement;
	protected $motDePasseMd5;
	protected $motDePasseAlerteMd5;
	protected $nbEssais = 0;
	protected $declencher = false;
    protected $actif = true;
    protected $message;

    // array
    protected $ContactsTexto;
    protected $NotesText;


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
     * Gets the value of dateDebut.
     *
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Sets the value of dateDebut.
     *
     * @param mixed $dateDebut the date debut
     *
     * @return self
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Gets the value of dateDeclenchement.
     *
     * @return mixed
     */
    public function getDateDeclenchement()
    {
        return $this->dateDeclenchement;
    }

    /**
     * Sets the value of dateDeclenchement.
     *
     * @param mixed $dateDeclenchement the date declenchement
     *
     * @return self
     */
    public function setDateDeclenchement($dateDeclenchement)
    {
        $this->dateDeclenchement = $dateDeclenchement;

        return $this;
    }

    /**
     * Gets the value of motDePasseMd5.
     *
     * @return mixed
     */
    public function getMotDePasseMd5()
    {
        return $this->motDePasseMd5;
    }

    /**
     * Sets the value of motDePasseMd5.
     *
     * @param mixed $motDePasseMd5 the mot de passe md5
     *
     * @return self
     */
    public function setMotDePasseMd5($motDePasseMd5)
    {
        $this->motDePasseMd5 = $motDePasseMd5;

        return $this;
    }

    /**
     * Gets the value of motDePasseAlerteMd5.
     *
     * @return mixed
     */
    public function getMotDePasseAlerteMd5()
    {
        return $this->motDePasseAlerteMd5;
    }

    /**
     * Sets the value of motDePasseAlerteMd5.
     *
     * @param mixed $motDePasseAlerteMd5 the mot de passe alerte md5
     *
     * @return self
     */
    public function setMotDePasseAlerteMd5($motDePasseAlerteMd5)
    {
        $this->motDePasseAlerteMd5 = $motDePasseAlerteMd5;

        return $this;
    }

    /**
     * Gets the value of declencher.
     *
     * @return mixed
     */
    public function getDeclencher()
    {
        return $this->declencher;
    }

    /**
     * Sets the value of declencher.
     *
     * @param mixed $declencher the declencher
     *
     * @return self
     */
    public function setDeclencher($declencher)
    {
        $this->declencher = $declencher;

        return $this;
    }

    /**
     * Gets the value of alerteTimestamp.
     *
     * @return mixed
     */
    public function getAlerteTimestamp()
    {
        return $this->alerteTimestamp;
    }

    /**
     * Sets the value of alerteTimestamp.
     *
     * @param mixed $alerteTimestamp the alerte timestamp
     *
     * @return self
     */
    public function setAlerteTimestamp($alerteTimestamp)
    {
        $this->alerteTimestamp = $alerteTimestamp;

        return $this;
    }

    /**
     * Gets the value of alerteNb.
     *
     * @return mixed
     */
    public function getAlerteNb()
    {
        return $this->alerteNb;
    }

    /**
     * Sets the value of alerteNb.
     *
     * @param mixed $alerteNb the alerte nb
     *
     * @return self
     */
    public function setAlerteNb($alerteNb)
    {
        $this->alerteNb = $alerteNb;

        return $this;
    }

    /**
     * Gets the value of nbEssais.
     *
     * @return mixed
     */
    public function getNbEssais()
    {
        return $this->nbEssais;
    }

    /**
     * Sets the value of nbEssais.
     *
     * @param mixed $nbEssais the nb essais
     *
     * @return self
     */
    public function setNbEssais($nbEssais)
    {
        $this->nbEssais = $nbEssais;

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
     * Gets the value of message.
     *
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the value of message.
     *
     * @param mixed $message the message
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Gets the value of ContactsTexto.
     *
     * @return mixed
     */
    public function getContactsTexto()
    {
        return $this->ContactsTexto;
    }

    /**
     * Sets the value of ContactsTexto.
     *
     * @param mixed $ContactsTexto the contacts texto
     *
     * @return self
     */
    public function setContactsTexto($ContactsTexto)
    {
        $this->ContactsTexto = $ContactsTexto;

        return $this;
    }

    /**
     * Gets the value of NotesText.
     *
     * @return mixed
     */
    public function getNotesText()
    {
        return $this->NotesText;
    }

    /**
     * Sets the value of NotesText.
     *
     * @param mixed $NotesText the notes text
     *
     * @return self
     */
    public function setNotesText($NotesText)
    {
        $this->NotesText = $NotesText;

        return $this;
    }

    public function toArray(){
        $me = array(
            'id' => $this->getId(),
            'alerteTimestamp' => $this->getAlerteTimestamp(),
            'alerteNb' => $this->getAlerteNb(),
            'dateDebut' => $this->getDateDebut(),
            'dateDeclenchement' => $this->getDateDeclenchement(),
            'motDePasseMd5' => $this->getMotDePasseMd5(),
            'motDePasseAlerteMd5' => $this->getMotDePasseAlerteMd5(),
            'nbEssais' => $this->getNbEssais(),
            'declencher' => $this->getDeclencher(),
            'actif' => $this->getActif(),
            'message' => $this->getMessage(),
        );

        foreach ($this->getContactsTexto() as $ct) {
            $me['ContactsTexto'][] = $ct->toArray();
        }

        foreach ($this->getNotesText() as $nt){
            $me['NotesText'][] = $nt->toArray();
        }

        return $me;
    }
}