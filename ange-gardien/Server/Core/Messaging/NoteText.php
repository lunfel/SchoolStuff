<?php

namespace Server\Core\Messaging;

class NoteText extends Note {
	protected $note;

    /**
     * Gets the value of note.
     *
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets the value of note.
     *
     * @param mixed $note the note
     *
     * @return self
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    public function toArray(){
        return array_merge(parent::toArray(),array(
            'note' => $this->getNote()
        ));
    }
}