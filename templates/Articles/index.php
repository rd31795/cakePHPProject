<h1> Articles List</h1>
<h3> <?php echo $this->Html->link('Add New Article', ['action' => 'add']); ?></h3>
<table>
    <thead>
        <tr>
            <th>
                Title
            </th>
            <th>
                Created
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($articles as $article) : ?>
        <tr>
            <td>
                <?php echo $this->Html->link($article->title, ['action' => 'view', $article->slug]); ?>
            </td>
            <td>
                <?php echo $article->created->format(DATE_RFC850); ?>
            </td>
            <td>
                <?php echo $this->Html->link('Edit', ['action' => 'edit', $article->slug]); ?>
                <?php echo $this->Form->postLink('Delete', ['action' => 'delete', $article->slug], 
                ['confirm' => 'Are you Sure']);
                ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>