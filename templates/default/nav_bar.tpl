<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <p class="text-light bg-dark m-2" >Online bank</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <form method="get" class="form-inline">
                <ul class="navbar-nav mr-auto">
                    {if $user.Access > 2}
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
                    {/if}
                    {if $user.Access > 3}
                        <li class="nav-item">
                            <button type="submit" name="command" value="showUsers" class="btn btn-warning pull-right">Users</button>
                        </li>
                    {/if}
                    <li class="nav-item">
                        <button type="submit" name="command" value="logout" class="btn btn-warning pull-right">Log out</button>
                    </li>
                </ul>
            </form>
        </div>
    </nav>
</header>
