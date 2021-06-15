<?php

namespace app\controller;
use app\core\Controller;
use app\classes\Input;
use app\model\User;
use app\model\MoneyMovement;
use app\model\Tag;
use app\model\Category;

class DatabaseController extends Controller {

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
        $this->initialize();
    }

    // Crud

    function insertUser() {
        $data = Input::post('userJSON');
        $json = json_decode(html_entity_decode($data));
        $json = json_encode($json);

        $user_id = $this->user->insert(json_decode($json));
        $this->firstIncome($user_id, json_decode($json));
        $this->firstExpense($user_id, json_decode($json));
        
        $this->response($json);
    }

    function validateEmail() {
        $data = Input::post('email');
        if ($this->user->countRowsByEmail($data) > 0) { 
            echo 'false';
            return;
        }
        echo 'true';
    }

    // Functions

    private function initialize() {       
        $this->incomeTag->insert('Monthly Income');
        $this->expenseTag->insert('Monthly Expense');
    }

    private function response($json) {
        header("Content-type: application/json; charset=utf-8");
        echo $json;
    }

    private function firstIncome($user_id, $json) {
        try {
            $this->income->insert((Object) array(
                'title' => 'First income',
                'description' => 'Your first income :)',
                'amount' => $json->income,
                'user_id' => $user_id,
                'tag_id' => $this->incomeTag->findByTagName('Monthly Income')[0]->id
            ));
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    private function firstExpense($user_id, $json) {
        try {
            $this->expense->insert((Object) array(
                'title' => 'First expense',
                'description' => 'Your first expense :)',
                'amount' => $json->expense,
                'user_id' => $user_id,
                'tag_id' => $this->expenseTag->findByTagName('Monthly Expense')[0]->id
            ));
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}