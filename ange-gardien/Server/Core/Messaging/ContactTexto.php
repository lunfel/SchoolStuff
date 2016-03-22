<?php

namespace Server\Core\Messaging;

class ContactTexto extends Contact {
	protected $contact;

    /**
     * Gets the value of contact.
     *
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the value of contact.
     *
     * @param mixed $contact the contact
     *
     * @return self
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    public function toArray(){
        return array_merge(parent::toArray(),array(
            'contact' => $this->getContact()
        ));
    }
}