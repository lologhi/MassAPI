<?php

namespace MassAPIBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class SearchForm
{
    /**
     * @var integer
     *
     * @Assert\Type("integer")
     */
    protected $postalCode;

    /**
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param int $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }
}
