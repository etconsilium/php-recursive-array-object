<?php
/**
 * @author: etconsilium@github
 * @license: BSDLv2
 */


class RecursiveArrayObject extends \ArrayObject {
    public function __construct($input = null, $flags = self::ARRAY_AS_PROPS, $iterator_class = "ArrayIterator"){
        foreach($input as $k=>$v) $this->__set($k, $v);
        return $this;
    }
    public function __set($name, $value){
        if (is_array($value) || is_object($value))
            $this->offsetSet($name,(new self($value)));
        else
            $this->offsetSet($name, $value);
    }
    public function __get($name){
        if ($this->offsetExists($name))
            return $this->offsetGet($name);
        elseif (array_key_exists($name, $this)) {
            return $this[$name];
        }
        else {
            throw new \InvalidArgumentException(sprintf('$this have not prop `%s`',$name));
        }
    }
    public function __isset($name){
        return array_key_exists($name, $this);
    }
    public function __unset($name){
        unset($this[$name]);
    }
    public function get(){

    }

    public function set($value){

    }
//    public function current(){
//
//    }
//    public function key(){
//
//    }
//    public function next(){
//
//    }
//    public function rewind(){
//
//    }
//    public function valid(){
//
//    }
}