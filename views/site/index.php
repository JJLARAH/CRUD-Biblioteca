<?php

/** @var yii\web\View $this */

$this->title = 'My Library';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">My Library!</h1>

        <p class="lead">Welcome to My Library application.</p>

    </div>

    <div class="body-content">

        <div class="row justify-content-md-center">
            <div class="col-auto">
                <h2>Users</h2>

                <p>Manage users</p>

                <p><a class="btn btn-outline-success" href="?r=user/index">Users CRUD &raquo;</a></p>
            </div>
            <div class="col-auto">
                <h2>Books</h2>

                <p>Manage Books</p>

                <p><a class="btn btn-outline-success" href="?r=book/index">Books CRUD &raquo;</a></p>
            </div>
            <div class="col-auto">
                <h2>Library Borrows</h2>

                <p>Control of library borrows</p>

                <p><a class="btn btn-outline-success" href="?r=borrows/index">Borrows Control &raquo;</a></p>
            </div>
        </div>

    </div>
</div>