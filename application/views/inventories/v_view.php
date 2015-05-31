<?php

/* GPL
 * GPL To change this license header, choose License Headers in Project Properties.
 * GPL To change this template file, choose Tools | Templates
 * GPL and open the template in the editor.
 */
/*
 * name        : Salman Farisi<salmandriva@gmail.com>
 * skype       : salmandriva
 * YM          : s4lm4ndrake
 * G+          : plus.google.com/salmandriva
 * blog/web    : http://ketikan10jari.wordpress.com
 * facebook    : facebook.com/salmandriva
 */
?>
<dl>
    <dd>Code</dd>
    <dt><?php echo $list->code; ?></dt>
    <dd>name</dd>
    <dt><?php echo $list->name; ?></dt>
    <dd>Category</dd>
    <dt><?php echo $list->category; ?></dt>
    <dd>Status</dd>
    <dt><?php echo $list->status; ?></dt>
    <dd>Type</dd>
    <dt><?php echo ($list->type==0) ? 'consumable' : 'unconsumable'; ?></dt>
</dl>