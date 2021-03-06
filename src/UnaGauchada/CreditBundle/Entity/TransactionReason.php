<?php

namespace UnaGauchada\CreditBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransactionReason
 *
 * @ORM\Table(name="transaction_reason")
 * @ORM\Entity(repositoryClass="UnaGauchada\CreditBundle\Repository\TransactionReasonRepository")
 */
class TransactionReason
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="reason")
     */
    private $transactions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TransactionReason
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add transaction
     *
     * @param \UnaGauchada\CreditBundle\Entity\Transaction $transaction
     *
     * @return TransactionReason
     */
    public function addTransaction(\UnaGauchada\CreditBundle\Entity\Transaction $transaction)
    {
        $this->transactions[] = $transaction;

        return $this;
    }

    /**
     * Remove transaction
     *
     * @param \UnaGauchada\CreditBundle\Entity\Transaction $transaction
     */
    public function removeTransaction(\UnaGauchada\CreditBundle\Entity\Transaction $transaction)
    {
        $this->transactions->removeElement($transaction);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Set amountOfCredits
     *
     * @param integer $amount
     *
     * @return TransactionReason
     */
    public function setAmountOfCredits($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get $amount
     *
     * @return integer
     */
    public function getAmountOfCredits()
    {
        return $this->amount;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return TransactionReason
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }




    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return TransactionReason
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    public function newTransactionFor($user, $amount = 1){
        $transaction = new Transaction($this, $user);
        $transaction->setPrice($this->getPrice())
                    ->setAmountOfCredits($this->getAmount()*$amount);
        $user->addTransaction($transaction);
        return $transaction;
    }

}
