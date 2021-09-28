<?php

class Stack{

    protected $stack = [];

    public function add($data)
    {
        array_unshift($this->stack, $data);
    }

    public function remove()
    {
        $data = array_shift($this->stack);

        print("removi: ");
        print($data);
        print("\n");

        return $data;
    }

    public function top() {

        print("No topo da stack: ");
        print(next($this->stack));
        print("\n");

        return current($this->stack);
    }
    
    public function pop() {

        print("POP: ");
        print(array_pop($this->stack));
        print("\n");

        return current($this->stack);
    }

    public function swapByValue($val1, $val2)
    {
        if(!in_array($val1, $this->stack) || !in_array($val2, $this->stack) ){
            throw new Exception("Values not found in stack", 1);
        }

        $temp1 = [];
        $temp2 = [];
        for ($i=0; $i < count($this->stack); $i++) { 
            if($this->stack[$i] == $val1){
                $temp1['position'] = $i;
                $temp1['value'] = $this->stack[$i];
            } 
            
            if($this->stack[$i] == $val2) {
                $temp2['position'] = $i;
                $temp2['value'] = $this->stack[$i];
            }
        }

        $this->stack[$temp1['position']] = $temp2['value'];
        $this->stack[$temp2['position']] = $temp1['value'];

        return $this->stack;
    }

    public function reverse() {
        
        $this->stack = array_reverse($this->stack);
        return $this->stack;
    }

    public function print()
    {
        print_r($this->stack);
    }

}

$stack = new Stack();
$stack->add('danny');
$stack->add('sophie');
$stack->add('Oliver');
// $stack->reverse();
$stack->print();
$stack->swapByValue('danny', 'sophie');
$stack->print();

?>
