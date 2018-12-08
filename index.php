<?php

return [

    'name' => 'tobbe/admin-style-replacer',

    'type' => 'extension',

    'main' => function ($app) {},
    
    'resources' => [
        'tobbe/admin-style-replacer:' => ''
    ],
    
    'events' => [
        
        'view.styles' => function ($event, $styles) use ($app) {
            // We assume that the core css file will always be registered with name theme.
            $themeStyle = $styles->get('theme');
            if ($themeStyle && strpos($themeStyle->getPath(), 'pagekit/app/system/modules/theme/css/theme.css') !== false) {
                $styles->add(
                    'theme', // This will overwrite the theme style. If you just want to add your style additionally, then choose a unique name.
                    'tobbe/admin-style-replacer:css/theme.css',
                    $themeStyle->getDependencies(),
                    $themeStyle->getOptions()
                );
            }
        },
        
//         'view.system/site/admin/edit' => function ($event, $view) use ($app) {
//             // This will add an additional style. If you want to replace a style, simply register it with the same name.
//             $view->style('my-additional-style-for-system_site_admin_edit', 'tobbe/admin-style-replacer:css/my-additional-style-for-system_site_admin_edit.css');
//         }
        
    ]

];

?>