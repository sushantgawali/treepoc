<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Categories $Categories
 */
class CategoriesController extends AppController {

    public function display_tree(){

        $data = $this->Category->generateTreeList(null, null, null, '--');
        $categories = $this->Category->find('threaded');
//        pr($categories);
        $this->set(compact('data','categories'));

    }

    public function node_change(){
        $this->autoRender = false;

        $id1 = $this->request->data['data1'];
        $id2 = $this->request->data['data2'];

        $data1 = $this->Category->find('first',array('conditions'=>array('id'=>$id1),'fields'=>array('Category.lft,Category.rght')));
        $data2 = $this->Category->find('first',array('conditions'=>array('id'=>$id2),'fields'=>array('Category.lft,Category.rght')));
//        pr($data2);

        $t1 = $data1['Category']['lft'];
        $data1['Category']['lft'] = $data2['Category']['lft'];
        $data2['Category']['lft'] = $t1;

        $t2 = $data1['Category']['rght'];
        $data1['Category']['rght'] = $data2['Category']['rght'];
        $data2['Category']['rght'] = $t2;

        $this->Category->id= $id1;
        $this->Category->save(array('lft'=>$data1['Category']['lft'],'rght'=>$data1['Category']['rght']));

        $this->Category->id= $id2;
        $this->Category->save(array('lft'=>$data2['Category']['lft'],'rght'=>$data2['Category']['rght']));

        $tree = $this->Category->generateTreeList(null, null, null, '--');
        pr($tree);
//        pr($data2['Category']['lft']);

//        return $data1;
    }
}
