<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Categories $Categories
 */
class CategoriesController extends AppController {

    public function display_tree(){

        $this->Category->id = 5; // id of Extreme fishing
        $this->Category->save(array('parent_id' => 6));
        $data = $this->Category->generateTreeList(null, null, null, '--');
//        $data = $this->Category->_setParent(14, 6);
//        pr($data);
        $categories = $this->Category->find('all',array('fields'=>'Category.id'));
//        pr($categories);

//        $path = $this->Category->getPath(5);
//        pr($path);
//
//        $path1 = $this->Category->getPath(4);
//        pr($path1);
        $test=$this->Category->children(5,true);
//        pr($test);

        foreach($categories as $category){
            $level1 = $this->Category->children($category['Category']['id'],true);
            if(!empty($level1)){
//                pr($level1);
            }
        }
        $child = $this->Category->children(2,null,false);
        pr($child);


//        $directChildren = $this->Category->children(1, true);
//        pr($directChildren);

        $this->set(compact('data'));

    }
}
