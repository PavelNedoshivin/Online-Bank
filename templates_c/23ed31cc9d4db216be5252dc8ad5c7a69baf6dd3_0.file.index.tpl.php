<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-15 22:40:11
  from 'C:\xampp\htdocs\mywebproject\templates\default\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5df6a83b823c55_49444810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23ed31cc9d4db216be5252dc8ad5c7a69baf6dd3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mywebproject\\templates\\default\\index.tpl',
      1 => 1576445950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:nav_bar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5df6a83b823c55_49444810 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Online bank</title>
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

    </style>
    <!-- Custom styles for this template -->
</head>
<body class="d-flex flex-column h-100">

<?php $_smarty_tpl->_subTemplateRender('file:nav_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container content">
        <?php if ($_smarty_tpl->tpl_vars['user']->value['Access'] < 3) {?>
            <h1 class="mt-5">New credit</h1>
            <p class="lead">1000%</p>
        <?php } else { ?>
            <h1 class="mt-5">New credit</h1>
            <p class="lead">Another new credit</p>
        <?php }?>
    </div>
</main>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</html>
<?php }
}
