<?php
namespace main;

require 'Main.php';

var_dump((new Main([1, 1, 1], ['t','c','t','c','c']))->getResult());
