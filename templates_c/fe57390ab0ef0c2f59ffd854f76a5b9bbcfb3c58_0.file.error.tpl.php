<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-25 17:04:40
  from 'C:\xampp\htdocs\mywebproject\templates\default\error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e03889888d820_76976719',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe57390ab0ef0c2f59ffd854f76a5b9bbcfb3c58' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mywebproject\\templates\\default\\error.tpl',
      1 => 1577289857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e03889888d820_76976719 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <title>Error page</title>
</head>
<body>
    <h1>Some problem or wrong params</h1>
    <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
    <form>
        <button type="submit" name="command" value="login" class="btn btn-primary active">Back to sign in</button>
    </form>
</body>
</html>
<?php }
}
