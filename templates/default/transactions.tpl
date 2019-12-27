<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Transactions</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

{include file='nav_bar.tpl'}

<!-- Begin page content -->
<main role="main" class="">
    <div class="container mt-10">
        <table class="table">
            <thead class="thead-dark bg-dark">
            <tr class="text-light bg-dark">
                <td><b>№</b></td>
                <td><b>Amount</b></td>
                <td><b>TransactionDate</b></td>
                <td><b>TransactionType</b></td>
                <td><b>Customer</b></td>
                <td><b>Branch</b></td>
                {if $user.Access > 3}
                    <td><b>Action</b></td>
                {/if}
            </tr>
            </thead>
            <tbody>
            {foreach $rows as $item}
                <tr>
                    <td>{counter}</td>
                    <td>{$item.Amount}</td>
                    <td>{$item.TransactionDate}</td>
                    <td>{$item.TransactionType}</td>
                    <td>{$item.Customer}</td>
                    <td>{$item.Branch}</td>
                    {if $user.Access > 3}
                    <td><form method="get" onsubmit="return send({$item.id})">
                            <input type="hidden" name='id' value="{$item.id}">
                            <button type="submit" name="command" value="deleteTransaction" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    {/if}
                </tr>
            {/foreach}
            </tbody>
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add transaction
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Amount</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Amount" name="transaction_amount">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">TransactionDate</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="TransactionDate" name="transaction_date">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">TransactionType</label>
                                <select name="transaction_type">
                                    <option value="Debit">Debit</option>
                                    <option value="Credit">Credit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Customer</label>
                                <select name="transaction_customer">
                                    {foreach $rows as $item}
                                        <option value="{$item.Customer}"> {$item.Customer}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Branch</label>
                                <select name="transaction_branch">
                                    {foreach $rows as $item}
                                        <option value="{$item.Branch}"> {$item.Branch}</option>
                                    {/foreach}
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="command" value="addTransaction" class="btn btn-primary active">Add transaction</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
{include file='footer.tpl'}
<script>
    function send(id) {
        if (confirm('Do you want to delete?')) {
            alert("Item will be deleted");
            return true;
        }else {
            alert('Action declined');
            return false;
        }
    }
</script>
</html>
