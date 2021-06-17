<?php

namespace app\controller;
use app\core\Controller;
use app\classes\Input;
use app\model\User;
use app\model\MoneyMovement;
use app\model\Tag;
use app\model\Category;

class DashboardController extends Controller {

    private $user;
    private $expense;
    private $income;
    private $expenseTag;
    private $incomeTag;

    function __construct() {
        $tbCategory = new Category(TB_CATEGORY);
        $this->user = new User(TB_USER);
        $this->income = new MoneyMovement(TB_MONEY_MOVEMENT, $tbCategory->getIncomeId());
        $this->expense = new MoneyMovement(TB_MONEY_MOVEMENT, $tbCategory->getExpenseId());
        $this->incomeTag = new Tag(TB_TAG, $tbCategory->getIncomeId());
        $this->expenseTag = new Tag(TB_TAG, $tbCategory->getExpenseId());
        session_start();
    }

    // Util

    function signIn() {
        $user = $this->user->signIn(Input::post('email'), Input::post('password'));
        if ($user != null) {
            $_SESSION['id'] = $user['id'];
            echo $user['id'];
            return;
        }
        echo -1;
    }

    function dashboard() {
        if(!isset($_SESSION['id'])) return header('Location: //localhost/' . BASE . '/public/signIn');
        $this->render('dashboard', [
            'obj' => $this->user->find($_SESSION['id']),
            'list' => $this->getAllMoneyMovements($_SESSION['id'], 'date'),
            'tags' => $this->getAllTags()
        ]);
    }

    function logOut() {
        session_destroy();
        header('Location: //localhost/' . BASE . '/public/signIn');
    }

    function filter() {
        $cb = Input::post('cb');
        $slc = Input::post('slc');
        $field = Input::post('order');
        if ($field == null) $field = 'date'; 
        $list = null;

        if (strcmp($cb, 'both') == 0 && (strcmp($slc, '') == 0 || strcmp($slc, '-1') == 0)) {
            $list = $this->getAllMoneyMovements($_SESSION['id'], $field); // slc = all, cb = both
            return $this->render('dashboardElements/table', ['list' => $list]);
        }

        if (strcmp($slc, '') == 0 || strcmp($slc, '-1') == 0) {
            $list = $this->getAllMoneyMovementsByCateg($_SESSION['id'], $cb, $field); // slc = all, cb = anyone;
            return $this->render('dashboardElements/table', ['list' => $list]);
        }

        if (strcmp($cb, 'both') == 0 && (strcmp($slc, '') != 0 || strcmp($slc, '-1') != 0)) {
            $list = $this->getAllMoneyMovementsByTag($_SESSION['id'], $slc, $field); // slc = all, cb = both;
            return $this->render('dashboardElements/table', ['list' => $list]);
        }

        $list = $this->getAllMoneyMovementsByCategAndTag($_SESSION['id'], $cb, $slc, $field); // slc = anyone, cb = anyone
        return $this->render('dashboardElements/table', ['list' => $list]);
    }

    function search() {
        $all = new MoneyMovement(TB_MONEY_MOVEMENT, null);
        return $this->render('dashboardElements/table', [
            'list' => $all->search($_SESSION['id'], Input::get('query'))
        ]);
    }

    function nonSearch() {
        return $this->render('dashboardElements/table', [
            'list' => $this->getAllMoneyMovements($_SESSION['id'], 'date')
        ]);
    }

    //  Functions

    function getAllMoneyMovements($user_id, $field) {
        $all = new MoneyMovement(TB_MONEY_MOVEMENT, null);
        return $all->getList($user_id, $field);
    }

    function getAllMoneyMovementsByCateg($user_id, $cb, $field) {
        if (strcmp($cb, 'income') == 0) return $this->income->all($user_id, $field);
        return $this->expense->all($user_id, $field);
    }

    function getAllMoneyMovementsByTag($user_id, $slc, $field) {
        $all = new MoneyMovement(TB_MONEY_MOVEMENT, null);
        return $all->getAllByTag($user_id, $slc, $field);
    }

    function getAllMoneyMovementsByCategAndTag($user_id, $cb, $slc, $field) {
        if (strcmp($cb, 'income') == 0) return $this->income->getByTag($user_id, $slc, $field);
        return $this->expense->getByTag($user_id, $slc, $field);
    }

    function getAllTags() {
        $all = new Tag(TB_TAG, null);
        return $all->getTags();
    }
}