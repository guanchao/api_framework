<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {

    protected $_resp = [
        'Response' => []
    ];

    public function __construct(){
        parent::__construct();

    }
    
    /**
     * 将结果输出
     * @param $errorCode
     * @param $errorMsg
     */
    protected function response($errorCode=null, $errorMsg=null)
    {
        if ($errorCode) {
            $this->_resp['Response']['RetCode'] = $errorCode;
            $this->_resp['Response']['RetMsg'] = $errorMsg;
        } else {
            $this->_resp['Response']['RetCode'] = 0;
            $this->_resp['Response']['RetMsg'] = "Success";
        }

        log_message('info', json_encode($this->_resp));
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode($this->_resp) . "\n";
    }
    
    /**
     * 参数初始化
     * @param $params
     * @return bool
     */
    protected function initParams(&$params)
    {
        $params = rawurldecode($params);
        $params = json_decode($params, true );

        $this->_resp['Response']['RequestId'] = $params['RequestId'];
        if( !$this->verifyInput($params) ){
            return false;
        }
		return true;
    }
    
    
    /**
     * 校验参数合法性
     * @param $params
     * @return bool
     */
    protected function verifyInput( $params )
    {
        //todo
        return true;
    }

    /**
     * 主逻辑
     * @param $params
     * @return bool
     */
    protected function todo($params)
    {

    }
    

}
