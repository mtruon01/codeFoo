<?php declare(strict_types=1);

use Ds\Stack;

/**
 * Created by Thong Truong (Tom)
 * Email: thong.truong@MadWireMedia.com
 * Date: 2019-06-18
 * Time: 12:22
 */

/** Challenge #40 Implement Queue Using Stacks */

class Queue {
    protected $pushStack = null;

    protected $popStack = null;

    public function __construct() {
        $this->pushStack = new Stack();
        $this->popStack = new Stack();
    }

    public function push($value) {
        $this->pushStack->push($value);
    }

    public function pop() {
        if($this->popStack->isEmpty() === true) {
            $this->transferPushToPopStack();
        }

        return $this->popStack->pop();
    }

    public function peek() {
        if($this->popStack->isEmpty() === true) {
            $this->transferPushToPopStack();
        }

        return $this->popStack->peek();
    }

    public function empty() {
        if($this->pushStack->isEmpty() && $this->popStack->isEmpty()) {
            return true;
        }

        return false;
    }

    protected function transferPushToPopStack() {
        $counter = $this->pushStack->count();
        for($i = 0; $i < $counter; $i++) {
            $this->popStack->push($this->pushStack->pop());
        }
    }
}