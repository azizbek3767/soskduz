<?php
    
class upayApi
{
    
    public $param;
    public $method;
    
    
    public function __construct()
    {  
        $request_body  = file_get_contents('php://input');
        $this->param = json_decode($request_body, true);  
                    
    }
    

    /**
     * Authorizes session and handles requests.
     */
    public function setParams()
    {
        if ($this->param) {
            $where[] = "id='" . $this->param['personalAccount'] . "'";
            $where[] = "amount='" . $this->param['upayPaymentAmount'] . "'";
            
            $result = dbQuery('orders', DB_VALUE, array('where' => $where));
            
            if ($result) {
                $this->send(1, "Успешно");
            } else {
                $this->send(0,  "Клиент с таким номером не найден.");
                
            }
            
        }
         
        
    }
  
    
    public function send($result, $message = null)
    {
        header('Content-Type: application/json; charset=UTF-8');

        $response['status']  = $result;
        $response['message'] = $message;

        echo json_encode($response);
    }
    
}
    