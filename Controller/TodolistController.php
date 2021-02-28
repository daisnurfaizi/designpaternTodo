<?php

use Entity\Todolist;
use Repository\TodolistRepository;
use Service\TodolistService;

require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
function insertTodolist()
{
    $koneksi = \Config\Database::getConnection();
    // $todolist = new Todolist();
    // $todolist->setTodo("Belajar Design Patern");
    // $todolist->setTodo2("Belajar Design patern");
    // $todolist->setTodo3("Belajar Design patern");
    // $todolist->setTodo4("Belajar Design patern");
    // $todolist->setTodo5("Belajar Design patern");
    // $todolist->setTodo6("Belajar Design patern");
    // $todolist->setTodo7("Belajar Design patern");
    // $todolist->setTodo8("Belajar Design patern");
    // $todolist->setTodo9("Belajar Design patern");
    // $todolist->getTodo();

    $todolitRepository  = new TodolistRepository($koneksi);
    $todolistService = new TodolistService($todolitRepository);
    // $todolistService->addTodolist(
    //     "Belajar Design Patern",
    //     "Belajar Design patern",
    //     "Belajar Design patern",
    //     "Belajar Design patern",
    //     "Belajar Design patern",
    //     "Belajar Design patern",
    //     "Belajar Design patern",
    //     "Belajar Design patern",
    //     "Belajar Design patern"
    // );
    return $todolistService->addTodolist(
        "Belajar Design Patern",
        "Belajar Design patern",
        "Belajar Design patern",
        "Belajar Design patern",
        "Belajar Design patern",
        "Belajar Design patern",
        "Belajar Design patern",
        "Belajar Design patern",
        ""
    );
}
function testupdateTodolist()
{
    $koneksi = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepository($koneksi);
    $todolistservice = new TodolistService($todolistRepository);
    return $todolistservice->updateTodolist(
        "Belajar Design Patern update",
        "Belajar Golang",
        "Belajar Php",
        "Belajar Flutter",
        "Belajar Java",
        "Belajar Dart",
        "Belajar Python",
        "Belajar Ruby",
        "Belajar C",
        1
    );
}

function testselectbyID()
{
    $koneksi = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepository($koneksi);
    $todolistService = new TodolistService($todolistRepository);
    return $todolistService->findbyID(1);
}

function testdeletetodo()
{
    $koneksi = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepository($koneksi);
    $todolistService = new TodolistService($todolistRepository);
    return $todolistService->deleteTodo(2);
}
// select by id
// $todo[] = testselectbyID();
// var_dump($todo[0]['todo9']);
// -------------------------
// update todo
// if ((array) testupdateTodolist()) {
//     echo "Berhasil update";
// } else {
//     echo "gagal update";
// };
// ---------------------------
// insert todo
// if ((array) insertTodolist()) {
//     echo "Berhasil input";
// } else {
//     echo "gagal input";
// };
// ---------------------------
// delete todo
if (testdeletetodo()) {
    echo "berhasil di delete";
} else {
    echo "gagal delete";
}
