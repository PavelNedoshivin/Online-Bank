<?php
/* Smarty version 3.1.34-dev-7, created on 2019-10-27 22:25:36
  from 'C:\xampp\htdocs\mywebproject\table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5db60b5046df18_62038900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '803d0842f708d37f55221317a11eb7f9e6eb53e8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mywebproject\\table.tpl',
      1 => 1572211528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db60b5046df18_62038900 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="index.php" method="Post">
    <fieldset>
        <legend>Please select one table of database:</legend> 
        <div>
            <input type="radio" name="table" id="choice1" value="accounts" checked>
            <label for="choice1">Accounts</label>
            <input type="radio" name="table" id="choice2" value="breanches">
            <label for="choice2">Branches</label>
            <input type="radio" name="table" id="choice3" value="customers">
            <label for="choice3">Customers</label>
            <input type="radio" name="table" id="choice4" value="employees">
            <label for="choice4">Employees</label>
            <input type="radio" name="table" id="choice5" value="transactions">
            <label for="choice1">Transactions</label>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
        <button id="addButton" type="">Add</button>
        <button id="editButton">Edit</button>
        <button id="deleteButton">Delete</button>
    </fieldset>
</form>
<table>
    <table border="1">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</table><?php }
}
