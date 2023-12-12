<?php
    $this->extend('/Layouts/bootstrap'); ?>
   

<div class="content">
        <div class="row">
            <div class="col-md-8" clo-xs-12>
                <div class="posts">
                    <?php foreach($posts as $post): ?>
                        <div class="post">
                            <?php if(!empty($post)):  ?>
                                
                                <h2> <?php echo $this->Html->link( $post['Post']['title'], ['action'=>'view', $post['Post']['id']]); ?></h2>
                                <span class="data-post"><?php echo $post['Post']['created'];?> criado por <?php echo $post['User']['username']?></span>
                                
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
