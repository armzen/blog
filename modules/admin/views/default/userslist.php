<h1><?= $this->context->action->uniqueId ?></h1> 

<div id="news-list">
        <a class="btn btn-success" href="<?= Yii::$app->urlManager->createUrl(['admin/default/create-user']) ?>">Create User</a>
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>password</th>
                    <th>email</th>                
                    <th>Update</th>                
                    <th>Delete</th>                
                </tr>
            </thead>
            <tbody>                
                <?php foreach ($myusers as $user) : ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['pass']; ?></td>
                    <td><?= $user['email']; ?></td>                                 
                    <td>
                        <a href="<?= Yii::$app->urlManager
                           ->createUrl(['admin/default/update-user', 'id' => $user['id']]) ?>">Update</a>
                    </td>
                    <td>
                        <a href="<?= Yii::$app->urlManager
                            ->createUrl(['admin/default/delete-user', 'id' => $user['id']]) ?>">Delete</a>
                    </td>                
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            <?php
            echo '<pre>';
                print_r($myusers);
            echo '</pre>';        
            ?>        
    </div>

    <p><code><?= __FILE__ ?></code></p>
