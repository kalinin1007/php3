<?php

namespace Core;

class Request
{
	const METHOD_POST = 'POST';
	const METHOD_GET = 'GET';

	private $get;
	private $post;
	private $server;
	private $cookie;
	private $file;
	private $session;

	public function __construct($get, $post, $server, $cookie, $file, $session)
	{
		$this->get = $get;
		$this->post = $post;
		$this->server = $server;
		$this->cookie = $cookie;
		$this->file = $file;
		$this->session = $session;
	}

	public function get($key = null)
	{
		if (!$key) {
			return $this->get;
		}

		if (isset($this->get[$key])) {
			return $this->get[$key];
		}

		return null;
	}

	public function param($key = null)
	{
		
		if (isset($this->get[$key])) {
			return $this->get[$key];
		}

		if (isset($this->post[$key])) {
			return $this->post[$key];
		}

		return null;
	}

	public function isPost()
	{
		return $this->server['REQUEST_METHOD'] === self::METHOD_POST;
	}
}