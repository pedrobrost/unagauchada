<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 25/05/17
 * Time: 16:54
 */

namespace UnaGauchada\PublicationBundle\Model;


use UnaGauchada\PublicationBundle\Entity\Publication;

abstract class PublicationSubmissionsState
{

    private $publication;

    abstract public function isActive();

    public function isClosed(){
        return false;
    }

    public function __construct($publication){
        $this->publication = $publication;
    }

    public function addAvailableIfActive($activePublications){
    }

    public function cancel($reason){
        return "";
    }

    /**
     * @return mixed
     */
    public function getPublication()
    {
        return $this->publication;
    }


}