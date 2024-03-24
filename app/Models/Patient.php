<?php

namespace App\Models;

class Patient extends BaseModel
{
    public string $userid;
    public string $health_condition;
    public string $note;

    /**
     * @param string $userid
     */
    public function __construct(string $userid, string $health_condition, string $note)
    {
        parent::__construct();
        $this->userid = $userid;
        $this->health_condition = $health_condition;
        $this->note = $note;
    }

    public function getUserId(): string
    {
        return $this->userid;
    }

    public function getHealthCondition(): string
    {
        return $this->health_condition;
    }
    public function getNote(): string
    {
        return $this->note;
    }

}