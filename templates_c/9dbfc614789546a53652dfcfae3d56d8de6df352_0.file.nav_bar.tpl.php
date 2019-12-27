<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-23 23:02:11
  from 'C:\xampp\htdocs\mywebproject\templates\default\nav_bar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e013963119482_06778994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9dbfc614789546a53652dfcfae3d56d8de6df352' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mywebproject\\templates\\default\\nav_bar.tpl',
      1 => 1577136328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e013963119482_06778994 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <p class="text-light bg-dark m-2" >Online bank</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <form method="get" class="form-inline">
                <ul class="navbar-nav mr-auto">
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['Access'] > 2) {?>
                    <li class="nav-item active">
                        <button type="submit" name="command" value="showMain" class="btn btn-primary active">Main</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="command" value="showAccounts" class="btn btn-secondary">Accounts</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="command" value="showBranches" class="btn btn-secondary">Branches</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="command" value="showCustomers" class="btn btn-secondary">Customers</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="command" value="showEmployees" class="btn btn-secondary">Employees</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="command" value="showTransactions" class="btn btn-secondary">Transactions</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="command" value="showOperations" class="btn btn-secondary">Operations</button>
                    </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['Access'] > 3) {?>
                        <li class="nav-item">
                            <button type="submit" name="command" value="showUsers" class="btn btn-warning pull-right">Users</button>
                        </li>
                    <?php }?>
                    <li class="nav-item">
                        <button type="submit" name="command" value="logout" class="btn btn-warning pull-right">Log out</button>
                    </li>
                </ul>
            </form>
        </div>
    </nav>
</header>
<?php }
}
