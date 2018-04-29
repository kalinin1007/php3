<?php

namespace Controllers;

use Core\Templater;
use Core\Request;

class BaseController
{
    protected $title;
    protected $content;
	protected $request;

    public function __construct(Request $request)
	{
		$this->title = 'Php3';
        $this->content = '';
		$this->request = $request;
	}

	public function render()
	{
		echo $this->build(
				'base.php',
				[
					'title' => $this->title,
					'content' => $this->content
				]
			 );
	}

	protected function build($template, array $params = [])
	{
		ob_start();
		extract($params);
		include_once __DIR__.'/../Templates/'.$template;

		return ob_get_clean();
	}
}