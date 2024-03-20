<?php
/**
 * @name RequestPlugin
 * @desc Yaf定义了如下的6个Hook,插件之间的执行顺序是先进先Call
 * @see http://www.php.net/manual/en/class.yaf-plugin-abstract.php
 * @author xulei
 */
class RequestPlugin extends Yaf_Request_Http
{
    protected $params = [];

	public function __construct($request_uri, $base_uri)
    {
        parent::__construct($request_uri, $base_uri);

        $raw = parent::getRaw();
        if ($raw) {
            $this->params = json_decode($raw, true);
        }

    }

    public function getPost($name = null, $default = null)
    {
        $params = parent::getPost($name, $default);
        $params["is_post"] = true;
        return $params;
    }

    public function getQuery($name = null, $default = null)
    {
        $params = parent::getQuery($name, $default);
        $params["is_get"] = true;
        return $params;
    }
}
