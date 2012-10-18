<?php
App::uses('AppModel', 'Model');
/**
 * Categories Model
 *
 */
class Category extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    public $name = 'Category';
    public $actsAs = array('Tree');

}
