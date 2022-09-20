<h1>
    <?php echo $article->title; ?>
</h1>

<p>
    <?php echo $article->body; ?>
</p>

<p><small>
    <?php echo $article->created->format(DATE_RFC850); ?>
</small>
</p>

<p>
    <?php  echo $this->Html->link('Edit', ['action'=>'edit'], $article->slug); ?>
</p>