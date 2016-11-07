<?php

class ClassParent {
    public function doThing() {
        echo "I'm the parrot, squawk!<br>";
    }
}

class ClassChild extends ClassParent {
    public function doThing()
    {
        echo "I'm the babybird, tweetytweet!<br>";
        parent::doThing();
    }
}

$obj = new ClassChild();
$obj->doStuff();