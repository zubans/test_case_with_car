<?php
namespace main;
require 'BaseTest.php';

testCase([1, 1, 1], ['t','c','t','c','c'], ['y', 'y', 'n', 'y', 'n']);
testCase([0, 0, 0], ['t','c','t','c','c'], ['n', 'n', 'n', 'n', 'n']);
testCase([3, 0, 1], ['t','c','t','c','c'], ['y', 'y', 'y', 'y', 'n']);
testCase([1, 0, 2], ['t','c','t','c','c'], ['y', 'y', 'n', 'y', 'n']);
testCase([2, 3, 2], ['t','c','t','c','c'], ['y', 'y', 'y', 'y', 'y']);
testCase([1, 1, 1], ['t','c','t','b','c'], 'Unpermited car');
testCase([1, 1, 1], [], 'Empty car array');
