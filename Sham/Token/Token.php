<?php


//获取一个token
/*
 * 一个用户
 * 一个设备
 *
 * - 考虑到用户更换账号
 *
 * 获取到一个token
 */

//$token = sapp('token')->createToken([
//    'appid'     => '',
//    'secret'    => '',
//    'deviceId'  => '',      //记录设备id
//    'userId'    => '',      //记录用户id
//    'timestamp' => '',      //客户端传递 [ 服务器端计算 ]
//    'nonce'     => '',      //客户端传递 [ 服务端计算 ]
//]);
//
////返回token的记录信息
//$res = sapp('token')->token($token)
//    ->getType();
//->getResource();
//->getExpiresAt();
//->isUsable();
//->isExpired();
//->getResource();
//
////验证token是否有效
//$states = sapp('token')->isToken($token);
//
//D($res);

namespace Sham\Token;

class Token
{

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $hash;

    /**
     * @var int
     */
    protected $usages;

    /**
     * @var \DateTime
     */
    protected $expiresAt;

    /**
     * @var mixed
     */
    protected $resource;

    /**
     * @param string $type
     * @return Token
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param \DateTime $expiresAt
     * @return Token
     */
    public function setExpiresAt(\DateTime $expiresAt = null)
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param string $hash
     * @return Token
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $resource
     * @return Token
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }


    public function isExpired()
    {

    }

    public function isUsable()
    {
        return is_null($this->usages) || $this->usages;
    }

    /**
     * @return Token
     */
    public function decrementUsages()
    {
        if ($this->isUsable() && $this->usages) {
            $this->usages--;
        }
        return $this;
    }

}

