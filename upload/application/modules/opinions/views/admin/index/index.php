<legend><?= $this->getTrans('manage') ?></legend>
<form class="form-horizontal" method="POST" action="">
    <?=$this->getTokenField() ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <colgroup>
                <col class="icon_width" />
                <col class="icon_width" />
                <col class="col-lg-2" />
                <col class="col-lg-1" />
                <col />
            </colgroup>
            <thead>
                <tr>
                    <th><?=$this->getCheckAllCheckbox('check_entries') ?></th>
                    <th></th>
                    <th><?=$this->getTrans('username') ?></th>
                    <th><?=$this->getTrans('rating') ?></th>
                    <th><?=$this->getTrans('comment') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($this->get('opinions') != ''): ?>
                    <?php foreach ($this->get('opinions') as $opinion): ?>
                        <?php
                        $userMapper = $this->get('userMapper');
                        $user = $userMapper->getUserById($opinion->getUserId());
                        ?>
                        <tr>
                            <td><input value="<?=$opinion->getId() ?>" type="checkbox" name="check_entries[]" /></td>
                            <td><?=$this->getDeleteIcon(['action' => 'del', 'id' => $opinion->getId()]) ?></td>
                            <td><?=$user->getName() ?></td>
                            <td><?=$opinion->getRating() ?></td>
                            <td><?=$opinion->getText() ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5"><?=$this->getTrans('noOpinions') ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?=$this->getListBar(['delete' => 'delete']) ?>
</form>
