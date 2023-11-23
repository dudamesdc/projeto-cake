<?php
    
    $filmes= array(
    array('filme'=> array('nome'=>'sffddf','ano'=>'dsfs','duracao'=>'dsfrdffd')),
     array('filme'=> array('nome'=>'sffddf','ano'=>'dsfs','duracao'=>'dsfrdffd')),
     array('filme'=> array('nome'=>'sffddf','ano'=>'dsfs','duracao'=>'dsfrdffd')),
     array('filme'=> array('nome'=>'sffddf','ano'=>'dsfs','duracao'=>'dsfrdffd')),
     array('filme'=> array('nome'=>'sffddf','ano'=>'dsfs','duracao'=>'dsfrdffd')),
    );
    $detalhe=array();
    foreach($filmes as $filme) (
        $detalhe[]= array(
            $filme['filme']['nome'],
            $filme['filme']['ano'],
            $filme['filme']['duracao']
            
        )
    );
    echo $this->Html->tag('h1','Filmes');
    
    $titulos = array('nomes','ano','duracao');
    $header = $this->Html->tableHeaders($titulos);
    
    
    $body = $this->Html->tableCells($detalhe);
    
    echo $this->Html->tag('table',$header,$body);
