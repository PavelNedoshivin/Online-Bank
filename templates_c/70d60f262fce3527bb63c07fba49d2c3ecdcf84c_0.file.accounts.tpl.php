<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-16 08:58:42
  from 'C:\xampp\htdocs\mywebproject\templates\default\accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5df7393248a632_25797414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70d60f262fce3527bb63c07fba49d2c3ecdcf84c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mywebproject\\templates\\default\\accounts.tpl',
      1 => 1576482739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:nav_bar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5df7393248a632_25797414 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mywebproject\\libs\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Accounts</title>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"><?php echo '</script'; ?>
>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .btn{
            margin-left: 5px;
        }
        .container{
            margin-top: 5px !important;
        }
    </style>
    <!-- Custom styles for this template -->
</head>
<body class="d-flex flex-column h-100">

<?php $_smarty_tpl->_subTemplateRender('file:nav_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin page content -->
<main role="main" class="">
    <div class="container mt-10">
        <table class="table">
            <thead class="thead-dark bg-dark">
            <tr class="text-light bg-dark">
                <td><b>№</b></td>
                <td><b>Balance</b></td>
                <td><b>OpeningDate</b></td>
                <td><b>CardsNumber</b></td>
                <td><b>Customer</b></td>
                <td><b>Employee</b></td>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['Access'] > 3) {?>
                    <td><b>Action</b></td>
                <?php }?>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['Balance'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['OpeningDate'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['CardsNumber'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['Customer'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['Employee'];?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['Access'] > 3) {?>
                    <td><form method="get" onsubmit="return send(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">
                            <input type="hidden" name='id' value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <button type="submit" name="command" value="deleteAccount" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <?php }?>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add account
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Balance</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Balance" name="account_balance">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">OpeningDate</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="OpeningDate" name="account_openingdate">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">CardsNumber</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="CardsNumber" name="account_cardsnumber">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Customer</label>
                                <select name="account_customer">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Customer'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['Customer'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Employee</label>
                                <select name="account_employee">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Employee'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['Employee'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="command" value="addAccount" class="btn btn-primary active">Add account</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
>
    function send(id) {
        if (confirm('Do you want to delete?')) {
            alert("Item will be deleted");
            return true;
        }else {
            alert('Action declined');
            return false;
        }
    }
<?php echo '</script'; ?>
>
</html>
<?php }
}
