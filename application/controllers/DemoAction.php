<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 【xxx接口】
 * 每一个接口对应一个Controller
 */
class DemoAction extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->_resp['Response']['Action'] = 'DemoAction';
        $this->_resp['Response']['Data'] = [];
    }

    /**
     * 校验参数合法性
     * @param $params
     * @return bool
     */
    protected function verifyInput($params)
    {
        if (parent::verifyInput($params) == false) {
            return false;
        }

        //todo

        return true;
    }

    /**
     * 主逻辑
     * @param $params
     * @return bool
     */
    public function todo($params)
    {
        if (!$this->initParams($params)) {
            $this->response(ErrorCode::ParamErrorCode, ErrorCode::ParamErrorMsg);
            return;
        }

        //todo

        $this->response();
    }

}
