<?php

require_once('Node.php');

class Stack{

    private $head;

    public function getHead()
    {
        return $this->head;   
    }

    public function setHead($head)
    {
        $this->head = $head;   
    }

    public function push($data)
    {
        $newNode = new Node($data);
        $newNode->setNext($this->head);

        $this->head = $newNode; 
    }

    public function pop()
    {
        if($this->head == null) {
            throw new Exception("Stack is Empty", 1);
        }

        $this->head = $this->head->getNext();   
    }   
}

$stack = new Stack();
$stack->push('AA');
$stack->push('BB');
$stack->push('CC');
$stack->pop();
print_r( $stack->getHead() );


