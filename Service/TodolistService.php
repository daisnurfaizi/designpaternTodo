<?php

namespace Service {

    use Entity\Todolist;
    use Repository\TodolistRepository;

    class TodolistService
    {
        private TodolistRepository $todolistrepository;
        public function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistrepository = $todolistRepository;
        }
        public function addTodolist(
            string $todo,
            string $todo2,
            string $todo3,
            string $todo4,
            string $todo5,
            string $todo6,
            string $todo7,
            string $todo8,
            string $todo9
        ) {
            $todolist = new Todolist(
                $todo,
                $todo2,
                $todo3,
                $todo4,
                $todo5,
                $todo6,
                $todo7,
                $todo8,
                $todo9,
            );
            // $this->todolistrepository->insert($todolist);
            return $this->todolistrepository->insert($todolist);
            // return 1;
        }
        public function updateTodolist(
            string $todo,
            string $todo2,
            string $todo3,
            string $todo4,
            string $todo5,
            string $todo6,
            string $todo7,
            string $todo8,
            string $todo9,
            int $id
        ) {
            $todolist = new Todolist(
                $todo,
                $todo2,
                $todo3,
                $todo4,
                $todo5,
                $todo6,
                $todo7,
                $todo8,
                $todo9,
            );
            $id = $id;
            // $this->todolistrepository->insert($todolist);
            return $this->todolistrepository->update($todolist, $id);
            // return 1;
        }
        public function findbyID(int $id_todo)
        {
            $id_todo = $id_todo;
            return $this->todolistrepository->selectbyID($id_todo);
        }

        public function deleteTodo(int $id_todo)
        {
            $id_todo = $id_todo;
            return $this->todolistrepository->delete($id_todo);
        }
    }
}
