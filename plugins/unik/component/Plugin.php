<?php namespace Unik\Component;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            '\Unik\Component\Components\Banner' => 'HomeBanner',
            '\Unik\Component\Components\HomeContent' => 'HomeContent',
            '\Unik\Component\Components\HomeCreative' => 'HomeCreative',
            '\Unik\Component\Components\HomeInspire' => 'HomeInspire',
            '\Unik\Component\Components\HomeRegistration' => 'HomeRegistration',
        ];        
    }

    public function registerSettings()
    {
        return [
            'home_settings' => [
                'label'       => 'Cài đặt Trang chủ',
                'description' => 'Manage settings',
                'category'    => 'Hands-On',
                'icon'        => 'icon-globe',
                'class'       => 'Unik\Component\Models\Settings',
                'order'       => 500,
                'keywords'    => '',
                // 'permissions' => ['unik.component.manage_settings']
            ],
            'sxt_gt_settings' => [
                'label'       => 'Xưởng sáng tạo',
                'description' => 'settings',
                'category'    => 'Hands-On',
                'icon'        => 'icon-globe',
                'class'       => 'Unik\Component\Models\XstSettings',
                'order'       => 500,
                'keywords'    => '',
                // 'permissions' => ['unik.component.manage_settings']
            ],
            'qkh_gt_settings' => [
                'label'       => 'Quỹ Khuyến Học',
                'description' => 'settings',
                'category'    => 'Hands-On',
                'icon'        => 'icon-globe',
                'class'       => 'Unik\Component\Models\QkhSettings',
                'order'       => 500,
                'keywords'    => '',
                // 'permissions' => ['unik.component.manage_settings']
            ]                       
        ];
    }
}
