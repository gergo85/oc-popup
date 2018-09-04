<?php namespace Indikator\Popup;

use System\Classes\PluginBase;
use Backend;
use Lang;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'indikator.popup::lang.plugin.name',
            'description' => 'indikator.popup::lang.plugin.description',
            'author'      => 'indikator.popup::lang.plugin.author',
            'icon'        => 'icon-comments-o',
            'homepage'    => 'https://github.com/gergo85/oc-popup'
        ];
    }

    public function registerNavigation()
    {
        return [
            'popup' => [
                'label'       => 'indikator.popup::lang.plugin.name',
                'url'         => Backend::url('indikator/popup/reports'),
                'icon'        => 'icon-comments-o',
                'iconSvg'     => 'plugins/indikator/popup/assets/img/popup-icon.svg',
                'permissions' => ['indikator.popup.*'],
                'order'       => 500,

                'sideMenu' => [
                    'reports' => [
                        'label'       => 'indikator.popup::lang.menu.reports',
                        'url'         => Backend::url('indikator/popup/reports'),
                        'icon'        => 'icon-area-chart',
                        'permissions' => ['indikator.popup.reports']
                    ],
                    'campaigns' => [
                        'label'       => 'indikator.popup::lang.menu.campaigns',
                        'url'         => Backend::url('indikator/popup/campaigns'),
                        'icon'        => 'icon-television',
                        'permissions' => ['indikator.popup.campaigns']
                    ],
                    'abtest' => [
                        'label'       => 'indikator.popup::lang.menu.abtest',
                        'url'         => Backend::url('indikator/popup/abtest'),
                        'icon'        => 'icon-balance-scale',
                        'permissions' => ['indikator.popup.abtest']
                    ],
                    'themes' => [
                        'label'       => 'indikator.popup::lang.menu.themes',
                        'url'         => Backend::url('indikator/popup/themes'),
                        'icon'        => 'icon-picture-o',
                        'permissions' => ['indikator.popup.themes']
                    ]
                ]
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'indikator.popup.campaigns' => [
                'tab'   => 'indikator.popup::lang.plugin.name',
                'label' => 'indikator.popup::lang.permission.campaigns',
                'order' => 100,
                'roles' => ['publisher']
            ],
            'indikator.popup.reports' => [
                'tab'   => 'indikator.popup::lang.plugin.name',
                'label' => 'indikator.popup::lang.permission.reports',
                'order' => 200,
                'roles' => ['publisher']
            ],
            'indikator.popup.abtest' => [
                'tab'   => 'indikator.popup::lang.plugin.name',
                'label' => 'indikator.popup::lang.permission.abtest',
                'order' => 300,
                'roles' => ['publisher']
            ],
            'indikator.popup.themes' => [
                'tab'   => 'indikator.popup::lang.plugin.name',
                'label' => 'indikator.popup::lang.permission.themes',
                'order' => 400,
                'roles' => ['publisher']
            ]
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'Indikator\Popup\ReportWidgets\ReportList' => [
                'label'   => 'indikator.popup::lang.widget.list_label',
                'context' => 'dashboard'
            ],
            'Indikator\Popup\ReportWidgets\ReportGraph' => [
                'label'   => 'indikator.popup::lang.widget.graph_label',
                'context' => 'dashboard'
            ],
            'Indikator\Popup\ReportWidgets\Summary' => [
                'label'   => 'indikator.popup::lang.widget.summary',
                'context' => 'dashboard'
            ]
        ];
    }

    public function registerListColumnTypes()
    {
        return [
            'popup_status' => function($value) {
                $text = [
                    1 => 'active',
                    2 => 'inactive',
                    3 => 'test'
                ];

                $class = [
                    1 => 'text-info',
                    2 => 'text-danger',
                    3 => 'text-warning'
                ];

                return '<span class="oc-icon-circle '.$class[$value].'">'.Lang::get('indikator.popup::lang.form.status_'.$text[$value]).'</span>';
            }
        ];
    }

    public function registerComponents()
    {
        return [
            'Indikator\Popup\Components\Launch' => 'launchPopup'
        ];
    }
}
