<?php
/**
 *
 */

interface Status
{
    public function proceedToNext(OrderContext $context);

    public function toString(): string;
}

class OrderContext
{
    /**
     * @var Status
     */
    private $status;

    public static function create(): OrderContext
    {
        $order = new self();
        $order->status = new StatusNew();

        return $order;
    }

    public function setStatus(Status $status)
    {
        $this->status = $status;
    }

    public function proceedToNext()
    {
        $this->status->proceedToNext($this);
    }

    public function toString()
    {
        return $this->status->toString();
    }
}

class StatusNew implements Status
{
    public function proceedToNext(OrderContext $context)
    {
        $context->setStatus(new StatusInProgress());
    }

    public function toString(): string
    {
        return 'new';
    }
}

class StatusInProgress implements Status
{
    public function proceedToNext(OrderContext $context)
    {
        $context->setStatus(new StatusCompleted());
    }

    public function toString(): string
    {
        return 'in_progress';
    }
}

class StatusCompleted implements Status
{
    public function proceedToNext(OrderContext $context)
    {
        $context->setStatus(new StatusApproved());
    }

    public function toString(): string
    {
        return 'completed';
    }
}

class StatusApproved implements Status
{
    public function proceedToNext(OrderContext $context)
    {

    }

    public function toString(): string
    {
        return 'approved';
    }
}



$order = OrderContext::create();
echo $order->toString()."<br>";
$order->proceedToNext();
echo $order->toString()."<br>";
$order->proceedToNext();
echo $order->toString()."<br>";
$order->proceedToNext();
echo $order->toString()."<br>";
