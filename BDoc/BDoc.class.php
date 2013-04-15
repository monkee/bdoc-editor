<?php
/**
 * BDoc ：一种可移植的文档的中间格式
 * 
 * 我们提供一种标准的文档规范，并依此来生成我们方便
 * 移动端、PC端、pad端访问的数据格式，这是我们的目的
 * 
 * @author monkee
 */

class BDoc
{
	private $xmlString = '';
	private $sxml = null;
	private $meta = null;
	private $body = null;
	public function __construct($xml = ""){
		$this->xmlString = $xml;
	}
	
	public function getMeta(){
		
	}
	
	/**
	 * 获取所有的段落信息
	 * 
	 * @return array | Bdoc_Element_Paragraph
	 */
	public function getParagraphs(){
		
	}
	
	/**
	 * 初始化
	 * 
	 * @throws BDoc_Exception
	 */
	private function init(){
		$sxml = simplexml_load_string($this->xmlString);
		if(empty($sxml)){
			throw new BDoc_Exception("BDoc string is not well formatted!");
		}
		$this->sxml = $sxml;
		
		$this->initMeta();
		$this->initBody();
	}
	
	private function initMeta(){
		
	}
	
	private function initBody(){
		
	}
	
	/****************************************
	 * STATIC METHODS
	 * **************************************
	 */
	/**
	 * 通过文件初始化对象
	 * 
	 * @param string $file bdoc文档格式的文件
	 * @return BDoc
	 * 
	 * @throws BDoc_Exception
	 */
	static public function initWithFile($file){
		if(is_file($file) && is_readable($file)){
			return new BDoc(file_get_contents($file));
		}
		throw new BDoc_Exception("{$file} is not valid");
	}
	
	/**
	 * 通过xml字符串初始化对象
	 * 
	 * @param string $string xml字符串
	 * @return BDoc
	 */
	static public function initWithString($string){
		return new BDoc($string);
	}
}

class BDoc_Exception extends Exception{}