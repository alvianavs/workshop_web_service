<?php

class UserController extends Controller
{
    public $table = 'user';
    public $primary_key = 'id';
    public $columns = ["username", "email", "password", "create_time"]; // list column of yout table
    public $required = ["username", "email", "password", "create_time"];

}
