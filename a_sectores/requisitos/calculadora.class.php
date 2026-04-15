<?php

abstract class Calculadora
{
    /**
     *Class calculator
     * @author Carlos Encine <Carlos_alexandre88@hotmail.com>
     * @version 1.0  
     */
    public $value1;
    public $value2;
    public $operation;
    public $result;
    
    public function getvalues()
    {
        $this->value1 = $_POST['value1'];
        $this->value2 = $_POST['value2'];
        $this->operation = $_POST['operation'];
    }
    public function operations()
    {
        if($this->operation == 'sum')
        {
            $this->result = $this->value1 + $this->value2;                    
        } elseif($this->operation == 'subtraction')
        {
            $this->result = $this->value1 - $this->value2;                    
        } elseif($this->operation == 'multiplication')
        {
            $this->result = $this->value1 * $this->value2;
        } elseif($this->operation == 'division')
        {
            $this->result = $this->value1 + $this->value2;
            try{
            if($this->value2 == 0)
            {
                throw new Exception('Can not divide by zero');
            }
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
            }
        }
    }
}
?>
