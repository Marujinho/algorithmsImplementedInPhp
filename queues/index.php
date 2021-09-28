<?php

require_once('Node.php');

class Queue{

    protected $head;
    protected $tail;

    public function __construct()
    {
        $this->head = new Node();    
        $this->tail = new Node();
    }

    public function getHead()
    {
        return $this->head;   
    }

    public function getTail()
    {
        return $this->tail;   
    }

    public function add($data)
    { 
        $newNode = new Node();   
        $newNode->setData($data);
        
        if($this->tail != null) {
            $this->tail->setNext($newNode);
        }

        $this->tail = $newNode;
        
        if($this->head->getNext() == null) {
            $this->head = $this->tail;
        }
    }

    public function remove()
    {
        $data = $this->head->getData();

        $this->head = $this->head->getNext();

        if($this->head == null){
            $this->tail = null;
        }

        return $data;
    }

    public function removeByValue($value)
    {
        if($this->head == null) {
            return;
        }

        if($this->head->data == $value){
            $this->head = $this->head->next;
        }

        $current = $this->head;

        while($current->next != null) {
            
            if($current->next->data == $value){
                $current->next = $current->next->next;
                return;
            }

            $current = $current->next;
            
        }
    }

}

$queue = new Queue();
print_r($queue->getHead());
print("*************** \n");
$queue->add('AA');
$queue->add('BB');
$queue->add('CC');
print_r($queue->getHead());
$queue->remove();
$queue->remove();
print("*************** \n");
print_r($queue->getHead());