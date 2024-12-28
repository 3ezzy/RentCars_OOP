<?php

class UserController {
    protected $username;
    protected $email;
    protected $address;
    protected $numberPhone;
    protected $role;

    public function __construct($username, $email, $address, $numberPhone, $role) {
        $this->username = $username;
        $this->email = $email;
        $this->address = $address;
        $this->numberPhone = $numberPhone;
        $this->role = $role;
    }
}
?>