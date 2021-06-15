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

    private $userId;

    function __construct() {
        $tbCategory = new Category(TB_CATEGORY);
        $this->user = new User(TB_USER);
        $this->income = new MoneyMovement(TB_MONEY_MOVEMENT, $tbCategory->getIncomeId());
        $this->expense = new MoneyMovement(TB_MONEY_MOVEMENT, $tbCategory->getExpenseId());
        $this->incomeTag = new Tag(TB_TAG, $tbCategory->getIncomeId());
        $this->expenseTag = new Tag(TB_TAG, $tbCategory->getExpenseId());
    }

    // Util

    function signIn() {
        $user = $this->user->signIn(Input::post('email'), Input::post('password'));
        if ($user != null) {
            echo $user['id'];
            return;
        }
        echo -1;
    }

    function dashboard() {
        $this->id = Input::post('id');
        $this->render('dashboard', [
            'obj' => $this->user->find($this->id)
        ]);
    }
}