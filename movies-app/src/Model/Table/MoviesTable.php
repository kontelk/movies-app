<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
// the EventInterface class
use Cake\Event\EventInterface;

class MoviesTable extends Table
{
    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 45);
        }
    }
}
