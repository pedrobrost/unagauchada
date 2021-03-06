<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 25/05/17
 * Time: 16:54
 */

namespace UnaGauchada\PublicationBundle\Model;


use UnaGauchada\PublicationBundle\Entity\Publication;

class WithSubmissionsState extends PublicationSubmissionsState
{
    public function addAvailableIfActive($activePublications){
        $activePublications->add($this->getPublication());
    }

    public function cancel($reason){
        $this->getPublication()->setIsCancelled(true);
        return "Tu publicación ha sido cancelada exitosamente.";
    }

    public function isActive(){
        return true;
    }

}