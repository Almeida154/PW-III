<?php

namespace app\controller;
use app\core\Controller;
use app\classes\Input;
use Dompdf\Dompdf;
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

    private $category;

    function __construct() {
        $this->category = new Category(TB_CATEGORY);
        $this->user = new User(TB_USER);
        $this->income = new MoneyMovement(TB_MONEY_MOVEMENT, $this->category->getIncomeId());
        $this->expense = new MoneyMovement(TB_MONEY_MOVEMENT, $this->category->getExpenseId());
        $this->incomeTag = new Tag(TB_TAG, $this->category->getIncomeId());
        $this->expenseTag = new Tag(TB_TAG, $this->category->getExpenseId());
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

    function dashboard($route = 'dashboard/home') {
        sentinel();
        $this->render($route, [
            'obj' => $this->user->find($_SESSION['id']),
            'list' => $this->getAllMoneyMovements($_SESSION['id'], 'date'),
            'tags' => $this->getAllTags()
        ]);
    }

    function home() {
        $this->dashboard();
    }

    function stats() {
        sentinel();
        $mm = new MoneyMovement(TB_MONEY_MOVEMENT, null);
        $tagAmount = $this->filterChart()['tagAmount'];
        $categoryAmount = $this->filterChart()['categoryAmount'];
        return $this->render('dashboard/stats', [
            'max' => $mm->getByAmount($_SESSION['id'], $mm->getMoreExpensive($_SESSION['id'])),
            'min' => $mm->getByAmount($_SESSION['id'], $mm->getLessExpensive($_SESSION['id'])),
            'tagAmount' => $tagAmount,
            'categoryAmount' => $categoryAmount,
            'tags' => $this->getAllTags()
        ]);
    }

    function new() {
        sentinel();
        return $this->render('dashboard/new', [
            'tags' => $this->getAllTags()
        ]);
    }

    function config() {
        sentinel();
        return $this->render('dashboard/config', [
            'user' => $this->user->find($_SESSION['id'])
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
            return $this->render('dashboard/table', ['list' => $list]);
        }

        if (strcmp($slc, '') == 0 || strcmp($slc, '-1') == 0) {
            $list = $this->getAllMoneyMovementsByCateg($_SESSION['id'], $cb, $field); // slc = all, cb = anyone;
            return $this->render('dashboard/table', ['list' => $list]);
        }

        if (strcmp($cb, 'both') == 0 && (strcmp($slc, '') != 0 || strcmp($slc, '-1') != 0)) {
            $list = $this->getAllMoneyMovementsByTag($_SESSION['id'], $slc, $field); // slc = all, cb = both;
            return $this->render('dashboard/table', ['list' => $list]);
        }

        $list = $this->getAllMoneyMovementsByCategAndTag($_SESSION['id'], $cb, $slc, $field); // slc = anyone, cb = anyone
        return $this->render('dashboard/table', ['list' => $list]);
    }

    function search() {
        $all = new MoneyMovement(TB_MONEY_MOVEMENT, null);
        return $this->render('dashboard/table', [
            'list' => $all->search($_SESSION['id'], Input::get('query'))
        ]);
    }

    function nonSearch() {
        return $this->render('dashboard/table', [
            'list' => $this->getAllMoneyMovements($_SESSION['id'], 'date')
        ]);
    }

    function renderChart() {
        if (Input::post('tag') == null) {
            echo 'empty';
            return;
        }

        $filtered = $this->filterChart(Input::post('tag'));

        return $this->render('dashboard/chart', [
            'tagAmount' => $filtered['tagAmount'] ?? 0,
            'categoryAmount' => $filtered['categoryAmount'] ?? 0,
            'tag' => Input::post('tag'),
            'category' => $filtered['category']
        ]);
    }

    function filterChart($tag = 'Monthly Expense') {
        $mm = new MoneyMovement(TB_MONEY_MOVEMENT, null);
        $incomeId = $this->category->getIncomeId();
        $expenseId = $this->category->getExpenseId();

        $tagAmount = $mm->getTotalAmountByTag($_SESSION['id'], 
            (new Tag(TB_TAG, null))->findByTagName($tag)[0]->id);

        $categoryAmount = null;

        if ((new Tag(TB_TAG, null))->findByTagName($tag)[0]->category_id == $incomeId) {
            $categoryAmount = $mm->getTotalAmountByCategory($_SESSION['id'], $incomeId);
            return ['tagAmount' => $tagAmount, 'categoryAmount' => $categoryAmount,
                    'category' => 'Income', 'tag' => $tag];
        }
            
        $categoryAmount = $mm->getTotalAmountByCategory($_SESSION['id'], $expenseId);
        return ['tagAmount' => $tagAmount, 'categoryAmount' => $categoryAmount,
        'category' => 'Expense', 'tag' => $tag];
    }

    function pdf() {
        sentinel();
        $dompdf = new Dompdf(['enable_remote' => true]);
        ob_start();
        $this->render('dashboard/pdf', [
            'date' => date('Y-m-d H:i:s'),
            'list' => $this->getAllMoneyMovements($_SESSION['id'], 'date')
        ]);
        $dompdf->loadHtml(ob_get_clean());
        $dompdf->setPaper('A4');
        $dompdf->render();
        $dompdf->stream('MoneyMovement.pdf', ['Attachment' => false]);
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