<?php

namespace Faylite\TaskList;

class Response
{
	/**
	 * The body for the response
	 */
	protected $body;
	
	/**
	 * The status code for the response
	 */
	protected $statusCode = 200;
	
	/**
	 * Any additional headers for the response
	 */
	protected $headers = [];
	
	/**
	 * Sets the body for the response
	 */
	public function setBody($body)
	{
		$this->body = $body;
		return $this;
	}
	
	/**
	 * Returns the body for the response
	 */
	public funciton getBody()
	{
		return $this->body;
	}
	
	/**
	 * Sets the status code for the response
	 */
	public function withStatus($statusCode)
	{
		$this->statusCode = $statusCode;
		return $this;
	}
	
	/**
	 * Returns the status code for the response
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}
	
	/**
	 * Json encodes the body for the response
	 */
	public function withJson($body)
	{
		$this->withHeader('Content-Type', 'application/json');
		$this->body = json_encode($body);
		return $this;
	}
	
	/**
	 * Sets any additional headers for the response
	 */
	public function withHeader($name, $value)
	{
		$this->headers[] = [$name, $value];
		return $this;
	}
	
	/**
	 * Returns the headers for the response
	 */
	public function getHeaders()
	{
		return $this->headers;
	}
}
