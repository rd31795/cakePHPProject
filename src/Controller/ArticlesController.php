<?php

namespace App\Controller;

class ArticlesController extends AppController{

    public function index(){
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }

    public function add(){
        $article = $this->Articles->newEmptyEntity();
        if($this->request->is('post')){
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->user_id = 1;
            if($this->Articles->save($article)){
                $this->Flash->success('Your Article has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Unable to add your article.');
        }
        $this->set('article', $article);
    }

    public function view($slug){
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function edit($slug){
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if($this->request->is(['Post', 'Put'])){
            $this->Articles->patchEntity($article, $this->request->getData());
            if($this->Articles->save($article)){
                $this->Flash->success('Your Article has been updated successfully.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Unable to update your article.');
        }
        $this->set('article', $article);
    }

    public function delete($slug){
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if($this->Articles->delete($article)){
            $this->Flash->success('Your Article has been deleted successfully.');
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error('Unable to delete article.');
            return $this->redirect(['action' => 'index']);
    }
}