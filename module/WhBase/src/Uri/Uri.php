<?php
namespace WhBase\Uri;

/**
 * Generic URI handler
 * Added basePath & baseQuery
 */
class Uri extends \Zend\Uri\Uri
{
    protected $basePath;
    protected $extraPath;
    protected $callbackName;
    protected $callback;
    protected $version;
    protected $versionName = 'v';
    protected $baseQuery;
    protected $extraQuery;
    protected $htmlEncode = false;
    protected $urlEncode = false;

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function setBasePath($basePath = '')
    {
        if(!$basePath){
            return $this;
        }

        $this->basePath = $basePath;
        $path = $this->getPath();
        $path = $basePath . $path;
        $this->setPath($path);

        return $this;
    }

    public function setExtraPath($extraPath = '')
    {
        if(!$extraPath){
            return $this;
        }

        $this->extraPath = $extraPath;
        $path = $this->getPath();
        $basePath = $basePath ? $basePath : $this->getBasePath();
        $path = $basePath . $extraPath . $path;
        $this->setPath($path);

        return $this;
    }

    public function getExtraPath()
    {
        return $this->extraPath;
    }

    public function getCallback()
    {
        return $this->callback;
    }

    public function setCallback($callback)
    {
        if(!$callback){
            return $this;
        }
        
        $query = $this->getQueryAsArray();
        $callbackName = $this->getCallbackName();
        if(!$callbackName){
            return $this;
        }

        $query[$callbackName] = $callback;
        $this->setQuery($query);
        $this->callback = $callback;
        return $this;
    }

    public function getCallbackName()
    {
        return $this->callbackName;
    }

    public function setCallbackName($callbackName)
    {
        $this->callbackName = $callbackName;
        return $this;
    }

    public function setVersion($version)
    {
        $this->version = $version;

        $query = $this->getQueryAsArray();
        $versionName = $this->getVersionName();
        if(!$versionName || empty($version)){
            return $this;
        }

        $query[$versionName] = $version;
        $this->setQuery($query);
        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersionName($versionName)
    {
        $this->versionName = $versionName;
        return $this;
    }

    public function getVersionName()
    {
        return $this->versionName;
    }

    public function getBaseQuery()
    {
        return $this->baseQuery;
    }

    public function setBaseQuery($baseQuery = array())
    {
        if(!$baseQuery){
            return $this;
        }
        $this->baseQuery = $baseQuery;
        $query = $this->getQueryAsArray();
        $query = array_merge((array) $query, (array) $baseQuery);
        $this->setQuery($query);
        return $this;
    }

    public function setExtraQuery($extraQuery = array())
    {
        if(!$extraQuery){
            return $this;
        }
        $this->extraQuery = $extraQuery;
        $query = $this->getQueryAsArray();
        $query = array_merge((array) $query, (array) $extraQuery);
        $this->setQuery($query);
        return $this;
    }

    public function deleteEmptyQuery()
    {
        $query = $this->getQueryAsArray();
        if(!$query){
            return $this;
        }
        foreach($query as $key => $value){
            if(empty($value)){
                unset($query[$key]);
            }
        }
        ksort($query);
        $this->setQuery($query);
        return $this;
    }

    public function urlEncode()
    {
        $this->urlEncode = true;
        return $this;
    }

    public function htmlEncode()
    {
        $this->htmlEncode = true;
        return $this;
    }

    public function toString()
    {
        if($this->host && !$this->scheme){
            $this->setScheme('http');
        }

        $url = parent::toString();

        if(true === $this->htmlEncode){
            $url = htmlentities($url, ENT_QUOTES, 'UTF-8');
        }

        if(true === $this->urlEncode){
            $url = urldecode($url);
        }
        return $url;
    }
}
