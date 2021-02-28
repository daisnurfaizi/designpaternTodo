<?php

namespace Repository {

    use Entity\Todolist;
    use PDO;
    use PDOException;

    class TodolistRepository
    {
        private $koneksi;
        public function __construct($koneksi)
        {
            $this->koneksi = $koneksi;
        }
        public function insert(Todolist $todolist)
        {
            $sql = "INSERT INTO todolist(
                todo,
                todo2,
                todo3,
                todo4,
                todo5,
                todo6,
                todo7,
                todo8,
                todo9
                ) VALUES (?,?,?,?,?,?,?,?,?)";
            $input = $todolist->getTodo();
            $input2 = $todolist->getTodo2();
            $input3 = $todolist->getTodo3();
            $input4 = $todolist->getTodo4();
            $input5 = $todolist->getTodo5();
            $input6 = $todolist->getTodo6();
            $input7 = $todolist->getTodo7();
            $input8 = $todolist->getTodo8();
            $input9 = $todolist->getTodo9();
            $transaction = $this->koneksi;
            $transaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                $transaction->beginTransaction();
                $data = $this->koneksi->prepare($sql);
                $data->bindParam(1, $input);
                $data->bindParam(2, $input2);
                $data->bindParam(3, $input3);
                $data->bindParam(4, $input4);
                $data->bindParam(5, $input5);
                $data->bindParam(6, $input6);
                $data->bindParam(7, $input7);
                $data->bindParam(8, $input8);
                $data->bindParam(9, $input9);
                $data->execute();
                $transaction->commit();
                return $data->rowCount();
            } catch (PDOException $e) {
                $transaction->rollBack();
            }
        }
        public function update(Todolist $todolist, int $id)
        {

            $sqlupdate = "UPDATE todolist SET 
            todo = :todo, 
            todo2 = :todo2, 
            todo3 = :todo3, 
            todo4 = :todo4, 
            todo5 = :todo5, 
            todo6 = :todo6, 
            todo7 = :todo7, 
            todo8 = :todo8, 
            todo9 = :todo9
            
            WHERE id =:id ";
            $updatetodo = $todolist->getTodo();
            $updatetodo2 = $todolist->getTodo2();
            $updatetodo3 = $todolist->getTodo3();
            $updatetodo4 = $todolist->getTodo4();
            $updatetodo5 = $todolist->getTodo5();
            $updatetodo6 = $todolist->getTodo6();
            $updatetodo7 = $todolist->getTodo7();
            $updatetodo8 = $todolist->getTodo8();
            $updatetodo9 = $todolist->getTodo9();
            $sqlselect = "SELECT * FROM todolist WHERE id = ?";
            $statement = $this->koneksi->prepare($sqlselect);
            $statement->execute([$id]);
            if ($statement->fetch()) {
                $transaction = $this->koneksi;
                $transaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try {
                    $transaction->beginTransaction();
                    $data = $this->koneksi->prepare($sqlupdate);
                    $data->bindParam('todo', $updatetodo);
                    $data->bindParam('todo2', $updatetodo2);
                    $data->bindParam('todo3', $updatetodo3);
                    $data->bindParam('todo4', $updatetodo4);
                    $data->bindParam('todo5', $updatetodo5);
                    $data->bindParam('todo6', $updatetodo6);
                    $data->bindParam('todo7', $updatetodo7);
                    $data->bindParam('todo8', $updatetodo8);
                    $data->bindParam('todo9', $updatetodo9);
                    $data->bindParam('id', $id);
                    $data->execute();
                    $transaction->commit();
                    return $data->rowCount();
                } catch (PDOException $e) {
                    $transaction->rollBack();
                }
            }
        }
        public function delete(int $id)
        {
            $selectAll = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->koneksi->prepare($selectAll);
            $statement->execute([$id]);

            if ($statement->fetch()) {
                // todolist ada
                $delete = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->koneksi->prepare($delete);
                $statement->execute([$id]);
                return true;
            } else {
                // todolist tidak ada
                return false;
            }
        }
        public function selectAll(Todolist $todolist)
        {
        }

        public function selectbyID(int $id)
        {
            $findbyID = "SELECT 
            id,todo,todo2,todo3,todo4,todo5,todo6,todo7,todo8,todo9 
            FROM todolist WHERE id = ?";
            $statement = $this->koneksi->prepare($findbyID);
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
    }
}
