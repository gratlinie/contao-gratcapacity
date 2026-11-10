<?php

declare(strict_types=1);

$GLOBALS['TL_DCA']['tl_module']['palettes']['gc_capacity'] = '{title_legend},name,headline,type;{gc_capacity_legend},gcLevel,gcStyle,gcSize,gcAnimation,gcSpeed;{gc_text_legend},gcLabel,gcTextFree,gcTextFew,gcTextNone;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';

$GLOBALS['TL_DCA']['tl_module']['fields'] += [
    'gcLevel' => [
        'inputType' => 'select',
        'options' => range(1, 10),
        'eval' => ['tl_class' => 'w50'],
        'sql' => ['type' => 'smallint', 'unsigned' => true, 'default' => 5],
    ],
    'gcStyle' => [
        'inputType' => 'radio',
        'options' => ['bar', 'battery'],
        'reference' => &$GLOBALS['TL_LANG']['tl_module']['gc_ref']['style'],
        'eval' => ['tl_class' => 'w50 clr'],
        'sql' => ['type' => 'string', 'length' => 8, 'default' => 'bar'],
    ],
    'gcSize' => [
        'inputType' => 'radio',
        'options' => ['compact', 'card', 'dot'],
        'reference' => &$GLOBALS['TL_LANG']['tl_module']['gc_ref']['size'],
        'eval' => ['tl_class' => 'w50'],
        'sql' => ['type' => 'string', 'length' => 8, 'default' => 'compact'],
    ],
    'gcAnimation' => [
        'inputType' => 'checkbox',
        'eval' => ['tl_class' => 'w50 m12 clr'],
        'sql' => ['type' => 'boolean', 'default' => true],
    ],
    'gcSpeed' => [
        'inputType' => 'radio',
        'options' => ['slow', 'normal', 'fast'],
        'reference' => &$GLOBALS['TL_LANG']['tl_module']['gc_ref']['speed'],
        'eval' => ['tl_class' => 'w50'],
        'sql' => ['type' => 'string', 'length' => 8, 'default' => 'normal'],
    ],
    'gcLabel' => [
        'inputType' => 'text',
        'eval' => ['maxlength' => 128, 'basicEntities' => true, 'placeholder' => &$GLOBALS['TL_LANG']['MSC']['gc_label'], 'tl_class' => 'w50 clr'],
        'sql' => ['type' => 'string', 'length' => 128, 'default' => ''],
    ],
    'gcTextFree' => [
        'inputType' => 'text',
        'eval' => ['maxlength' => 128, 'basicEntities' => true, 'placeholder' => &$GLOBALS['TL_LANG']['MSC']['gc_free'], 'tl_class' => 'w50 clr'],
        'sql' => ['type' => 'string', 'length' => 128, 'default' => ''],
    ],
    'gcTextFew' => [
        'inputType' => 'text',
        'eval' => ['maxlength' => 128, 'basicEntities' => true, 'placeholder' => &$GLOBALS['TL_LANG']['MSC']['gc_few'], 'tl_class' => 'w50'],
        'sql' => ['type' => 'string', 'length' => 128, 'default' => ''],
    ],
    'gcTextNone' => [
        'inputType' => 'text',
        'eval' => ['maxlength' => 128, 'basicEntities' => true, 'placeholder' => &$GLOBALS['TL_LANG']['MSC']['gc_none'], 'tl_class' => 'w50'],
        'sql' => ['type' => 'string', 'length' => 128, 'default' => ''],
    ],
];
