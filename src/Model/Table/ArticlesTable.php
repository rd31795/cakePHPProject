<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Event\EventInterface;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class ArticlesTable extends Table{
    
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if($entity->isNew && !$entity->slug){
            $sluggedTitle = Text::slug($entity->title);
            $entity->slug = substr($sluggedTitle , 0 ,191);
        }
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->notEmptyString('title')
        ->minLength('title', 3)
        ->maxLength('title', 255)
        ->notEmptyString('body')
        ->minLength('body', 10);
        
        return $validator;
    }

}