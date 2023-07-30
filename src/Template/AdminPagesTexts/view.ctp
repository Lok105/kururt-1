<div class="container-fluid">

    <div class="page-header">
        <h1>СЕО Страница</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="buttons-block">
                <?= $this->Html->link(__('Редактировать страницу'), ['action' => 'edit', $pagesText->id], ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link(__('Список страниц'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="row">
   
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= h($pagesText->url_page) ?></h3>
                </div>
                <div class="panel-body">
                    <div class="company view large-9 medium-8 columns content">
                        <a href="<?= h($pagesText->url) ?>" target="_blank">На страницу</a>
                        <table class="vertical-table">
                            <tr>
                                <th scope="row"><?= __('URL') ?></th>
                                <td><?= h($pagesText->url) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Текст' ?></th>
                                <td><?= $pagesText->body; ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= 'Title' ?></th>
                                <td><?= h($pagesText->title) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Description') ?></th>
                                <td><?= h($pagesText->description) ?></td>
                            </tr>
                           </table>
                    </div>
                </div>               
            </div>
        </div>
        
    </div>
    <?php //foreach($quests as $quest){debug($quest); } ?>
     <?php //debug($contract); ?>
</div>

