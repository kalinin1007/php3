<?php

namespace Controllers;

class UserController extends BaseController
{
    public function signin()
    {
        $this->title .= ' - Entrance';
        $this->content = $this->build('signin.php', ['errors'=>null]);
        
    }

    public function signup()
    {
        $this->title .= ' - registration';
        $this->content = $this->build('signup.php', ['errors'=>null]);
        
    }
}