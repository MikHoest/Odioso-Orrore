<?php

$menu = new Menu;

$menu->add('Home', '');

$about = $menu->add('About', 'about');

$about->link->append(' <span class="caret"></span>');


$about->link->attributes(['class' => 'link-item', 'target' => '_blank']);

$about->attributes('data-model', 'nice');

$t = $about->add('Who we are?', array('url' => 'who-we-are',  'class' => 'navbar-item whoweare'));
$about->add('What we do?', array('url' => 'what-we-do',  'class' => 'navbar-item whatwedo'));

$menu->add('Portfolio', 'portfolio');
$menu->add('Contact',   'contact');


$menu->filter( function($item){
    if( $item->meta('display') === false) {
        return false;
    }
    return true;
});


echo $menu->asUl( attribute('class' ==> 'ausomw-ul') );


echo $menu->asOl( attribute('class' ==> 'ausomw-ol') );



echo $menu->asDiv( attribute('class' ==> 'ausomw-div') );

?>