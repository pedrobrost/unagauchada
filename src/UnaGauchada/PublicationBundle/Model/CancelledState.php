<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 25/05/17
 * Time: 16:52
 */

namespace UnaGauchada\PublicationBundle\Model;


class CancelledState extends PublicationAvailableState
{
    public function isActive($publication){
        return false;
    }
}