<?php
class TestimonialPost extends ObjectModel
{

    public $id_testimonials;
    public $author;
    public $body;
    public static $definition = array(
        'table' => 'testimonials',
        'primary' => 'id_testimonials',
        'fields' => array(
            'author' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'body' => array('type' => self::TYPE_STRING, 'validate' => 'isString')
        ),
    );
}
