<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;
use Cake\Datasource\Paging\Paginator;

class MoviesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->validator = new Validator();
        $this->validator
            ->requirePresence('title')
            ->notEmptyString('title', 'Title is required')
            ->requirePresence('release_year')
            ->requirePresence('synopsis')
            ->notEmptyString('synopsis', 'Synopsis is required')
            ->requirePresence('genre');
    }

    public function index()
    {
        $title = $this->request->getQuery('title');
        $genre = $this->request->getQuery('genre');
        $movies = ($title || $genre) ? $this->paginate($this->Movies->findByTitleOrGenre($title, $genre), ['limit' => '5']) :  $this->paginate($this->Movies->find(), ['limit' => '5']);
        $this->set(compact('movies'));
    }

    public function view($slug)
    {
        $movie = $this->Movies->findBySlug($slug)->firstOrFail();
        $this->set(compact('movie'));
    }

    public function add()
    {
        $this->Movies->setValidator('default', $this->validator);
        $movie = $this->Movies->newEmptyEntity();
        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('Your movie has been added successfully.'), ['clear' => true]);
                $movie = $this->Movies->newEmptyEntity();
            } else {
                $this->Flash->error(__('Unable to add your movie.'));
            }
        }
        $this->set('movie', $movie);
    }
    public function edit($slug)
    {
        $this->Movies->setValidator('default', $this->validator);
        $movie = $this->Movies->findBySlug($slug)->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('Your movie has been updated.'));
            } else {
                $this->Flash->error(__('Unable to add your movie.'));
            }
        }
        $this->set('movie', $movie);
    }
    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $movie = $this->Movies->findBySlug($slug)->firstOrFail();
        $this->Movies->delete($movie);
    }
}
